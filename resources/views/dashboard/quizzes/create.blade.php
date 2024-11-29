@extends('dashboard.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Quizzes Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Management</li>
                <li class="breadcrumb-item">Histories</li>
                <li class="breadcrumb-item">Quizzes</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.layout.alert')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3 pb-0">Create New Question - {{ $history->name }} ({{ $history->category }})</h5>
                        <form action="{{ asset('/dashboard/histories/quiz/'.$history->id_history.'/store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="question" class="col-lg-2 col-form-label">Question</label>
                                <div class="col-lg-10">
                                    <input name="question" type="text" class="form-control" id="question" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="correct_answer" class="col-lg-2 col-form-label">Correct Answer</label>
                                <div class="col-lg-10">
                                    <input name="answer[correct]" type="text" class="form-control" id="correct_answer" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="wrong_answer" class="col-lg-2 col-form-label">Wrong Answers</label>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <input name="answer[wrong][]" type="text" class="form-control" id="wrong_answer" required>
                                        </div>
                                        <div class="col-lg-4">
                                            <input name="answer[wrong][]" type="text" class="form-control" id="wrong_answer" required>
                                        </div>
                                        <div class="col-lg-4">
                                            <input name="answer[wrong][]" type="text" class="form-control" id="wrong_answer" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-left">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>
@endsection