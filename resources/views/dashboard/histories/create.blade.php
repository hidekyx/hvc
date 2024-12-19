@extends('dashboard.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Histories Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Management</li>
                <li class="breadcrumb-item">Histories</li>
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
                        <h5 class="card-title mb-3 pb-0">Create New History</h5>
                        <form action="{{ asset('/dashboard/histories/store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-lg-2 col-form-label">Name</label>
                                <div class="col-lg-10">
                                    <input name="name" type="text" class="form-control" id="name" required>
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
                                    <textarea name="description" class="form-control" id="description" rows="14" required></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="size" class="col-lg-2 col-form-label">Collection</label>
                                <div class="col-lg-10">
                                    <select class="form-select" size="8" name="id_collection[]" id="id_collection" multiple>
                                        @foreach($collection as $c)
                                        <option value="{{ $c->id_collection }}">{{ $c->name }} - {{ $c->category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="img_1" class="col-lg-2 col-form-label">Main Image</label>
                                <div class="col-lg-10">
                                    <input class="form-control mb-2" id="img_1" type="file" accept="image/*" name="img_1" required>
                                    <img id="preview-1" style="max-width: 400px;">

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
                                        <div class="col-lg-12">
                                            <input class="form-control mb-2" id="img_2" type="file" accept="image/*" name="img_2">
                                            <img id="preview-2" style="max-width: 400px;">

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