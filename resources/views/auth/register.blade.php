<x-layouts.auth>
    <section class="signin-page account">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <a class="logo" href="index.html">
                            <img src="images/logo.png" alt="">
                        </a>
                        <h2 class="text-center">Create Your Account</h2>
                        <form class="text-left clearfix" action="{{route('register')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name"
                                       value="{{old('name')}}">
                                <x-shared.error field="name"/>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email"
                                       value="{{old('email')}}">
                                <x-shared.error field="email"/>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <x-shared.error field="password"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="password_confirmation"
                                       placeholder="Confirm password">
                            </div>
                            <div class="form-group">
                                <h4>Who are you?</h4>
                                <label class="radio-inline">
                                    <input type="radio" name="role" id="inlineRadio1" value="customer">
                                    <p>Customer</p>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="role" id="inlineRadio2" value="vendor">
                                    <p>Vendor</p>
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="role" id="inlineRadio3" value="partner">
                                    <p>Delivery Partner</p>
                                </label>
                                <div class="">
                                    <x-shared.error field="role"/>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-main text-center">Sign In</button>
                            </div>
                        </form>
                        <p class="mt-20">Already hava an account ?<a href="{{route('login')}}"> Login</a></p>
                        <p><a href="forget-password.html"> Forgot your password?</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.auth>
