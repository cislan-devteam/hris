<x-guest-layout>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link
          href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
          rel="stylesheet"
        />
        <link rel="stylesheet" href="/resources/css/app.css" />
        <script
          src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
          defer
        ></script>
        <script src="../assets/js/init-alpine.js"></script>
      </head>
      <body>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-100">
            <div
                class="flex-1 h-full max-w-4xl md:container md:mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-100"
            >
                <div class="flex flex-col overflow-y-auto md:flex-row">
                {{-- <div class="h-32 md:h-auto md:w-1/2">
                    <img
                    aria-hidden="true"
                    class="object-cover w-full h-full dark:hidden"
                    src="../assets/img/create-account-office.jpeg"
                    alt="Office"
                    />
                    <img
                    aria-hidden="true"
                    class="hidden object-cover w-full h-full dark:block"
                    src="../assets/img/create-account-office-dark.jpeg"
                    alt="Office"
                    />
                </div> --}}
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                    <h1
                        class="mb-4 text-xl font-semibold text-gray-900 "
                    >
                        Login
                    </h1>
                    <label class="block mt-4 text-sm" value="{{ __('Email') }}">
                        <span class="text-gray-900 ">Email</span>
                        <input id="email"
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-100 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-900 dark:focus:shadow-outline-gray form-input"
                        placeholder="Email" type="email" name="email"
                        :value="old('email')"required
                        />
                    <label class="block mt-4 text-sm" value="{{ __('Password') }}" >
                        <span class="text-gray-900 ">Password</span>
                        <input id="password"
                        class="block w-full mt-1 text-sm rounded-lg dark:border-gray-600 dark:bg-gray-100 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-900 dark:focus:shadow-outline-gray form-input"
                        placeholder="Enter Password" name="password" type="password" required
                        />
                    </label>

                    <!-- You should use a button here, as the anchor is only used for the example  -->
                    <button type="submit"
                    class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center  text-black transition-colors duration-150 border border-gray-800 rounded-lg bg-orange-500 hover:bg-orange-500 focus:outline-none ">
                    {{ __('Log in') }}
                    </button>

                    <hr class="my-10 mt-5" />
                    <p class="mt-4">
                        @if (Route::has('password.request'))
                        <a class="text-sm font-medium text-purple-600 hover:underline"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password') }}
                     </a>
                     @endif
                    </p>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </form>
    </body>
</x-guest-layout>
