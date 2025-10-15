<x-layouts.auth>
    <section class="signin-page account">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <h2 class="text-center">Welcome Back</h2>
                        <form class="text-left clearfix" action="{{route('login')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
                                <x-error field="email" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <x-error field="password" />
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-main text-center" >Login</button>
                            </div>
                        </form>
                        <p class="mt-20">New in this site ?<a href="{{route('register')}}"> Create New Account</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.auth>
