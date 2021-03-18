<x-guest-layout>
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
        <div class="col-ml-4">
            <div class="row justify-content-center align-items-center">

                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you?') }}
                <br>
                {{ __('If you didn\'t receive the email, we will gladly send you another.') }}


            @if (session('status') == 'verification-link-sent')
                <div>
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div>
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf

                    <div>
                        <x-button class="btn btn-primary btn-block">
                            {{ __('Resend Verification Email') }}
                        </x-button>
                    </div>
                </form>

            </div>
        </div>
        </div>
            </div>
        </div>
</x-guest-layout>
