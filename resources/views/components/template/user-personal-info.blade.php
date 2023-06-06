<ol class="flex items-center w-full p-3 mb-3 space-x-2 text-sm md:text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4">
    <li class="flex items-center text-purple-600 dark:text-purple-500">
        <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs border border-purple-600 rounded-full shrink-0 dark:border-purple-500">
            1
        </span>
        Personal <span class="hidden md:inline-flex md:ml-2 ">Info</span>
        <svg aria-hidden="true" class="w-4 h-4 ml-2 sm:ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
    </li>
    <li class="flex items-center">
        <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
            2
        </span>
        <span class="hidden md:inline-flex md:mr-2">Government </span> ID
        <svg aria-hidden="true" class="w-4 h-4 ml-2 sm:ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
    </li>
    <li class="flex items-center">
        <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
            3
        </span>
        <span class="hidden md:inline-flex md:mr-2">Government </span> Docs
        <svg aria-hidden="true" class="w-4 h-4 ml-2 sm:ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
    </li>
    <li class="flex items-center">
        <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
            4
        </span>
        <span class="hidden md:inline-flex md:mr-2">Emergency </span> Contact
        <svg aria-hidden="true" class="w-4 h-4 ml-2 sm:ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
    </li>
    <li class="flex items-center">
        <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
            5
        </span>
        <span class="hidden md:inline-flex md:mr-2">Company </span> Docs
    </li>
</ol>

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
                required
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
                    <select name="civil_status" id="civil_status" type="text" :value="('civil_status') @required(true)"
                        class="block w-full mt-1 text-sm rounded border border-gray-300 dark:text-gray-300 dark:border-gray-600 bg-transparent dark:bg-gray-700
                        form-select focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600" required>
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
                        form-select focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600" required>
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

    

    <!-- Save and Cancel Buttons -->
    <div class="container px-5 mx-auto flex justify-end gap-4">
        
        <a href="/template/employeeview" class="px-6 py-2 text-gray-600 rounded-md focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600
        border dark:border-gray-600 hover:bg-gray-700 hover:text-white">
        Cancel
        </a>
        <a id="submit-button"  href="/template/user-gov-id" class="px-6 py-2 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600
        rounded-md focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 hover:bg-purple-700">
            Next
        </a>
    </div>
</form>