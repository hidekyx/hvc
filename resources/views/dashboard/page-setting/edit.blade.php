@extends('dashboard.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Page Setting</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Settings</li>
                <li class="breadcrumb-item">Page Setting</li>
                <li class="breadcrumb-item active">{{ Str::title(str_replace('_', ' ', $data->key)) }}</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.layout.alert')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title mb-3 pb-0">Edit Page Setting</h5>
                        <form action="{{ asset('/dashboard/page-setting/update/'.$data->key) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="value" class="col-lg-2 col-form-label">Value</label>
                                <div class="col-lg-10">
                                    @switch($data->key)
                                        @case("home_text")
                                            <textarea class="form-control" name="value" required>{{ $data->value }}</textarea>
                                            @push('scripts')
                                            <script>
                                                CKEDITOR.replace('value');
                                            </script>
                                            @endpush
                                        @break

                                        @case("home_logo")
                                            <input class="form-control mb-2" id="value" type="file" accept="image/*" name="value" required>
						                    <img src="{{ asset('storage/content/'.$data->value) }}" id="preview" style="max-width: 400px;" >

                                            @push('scripts')
                                            <script type="text/javascript">
                                                $('input[id="value"]').change(function(e) {
                                                    var reader = new FileReader();
                                                    reader.onload = function(e) {
                                                        document.getElementById('preview').src = e.target.result;
                                                        document.getElementById('preview').hidden = false;
                                                    };
                                                    reader.readAsDataURL(this.files[0]);
                                                });
                                            </script>
                                            @endpush
                                        @break

                                        @case("home_highlight")
                                            <select class="form-select" name="value" required>
                                                <option selected hidden value="{{ $data->value }}">ID:{{ $data->value }} - {{ App\Models\Collection::getHighlight($data->value)->name }} - {{ App\Models\Collection::getHighlight($data->value)->category }}</option>
                                                @foreach($collection as $c)
                                                <option value="{{ $c->id_collection }}">ID:{{ $c->id_collection }} - {{ $c->name }} - {{ $c->category }}</option>
                                                @endforeach
                                            </select>
                                        @break

                                        @case("tiktok_link")
                                        @case("instagram_link")
                                        @case("whatsapp_link")
                                            <input name="value" type="text" class="form-control" id="value" value="{{ $data->value }}" required>
                                        @break

                                        @case("content_information")
                                        <textarea name="value" class="form-control" id="value" rows="4" required>{{ $data->value }}</textarea>
                                        @break
                                    @endswitch
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