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
                <input 
                    x-model="tinNumber"
                    x-bind:class="{ 'border-red-500 dark:border-red-500': errors.tinNumber }"
                    inputmode="numeric" pattern="[0-9]{12}" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                    class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:ring-1
                    focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input
                    [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                    id="tin" placeholder="000000000000" maxlength="12" name="tin" type="number" :value="('tin')"/>
            </label>
            <span  class="text-gray-400 text-xs dark:text-gray-500">
                Insert 12 digit
            </span>
            <span x-text="errors.tinNumber" class="text-xs text-red-600 dark:text-red-400"></span>
        </div>
        <div class="z-0 w-full group block text-sm text">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">SSS Number</span>
                <input
                    x-model="sssNumber"
                    x-bind:class="{ 'border-red-500 dark:border-red-500': errors.sssNumber }"
                    inputmode="numeric" pattern="[0-9]{10}" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                    class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                    focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input
                    [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                    id="sss" placeholder="0000000000" maxlength="10" name="sss_num" type="number" :value="('sss_num')"/>
            </label>
            <span class="text-gray-400 text-xs dark:text-gray-500">
                Insert 10 digit
            </span>
            <span x-text="errors.sssNumber" class="text-xs text-red-600 dark:text-red-400"></span>
        </div>
    </div>

    <!-- Pag-IBIG and PhilHealt -->
    <div class="grid md:grid-cols-2 gap-4 mt-4">
        <div class="z-0 w-full group block text-sm">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Pag-IBIG Number</span>
                <input
                    x-model="pagibigNumber"
                    x-bind:class="{ 'border-red-500 dark:border-red-500': errors.pagibigNumber }"
                    inputmode="numeric" pattern="[0-9]{12}" oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                    class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                    focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input
                    [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                    id="pagIbig" placeholder="000000000000"maxlength="12" name="pagibig_num" type="number" :value="('pagibig_num')"/>
            </label>
            <span class="text-gray-400 text-xs dark:text-gray-500">
                Insert 12 digit
            </span>
            <span x-text="errors.pagibigNumber" class="text-xs text-red-600 dark:text-red-400"></span>
        </div>
        <div class="z-0 w-full group block text-sm text">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">PhilHealth Number</span>
                <input 
                    x-model="philhealthNumber"
                    x-bind:class="{ 'border-red-500 dark:border-red-500': errors.philhealthNumber }"    
                    inputmode="numeric" pattern="[0-9]{12}" oninput="this.value = this.value.replace(/[^0-9]/g, '');" 
                    class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
                    focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input
                    [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                    id="philHealth" placeholder="000000000000" maxlength="12" name="philhealth_num" type="number" :value="('philhealth_num')"/>
            </label>
            <span class="text-gray-400 text-xs dark:text-gray-500">
                Insert 12 digit
            </span>
            <span x-text="errors.philhealthNumber" class="text-xs text-red-600 dark:text-red-400"></span>
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
            <input x-model="govID1" x-bind:class="{ 'border-red-500 dark:border-red-500': errors.govID1 }" class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
            focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
            accept="image/png, image/jpg, image/jpeg" id="id1-file-upload" name="gov_id1" type="file" :value="('gov_id1')" required/>
            <span class="text-gray-400 text-xs dark:text-gray-500">
                JPEG, JPG, PNG or PDF (MAX 10MB)
            </span>
            <span x-text="errors.govID1" class="text-xs text-red-600 dark:text-red-400"></span>
        </div>
        <div class="z-0 w-full group block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Government ID 2</span>
            <input x-model="govID2" x-bind:class="{ 'border-red-500 dark:border-red-500': errors.govID2 }" class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
            focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
            accept="image/png, image/jpg, image/jpeg" id="id2-file-upload" name="gov_id2" type="file" :value="('gov_id2')" required/>
            <span class="text-gray-400 text-xs dark:text-gray-500">
                JPEG, JPG, PNG or PDF (MAX 10MB)
            </span>
            <span x-text="errors.govID2" class="text-xs text-red-600 dark:text-red-400"></span>
        </div>
    </div>
    <!-- NBI/Barangay Clearance and Certificate of Clearance from Previous Employer -->
    <div class="grid md:grid-cols-2 gap-4 mt-4">
        <div class="z-0 w-full group block text-sm">
            <span class="text-gray-700 dark:text-gray-400">NBI/Barangay Clearance</span>
            <input x-model="nbiClearance" x-bind:class="{ 'border-red-500 dark:border-red-500': errors.nbiClearance }" class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
            focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
            accept="image/png, image/jpg, image/jpeg , application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"
            id="certNB-file-upload" name="nbi_clearance" type="file" :value="('nbi_clearance')" required/>
            <span class="text-gray-400 text-xs dark:text-gray-500">
                JPEG, JPG, PNG or PDF (MAX 10MB)
            </span>
            <span x-text="errors.nbiClearance" class="text-xs text-red-600 dark:text-red-400"></span>
        </div>
    </div>
</div>

<div class="container px-5 mx-auto flex justify-end gap-4">
    <a @click.prevent="tab = 'personalInfo'; window.location.hash = 'personalInfo'" href="#" class="px-6 py-2 text-gray-600 rounded-md focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600
    border dark:border-gray-600 hover:bg-gray-700 hover:text-white">
        Previous
    </a>
    <a @click.prevent="if(validateForm()) { tab = 'emergencyContact'; window.location.hash = 'emergencyContact'}" href="#" class="px-6 py-2 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600
    rounded-md focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 hover:bg-purple-700">
        Next
    </a>
    
</div>