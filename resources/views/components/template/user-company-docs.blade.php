<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Add Employee Information
</h2>

{{-- Error Message --}}
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
    <li class="flex items-center">
        <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
            4
        </span>
        <span class="hidden md:inline-flex md:mr-2">Emergency </span> Contact
        <svg aria-hidden="true" class="w-4 h-4 ml-2 sm:ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
    </li>
    <li class="flex items-center text-purple-600 dark:text-purple-500">
        <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs border border-purple-600 rounded-full shrink-0 dark:border-purple-500">
            5
        </span>
        <span class="hidden md:inline-flex md:mr-2">Company </span> Docs
        
    </li>
    
</ol>

<form method="POST" action={{ url('/template/add-user') }} class="mb-8" id="add-user-form" enctype="multipart/form-data">
    @csrf

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
        
        <a href="/template/user-emergency-contact" class="px-6 py-2 text-gray-600 rounded-md focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600
        border dark:border-gray-600 hover:bg-gray-700 hover:text-white">
        Previous
        </a>
        <button id="submit-button" type="submit" class="px-6 py-2 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600
        rounded-md focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 hover:bg-purple-700">
            Submit
        </button>
    </div>
</form>