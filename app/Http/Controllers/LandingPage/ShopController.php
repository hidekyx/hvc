<?php

namespace App\Http\Controllers\LandingPage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Collection;
use App\Models\Content;
use App\Models\Courier;
use App\Models\Payment;
use App\Models\Review;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\Voucher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ShopController extends Controller
{
    public function detail($idCollection): View
    {
        $collection = Collection::findOrFail($idCollection);
        $collection->size = explode(', ', $collection->size);
        $collection->color = explode(', ', $collection->color);
        $related = Collection::where('category', $collection->category)->inRandomOrder()->limit(4)->get();

        $reviewRate = Review::where('id_collection', $idCollection)->get()->pluck('rate');
        $averageRate = 0;
        if ($reviewRate->isNotEmpty()) {
            $totalRate = $reviewRate->sum();
            $averageRate = $totalRate / $reviewRate->count();
        }

        $view = [
            'page' => 'Shop',
            'content' => Content::pluck('value', 'key')->toArray(),
            'collection' => $collection,
            'related' => $related,
            'review' => Review::where('id_collection', $idCollection)->get(),
            'averageRate' => floor($averageRate),
        ];

        return view('landing-page.shop.detail')->with($view);
    }

    public function cart()
    {
        if (Auth::check()) {
            $view = [
                'page' => 'Shop',
                'content' => Content::pluck('value', 'key')->toArray(),
                'cart' => Cart::where('id_user', Auth::id())->waiting()->orderByDesc('updated_at')->get(),
                'courier' => Courier::get(),
                'payment' => Payment::get(),
                'voucher' => Voucher::where('id_user', Auth::id())->where('status', 'Unused')->get(),
            ];

            return view('landing-page.shop.cart')->with($view);
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function addToCart(Request $request, $idCollection)
    {
        if (Auth::check()) {
            $collection = Collection::findOrFail($idCollection);

            if ($collection->stock <= 0) {
                Session::flash('error', 'Stock is unavailable at this moment');
                return redirect('/shop/' . $idCollection);
            }

            if (Auth::user()->role == "Admin") {
                Session::flash('error', 'Admins cannot proceed, only customers can buy collections');
                return redirect('/shop/' . $idCollection);
            }

            $cart = new Cart($request->all());
            $cart->id_user = Auth::user()->id_user;
            $cart->id_collection = $idCollection;
            $cart->save();

            Session::flash('success', 'Added collection to cart');
            return redirect('/cart');
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function cancelCartItem($idCart)
    {
        if (Auth::check()) {
            $cart = Cart::findOrFail($idCart);
            $cart->delete();

            Session::flash('success', 'Cart item canceled');
            return redirect('/cart');
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function checkout(Request $request)
    {
        if (Auth::check()) {
            if (!$request->get('id_courier')) {
                Session::flash('error', 'Please select delivery option first');
                return redirect('/cart');
            }

            if (!$request->get('id_payment')) {
                Session::flash('error', 'Please select payment method first');
                return redirect('/cart');
            }

            $total = 0;
            foreach ($request->get('quantity') as $idCart => $quantity) {
                $singleCartItem = Cart::findOrFail($idCart);
                if ($singleCartItem->status != "Waiting") {
                    Session::flash('error', 'Cart is already on checkout');
                    return redirect('/cart');
                }

                $collection = Collection::findOrFail($singleCartItem->id_collection);
                if ($collection->stock < $quantity) {
                    $message = "Stock for collection " . $collection->name . " is not enough for your purchase";
                    Session::flash('error', $message);
                    return redirect('/cart');
                }

                $collection->stock -= $quantity;
                $collection->save();

                $singleCartItem->quantity = $quantity;
                $singleCartItem->status = "Processed";
                $singleCartItem->save();
                
                $total += $collection->price * $singleCartItem->quantity;
                            
                $transactionDetail[$idCart] = new TransactionDetail();
                $transactionDetail[$idCart]->id_user = Auth::id();
                $transactionDetail[$idCart]->id_collection = $collection->id_collection;
                $transactionDetail[$idCart]->quantity = $singleCartItem->quantity;
                $transactionDetail[$idCart]->size = $singleCartItem->size;
                $transactionDetail[$idCart]->color = $singleCartItem->color;
                $transactionDetail[$idCart]->save();
            }

            $deliveryCost = Courier::findOrFail($request->get('id_courier'))->price;

            $voucherCost = 0;
            if($request->get('id_voucher')) {
                $voucher = Voucher::where('id_voucher', $request->get('id_voucher'))->where('id_user', Auth::id())->where('status', 'Unused')->firstOrFail();
                $voucher->status = "Used";
                $voucher->save();
                if ($voucher->category == "Diskon 5 Persen") {
                    $voucherCost = $total * 0.05;
                } else if ($voucher->category == "Gratis Ongkir") {
                    $voucherCost = $deliveryCost;
                }
            }

            $transaction = new Transaction($request->all());
            $transaction->id_user = Auth::id();
            $transaction->id_voucher = $voucher->id_voucher ?? null;
            $transaction->total = $total + $deliveryCost - $voucherCost;
            $transaction->status = "Payment";
            $transaction->save();

            foreach ($transactionDetail as $detail) {
                $detail->id_transaction = $transaction->id_transaction;
                $detail->save();
            }

            Session::flash('success', 'Please proceed with the payment');
            return redirect('/transaction');
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function transaction()
    {
        $view = [
            'page' => 'Transaction',
            'content' => Content::pluck('value', 'key')->toArray(),
            'transaction' => Transaction::where('id_user', Auth::id())->orderByDesc('id_transaction')->get(),
        ];

        return view('landing-page.shop.transaction')->with($view);
    }

    public function payment($idTransaction)
    {
        $view = [
            'page' => 'Payment',
            'content' => Content::pluck('value', 'key')->toArray(),
            'transaction' => Transaction::where('id_user', Auth::id())->where('id_transaction', $idTransaction)->firstOrFail(),
        ];

        return view('landing-page.shop.payment')->with($view);
    }

    public function paymentAction(Request $request, $idTransaction)
    {
        if (Auth::check()) {
            $transaction = Transaction::where('id_user', Auth::id())->where('id_transaction', $idTransaction)->firstOrFail();

            $filenameWithExt = $request->file("proof")->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file("proof")->getClientOriginalExtension();
            $filenameSimpan = md5($filename. time()).'.'.$extension;
            $path = $request->file("proof")->storeAs('public/proof', $filenameSimpan);
            
            $transaction->proof = $filenameSimpan;
            $transaction->status = "Packaging";
            $transaction->packaging_at = date('Y-m-d H:i:s');
            $transaction->save();

            Session::flash('success', 'Transaction is confirmed');
            return redirect('/transaction');
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function confirmAction($idTransaction)
    {
        if (Auth::check()) {
            $transaction = Transaction::where('id_user', Auth::id())->where('id_transaction', $idTransaction)->firstOrFail();
            
            $transaction->status = "Finished";
            $transaction->finished_at = date('Y-m-d H:i:s');
            $transaction->save();

            Session::flash('success', 'Transaction is finished, thank you for your purchase!');
            return redirect('/transaction');
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }

    public function review($idTransactionDetail)
    {
        $review = Review::where('id_transaction_detail', $idTransactionDetail)->first();
        if($review) {
            Session::flash('error', 'You already reviewed this purchase');
            return redirect('/transaction');
        }

        $view = [
            'page' => 'Review',
            'content' => Content::pluck('value', 'key')->toArray(),
            'transactionDetail' => TransactionDetail::where('id_user', Auth::id())->where('id_transaction_detail', $idTransactionDetail)->firstOrFail(),
        ];

        return view('landing-page.shop.review')->with($view);
    }

    public function reviewAction(Request $request, $idTransactionDetail)
    {
        if (Auth::check()) {
            $transactionDetail = TransactionDetail::where('id_transaction_detail', $idTransactionDetail)->firstOrFail();
            $review = Review::where('id_transaction_detail', $idTransactionDetail)->first();
            if($review) {
                Session::flash('error', 'You already reviewed this purchase');
                return redirect('/transaction');
            }
            $review = new Review($request->all());
            $review->id_transaction_detail = $transactionDetail->id_transaction_detail;
            $review->id_collection = $transactionDetail->id_collection;
            $review->id_user = Auth::id();

            if($request->file('img_1')) {
                $filenameWithExt = $request->file("img_1")->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file("img_1")->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $path = $request->file("img_1")->storeAs('public/review', $filenameSimpan);
                $review->img_1 = $filenameSimpan;
            }

            if($request->file('img_2')) {
                $filenameWithExt = $request->file("img_2")->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file("img_2")->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $path = $request->file("img_2")->storeAs('public/review', $filenameSimpan);
                $review->img_2 = $filenameSimpan;
            }

            if($request->file('img_3')) {
                $filenameWithExt = $request->file("img_3")->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file("img_3")->getClientOriginalExtension();
                $filenameSimpan = md5($filename. time()).'.'.$extension;
                $path = $request->file("img_3")->storeAs('public/review', $filenameSimpan);
                $review->img_3 = $filenameSimpan;
            }
            
            $review->save();

            Session::flash('success', 'Review saved!');
            return redirect('/transaction');
        } else {
            Session::flash('error', 'You need to be logged in first');
            return redirect('/login');
        }
    }
}
