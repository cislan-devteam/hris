<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Employee Information
  </h2>
  {{-- Success message --}}
  @if(Session::has('success'))
  <div class="submission-success-message items-center flex justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-green-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-green">
      <div class="flex items-center">
          <i class="fa-sharp fa-solid fa-circle-check fa-lg mr-2" style="color: #ffffff;"></i>
      {{ session('success') }}
      </div>
      <i class="fa-solid fa-circle-xmark fa-lg px-1" style="color: #ffffff;"  onclick="this.parentElement.style.display = 'none';"></i>
  </div>
  @endif
<a href="/template/add-user" class="mb-6">
    <button class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg
    active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Add Employee
    </button>
</a>
