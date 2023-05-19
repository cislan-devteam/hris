<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
    @include('layouts.master-components.assets.master-head-assets')
    <body>


    <div
      class="flex w-full bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }">
      <!-- Desktop sidebar -->
      @include('layouts.master-components.master-sidenav')

      <!-- Mobile sidebar -->
      <!-- Backdrop -->

      <div class="flex flex-col flex-1 w-full">
        <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
            @include()
        </header>
        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
            Users
            </h2>

            <!-- Users Table -->
            @include('components.template.table-action')

          </div>
        </main>
      </div>
    </div>
  </body>
</html>
