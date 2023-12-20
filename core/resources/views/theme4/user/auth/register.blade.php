@extends(template().'layout.auth')

@section('content')
    @push('seo')
        <meta name='description' content="{{ @$general->seo_description }}">
    @endpush

    <section class="auth-section auth-section-two" >
        <div class="auth-wrapper" style="background-color: white;">
            <div class="auth-top-part">
               <!-- <a href="{{ route('home') }}" class="auth-logo"> 
                    <img class="img-fluid rounded sm-device-img text-align" src="{{ getFile('logo', @$general->whitelogo) }}" width="100%" alt="pp">
                </a> -->
                <p class="mb-0"><span class="me-2">{{ __('Already registered?') }}</span> <a class="btn gr-bg-9 text-white btn-sm" href="{{ route('user.login') }}">{{ __('Login') }}</a></p>
            </div>
            <div class="auth-body-part">
                <div class="auth-form-wrapper">
                    <h3 class="text-center mb-4">{{ __('Register An Account') }}</h3>
                    <form action="{{ route('user.register') }}" method="POST">
                        @csrf
                        <div class="row gy-3">
                            <div class="col-lg-12">
                               
                                <label for="formGroupExampleInput">{{ __('Reffered By')}} : {{ request()->reffer }}</label>
                                 <input type="text" class="form-control"  value="{{ request()->reffer }}" name="reffered_by"  placeholder="{{ __('Reffered code')}}" required>
                               
                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput">{{ __('Your First Name')}}</label>
                                <input type="text" class="form-control" name="fname" value="{{ old('fname') }}" id="first_name" placeholder="{{ __('First Name')}}">
                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput">{{ __('Your Last Name')}}</label>
                                <input type="text" class="form-control" name="lname" value="{{ old('lname') }}" id="last_name" placeholder="{{ __('Last name')}}">
                            </div>
                            <div class="col-md-6">
                                <label for="username">{{ __('Username')}}</label>
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}" id="username" placeholder="{{ __('User Name')}}">
                            </div>
   <div class="col-md-6">
    <label for="country">{{ __('Country')}}</label>
    <select class="form-control" id="country" name="country" onchange="updateCountryCode()">
        <option value="pk">Pakistan (+92)</option>
        <option value="us">United States (+1)</option>
        <option value="uk">United Kingdom (+44)</option>
        <option value="in">India (+91)</option>
        <option value="cn">China (+86)</option>
        <!-- Add more country options as needed -->
    </select>
</div>

<div class="col-md-6">
    <label for="phone">{{ __('Phone Number')}}</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="countryCode">+92</span>
        </div>
        <input type="text" class="form-control" name="phone" id="phone" placeholder="{{ __('phone')}}" oninput="validatePhoneNumber()">
    </div>
    <small id="phoneError" class="text-danger"></small>
</div>



                            <div class="col-md-12">
                                <label for="formGroupExampleInput">{{ __('Email')}}</label>
                                <input type="Email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="{{ __('Email')}}">
                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput">{{ __('Pasword')}}</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="{{ __('Password')}}">
                            </div>
                            <div class="col-md-6">
                                <label for="formGroupExampleInput"> {{ __('Confirm Pasword')}}</label>
                                <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="{{ __('Confirm Password')}}">
                            </div>
                            <div class="col-md-6">
                                @if (@$general->allow_recaptcha==1)
                                    <script src="https://www.google.com/recaptcha/api.js"></script>
                                    <div class="g-recaptcha" data-sitekey="{{ @$general->recaptcha_key }}"
                                        data-callback="verifyCaptcha"></div>
                                    <div id="g-recaptcha-error"></div>
                                @endif
                            </div>
                            <div class="col-lg-12">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" name="check" id="exampleCheck1" required>
                                    <label class="form-check-label" for="exampleCheck1">{{ __('I agree to the') }} <a href="{{ route('privacy') }}"  class="color-change">{{ __('Privacy policy') }}</a></label>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn gr-bg-8 text-white w-50" type="submit"> <span>{{ __('Register')}}</span> </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="auth-footer-part">
                <p class="text-center mb-0">
                    @if (@$general->copyright)
                        {{ __(@$general->copyright) }}
                    @endif
                </p>
            </div>
        </div>
      
    </section>
@endsection

@push('script')
    <script>
        "use strict";

        function submitUserForm() {
            var response = grecaptcha.getResponse()

            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML =
                    "<span class='sp_text_danger'>{{__('Captcha field is required.')</span>";
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function updateCountryCode() {
        const countryCodes = {
            'pk': '+92',
            'us': '+1',
            'uk': '+44',
            'in': '+91',
            'cn': '+86'
            // Add more country codes here
        };

        const selectedCountry = $('#country').val();
        $('#countryCode').text(countryCodes[selectedCountry]);
        validatePhoneNumber(); // Revalidate when the country changes
    }

    function validatePhoneNumber() {
        const phoneInput = $('#phone');
        const phoneError = $('#phoneError');
        const maxPhoneLength = 11; // Adjust as needed

        const phoneValue = phoneInput.val();
        const countryCode = $('#countryCode').text();

        if (phoneValue.length > maxPhoneLength) {
            phoneError.text('Phone number is too long.');
        } else {
            phoneError.text('');
        }
    }

    function registerUser() {
        validatePhoneNumber(); // Ensure phone number is validated before registration

        // Check if there are any validation errors
        const phoneError = $('#phoneError').text();
        if (phoneError) {
            alert('Please fix the phone number error before registering.');
            return;
        }

        // Add your registration logic here
        alert('Registration successful!');
        // You can submit the form or perform any other actions as needed
    }

    // Initial call to set the default country code and validate phone number
    updateCountryCode();
</script>
@endpush
