<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot password </title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="../assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer>
    </script>
    <script src="../assets/js/init-alpine.js"></script>
    @vite('resources/css/app.css')
    </head>
      <body>
        <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
            <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
              <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img
                    aria-hidden="true"
                    class="object-cover w-full h-full dark:hidden"
                    src="https://images.unsplash.com/photo-1533090161767-e6ffed986c88?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8"
                    alt="Office"/>
                    <img
                    aria-hidden="true"
                    class="hidden object-cover w-full h-full dark:block"
                    src="https://images.unsplash.com/photo-1541746972996-4e0b0f43e02a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&"
                    alt="Office"/>
                </div>

                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <x-validation-errors class="mb-4" />
                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                        <form method="POST" action="{{ route('password.update') }}"> @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Reset password
                            </h1>
                            <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Email</span>
                            <input id="email"
                                class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Email" type="email" name="email":value="old('email')"required/>
                            </label>
                            <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Password</span>
                            <input id = "password"
                                class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Enter Password" name="password" type="password" required
                            />
                            </label>
                            <label class="block mt-2 text-sm" value="{{ __('Confirm Password') }}">
                                <span class="text-gray-700 dark:text-gray-400">
                                Confirm password
                                </span>
                                <input
                                class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                placeholder="Confirm password" name="password_confirmation" type="password" required/>
                            </label>

                            <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            >{{ __('Reset Password') }}
                            </button>
                        </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
</html>

