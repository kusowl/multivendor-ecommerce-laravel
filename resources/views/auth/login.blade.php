<x-layouts.auth :title="$title">
    <section class="m-auto text-xl">
        @if(session('message'))
            <div role="alert" class="flex justify-center alert alert-success">
                <span>
                   {{session('message')}}
                </span>
            </div>
        @else
            <h2 class="text-center">Welcome Back</h2>

        @endif
        <form class="text-left clearfix" action="{{route('login')}}" method="post">
            @csrf
            <fieldset class="fieldset ui-card mt-8 w-xs py-4 px-6">
                <legend class="fieldset-legend">Login</legend>

                <label class="label">Email</label>
                <input type="email" name="email" class="input bg-base-300/30" placeholder="Email"
                       value="{{old('email')}}"/>
                <x-shared.error field="email"/>

                <label class="label">Password</label>
                <input type="password" name="password" class="input bg-base-300/30" placeholder="Password"/>
                <x-shared.error field="password"/>

                <button class="btn btn-neutral btn-soft mt-4 btn-md">Login</button>
                <p class="text-xs text-gray-500 mx-auto mt-2">
                    New to {{config('app.name')}} ?
                    <a class="link link-primary ml-2" href="{{route('register')}}">
                        Create an account
                    </a>
                </p>
            </fieldset>
        </form>
    </section>
</x-layouts.auth>
