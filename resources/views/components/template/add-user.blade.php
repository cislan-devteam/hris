<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Add Employee Information
</h2>

<!-- Success Validation -->
{{-- <div class="submission-success-message items-center flex justify-between p-4 mb-8 text-sm font-semibold text-purple-100
    bg-green-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-green">
    <div class="flex items-center">
        <i class="fa-sharp fa-solid fa-circle-check fa-lg mr-2" style="color: #ffffff;"></i>
    <span>User Added Successfully</span>
    </div>
    <i class="fa-solid fa-circle-xmark fa-lg px-1" style="color: #ffffff;"  onclick="this.parentElement.style.display = 'none';"></i>
</div>

<div class="submission-fail-message items-center flex justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-red-600
    rounded-lg shadow-md focus:outline-none focus:shadow-outline-red">
    <div class="flex items-center">
        <i class="fa-sharp fa-solid fa-circle-exclamation fa-lg mr-2" style="color: #ffffff;"></i>
        <span>One or more fields have an error. Please check and try again. </span>
    </div>
    <i class="fa-solid fa-circle-xmark fa-lg px-1" style="color: #ffffff;"  onclick="this.parentElement.style.display = 'none';"></i>
</div> --}}

{{-- Error Message --}}
@if ($errors->any())
<div class="submission-fail-message items-center flex justify-between p-4 mb-8 text-sm font-semibold
            text-purple-100 bg-red-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-red">
    <div>
        <i class="fa-sharp fa-solid fa-circle-exclamation fa-lg mr-2" style="color: #ffffff;"></i>
            <span>Something went wrong. Please check and try again. </span>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="p-1 text-sm font-semibold text-purple-100
                bg-red-600 rounded-lg  focus:outline-none focus:shadow-outline-red list-none"
                onclick="this.parentElement.style.display = 'none'";>
                {{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif

<form method="POST" action={{ url('/template/add-user') }} class="mb-8" id="add-user-form" enctype="multipart/form-data">
    @csrf
        <!-- User Information -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300 ">
        Personal Information
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

        {{-- Profile Picture Upload --}}
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Upload Profile Picture</span>
            <input
                class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                id="pfp-file-upload" accept="image/png, image/jpg, image/jpeg" name="profile_picture" type="file" :value="('profile_picture')"
                />
            <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                Please select a file.
            </span>
        </label>

        <!-- User Name -->
        <div class="block mt-4">
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Full Name</span>
                <input class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600
                dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600
                dark:text-gray-300 form-input" placeholder="Full name " id="userFName" name="employee_name" type="text"
                :value="('employee_name')" required/>
            </div>
        </div>
        <!-- Email Address Mobile Number -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <!-- Email Address -->
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Email Address</span>
                    <input class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                    focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input" placeholder="Email Address"
                    name="email_address" type="text" :value="('email_address')" required/>
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
                    id="phoneNumber" placeholder="0000000000" maxlength="10" name="contact_number" type="number" :value="('contact_number')" required/>
                </div>
                <span id="pfp-error-message" class="hidden text-xs text-red-600 dark:text-red-400">
                    Phone number is invalid.
                </span>
            </div>
        </div>

        <!-- Present Address -->
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Present Address</span>
            <input class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                placeholder="Present Address" id="addressPresent" name="address1" type="text" :value="('address1')" required/>
        </label>

        <!-- Permanent Address -->
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Permanent Address</span>

            <input class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                placeholder="Permanent Address" id="addressPermanent" name="address2" type="text" :value="('address2')" required/>
        </label>

        {{-- <label class="flex items-center dark:text-gray-400 text-sm mt-4">
            <input class="text-purple-600 form-checkbox focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600"
                id="addressCheck"name="" type="checkbox" value="address1"/>
            <span class="ml-2"> Same as Present Address
            </span>
        </label> --}}

        <!-- Birthday and Birth Place -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm text">
                <span class="text-gray-700 dark:text-gray-400">Birth Date</span>
                    <div class=" w-full relative ">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2
                            2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd">
                            </path></svg>
                        </div>
                        <input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd"
                        class="pl-9 p-2 w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600
                        dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600
                        dark:text-gray-300 form-input"
                        placeholder="Select birth date" name="birth_date" type="text" :value="('birth_date')" required>
                    </div>
            </div>
            <!-- Birth Place -->
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Birth Place</span>
                    <input class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                    focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input" placeholder="Birth Place"
                    name="birth_place" type="text" :value="('birth_place')" required/>
            </label>
        </div>
        <!-- Civil Status and Nationality -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Civil Status
                    </span>
                    <select name="civil_status" id="civil_status" type="text" :value="('civil_status')"
                        class="block w-full mt-1 text-sm rounded border border-gray-300 dark:text-gray-300 dark:border-gray-600 bg-transparent dark:bg-gray-700
                        form-select focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600">
                        <option></option>
                        <option>Single</option>
                        <option>Married</option>
                        <option>Divorced</option>
                        <option>Separated</option>
                        <option>Widower/Widow</option>
                        <option>Annulled</option>
                    </select>
                </label>
            </div>
            <div class="z-0 w-full group block text-sm text">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Nationality</span>
                    <select name="nationality" id="nationality" type="text" :value="('nationality')"
                        class="block w-full mt-1 text-sm rounded border border-gray-300 dark:text-gray-300 dark:border-gray-600 bg-transparent dark:bg-gray-700
                        form-select focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600">
                        <option>
                        </option>
                        <option>Afghan</option>
                        <option>Albanian</option>
                        <option>Algerian</option>
                        <option>American</option>
                        <option>Andorran</option>
                        <option>Angolan</option>
                        <option>Antiguans</option>
                        <option>Argentinean</option>
                        <option>Armenian</option>
                        <option>Australian</option>
                        <option>Austrian</option>
                        <option>Azerbaijani</option>
                        <option>Bahamian</option>
                        <option>Bahraini</option>
                        <option>Bangladeshi</option>
                        <option>Barbadian</option>
                        <option>Barbudans</option>
                        <option>Batswana</option>
                        <option>Belarusian</option>
                        <option>Belgian</option>
                        <option>Belizean</option>
                        <option>Beninese</option>
                        <option>Bhutanese</option>
                        <option>Bolivian</option>
                        <option>Bosnian</option>
                        <option>Brazilian</option>
                        <option>British</option>
                        <option>Bruneian</option>
                        <option>Bulgarian</option>
                        <option>Burkinabe</option>
                        <option>Burmese</option>
                        <option>Burundian</option>
                        <option>Cambodian</option>
                        <option>Cameroonian</option>
                        <option>Canadian</option>
                        <option>Cape Verdean</option>
                        <option>Central African</option>
                        <option>Chadian</option>
                        <option>Chilean</option>
                        <option>Chinese</option>
                        <option>Colombian</option>
                        <option>Comoran</option>
                        <option>Congolese</option>
                        <option>Costa Rican</option>
                        <option>Croatian</option>
                        <option>Cuban</option>
                        <option>Cypriot</option>
                        <option>Czech</option>
                        <option>Danish</option>
                        <option>Djibouti</option>
                        <option>Dominican</option>
                        <option>Dutch</option>
                        <option>East Timorese</option>
                        <option>Ecuadorean</option>
                        <option>Egyptian</option>
                        <option>Emirian</option>
                        <option>Equatorial Guinean</option>
                        <option>Eritrean</option>
                        <option>Estonian</option>
                        <option>Ethiopian</option>
                        <option>Fijian</option>
                        <option>Filipino</option>
                        <option>Finnish</option>
                        <option>French</option>
                        <option>Gabonese</option>
                        <option>Gambian</option>
                        <option>Georgian</option>
                        <option>German</option>
                        <option>Ghanaian</option>
                        <option>Greek</option>
                        <option>Grenadian</option>
                        <option>Guatemalan</option>
                        <option>Guinea-Bissauan</option>
                        <option>Guinean</option>
                        <option>Guyanese</option>
                        <option>Haitian</option>
                        <option>Herzegovinian</option>
                        <option>Honduran</option>
                        <option>Hungarian</option>
                        <option>Icelander</option>
                        <option>Indian</option>
                        <option>Indonesian</option>
                        <option>Iranian</option>
                        <option>Iraqi</option>
                        <option>Irish</option>
                        <option>Israeli</option>
                        <option>Italian</option>
                        <option>Ivorian</option>
                        <option>Jamaican</option>
                        <option>Japanese</option>
                        <option>Jordanian</option>
                        <option>Kazakhstani</option>
                        <option>Kenyan</option>
                        <option>Kittian and Nevisian</option>
                        <option>Kuwaiti</option>
                        <option>Kyrgyz</option>
                        <option>Laotian</option>
                        <option>Latvian</option>
                        <option>Lebanese</option>
                        <option>Liberian</option>
                        <option>Libyan</option>
                        <option>Liechtensteiner</option>
                        <option>Lithuanian</option>
                        <option>Luxembourger</option>
                        <option>Macedonian</option>
                        <option>Malagasy</option>
                        <option>Malawian</option>
                        <option>Malaysian</option>
                        <option>Maldivan</option>
                        <option>Malian</option>
                        <option>Maltese</option>
                        <option>Marshallese</option>
                        <option>Mauritanian</option>
                        <option>Mauritian</option>
                        <option>Mexican</option>
                        <option>Micronesian</option>
                        <option>Moldovan</option>
                        <option>Monacan</option>
                        <option>Mongolian</option>
                        <option>Moroccan</option>
                        <option>Mosotho</option>
                        <option>Motswana</option>
                        <option>Mozambican</option>
                        <option>Namibian</option>
                        <option>Nauruan</option>
                        <option>Nepalese</option>
                        <option>New Zealander</option>
                        <option>Ni-Vanuatu</option>
                        <option>Nicaraguan</option>
                        <option>Nigerien</option>
                        <option>North Korean</option>
                        <option>Northern Irish</option>
                        <option>Norwegian</option>
                        <option>Omani</option>
                        <option>Pakistani</option>
                        <option>Palauan</option>
                        <option>Panamanian</option>
                        <option>Papua New Guinean</option>
                        <option>Paraguayan</option>
                        <option>Peruvian</option>
                        <option>Polish</option>
                        <option>Portuguese</option>
                        <option>Qatari</option>
                        <option>Romanian</option>
                        <option>Russian</option>
                        <option>Rwandan</option>
                        <option>Saint Lucian</option>
                        <option>Salvadoran</option>
                        <option>Samoan</option>
                        <option>San Marinese</option>
                        <option>Sao Tomean</option>
                        <option>Saudi</option>
                        <option>Scottish</option>
                        <option>Senegalese</option>
                        <option>Serbian</option>
                        <option>Seychellois</option>
                        <option>Sierra Leonean</option>
                        <option>Singaporean</option>
                        <option>Slovakian</option>
                        <option>Slovenian</option>
                        <option>Solomon Islander</option>
                        <option>Somali</option>
                        <option>South African</option>
                        <option>South Korean</option>
                        <option>Spanish</option>
                        <option>Sri Lankan</option>
                        <option>Sudanese</option>
                        <option>Surinamer</option>
                        <option>Swazi</option>
                        <option>Swedish</option>
                        <option>Swiss</option>
                        <option>Syrian</option>
                        <option>Taiwanese</option>
                        <option>Tanzanian</option>
                        <option>Thai</option>
                        <option>Togolese</option>
                        <option>Tongan</option>
                        <option>Trinidadian or Tobagonian</option>
                        <option>Tunisian</option>
                        <option>Turkish</option>
                        <option>Tuvaluan</option>
                        <option>Ugandan</option>
                        <option>Ukrainian</option>
                        <option>Uruguayan</option>
                        <option>Uzbekistani</option>
                        <option>Venezuelan</option>
                        <option>Vietnamese</option>
                        <option>Welsh</option>
                        <option>Yemenite</option>
                        <option>Zambian</option>
                        <option>Zimbabwean</option>
                    </select>
                </label>
            </div>
        </div>
        <!-- Position -->
        <label class="block mt-3 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Position</span>
            <input class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
            focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
            placeholder="Position" name="position" id="position" type="text" :value="('position')"/>
        </label>
    </div>

    <!-- User Government ID Numbers -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Government ID Numbers
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <!-- TIN and SSS -->
        <div class="grid md:grid-cols-2 gap-4">
            <div class="z-0 w-full group block text-sm">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Tax Identification Number</span>
                    <input onkeydown="return /[0-9-]/.test(event.key) || event.key ===
                    'Backspace' || event.key === 'Delete'" oninput="formatTIN(this)"
                        class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1
                        focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input
                        [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        id="tin" placeholder="000000000000" maxlength="12" name="tin" type="number" :value="('tin')"/>
                </label>
            </div>
            <div class="z-0 w-full group block text-sm text">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">SSS Number</span>
                    <input onkeydown="return /[0-9-]/.test(event.key) || event.key === 'Backspace' || event.key === 'Delete'"
                        oninput="formatSSS(this)" class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                        focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input
                        [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        id="sss" placeholder="0000000000" maxlength="10" name="sss_num" type="number" :value="('sss_num')"/>
                </label>
            </div>
        </div>

        <!-- Pag-IBIG and PhilHealt -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Pag-IBIG Number</span>
                    <input onkeydown="return /[0-9-]/.test(event.key) || event.key ===
                    'Backspace' || event.key === 'Delete'" oninput="formatPagIbig(this)"
                        class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                        focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input
                        [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        id="pagIbig" placeholder="000000000000"maxlength="12" name="pagibig_num" type="number" :value="('pagibig_num')"/>
                </label>
            </div>
            <div class="z-0 w-full group block text-sm text">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">PhilHealth Number</span>
                    <input onkeydown="return /[0-9-]/.test(event.key) || event.key === 'Backspace' || event.key === 'Delete'"
                        oninput="formatPhilHealth(this)" class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                        focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input
                        [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        id="philHealth" placeholder="000000000000" maxlength="12" name="philhealth_num" type="number" :value="('philhealth_num')"/>
                </label>
            </div>
        </div>
    </div>
    <!-- User Required File Uploads -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Government Documents
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <p class="mt-2 pb-2 text-sm text-gray-700 dark:text-gray-400">Add two government ID</p>
        <!-- Valid IDs -->
        <div class="mt-2 grid md:grid-cols-2 gap-4">
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Government ID 1</span>
                <input class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                accept="image/png, image/jpg, image/jpeg" id="id1-file-upload" name="gov_id1" type="file" :value="('gov_id1')" required/>
                <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                    Please select a file.
                </span>
            </div>
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Government ID 2</span>
                <input class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                accept="image/png, image/jpg, image/jpeg" id="id2-file-upload" name="gov_id2" type="file" :value="('gov_id2')" required/>
                <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                    Please select a file.
                </span>
            </div>
        </div>
        <!-- NBI/Barangay Clearance and Certificate of Clearance from Previous Employer -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">NBI/Barangay Clearance</span>
                <input class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                accept="image/png, image/jpg, image/jpeg , application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"
                id="certNB-file-upload" name="nbi_clearance" type="file" :value="('nbi_clearance')" required/>
                <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                    Please select a file.
                </span>
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
                focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    placeholder="Full Name" name="emergency_name" type="text" :value="('emergency_name')"/>
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
                        focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input
                        [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                        id="phoneNumberContact" placeholder="0000000000" maxlength="10"
                        name="emergency_contactnum" type="number" :value="('emergency_contactnum')" required/>
                </div>
                <span id="pfp-error-message" class="hidden text-xs text-red-600 dark:text-red-400">
                    Phone number is invalid.
                </span>
            </div>
            <div class="z-0 w-full group block text-sm text">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Relationship</span>
                    <input class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                    focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                        placeholder="Relationship" name="emergency_relationship" type="text" :value="('emergency_relationship')"/>
                </label>
            </div>
        </div>
    </div>

    <!-- User File Uploads -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Company Documents
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <!-- CV and TOR/Diploma -->
        <div class="grid md:grid-cols-2 gap-4">
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Upload Curriculum vitae</span>
                <input class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300  dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300  form-input"
                accept="image/png, image/jpg, image/jpeg , application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"
                id="cv-file-upload" name="file_cv" type="file" :value="('file_cv')" required/>
                <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                    Please select a file.</span>
            </div>
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Upload Transcript of Record/Diploma</span>
                <input  class="block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                accept="image/png, image/jpg, image/jpeg , application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"
                id="tor-file-upload" name="file_tor" type="file" :value="('file_tor')"/>
            </div>
        </div>
        <!-- Contract and Pledge -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Contract</span>
                <input class="block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                accept="application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"
                id="memo-file-upload" name="file_contract" type="file" :value="('file_contract')"/>
            </div>
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Pledge</span>
                <input class="block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                accept="application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"
                id="pfpFileUploadne-file-upload" name="file_pledge" type="file" :value="('file_pledge')" required/>
            </div>
        </div>

        <!-- Sketch of Residence and Certificate of Clearance from Previous Employer -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Certificate of Clearance from Previous Employer</span>
                <input class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                accept="image/png, image/jpg, image/jpeg , application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"
                id="p-file-upload" name="file_certificate_of_former_employer" type="file" :value="('file_certificate_of_former_employer')" required/>
                <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                    Please select a file.
                </span>
            </div>
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Sketch of Residence</span>

                <input class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                accept="image/png, image/jpg, image/jpeg" id="contract-file-upload" name="img_sketch_of_residence"
                type="file" :value="('img_sketch_of_residence')" required/>
                <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                    Please select a file.
                </span>
            </div>
        </div>
        <!-- Laptop Agreement, Memo and Notice to Explain  -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Laptop Agreement</span>
                <input class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                accept="application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"
                id="sketch-file-upload" name="file_laptop_agreement" type="file" :value="('file_laptop_agreement')" required/>
                <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                    Please select a file.
                </span>
            </div>
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Memo</span>
                <input class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                accept="application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword" id="certE-file-upload"
                name="file_memo" type="file" :value="('file_memo')" required/>
                <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                    Please select a file.
                </span>
            </div>
        </div>
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">

                <span class="text-gray-700 dark:text-gray-400">Notice to Explain</span>
                <input class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                accept="application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"
                id="sketch-file-upload" name="notice_to_explain" type="file" :value="('notice_to_explain')" required/>
                <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                    Please select a file.
                </span>
            </div>
        </div>
    </div>

    <!-- Save and Cancel Buttons -->
    <div class="container px-5 mx-auto flex justify-end gap-4">
        <button id="submit-button" type="submit" class="px-6 py-2 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600
        rounded-md focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 hover:bg-purple-700">
            Save
        </button>
        <a href="/dashboard" class="px-6 py-2 text-gray-600 rounded-md focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600
        border dark:border-gray-600">
        Cancel
        </a>
    </div>
</form>
