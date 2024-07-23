<x-guest-layout>
<head>
        <link rel="stylesheet" type="text/css" href="login.css"> 
</head> 


    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
         
        <body>
    <div class="container">
        <span style="--clr:#FDDA0D;"></span>
        <span style="--clr: #FFFFFF;"></span>
        <span style="--clr:#cc0000;"></span>
        <div class="form-container">
                
                <h2>Login form</h2>
                <div class="input-container">
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="enter your email" />                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password"  />
                        <div class="input-container">

                        <x-text-input id="password"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" placeholder="enter your password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

               

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
     <!-- Remember Me -->
<div>
     <div class="block mt-4">

<label for="remember_me" class="inline-flex items-center text-white">

    <input id="remember_me" type="checkbox"  name="remember">

    <div style="color: white;">{{ __('Remember me') }}
</div>
</label>
</div>
</div>

                        <div class="input-container">
                            <input type="submit" value="Sign in">
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-guest-layout>



    