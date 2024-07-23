<x-guest-layout>
    <head>
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <body>
            <div class="container">
                <span style="--clr:#FDDA0D;"></span>
                <span style="--clr: #FFFFFF;"></span>
                <span style="--clr:#cc0000;"></span>
                <div class="form-container">
                    <h2>Registration Form</h2>
                    
                    <!-- Name -->
                    <div class="input-container">
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Enter your name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    
                    <!-- Email Address -->
                    <div class="input-container">
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Enter your email" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="input-container">
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Enter your password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="input-container">
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
   <!-- Gender -->
   <div class="input-container">
    <div class="label-options">
                        <x-input-label for="gender"  />
                        <select name="gender" id="gender"  aria-label="Default">
                            <option value=" ">Select gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
</div>
                        <x-input-error :messages="$errors->get('gender')" class="mt-2" />
                    </div>
                    
                    <!-- Position -->
                    <div class="label-options">
                    <div class="input-container">
                        <x-input-label for="position" />
                        <select id="position" name="position" class="block mt-1 w-full" required>
                            <option value="">Select position</option>
                            <option value="student">Student</option>
                            <option value="employee">Employee</option>
                            <option value="other">Other</option>
                        </select>
                        </div>              
                    <x-input-error :messages="$errors->get('position')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <div class="input-container">
                            <input type="submit" value="Register">
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </form>
</x-guest-layout>
