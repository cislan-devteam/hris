<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <h2 class="my-6 text-4xl font-semibold text-gray-900 dark:text-gray-200">Profile</h2>

    <div class="relative flex flex-col flex-auto min-w-0 p-4 mx-3 overflow-hidden break-words
    bg-transparent border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
      <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-auto max-w-full px-3">
          <div class="relative inline-flex items-center justify-center text-white transition-all duration-200 ease-in-out text-base h-19 w-19 rounded-xl">
            <img src="../assets/img/iu.jpg" alt="profile_image" class="rounded-full h-20 w-20" />

            {{-- Button to change the image --}}
            <label class="mt-11 -ml-4 text-gray-800 dark:text-white dark:opacity-60 cursor-pointer" x-data="{ fileInput: null }">
              <input type="file" x-ref="fileInput" style="display: none;" accept="image/jpeg, image/png" @change="handleFileSelect">
            
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg>
            </label>
            
            <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.js"></script>
            <script>
              function handleFileSelect(event) {
                const files = event.target.files;
                // Do something with the selected files
                console.log(files);
              }
            
              window.Alpine = {
                ...window.Alpine,
                handleFileSelect,
              };
            </script>

          </div>
        </div>
        <div class="flex-none w-auto max-w-full px-0 my-auto">
          <div class="h-full">
            <h5 class="mb-1 -mt-3 text-gray-900 dark:text-white text-2xl">IU</h5>
            <p class="mb-0 font-semibold leading-normal text-gray-800 dark:text-white dark:opacity-60">Super Admin</p>
          </div>
        </div>
      </div>

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        <button type="submit" class="px-4 py-2 mb-2 ml-auto display: flex font-bold leading-normal text-center text-white align-middle
                transition-all ease-in bg-purple-600 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs
                hover:-translate-y-px active:opacity-85">Edit</button>

        <h4 class="mb-2 text-lg font-semibold text-gray-900 dark:text-gray-300 ">
            Personal Information
        </h4>
        @foreach ($infos as $info)
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

                    <!-- User Name -->
                    <div class="inline mt-4">
                        <div class="z-0 w-full group block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Full Name</span>
                            <p class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600
                            dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600
                            text-gray-900 dark:text-gray-300" placeholder="Full Name " id="userFName" name="employee_name" type="text"
                            :value="">{{ $info->employee_name }}
                            </p>
                        </div>
                    </div>
                    <!-- Email Address Mobile Number -->
                    <div class="grid md:grid-cols-2 gap-4 mt-4">
                        <!-- Email Address -->
                        <label class="inline text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Email Address</span>
                                <input class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                                focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input" placeholder="{{ $info->email_address }}"
                                name="email_address" type="email" :value="{{ $info->email_address }}" required/>
                        </label>
                        {{-- Mobile --}}
                        <div class="z-0 w-full group block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Mobile Number</span>
                            <div class="flex mt-1">
                                <span class="inline-flex items-center px-3 py-0 text-sm  text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600
                                dark:text-gray-400 dark:border-gray-600">+63</span>
                                <input onkeydown="return
                                        /[0-9-]/.test(event.key) || event.key ===
                                        'Backspace' || event.key === 'Delete'"
                                    oninput="formatPhoneNumber(this)"
                                    class="phone-input block w-full text-sm rounded-r border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                                    focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input
                                    [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                                    id="phoneNumber" placeholder="{{ $info->contact_number }}" maxlength="10" name="contact_number" type="number" :value="" required/>
                            </div>
                        </div>
                    </div>
                
                     <!-- Present Address -->
                    <label class="inline text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Present Address</span>
                        <p class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                            focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 text-gray-900 dark:text-gray-300"
                            placeholder="Present Address" id="addressPresent" name="address1" type="text" :value="">{{ $info->address2 . ' ' . $info->address1 }}
                        </p>
                    </label>
                
                    <!-- Birthday and Birth Place -->
                    <div class="grid md:grid-cols-2 gap-4 mt-4">
                        <div class="z-0 w-full group block text-sm text">
                            <span class="text-gray-700 dark:text-gray-400">Birth Date</span>
                                <div class=" w-full relative ">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        {{-- <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2
                                        2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd">
                                        </path></svg> --}}
                                    </div>
                                    <p text="yyyy-mm-dd" class="pl-9 p-2 w-full mt-1 text-sm rounded border text-gray-900 border-gray-300 dark:border-gray-600
                                    dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600
                                    dark:text-gray-300" placeholder="YYYY-MM-DD" name="birth_date" type="text" :value="">{{ $info->birth_date }}
                                    </p>
                            </div>
                        </div>
                    <!-- Birth Place -->
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Birth Place</span>
                            <p class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 
                            dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 
                            text-gray-900 dark:text-gray-300" name="birth_place" type="text" :value="">{{ $info->birth_place }}
                            </p>
                    </label>
            </div>

                <!-- Civil Status and Nationality -->
                <div class="grid md:grid-cols-2 gap-4 mt-4">
                    <div class="z-0 w-full group block text-sm">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">
                                Civil Status
                            </span>
                            <p name="civil_status" id="civil_status" type="text" :value=""
                               class="block w-full mt-1 text-sm rounded border border-gray-300 text-gray-900 dark:text-gray-300
                               dark:border-gray-600 bg-transparent dark:bg-gray-700 focus:border-purple-400
                               focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600">{{ $info->civil_status }}
                            </p>
                        </label>
                    </div>
                    <div class="z-0 w-full group block text-sm text">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Nationality</span>
                            <p  name="nationality" id="nationality" type="text" :value=""
                                class="block w-full mt-1 text-sm rounded border border-gray-300 text-gray-900 dark:text-gray-300
                                dark:border-gray-600 bg-transparent dark:bg-gray-700 focus:border-purple-400 focus:ring-1
                                focus:ring-purple-200 dark:focus:ring-purple-600">{{ $info->nationality }}
                            </p>
                        </label>
                    </div>
                </div>
            </div>

                <!-- User Government ID Numbers -->
                <h4 class="mb-2 text-lg font-semibold text-gray-600 dark:text-gray-300">
                    Government ID Numbers
                </h4>
                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                    <!-- TIN and SSS -->
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="z-0 w-full group block text-sm">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Tax Identification Number</span>
                                <p onkeydown="return /[0-9-]/.test(event.key) || event.key ===
                                'Backspace' || event.key === 'Delete'" oninput="formatTIN(this)"
                                    class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1
                                    focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300
                                    [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                                    id="tin" placeholder="000000000000" maxlength="12" name="tin" type="number" :value="">{{ $info->tin }}
                                </p>
                            </label>
                        </div>
                        <div class="z-0 w-full group block text-sm text">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">SSS Number</span>
                                <p onkeydown="return /[0-9-]/.test(event.key) || event.key === 'Backspace' || event.key === 'Delete'"
                                    oninput="formatSSS(this)" class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                                    focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input
                                    [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                                    id="sss" placeholder="0000000000" maxlength="10" name="sss_num" type="number" :value="">{{ $info->sss_num }}
                                </p>
                            </label>
                        </div>
                    </div>
                <!-- Pag-IBIG and PhilHealt -->
                <div class="grid md:grid-cols-2 gap-4 mt-4">
                    <div class="z-0 w-full group block text-sm">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Pag-IBIG Number</span>
                            <p onkeydown="return /[0-9-]/.test(event.key) || event.key ===
                            'Backspace' || event.key === 'Delete'" oninput="formatPagIbig(this)"
                                class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                                focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input
                                [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                                id="pagIbig" placeholder="000000000000"maxlength="12" name="pagibig_num" type="number" :value="">{{ $info->pagibig_num }}
                            </p>
                        </label>
                    </div>
                    <div class="z-0 w-full group block text-sm text">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">PhilHealth Number</span>
                            <p onkeydown="return /[0-9-]/.test(event.key) || event.key === 'Backspace' || event.key === 'Delete'"
                                oninput="formatPhilHealth(this)" class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input
                                [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                                id="philHealth" placeholder="000000000000" maxlength="12" name="philhealth_num" type="number" :value="('philhealth_num')">{{ $info->philhealth_num }}
                            </p>
                        </label>
                    </div>
                </div>
            </div>

            <!-- User Emergency Contact -->
            <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
                Emergency Contact
            </h4>
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <!-- Contact Name -->
                <div class="">
                    <div class="z-0 w-full group block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Full Name</span>
                        <input class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                        focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 text-gray-900 dark:text-gray-300 form-input"
                            placeholder="{{ $info->emergency_name }}" name="emergency_name" type="text" :value="">
                    </div>
                </div>

                 <!-- Mobile Number and Relationship -->
                 <div class="grid md:grid-cols-2 gap-4 mt-4">
                    <div class="z-0 w-full group block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Mobile Number</span>
                        <div class="flex mt-1">
                            <span class="inline-flex items-center px-3 py-0 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md
                            dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600"
                                >+63</span>
                            <input
                            onkeydown="return /[0-9-]/.test(event.key) || event.key ===
                                'Backspace' || event.key === 'Delete'" oninput="formatPhoneNumber(this)"
                                class="phone-input block w-full text-sm rounded-r border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                                focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 text-gray-900 dark:text-gray-300 form-input
                                [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                                id="phoneNumberContact" maxlength="10"
                                name="emergency_contactnum" placeholder="{{ $info->emergency_contactnum }}" type="number" :value=""/> 
                        </div>
                    </div>
                    <div class="z-0 w-full group block text-sm text">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Relationship</span>
                            <input class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                            focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 text-gray-900 dark:text-gray-300 form-input"
                            name="emergency_relationship" placeholder="{{ $info->emergency_relationship }}" type="text" :value=""/>
                        </label>
                    </div>
                </div>
            </div>
        @endforeach
    </form>

</x-app-layout>

    {{-- <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div> --}}
