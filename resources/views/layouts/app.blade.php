<!DOCTYPE html>
<html  :class="{ 'theme-dark': dark }" x-data="{
    dark: (() => {
      function getThemeFromLocalStorage() {
        if (window.localStorage.getItem('dark')) {
          return JSON.parse(window.localStorage.getItem('dark'));
        }
        return (
          !!window.matchMedia &&
          window.matchMedia('(prefers-color-scheme: dark)').matches
        );
      }

      function setThemeToLocalStorage(value) {
        window.localStorage.setItem('dark', value);
      }

      return getThemeFromLocalStorage();
    })(),
    toggleTheme() {
      this.dark = !this.dark;
      window.localStorage.setItem('dark', JSON.stringify(this.dark));
    },
    isSideMenuOpen: false,
    toggleSideMenu() {
      this.isSideMenuOpen = !this.isSideMenuOpen;
    },
    closeSideMenu() {
      this.isSideMenuOpen = false;
    },
    isNotificationsMenuOpen: false,
    toggleNotificationsMenu() {
      this.isNotificationsMenuOpen = !this.isNotificationsMenuOpen;
    },
    closeNotificationsMenu() {
      this.isNotificationsMenuOpen = false;
    },
    isProfileMenuOpen: false,
    toggleProfileMenu() {
      this.isProfileMenuOpen = !this.isProfileMenuOpen;
    },
    closeProfileMenu() {
      this.isProfileMenuOpen = false;
    },
    isPagesMenuOpen: false,
    togglePagesMenu() {
      this.isPagesMenuOpen = !this.isPagesMenuOpen;
    },
    isModalOpen: false,
    trapCleanup: null,
    openModal() {
      this.isModalOpen = true;
      this.trapCleanup = focusTrap(document.querySelector('#modal'));
    },
    closeModal() {
      this.isModalOpen = false;
      this.trapCleanup();
    }
  }" lang="en" :class="dark ? 'dark:bg-gray-800' : 'bg-white'">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Links --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        
    @vite(['resources/css/app.css'])
    <link rel="preload" href="{{ asset('assets/css/tailwind.output.css') }}" as="style">
    <link rel="stylesheet" href="{{ asset('assets/css/tailwind.output.css') }}">

    {{-- Scripts --}}
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
</head>

<body  id="app" style="display: none;">

    <div class="flex w-full bg-gray-50 dark:bg-gray-900"
        {{-- :class="{ 'overflow-hidden': isSideMenuOpen }" --}}
        >

        {{-- Side Navigation --}}
        @include('layouts.master-components.master-sidenav')

        <!-- Page Content -->
        <div class="flex flex-col flex-1 w-full h-screen">
            <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">

              {{-- Header --}}
                @include('layouts.master-components.master-header-file')
            </header>
            
            {{-- Main Content --}}
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    <script>
      window.addEventListener('DOMContentLoaded', (event) => {
          document.getElementById('app').style.display = 'block';
      });
    </script>


</body>

</html>
