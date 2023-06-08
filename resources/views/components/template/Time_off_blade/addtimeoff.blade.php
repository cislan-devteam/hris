<div class="flex items-center py-4 mt-2 overflow-x-auto whitespace-nowrap">
    <a href="/dashboard" class="text-gray-600 dark:text-gray-200">
        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"> <path d="M3 12l2-2m0 0l7-7 7 7M5
            10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0
            011 1v4a1 1 0 001 1m-6 0h6"></path>
        </svg>
    </a>
    <span class="mx-5 text-gray-500 dark:text-gray-300">
    /
    </span>
    <a href="/timeoff" class="text-gray-600 dark:text-gray-200 hover:underline">
    Time off
    </a>
    <span class="mx-5 text-gray-500 dark:text-gray-300">
    /
    </span>
    <a href="/create-time-off" class="text-violet-600 dark:text-blue-400 hover:underline">
        Add Time off
    </a>
    </div>
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

    <!-- General elements -->
    <form method="POST" action={{ url('/create-time-off') }} enctype="multipart/form-data">
        @csrf
        <div class="px-5  mb-8 p-3 w-full rounded-lg shadow-md dark:bg-gray-800">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Name</span>
                <input class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                id = "employee_name" placeholder="Name" name="employee_name" type="text":value="old('employee_name')" required autofocus/>
            </label>

            {{-- Date --}}
            <div class="flex items-center mt-4">
                <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-700 dark:text-gray-400" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2
                     2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd">
                    </path>
                </svg>
                </div>
                <input name="start_date" type="text" datepicker datepicker-format="yyyy-mm-dd" class=" border border-gray-300
                text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700
                dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Select date start">
                </div>

                <span class="mx-4 text-gray-500">to</span>
                <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-700 dark:text-gray-400" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2
                    2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd">
                    </path>
                    </svg>
                </div>
                <input name="end_date" type="text" datepicker datepicker-format="yyyy-mm-dd" class=" border
                border-gray-300 text-gray-900 text-sm rounded-lg focus:outline-none focus:border-purple-400 block w-full pl-10 p-2.5
                dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Select date end">
                </div>
            </div>

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400" >
                    Type of Leave
                </span>
                <select
                class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1
                focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    id = "leave_type"  name="leave_type" type="text":value="old('leave_type')" required autofocus>
                    <option></option>
                    <option>Sick leave</option>
                    <option>Vacation leave</option>
                    <option>Maternity leave</option>
                    <option>Paternity leave</option>
                    <option>Parental leave</option>
                    <option>Study leave</option>
                    <option>Rehabilitation leave</option>
                    <option>Service Incentive leave</option>
                </select>
            </label>

            {{-- <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Reason</span>
                <textarea
                    class="block w-full mt-1 text-sm rounded-lg  form-textarea focus:border-purple-400 focus:outline-none
                    focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="3" placeholder="Reason for the leave request"
                    id = "leave_reason" name="leave_reason" type="text" value="('leave_reason')" required autofocus>
                </textarea>
            </label> --}}

            <label class="block mb-2 mt-4 text-sm  text-gray-700 dark:text-gray-400">Reasons</label>
            <textarea id = "leave_reason" rows="4" class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
            focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    placeholder="Write your reasons here..." name="leave_reason" type="text" value="('leave_reason')" required></textarea>

            <div class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Attach File</span>
            <div class="flex items-center justify-center w-full mt-1">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border border-gray-300  rounded-lg cursor-pointer
                bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">

                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="file_attachment" type="file"  name="file_attachment":value="old('file_attachment')"/>
                </label>
            </div>
        </div>
            <div class="flex mt-6 text-sm">
                <label class="flex items-center dark:text-gray-400">
                    <input type="checkbox" required
                        class="text-purple-600 form-checkbox rounded-sm focus:border-purple-400 focus:outline-none
                        focus:shadow-outline-purple dark:focus:shadow-outline-gray " />
                    <span class="ml-2 text-gray-700  dark:text-gray-400">
                        I hereby declare that the information provided is
                        <span class="underline italic">true and correct.</span>
                    </span>
                </label>
            </div>
            <div class="mt-4">
                <button type="submit"
                    class="cursor-progress block w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150
                    bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700
                    focus:outline-none focus:shadow-outline-purple">
                    Submit
                </button>
            </div>
        </div>
    </form>
