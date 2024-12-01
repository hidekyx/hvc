@extends('landing-page.layout.app')

@section('content')
<section id="page-content" class="p-b-0">
    <div class="container">
        <div class="row m-b-40">
            <div class="col-lg-12">
                @include('landing-page.layout.alert')x
                <div class="card">
                    <div class="card-body">
                        <form id="wizard7" class="wizard needs-validation" data-style="1" novalidate>
                            @foreach($question as $q)
                            <h3>Account Information</h3>
                            <div class="wizard-content">
                                <div class="card">
                                    <div class="card-body bg-dark">
                                        <div class="h5 text-center text-white" style="font-size: xx-large;">{{ $q->question }}</div>
                                    </div>
                                </div>
                                <div class="row pt-5 mt-5">
                                    @foreach($q->answer as $a)
                                    <div class="col-lg-3 form-check">
                                        <div class="bg-dark py-3">
                                            <input class="form-check-input" type="radio" name="answer[]" id="{{ $a->id_quiz_answer }}" value="option1" required>
                                            <label class="form-check-label text-white text-center" style="font-size: x-large;" for="{{ $a->id_quiz_answer }}">{{ $a->answer }}</label>
                                        </div>
                                        
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                            <h3>Confirmation</h3>
                            <div class="wizard-content">
                                <div class="h5 mb-4">Confimration</div>
                                <p>Customize your experience by confirming your personalization settings and the data stored with your account. You can always learn more about these options, adjust them, and review your activity in your Account</p>
                                <p>These settings apply wherever you are signed in to your new Account.</p>
                                <div class="form-check mb-1 mt-5">
                                    <input type="checkbox" name="reminders" id="reminders" class="form-check-input">
                                    <label class="custom-control-label" for="reminders">Send me occasional reminders about these settings</a></label>
                                </div>
                                <div class="form-check">
                                    <input type="checkbox" name="terms_conditions" id="terms_conditions" class="form-check-input">
                                    <label class="custom-control-label" for="terms_conditions">By checking this option, you agree to acceot with the <a href="#">Terms and Conditions</a>.</label>
                                </div>
                        </form>
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
            INSPIRO.elements.notification("Submited",
                "Thank you, your account has been registed successfully", "success");
        }
    });
    //Validation
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
</script>
@endpush