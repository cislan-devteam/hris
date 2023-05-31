<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Add User
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

<form  id="add-user-form" method="post" action="/adduser" class="mb-8" enctype="multipart/form-data">
    @csrf
        <!-- User Information -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        User Information
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

        {{-- Profile Picture Upload --}}
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Upload Profile Picture</span>
            <input
                type="file" class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                id="pfp-file-upload" required/>
            <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                Please select a file.
            </span>
        </label>

        <!-- User Name -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">First Name</span>
                <input type="text" class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600
                dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600
                dark:text-gray-300 form-input" placeholder="First Name" id="userFName"/>
            </div>
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Last Name</span>
                    <input type="text" class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                    focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    placeholder="Last Name" id="userSName"/>
            </div>
        </div>

        <!-- Present Address -->
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Present Address</span>
            <input type="text"class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                placeholder="Present Address" id="addressPresent"/>
        </label>

        <!-- Permanent Address -->
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Permanent Address</span>
            <input type="text" class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                placeholder="Permanent Address" id="addressPermanent"/>
        </label>

        <label class="flex items-center dark:text-gray-400 text-sm mt-4">
            <input type="checkbox" class="text-purple-600 form-checkbox focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600"
                id="addressCheck"/>
            <span class="ml-2"> Same as Present Address
            </span>
        </label>

        <!-- Mobile Number and Birth Date -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Mobile Number</span>
                <div class="flex mt-1">
                    <span class="inline-flex items-center px-3 py-0 text-sm  text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600
                     dark:text-gray-400 dark:border-gray-600">+63</span>
                    <input type="text"
                        onkeydown="return
                            /[0-9-]/.test(event.key) || event.key ===
                            'Backspace' || event.key === 'Delete'"
                        oninput="formatPhoneNumber(this)"
                        class="phone-input block w-full text-sm rounded-r border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                        focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                        id="phoneNumber" placeholder="000-000-0000" maxlength="12"required/>
                </div>
                <span id="pfp-error-message" class="hidden text-xs text-red-600 dark:text-red-400">
                    Phone number is invalid.
                </span>
            </div>
            <div class="z-0 w-full group block text-sm text">
                <span class="text-gray-700 dark:text-gray-400">Birth Date</span>
                <input type="date" class="block w-full mt-1 datePadding text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"/>
            </div>
        </div>
        <!-- Birth Place -->
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Birth Place</span>
            <input type="text" class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
            focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input" placeholder="Birth Place"/>
        </label>

        <!-- Civil Status and Nationality -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Civil Status
                    </span>
                    <select name="civil-status" id="civil-status"
                        class="block w-full mt-1 text-sm rounded border border-gray-300 dark:text-gray-300 dark:border-gray-600 bg-transparent dark:bg-gray-700
                        form-select focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600">
                        <option>
                            Select your civil status...
                        </option>
                        <option>Single</option>
                        <option>Married</option>
                        <option>Divorced</option>
                        <option>Separated</option>
                        <option>Widowed</option>
                        <option>Annulled</option>
                    </select>
                </label>
            </div>
            <div class="z-0 w-full group block text-sm text">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Nationality</span>
                    <select name="nationality" id="nationality"
                        class="block w-full mt-1 text-sm rounded border border-gray-300 dark:text-gray-300 dark:border-gray-600 bg-transparent dark:bg-gray-700
                        form-select focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600">
                        <option>
                            Select your civil status...
                        </option>
                        <option value="">-- select one --</option>
                        <option value="afghan">Afghan</option>
                        <option value="albanian">Albanian</option>
                        <option value="algerian">Algerian</option>
                        <option value="american">American</option>
                        <option value="andorran">Andorran</option>
                        <option value="angolan">Angolan</option>
                        <option value="antiguans">Antiguans</option>
                        <option value="argentinean">Argentinean</option>
                        <option value="armenian">Armenian</option>
                        <option value="australian">Australian</option>
                        <option value="austrian">Austrian</option>
                        <option value="azerbaijani">Azerbaijani</option>
                        <option value="bahamian">Bahamian</option>
                        <option value="bahraini">Bahraini</option>
                        <option value="bangladeshi">Bangladeshi</option>
                        <option value="barbadian">Barbadian</option>
                        <option value="barbudans">Barbudans</option>
                        <option value="batswana">Batswana</option>
                        <option value="belarusian">Belarusian</option>
                        <option value="belgian">Belgian</option>
                        <option value="belizean">Belizean</option>
                        <option value="beninese">Beninese</option>
                        <option value="bhutanese">Bhutanese</option>
                        <option value="bolivian">Bolivian</option>
                        <option value="bosnian">Bosnian</option>
                        <option value="brazilian">Brazilian</option>
                        <option value="british">British</option>
                        <option value="bruneian">Bruneian</option>
                        <option value="bulgarian">Bulgarian</option>
                        <option value="burkinabe">Burkinabe</option>
                        <option value="burmese">Burmese</option>
                        <option value="burundian">Burundian</option>
                        <option value="cambodian">Cambodian</option>
                        <option value="cameroonian">Cameroonian</option>
                        <option value="canadian">Canadian</option>
                        <option value="cape verdean">Cape Verdean</option>
                        <option value="central african">Central African</option>
                        <option value="chadian">Chadian</option>
                        <option value="chilean">Chilean</option>
                        <option value="chinese">Chinese</option>
                        <option value="colombian">Colombian</option>
                        <option value="comoran">Comoran</option>
                        <option value="congolese">Congolese</option>
                        <option value="costa rican">Costa Rican</option>
                        <option value="croatian">Croatian</option>
                        <option value="cuban">Cuban</option>
                        <option value="cypriot">Cypriot</option>
                        <option value="czech">Czech</option>
                        <option value="danish">Danish</option>
                        <option value="djibouti">Djibouti</option>
                        <option value="dominican">Dominican</option>
                        <option value="dutch">Dutch</option>
                        <option value="east timorese">East Timorese</option>
                        <option value="ecuadorean">Ecuadorean</option>
                        <option value="egyptian">Egyptian</option>
                        <option value="emirian">Emirian</option>
                        <option value="equatorial guinean">Equatorial Guinean</option>
                        <option value="eritrean">Eritrean</option>
                        <option value="estonian">Estonian</option>
                        <option value="ethiopian">Ethiopian</option>
                        <option value="fijian">Fijian</option>
                        <option value="filipino">Filipino</option>
                        <option value="finnish">Finnish</option>
                        <option value="french">French</option>
                        <option value="gabonese">Gabonese</option>
                        <option value="gambian">Gambian</option>
                        <option value="georgian">Georgian</option>
                        <option value="german">German</option>
                        <option value="ghanaian">Ghanaian</option>
                        <option value="greek">Greek</option>
                        <option value="grenadian">Grenadian</option>
                        <option value="guatemalan">Guatemalan</option>
                        <option value="guinea-bissauan">Guinea-Bissauan</option>
                        <option value="guinean">Guinean</option>
                        <option value="guyanese">Guyanese</option>
                        <option value="haitian">Haitian</option>
                        <option value="herzegovinian">Herzegovinian</option>
                        <option value="honduran">Honduran</option>
                        <option value="hungarian">Hungarian</option>
                        <option value="icelander">Icelander</option>
                        <option value="indian">Indian</option>
                        <option value="indonesian">Indonesian</option>
                        <option value="iranian">Iranian</option>
                        <option value="iraqi">Iraqi</option>
                        <option value="irish">Irish</option>
                        <option value="israeli">Israeli</option>
                        <option value="italian">Italian</option>
                        <option value="ivorian">Ivorian</option>
                        <option value="jamaican">Jamaican</option>
                        <option value="japanese">Japanese</option>
                        <option value="jordanian">Jordanian</option>
                        <option value="kazakhstani">Kazakhstani</option>
                        <option value="kenyan">Kenyan</option>
                        <option value="kittian and nevisian">Kittian and Nevisian</option>
                        <option value="kuwaiti">Kuwaiti</option>
                        <option value="kyrgyz">Kyrgyz</option>
                        <option value="laotian">Laotian</option>
                        <option value="latvian">Latvian</option>
                        <option value="lebanese">Lebanese</option>
                        <option value="liberian">Liberian</option>
                        <option value="libyan">Libyan</option>
                        <option value="liechtensteiner">Liechtensteiner</option>
                        <option value="lithuanian">Lithuanian</option>
                        <option value="luxembourger">Luxembourger</option>
                        <option value="macedonian">Macedonian</option>
                        <option value="malagasy">Malagasy</option>
                        <option value="malawian">Malawian</option>
                        <option value="malaysian">Malaysian</option>
                        <option value="maldivan">Maldivan</option>
                        <option value="malian">Malian</option>
                        <option value="maltese">Maltese</option>
                        <option value="marshallese">Marshallese</option>
                        <option value="mauritanian">Mauritanian</option>
                        <option value="mauritian">Mauritian</option>
                        <option value="mexican">Mexican</option>
                        <option value="micronesian">Micronesian</option>
                        <option value="moldovan">Moldovan</option>
                        <option value="monacan">Monacan</option>
                        <option value="mongolian">Mongolian</option>
                        <option value="moroccan">Moroccan</option>
                        <option value="mosotho">Mosotho</option>
                        <option value="motswana">Motswana</option>
                        <option value="mozambican">Mozambican</option>
                        <option value="namibian">Namibian</option>
                        <option value="nauruan">Nauruan</option>
                        <option value="nepalese">Nepalese</option>
                        <option value="new zealander">New Zealander</option>
                        <option value="ni-vanuatu">Ni-Vanuatu</option>
                        <option value="nicaraguan">Nicaraguan</option>
                        <option value="nigerien">Nigerien</option>
                        <option value="north korean">North Korean</option>
                        <option value="northern irish">Northern Irish</option>
                        <option value="norwegian">Norwegian</option>
                        <option value="omani">Omani</option>
                        <option value="pakistani">Pakistani</option>
                        <option value="palauan">Palauan</option>
                        <option value="panamanian">Panamanian</option>
                        <option value="papua new guinean">Papua New Guinean</option>
                        <option value="paraguayan">Paraguayan</option>
                        <option value="peruvian">Peruvian</option>
                        <option value="polish">Polish</option>
                        <option value="portuguese">Portuguese</option>
                        <option value="qatari">Qatari</option>
                        <option value="romanian">Romanian</option>
                        <option value="russian">Russian</option>
                        <option value="rwandan">Rwandan</option>
                        <option value="saint lucian">Saint Lucian</option>
                        <option value="salvadoran">Salvadoran</option>
                        <option value="samoan">Samoan</option>
                        <option value="san marinese">San Marinese</option>
                        <option value="sao tomean">Sao Tomean</option>
                        <option value="saudi">Saudi</option>
                        <option value="scottish">Scottish</option>
                        <option value="senegalese">Senegalese</option>
                        <option value="serbian">Serbian</option>
                        <option value="seychellois">Seychellois</option>
                        <option value="sierra leonean">Sierra Leonean</option>
                        <option value="singaporean">Singaporean</option>
                        <option value="slovakian">Slovakian</option>
                        <option value="slovenian">Slovenian</option>
                        <option value="solomon islander">Solomon Islander</option>
                        <option value="somali">Somali</option>
                        <option value="south african">South African</option>
                        <option value="south korean">South Korean</option>
                        <option value="spanish">Spanish</option>
                        <option value="sri lankan">Sri Lankan</option>
                        <option value="sudanese">Sudanese</option>
                        <option value="surinamer">Surinamer</option>
                        <option value="swazi">Swazi</option>
                        <option value="swedish">Swedish</option>
                        <option value="swiss">Swiss</option>
                        <option value="syrian">Syrian</option>
                        <option value="taiwanese">Taiwanese</option>
                        <option value="tajik">Tajik</option>
                        <option value="tanzanian">Tanzanian</option>
                        <option value="thai">Thai</option>
                        <option value="togolese">Togolese</option>
                        <option value="tongan">Tongan</option>
                        <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                        <option value="tunisian">Tunisian</option>
                        <option value="turkish">Turkish</option>
                        <option value="tuvaluan">Tuvaluan</option>
                        <option value="ugandan">Ugandan</option>
                        <option value="ukrainian">Ukrainian</option>
                        <option value="uruguayan">Uruguayan</option>
                        <option value="uzbekistani">Uzbekistani</option>
                        <option value="venezuelan">Venezuelan</option>
                        <option value="vietnamese">Vietnamese</option>
                        <option value="welsh">Welsh</option>
                        <option value="yemenite">Yemenite</option>
                        <option value="zambian">Zambian</option>
                        <option value="zimbabwean">Zimbabwean</option>
                    </select>
                </label>
            </div>
        </div>
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
                    <input type="text" onkeydown="return /[0-9-]/.test(event.key) || event.key ===
                    'Backspace' || event.key === 'Delete'" oninput="formatTIN(this)"
                        class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1
                        focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                        id="tin" placeholder="000-000-000-000" maxlength="15"/>
                </label>
            </div>
            <div class="z-0 w-full group block text-sm text">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">SSS Number</span>
                    <input type="text" onkeydown="return /[0-9-]/.test(event.key) || event.key === 'Backspace' || event.key === 'Delete'"
                        oninput="formatSSS(this)" class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                        focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                        id="sss" placeholder="00-0000000-0" maxlength="12"/>
                </label>
            </div>
        </div>

        <!-- Pag-IBIG and PhilHealt -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Pag-IBIG Number</span>
                    <input type="text" onkeydown="return /[0-9-]/.test(event.key) || event.key ===
                    'Backspace' || event.key === 'Delete'" oninput="formatPagIbig(this)"
                        class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                        focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                        id="pagIbig" placeholder="0000-0000-0000"maxlength="14"/>
                </label>
            </div>
            <div class="z-0 w-full group block text-sm text">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">PhilHealth Number</span>
                    <input type="text" onkeydown="return /[0-9-]/.test(event.key) || event.key === 'Backspace' || event.key === 'Delete'"
                        oninput="formatPhilHealth(this)" class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                        focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                        id="philHealth" placeholder="00-000000000-0" maxlength="14"/>
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
        <div class="grid md:grid-cols-2 gap-4">
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">First Name</span>
                <input type="text" class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    placeholder="First Name"/>
            </div>
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Last Name</span>
                <input type="text" class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    placeholder="Last Name"/>
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

                    <input type="text" onkeydown="return /[0-9-]/.test(event.key) || event.key ===
                        'Backspace' || event.key === 'Delete'" oninput="formatPhoneNumber(this)"
                        class="phone-input block w-full text-sm rounded-r border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                        focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                        id="phoneNumberContact" placeholder="000-000-0000" maxlength="12" required/>

                </div>
                <span id="pfp-error-message" class="hidden text-xs text-red-600 dark:text-red-400">
                    Phone number is invalid.
                </span>
            </div>
            <div class="z-0 w-full group block text-sm text">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Relationship</span>
                    <input type="text" class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                    focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                        placeholder="Relationship"/>
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
                <span class="text-gray-700 dark:text-gray-400">Upload CV</span>
                <input type="file" class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300  dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300  form-input"
                    id="cv-file-upload"required/>
                <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                    Please select a file.</span>
            </div>
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Upload TOR/Diploma</span>

                <input type="file" class="block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id="tor-file-upload"/>
            </div>
        </div>

        <!-- Memo and Notice to Explain -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Memo</span>
                <input type="file" class="block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                id="memo-file-upload"/>
            </div>
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Notice to Explain</span>

                <input type="file" class="block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                id="pfpFileUploadne-file-upload"/>
            </div>
        </div>

        <!-- Pledge and Contract -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Pledge</span>
                <input type="file" class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id="p-file-upload" required/>
                <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                    Please select a file.
                </span>
            </div>
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Contract</span>

                <input type="file" class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id="contract-file-upload" required/>
                <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                    Please select a file.
                </span>
            </div>
        </div>

        <!-- Laptop Agreement -->
        <div class="grid md:grid-cols-2 gap mt-4">
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Laptop Agreement</span>
                <input type="file" class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id="la-file-upload" required/>
                <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                    Please select a file.
                </span>
            </div>
            <div class="z-0 w-full group block text-sm"></div>
        </div>
    </div>

    <!-- User Required File Uploads -->
    <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
        Government Documents
    </h4>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <!-- NBI/Barangay Clearance and Certificate of Clearance from Previous Employer -->
        <div class="grid md:grid-cols-2 gap-4">
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">NBI/Barangay Clearance</span>
                <input type="file" class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id="certNB-file-upload" required/>
                <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                    Please select a file.
                </span>
            </div>
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Certificate of Clearance from Previous Employer</span>

                <input type="file" class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id="certE-file-upload" required/>
                <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                    Please select a file.
                </span>
            </div>
        </div>

        <!-- Valid IDs -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Government ID 1</span>
                <input type="file" class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id="id1-file-upload" required/>
                <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                    Please select a file.
                </span>
            </div>
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Government ID 2</span>
                <input type="file" class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id="id2-file-upload" required/>
                <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                    Please select a file.
                </span>
            </div>
        </div>

        <!-- Sketch of Residence -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Sketch of Residence</span>

                <input type="file" class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id="sketch-file-upload"required/>
                <span id="pfp-error-message" class="error error-message hidden text-xs text-red-600 dark:text-red-400">
                    Please select a file.
                </span>
            </div>
            <div class="z-0 w-full group block text-sm"></div>
        </div>
    </div>

    <!-- Save and Cancel Buttons -->
    <div class="container px-5 mx-auto flex justify-end gap-4">
        <button id="submit-button" type="submit" class="px-6 py-2 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600
        rounded-md focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 hover:bg-purple-700">
            Save
        </button>

        <button class="px-6 py-2 text-gray-600 rounded-md focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 border dark:border-gray-600">
            Cancel
        </button>
    </div>
</form>
