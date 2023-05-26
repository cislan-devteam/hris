<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Add User
</h2>
<!-- CTA -->
<div
    class="submission-success-message items-center flex justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-green-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-green"
    
>
    <div class="flex items-center">
        <i class="fa-sharp fa-solid fa-circle-check fa-lg mr-2" style="color: #ffffff;"></i>
    <span>User Added Successfully</span>
    </div>
    <i class="fa-solid fa-circle-xmark fa-lg px-1" style="color: #ffffff;"  onclick="this.parentElement.style.display = 'none';"></i>
    
</div>

<div
    class="submission-fail-message items-center flex justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-red-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-red"
    
>
    <div class="flex items-center">
        <i class="fa-sharp fa-solid fa-circle-exclamation fa-lg mr-2" style="color: #ffffff;"></i>
    <span>One or more fields have an error. Please check and try again. </span>
    </div>
    <i class="fa-solid fa-circle-xmark fa-lg px-1" style="color: #ffffff;"  onclick="this.parentElement.style.display = 'none';"></i>
</div>

<form  id="add-user-form" method="post" action="/adduser" class="mb-8" enctype="multipart/form-data">
    @csrf
        <!-- User Information -->
    <h4
        class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
    >
        User Information
    </h4>
    <div
        class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
    >

        {{-- Profile Picture Upload --}}
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Upload Profile Picture</span>
            <input
                type="file"
                class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                id="pfp-file-upload"
                required
            />
            <span
                id="pfp-error-message"
                class="error error-message hidden text-xs text-red-600 dark:text-red-400"
            >
                Please select a file.
            </span>
        </label>

        <!-- User Name -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >First Name</span
                >
                <input
                    type="text"
                    class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    placeholder="First Name" id="userFName"
                />
            </div>
            <div class="z-0 w-full group block text-sm">
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >Last Name</span
                >
                <input
                    type="text"
                    class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    placeholder="Last Name" id="userSName"
                />
            </div>
        </div>

        <!-- Present Address -->
        <label class="block mt-4 text-sm">
            <span
                class="text-gray-700 dark:text-gray-400"
                >Present Address</span
            >
            <input
                type="text"
                class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                placeholder="Present Address"
                id="addressPresent"
            />
        </label>

        <!-- Permanent Address -->
        <label class="block mt-4 text-sm">
            <span
                class="text-gray-700 dark:text-gray-400"
                >Permanent Address</span
            >
            <input
                type="text"
                class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                placeholder="Permanent Address"
                id="addressPermanent"
            />
        </label>

        <label
            class="flex items-center dark:text-gray-400 text-sm mt-4"
        >
            <input
                type="checkbox"
                class="text-purple-600 form-checkbox focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600"
                id="addressCheck"
            />
            <span class="ml-2">
                Same as Present Address
            </span>
        </label>

        <!-- Mobile Number and Birth Date -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >Mobile Number</span
                >
                <div class="flex mt-1">
                    <span
                        class="inline-flex items-center px-3 py-0 text-sm  text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600"
                        >+63</span
                    >
                    <input
                        type="text"
                        onkeydown="return
                            /[0-9-]/.test(event.key) || event.key ===
                            'Backspace' || event.key === 'Delete'"
                        oninput="formatPhoneNumber(this)"
                        class="phone-input block w-full text-sm rounded-r border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                        id="phoneNumber"
                        placeholder="000-000-0000"
                        maxlength="12"
                        required
                    />
                    
                </div>
                <span
                    id="pfp-error-message"
                    class="hidden text-xs text-red-600 dark:text-red-400"
                >
                    Phone number is invalid.
                </span>
            </div>
            <div
                class="z-0 w-full group block text-sm text"
            >
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >Birth Date</span
                >
                <input
                    type="date"
                    class="block w-full mt-1 datePadding text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                />
            </div>
        </div>
        <!-- Birth Place -->
        <label class="block mt-4 text-sm">
            <span
                class="text-gray-700 dark:text-gray-400"
                >Birth Place</span
            >
            <input
                type="text"
                class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                placeholder="Birth Place"
            />
        </label>

        <!-- Civil Status and Nationality -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <label class="block text-sm">
                    <span
                        class="text-gray-700 dark:text-gray-400"
                    >
                        Civil Status
                    </span>
                    <select
                    name="civil-status"
                    id="civil-status"
                        class="block w-full mt-1 text-sm rounded border border-gray-300 dark:text-gray-300 dark:border-gray-600 bg-transparent dark:bg-gray-700 form-select focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600"
                    >
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
            <div
                class="z-0 w-full group block text-sm text"
            >
                <label class="block text-sm">
                    <span
                        class="text-gray-700 dark:text-gray-400"
                        >Nationality</span
                    >
                    <input
                        type="text"
                        class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                        placeholder="Nationality"
                    />
                </label>
            </div>
        </div>
    </div>


    <!-- User Government ID Numbers -->
    <h4
        class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
    >
        Government ID Numbers
    </h4>
    <div
        class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
    >
        <!-- TIN and SSS -->
        <div class="grid md:grid-cols-2 gap-4">
            <div class="z-0 w-full group block text-sm">
                <label class="block text-sm">
                    <span
                        class="text-gray-700 dark:text-gray-400"
                        >Tax Identification Number</span
                    >
                    <input
                        type="text"
                        onkeydown="return
                    /[0-9-]/.test(event.key) || event.key ===
                    'Backspace' || event.key === 'Delete'"
                        oninput="formatTIN(this)"
                        class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                        id="tin"
                        placeholder="000-000-000-000"
                        maxlength="15"
                    />
                </label>
            </div>
            <div
                class="z-0 w-full group block text-sm text"
            >
                <label class="block text-sm">
                    <span
                        class="text-gray-700 dark:text-gray-400"
                        >SSS Number</span
                    >
                    <input
                        type="text"
                        onkeydown="return
            /[0-9-]/.test(event.key) || event.key ===
            'Backspace' || event.key === 'Delete'"
                        oninput="formatSSS(this)"
                        class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                        id="sss"
                        placeholder="00-0000000-0"
                        maxlength="12"
                    />
                </label>
            </div>
        </div>

        <!-- Pag-IBIG and PhilHealt -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <label class="block text-sm">
                    <span
                        class="text-gray-700 dark:text-gray-400"
                        >Pag-IBIG Number</span
                    >
                    <input
                        type="text"
                        onkeydown="return
                    /[0-9-]/.test(event.key) || event.key ===
                    'Backspace' || event.key === 'Delete'"
                        oninput="formatPagIbig(this)"
                        class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                        id="pagIbig"
                        placeholder="0000-0000-0000"
                        maxlength="14"
                    />
                </label>
            </div>
            <div
                class="z-0 w-full group block text-sm text"
            >
                <label class="block text-sm">
                    <span
                        class="text-gray-700 dark:text-gray-400"
                        >PhilHealth Number</span
                    >
                    <input
                        type="text"
                        onkeydown="return
                /[0-9-]/.test(event.key) || event.key ===
                'Backspace' || event.key === 'Delete'"
                        oninput="formatPhilHealth(this)"
                        class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                        id="philHealth"
                        placeholder="00-000000000-0"
                        maxlength="14"
                    />
                </label>
            </div>
        </div>
    </div>

    <!-- User Emergency Contact -->
    <h4
        class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
    >
        Emergency Contact
    </h4>
    <div
        class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
    >
        <!-- Contact Name -->
        <div class="grid md:grid-cols-2 gap-4">
            <div class="z-0 w-full group block text-sm">
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >First Name</span
                >
                <input
                    type="text"
                    class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    placeholder="First Name"
                />
            </div>
            <div class="z-0 w-full group block text-sm">
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >Last Name</span
                >
                <input
                    type="text"
                    class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    placeholder="Last Name"
                />
            </div>
        </div>

        <!-- Mobile Number and Relationship -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >Mobile Number</span
                >
                <div class="flex mt-1">
                    <span
                        class="inline-flex items-center px-3 py-0 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600"
                        >+63</span
                    >

                    <input
                        type="text"
                        onkeydown="return
                /[0-9-]/.test(event.key) || event.key ===
                'Backspace' || event.key === 'Delete'"
                        oninput="formatPhoneNumber(this)"
                        class="phone-input block w-full text-sm rounded-r border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                        id="phoneNumberContact"
                        placeholder="000-000-0000"
                        maxlength="12"
                        required
                    />
                    
                </div>
                <span
                    id="pfp-error-message"
                    class="hidden text-xs text-red-600 dark:text-red-400"
                >
                    Phone number is invalid.
                </span>
            </div>
            <div
                class="z-0 w-full group block text-sm text"
            >
                <label class="block text-sm">
                    <span
                        class="text-gray-700 dark:text-gray-400"
                        >Relationship</span
                    >
                    <input
                        type="text"
                        class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                        placeholder="Relationship"
                    />
                </label>
            </div>
        </div>
    </div>

    <!-- User File Uploads -->
    <h4
        class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
    >
        File Uploads
    </h4>
    <div
        class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
    >
        <!-- CV and TOR/Diploma -->
        <div class="grid md:grid-cols-2 gap-4">
            <div class="z-0 w-full group block text-sm">
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >Upload CV</span
                >
                <input
                    type="file"
                    class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300  dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300  form-input"
                    id="cv-file-upload"
                    required
                />
                <span
                    id="pfp-error-message"
                    class="error error-message hidden text-xs text-red-600 dark:text-red-400"
                >
                    Please select a file.
                </span>
            </div>
            <div class="z-0 w-full group block text-sm">
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >Upload TOR/Diploma</span
                >

                <input
                    type="file"
                    class="block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id="tor-file-upload"
                />
            </div>
        </div>

        <!-- Memo and Notice to Explain -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >Memo</span
                >
                <input
                type="file"
                class="block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                id="memo-file-upload"
            />
            </div>
            <div class="z-0 w-full group block text-sm">
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >Notice to Explain</span
                >

                <input
                type="file"
                class="block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                id="pfpFileUploadne-file-upload"
            />
            </div>
        </div>

        <!-- Pledge and Contract -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >Pledge</span
                >
                <input
                    type="file"
                    class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id="p-file-upload"
                    required
                />
                <span
                    id="pfp-error-message"
                    class="error error-message hidden text-xs text-red-600 dark:text-red-400"
                >
                    Please select a file.
                </span>
            </div>
            <div class="z-0 w-full group block text-sm">
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >Contract</span
                >

                <input
                    type="file"
                    class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id="contract-file-upload"
                    required
                />
                <span
                    id="pfp-error-message"
                    class="error error-message hidden text-xs text-red-600 dark:text-red-400"
                >
                    Please select a file.
                </span>
            </div>
        </div>

        <!-- Laptop Agreement -->
        <div class="grid md:grid-cols-2 gap mt-4">
            <div class="z-0 w-full group block text-sm">
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >Laptop Agreement</span
                >
                <input
                    type="file"
                    class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id="la-file-upload"
                    required
                />
                <span
                    id="pfp-error-message"
                    class="error error-message hidden text-xs text-red-600 dark:text-red-400"
                >
                    Please select a file.
                </span>
            </div>
            <div
                class="z-0 w-full group block text-sm"
            ></div>
        </div>
    </div>

    <!-- User Required File Uploads -->
    <h4
        class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
    >
        Required File Uploads
    </h4>
    <div
        class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
    >
        <!-- NBI/Barangay Clearance and Certificate of Clearance from Previous Employer -->
        <div class="grid md:grid-cols-2 gap-4">
            <div class="z-0 w-full group block text-sm">
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >NBI/Barangay Clearance</span
                >
                <input
                    type="file"
                    class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id="certNB-file-upload"
                    required
                />
                <span
                    id="pfp-error-message"
                    class="error error-message hidden text-xs text-red-600 dark:text-red-400"
                >
                    Please select a file.
                </span>
            </div>
            <div class="z-0 w-full group block text-sm">
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >Certificate of Clearance from
                    Previous Employer</span
                >

                <input
                    type="file"
                    class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id="certE-file-upload"
                    required
                />
                <span
                    id="pfp-error-message"
                    class="error error-message hidden text-xs text-red-600 dark:text-red-400"
                >
                    Please select a file.
                </span>
            </div>
        </div>

        <!-- Valid IDs -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >Valid ID</span
                >
                <input
                    type="file"
                    class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id="id1-file-upload"
                    required
                />
                <span
                    id="pfp-error-message"
                    class="error error-message hidden text-xs text-red-600 dark:text-red-400"
                >
                    Please select a file.
                </span>
            </div>
            <div class="z-0 w-full group block text-sm">
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >Valid ID</span
                >
                <input
                    type="file"
                    class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id="id2-file-upload"
                    required
                />
                <span
                    id="pfp-error-message"
                    class="error error-message hidden text-xs text-red-600 dark:text-red-400"
                >
                    Please select a file.
                </span>
            </div>
        </div>

        <!-- Sketch of Residence -->
        <div class="grid md:grid-cols-2 gap-4 mt-4">
            <div class="z-0 w-full group block text-sm">
                <span
                    class="text-gray-700 dark:text-gray-400"
                    >Sketch of Residence</span
                >

                <input
                    type="file"
                    class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id="sketch-file-upload"
                    required
                />
                <span
                    id="pfp-error-message"
                    class="error error-message hidden text-xs text-red-600 dark:text-red-400"
                >
                    Please select a file.
                </span>
            </div>
            <div
                class="z-0 w-full group block text-sm"
            ></div>
        </div>
    </div>

    <!-- Save and Cancel Buttons -->
    <div
        class="container px-5 mx-auto flex justify-end gap-4"
    >
        <button
            id="submit-button"
            type="submit"
            class="px-6 py-2 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 hover:bg-purple-700"
        >
            Save
        </button>

        <button
            class="px-6 py-2 text-gray-600 rounded-md focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 border dark:border-gray-600"
        >
            Cancel
        </button>
    </div>
</form>