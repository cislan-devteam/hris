<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Add Employee Information
</h2>

@include('components.template.error_message')

<ol class="flex items-center w-full p-3 mb-3 space-x-2 text-sm md:text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4">
    
    <li class="flex items-center">
        <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
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
    <li class="flex items-center text-purple-600 dark:text-purple-500">
        <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs border border-purple-600 rounded-full shrink-0 dark:border-purple-500">
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


    

    <!-- Save and Cancel Buttons -->
    <div class="container px-5 mx-auto flex justify-end gap-4">
        
        <a href="/template/user-gov-docs" class="px-6 py-2 text-gray-600 rounded-md focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600
        border dark:border-gray-600 hover:bg-gray-700 hover:text-white">
        Previous
        </a>
        <a id="submit-button" href="/template/user-com-docs" class="px-6 py-2 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600
        rounded-md focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 hover:bg-purple-700">
            Next
        </a>
    </div>
</form>