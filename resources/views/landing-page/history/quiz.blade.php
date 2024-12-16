@extends('landing-page.layout.app')

@section('content')
<section id="page-content" class="p-b-0">
    <div class="container">
        <div class="row m-b-40">
            <div class="col-lg-12">
                @include('landing-page.layout.alert')
                <div class="card">
                    <div class="card-body">
                        <form id="wizard7" class="wizard needs-validation" data-style="1" novalidate>
                            @csrf
                            @foreach($question->shuffle() as $qindex => $q)
                            <h3>Account Information</h3>
                            <div class="wizard-content">
                                <div class="card">
                                    <div class="card-body bg-dark">
                                        <div class="h5 text-center text-white" style="font-size: xx-large;">{{ $q->question }}</div>
                                    </div>
                                </div>
                                <div class="row pt-5 mt-5">
                                    @foreach($q->answer->shuffle() as $aindex => $a)
                                    <div class="col-lg-3 form-check">
                                        <div class="bg-dark py-3">
                                            <input class="form-check-input" type="radio" name="answer[{{$q->id_quiz_question}}]" id="q-{{ $qindex }}-answer-{{ $aindex }}" value="{{ $a->id_quiz_answer }}" required>
                                            <label class="form-check-label text-white text-center" style="font-size: x-large;" for="q-{{ $qindex }}-answer-{{ $aindex }}">{{ $a->answer }}</label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                            <h3>Confirmation</h3>
                            <div class="wizard-content">
                                <div class="h5 mb-4">Summary</div>
                                @foreach($question as $qindex => $q)
                                <p class="question mb-0">{{ $qindex+1 }}. {{ $q->question }}</p>
                                <p class="answer mb-2" id="summary-q-{{ $qindex }}"></p>
                                @endforeach
                            </div>
                        </form>
                    </div>
                    <div class="icon-box effect small border d-flex justify-content-center">
                        <h2 style="border: 3px solid #333; text-align: center; border-radius: 50%;" class="py-2 px-3" id="counter">120</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    var wizard7 = $('#wizard7');
    wizard7.steps({
        headerTag: "h3",
        bodyTag: '.wizard-content',
        autoFocus: true,
        enableAllSteps: true,
        titleTemplate: '<span class="number">#index#</span><span class="title">#title#</span>',
        onStepChanging: function(event, currentIndex, newIndex) {
            if (currentIndex > newIndex) {
                return true;
            }
            return wizard7.valid();
        },
        onStepChanged: function(event, currentIndex, priorIndex) {},
        onFinishing: function(event, currentIndex) {
            return wizard7.valid();
        },
        onFinished: function(event, currentIndex) {
            submitForm();
        }
    });

    $('input[type="radio"]').on('change', function () {
        const selectedAnswer = $(this).next('label').text();
        const questionId = $(this).attr('id').split('-').slice(0, 2).join('-');
        $('#summary-' + questionId).text(selectedAnswer);
    });

    wizard7.validate({
        errorClass: 'is-invalid',
        validClass: 'is-valid',
        errorElement: "div",
        rules: {
            answer: {
                required: true
            },
        },
        errorPlacement: function(error, element) {
            $(element).parents(".form-group").append(error);
        }
    });
    $('.wizard').find(".actions ul > li > a").addClass("btn");

    $(document).ready(function () {
        let counter = $('#counter');
        let countdown = 120;

        let interval = setInterval(function () {
            if (countdown > 0) {
                countdown--;
                counter.text(countdown);
            } else {
                clearInterval(interval);
                if (!timerExpired) {
                    timerExpired = true;
                    submitForm();
                }
            }
        }, 1000);
    });

    function submitForm() {
        const formData = wizard7.serialize();
        const url = '/quiz/{{ $history->id_history }}/submit';

        $.ajax({
            type: "POST",
            url: url,
            data: formData,
            success: function(response) {
                INSPIRO.elements.notification("Success", "Your answers have been submitted successfully!", "success");
                window.location.href = response.redirect;
            },
            error: function(xhr) {
                console.error("Submission failed:", xhr.responseText);
                INSPIRO.elements.notification("Error", "Failed to submit the quiz. Please try again.", "danger");
            }
        });
    }
</script>
@endpush