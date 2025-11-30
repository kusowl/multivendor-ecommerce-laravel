<x-layouts.auth :title="$title">
    <section class="m-auto mb-10">
        <h2 class="text-center">Sign up for {{config('app.name')}}</h2>
        <form class="text-left clearfix" action="{{route('register')}}" method="post">
            @csrf
            <fieldset class="fieldset ui-card mt-8 w-lg px-6 py-4">
                <legend class="fieldset-legend">Register</legend>
                <div class="grid grid-cols-2 gap-x-4">
                    <div>
                        <label class="label">Name</label>
                        <input type="text" name="name" class="input bg-base-300/30" placeholder="Name"
                               value="{{old('name')}}"/>
                        <x-shared.error field="name"/>
                    </div>
                    <div>
                        <label class="label">Email</label>
                        <input type="email" name="email" class="input bg-base-300/30" placeholder="Email"
                               value="{{old('email')}}"/>
                        <x-shared.error field="email"/>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-x-4">
                    <div class="">
                        <label class="label">Password</label>
                        <input type="password" name="password" class="input bg-base-300/30" placeholder="Password"
                        />
                        <x-shared.error field="password"/>
                    </div>
                    <div>
                        <label class="label">Confirm password</label>
                        <input type="text" name="password_confirmation" class="input bg-base-300/30"
                               placeholder="Confirm Password"/>
                    </div>
                </div>
                <label class="label">Account type</label>
                <select name="role" class="select text-gray-500/80 bg-[#F6F8FB] w-full">
                    <option disabled {{old('role') == '' ? 'selected' : ''}}>Choose a type</option>
                    <option value="customer" {{old('role') === 'customer' ? 'selected' : ''}}>Customer</option>
                    <option value="vendor" {{old('role') === 'vendor' ? 'selected' : ''}}>Vendor</option>
                </select>
                <button class="btn btn-neutral btn-soft mt-4">Register</button>
                <p class="text-xs text-gray-500 mx-auto mt-2">
                    Already have an account ?
                    <a class="link link-primary ml-2" href="{{route('login')}}">
                        Login
                    </a>
                </p>
            </fieldset>
        </form>
    </section>
</x-layouts.auth>
