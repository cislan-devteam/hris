  {{-- Success message --}}
  @if(Session::has('success'))
  <div class="hide-message submission-success-message items-center flex justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-green-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-green">
      <div class="flex items-center">
          <i class="fa-sharp fa-solid fa-circle-check fa-lg mr-2" style="color: #ffffff;"></i>
      {{ session('success') }}
      </div>
      <i class="fa-solid fa-circle-xmark fa-lg px-1" style="color: #ffffff;"  onclick="this.parentElement.style.display = 'none';"></i>
  </div>
  @endif
