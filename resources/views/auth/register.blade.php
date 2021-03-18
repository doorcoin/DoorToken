<x-guest-layout>
<div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="container auth-form">
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                        <div class="row form-group">
                                        <div class="col">
                                            <label class="mb-1"><strong>First name</strong></label>
                                            <input id="fname"  name="fname" type="text" class="form-control" placeholder="first name">
                                        </div>
                                        <div class="col">
                                            <label class="mb-1"><strong>Last name</strong></label>
                                            <input id="lname"  name="lname" type="text" class="form-control" placeholder="last name">
                                        </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input id="email" name="email" type="email" class="form-control" placeholder="hello@example.com">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input id="password" name="password" type="password" class="form-control" value="">
                                            </div>
                                            <div class="col">
                                            <label class="mb-1"><strong>Password Confirmation</strong></label>
                                            <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" value="">
                                            </div>
                                        </div>
                                        <div> <label class="mb-1"><strong>User Role</strong></label></div>
                                        <div class="form-group row">
                                            <div class="col">
                                                <select class="mr-sm-2" name="user_role" id="user_role">
                                                    <option selected>Choose...</option>
                                                    <option value="2">Owner</option>
                                                    <option value="3">User</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Already have an account? <a class="text-primary" href="{{ route('login') }}">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-guest-layout>
