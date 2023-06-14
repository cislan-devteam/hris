<!-- Desktop sidebar -->
<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
  <div class="py-4 text-gray-500 dark:text-gray-400" x-data="{ currentRoute: '{{ Route::currentRouteName() }}' }">
    <a class="text-lg font-bold text-orange-500 dark:text-orange-900"
      href="/dashboard">
      <img class="ml-4" src="https://www.devteam.com/wp-content/uploads/2018/06/devteam-logo.svg">
    </a>
    <ul class="mt-6 sidenav">
      <li class="relative px-6 py-3">
        <span class="hidden absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" x-bind:class="{ 'active': currentRoute === 'dashboard' }"></span>
        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150
          hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
          href="{{ route('dashboard') }}" x-on:click.prevent="loadPage('{{ route('dashboard') }}')" x-bind:class="{ 'dark:text-gray-100 text-gray-700': currentRoute === 'dashboard' }">
          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            viewBox="0 0 24 24" stroke="currentColor">
            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
          </svg>
          <span class="ml-4">
            {{ __('Dashboard') }}
          </span>
        </a>
      </li>
      <li class="relative px-6 py-3" >
        <span class="hidden absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" x-bind:class="{ 'active': currentRoute === 'tasks' }"></span>
        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors durtion-150 hover:text-gray-800 dark:hover:text-gray-200"
          href="{{ route('tasks') }}" x-on:click.prevent="loadPage('{{ route('tasks') }}')" x-bind:class="{ 'dark:text-gray-100 text-gray-700': currentRoute === 'tasks' }">
          <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
            <path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2
              0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
          </svg>
          <span class="ml-4">
            {{ __('Role Assignment') }}
          </span>
        </a>
      </li>
      <li class="relative px-6 py-3">
        <span
          class="hidden absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" x-bind:class="{ 'active': currentRoute === 'timeoff' }"></span>
        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
          href="{{ route('timeoff') }}" x-on:click.prevent="loadPage('{{ route('timeoff') }}')" x-bind:class="{ 'dark:text-gray-100 text-gray-700': currentRoute === 'timeoff' }">
        <svg  class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75"></path>
        </svg>
          <span class="ml-4">
            {{ __('Time Off') }}
          </span>
        </a>
      </li>
      <li class="relative px-6 py-3">
        <span class="hidden absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" x-bind:class="{ 'active': currentRoute === 'clockit.index' }"></span>
        <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
          href="{{ route('clockit.index') }}" x-on:click.prevent="loadPage('{{ route('clockit.index') }}')" x-bind:class="{ 'dark:text-gray-100 text-gray-700': currentRoute === 'clockit.index' }">
        <svg  class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
          <span class="ml-4">
            {{ __('ClockIt') }}
          </span>
        </a>
      </li>
      {{-- <li class="relative px-6 py-3">
        <span
          class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"

        ></span>

        <a
          class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
          href="{{ route('manage.users.index') }}"
        >
        <svg  class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"></path>
        </svg>
          <span class="ml-4">
            {{ __('Add User') }}
          </span>
        </a>
      </li> --}}
      <li class="relative px-6 py-3">
          <span class="hidden absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" x-bind:class="{ 'active': currentRoute === 'manage.users.index' }"></span>
          <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
            href=" {{ route('manage.users.index') }}" x-on:click.prevent="loadPage('{{ route('manage.users.index') }}')" x-bind:class="{ 'dark:text-gray-100 text-gray-700': currentRoute === 'manage.users.index' }">
          <svg  class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0
              00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062
              6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0
              00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25
              0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
            </svg>
            <span class="ml-4">
              Employee Information
            </span>
          </a>
        </li>
    </ul>
  </div>
</aside>

