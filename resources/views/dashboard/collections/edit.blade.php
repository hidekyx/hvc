@extends('dashboard.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Collections Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Management</li>
                <li class="breadcrumb-item">Collections</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.layout.alert')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3 pb-0">Edit Collection</h5>
                        <form action="{{ asset('/dashboard/collections/update/'.$data->id_collection) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-lg-2 col-form-label">Name</label>
                                <div class="col-lg-10">
                                    <input name="name" type="text" class="form-control" id="name" value="{{ $data->name }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="price" class="col-lg-2 col-form-label">Price</label>
                                <div class="col-lg-10">
                                    <input name="price" type="number" class="form-control" id="price" value="{{ $data->price }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="stock" class="col-lg-2 col-form-label">Stock</label>
                                <div class="col-lg-10">
                                    <input name="stock" type="number" class="form-control" id="stock" value="{{ $data->stock }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="category" class="col-lg-2 col-form-label">Category</label>
                                <div class="col-lg-10">
                                    <select class="form-select" name="category" id="category" required>
                                        <option value="National">National</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="description" class="col-lg-2 col-form-label">Description</label>
                                <div class="col-lg-10">
                                    <textarea name="description" class="form-control" id="description" rows="4" required>{{ $data->description }}</textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="size" class="col-lg-2 col-form-label">Size</label>
                                <div class="col-lg-10">
                                    <select class="form-select" name="size[]" id="size" multiple required>
                                        <option value="S" {{ in_array('S', explode(', ', $data->size)) ? 'selected' : '' }}>Small</option>
                                        <option value="M" {{ in_array('M', explode(', ', $data->size)) ? 'selected' : '' }}>Medium</option>
                                        <option value="L" {{ in_array('L', explode(', ', $data->size)) ? 'selected' : '' }}>Large</option>
                                        <option value="XL" {{ in_array('XL', explode(', ', $data->size)) ? 'selected' : '' }}>Extra Large</option>
                                        <option value="XXL" {{ in_array('XXL', explode(', ', $data->size)) ? 'selected' : '' }}>Double Extra Large</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="color" class="col-lg-2 col-form-label">Color</label>
                                <div class="col-lg-10">
                                    <input name="color" class="form-control" id="tags-input" value="{{ $data->color }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="img_1" class="col-lg-2 col-form-label">Main Image</label>
                                <div class="col-lg-10">
                                    <input class="form-control mb-2" id="img_1" type="file" accept="image/*" name="img_1">
                                    @if(Storage::exists('public/collection/'.$data->img_1) && $data->img_1)
                                        <img src="{{ asset('storage/collection/'.$data->img_1) }}" id="preview-1" id="preview-1" style="max-width: 400px;">
                                    @else
                                        <img id="preview-1" style="max-width: 400px;">
                                    @endif

                                    @push('scripts')
                                    <script type="text/javascript">
                                        $('input[id="img_1"]').change(function(e) {
                                            var reader = new FileReader();
                                            reader.onload = function(e) {
                                                document.getElementById('preview-1').src = e.target.result;
                                                document.getElementById('preview-1').hidden = false;
                                            };
                                            reader.readAsDataURL(this.files[0]);
                                        });
                                    </script>
                                    @endpush
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="img_2" class="col-lg-2 col-form-label">Secondary Images</label>
                                <div class="col-lg-10">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <input class="form-control mb-2" id="img_2" type="file" accept="image/*" name="img_2">
                                            @if(Storage::exists('public/collection/'.$data->img_2) && $data->img_2)
                                                <img src="{{ asset('storage/collection/'.$data->img_2) }}" id="preview-2" id="preview-2" style="max-width: 400px;">
                                            @else
                                                <img id="preview-2" style="max-width: 400px;">
                                            @endif

                                            @push('scripts')
                                            <script type="text/javascript">
                                                $('input[id="img_2"]').change(function(e) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        document.getElementById('preview-2').src = e.target.result;
                                                        document.getElementById('preview-2').hidden = false;
                                                    };
                                                    reader.readAsDataURL(this.files[0]);
                                                });
                                            </script>
                                            @endpush
                                        </div>
                                        <div class="col-lg-4">
                                            <input class="form-control mb-2" id="img_3" type="file" accept="image/*" name="img_3">
                                            @if(Storage::exists('public/collection/'.$data->img_3) && $data->img_3)
                                                <img src="{{ asset('storage/collection/'.$data->img_3) }}" id="preview-3" id="preview-3" style="max-width: 400px;">
                                            @else
                                                <img id="preview-3" style="max-width: 400px;">
                                            @endif

                                            @push('scripts')
                                            <script type="text/javascript">
                                                $('input[id="img_3"]').change(function(e) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        document.getElementById('preview-3').src = e.target.result;
                                                        document.getElementById('preview-3').hidden = false;
                                                    };
                                                    reader.readAsDataURL(this.files[0]);
                                                });
                                            </script>
                                            @endpush
                                        </div>
                                        <div class="col-lg-4">
                                            <input class="form-control mb-2" id="img_4" type="file" accept="image/*" name="img_4">
                                            @if(Storage::exists('public/collection/'.$data->img_4) && $data->img_4)
                                                <img src="{{ asset('storage/collection/'.$data->img_4) }}" id="preview-4" id="preview-4" style="max-width: 400px;">
                                            @else
                                                <img id="preview-4" style="max-width: 400px;">
                                            @endif

                                            @push('scripts')
                                            <script type="text/javascript">
                                                $('input[id="img_4"]').change(function(e) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        document.getElementById('preview-4').src = e.target.result;
                                                        document.getElementById('preview-4').hidden = false;
                                                    };
                                                    reader.readAsDataURL(this.files[0]);
                                                });
                                            </script>
                                            @endpush
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @push('scripts')
                            <script>
                                var input = document.getElementById('tags-input');
                                new Tagify(input);
                            </script>
                            @endpush

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