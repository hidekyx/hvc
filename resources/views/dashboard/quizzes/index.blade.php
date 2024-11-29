@extends('dashboard.layout.app')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Quizzes Management</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Management</li>
                <li class="breadcrumb-item">History</li>
                <li class="breadcrumb-item active">Quizzes</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                @include('dashboard.layout.alert')

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Quizzes Management - {{ $history->name }} ({{ $history->category }})</h5>
                        <a href="{{ asset('/dashboard/histories/quiz/'.$history->id_history.'/create') }}">
                            <button type="button" class="btn btn-primary btn-sm text-white rounded-pill">
                                <b><i class="bi bi-plus-lg"></i> Add Question</b>
                            </button>
                        </a>
                        <hr>
                        <table class="table table-hover table-striped datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Question</th>
                                    <th scope="col">Answer</th>
                                    <th scope="col">Menu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($quiz as $q)
                                <tr>
                                    <td>
                                        <b>{{ $q->question }}</b><br>
                                    </td>
                                    <td class="text-secondary">
                                        <ul>
                                        @foreach($q->answer as $answer)
                                            <li class="text-{{ $answer->is_correct == 1 ? 'success' : 'danger' }}"><b>{{ $answer->answer }}</b></li>
                                        @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <a href="{{ asset('/dashboard/histories/quiz/'.$q->id_history.'/edit/'.$q->id_quiz_question) }}">
                                            <button type="button" class="btn btn-warning btn-sm text-white rounded-pill mb-2">
                                                <b><i class="bi bi-pencil"></i> </b>
                                            </button>
                                        </a>
                                        
                                        <button type="button" class="btn btn-danger btn-sm rounded-pill mb-2" data-bs-toggle="modal" data-bs-target="#delete-{{ $q->id_history }}">
                                            <b><i class="bi bi-trash"></i> </b>
                                        </button>
                                        <div class="modal fade" id="delete-{{ $q->id_history }}" tabindex="-1">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Delete Confirmation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Delete: <b>{{ $q->title }} (ID: {{ $q->id_quiz_question }})</b><br>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ asset('/dashboard/histories/delete/'.$q->id_history) }}" method="post">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger text-white"><i class="bi bi-trash"></i> Delete History</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection