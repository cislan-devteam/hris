<x-app-layout>

    {{-- Landing Page to check for connection with Xero --}}

        @if($error)
            <h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Your connection to Xero failed
            </h1>
            
            <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">{{ $error }}</p>
            
            <form action="{{ route('xero.auth.authorize') }}">
                @csrf
                <button type="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 
                    bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Reconnect to Xero
                </button>
            </form>
        
        @elseif($connected)
            <h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                You are connected to Xero
            </h1>
            
            <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                {{ $organisationName }} via {{ $username }}
            </p>

            {{-- Redirect to List of Employees --}}
            <form action="{{ route('xero.employees') }}" class="mb-4">
                @csrf
                <button type="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 
                    bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Xero Employees
                </button>
            </form>

            {{-- Redirect to List of Invoices --}}
            <form action="{{ route('xero.invoices') }}">
                @csrf
                <button type="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 
                    bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Xero Invoices
                </button>
            </form>
        
        @else
            <h1 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                You are not connected to Xero
            </h1>
            
            <form action="{{ route('xero.auth.authorize') }}">
                @csrf
                <button type="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 
                    bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Connect to Xero
                </button>
            </form>
        @endif

</x-app-layout>