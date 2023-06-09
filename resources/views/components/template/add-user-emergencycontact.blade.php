<!-- User Emergency Contact -->
<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Emergency Contact
</h4>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <!-- Contact Name -->
    <div class="">
        <div class="z-0 w-full group block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Full Name</span>
            <input
                x-model="emergencyName"   
                x-bind:class="{ 'border-red-500 dark:border-red-500': errors.emergencyName }"
                class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                placeholder="Full Name" name="emergency_name" type="text" :value="('emergency_name')"/>
            <span x-text="errors.emergencyName" class="text-xs text-red-600 dark:text-red-400"></span>
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
                    x-model="emergencyContactNum"   
                    x-bind:class="{ 'border-red-500 dark:border-red-500': errors.emergencyContactNum }"
                    inputmode="numeric" 
                    pattern="[0-9]{10}" 
                    oninput="this.value = this.value.replace(/[^0-9]/g, '');"
                    class="phone-input block w-full text-sm rounded-r border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                    focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input
                    [appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none"
                    id="phoneNumberContact" placeholder="0000000000" maxlength="10"
                    name="emergency_contactnum" type="tel" :value="('emergency_contactnum')" required/>
            </div>
            <span  class="text-gray-400 text-xs dark:text-gray-500">
                Insert 10 digit
            </span>
            <span x-text="errors.emergencyContactNum" class="text-xs text-red-600 dark:text-red-400"></span>
        </div>
        <div class="z-0 w-full group block text-sm text">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Relationship</span>
                <input 
                    x-model="emergencyRelationship"   
                    x-bind:class="{ 'border-red-500 dark:border-red-500': errors.emergencyRelationship }"
                    class="block w-full mt-1 text-sm rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
                    focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
                    placeholder="Relationship" name="emergency_relationship" type="text" :value="('emergency_relationship')"/>
                <span x-text="errors.emergencyRelationship" class="text-xs text-red-600 dark:text-red-400"></span>
            </label>
        </div>
    </div>
</div>

<div class="container px-5 mx-auto flex justify-end gap-4">
    <a @click.prevent="tab = 'governmentDocs'; window.location.hash = 'governmentDocs'" href="#" class="px-6 py-2 text-gray-600 rounded-md focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600
    border dark:border-gray-600 hover:bg-gray-700 hover:text-white">
        Previous
    </a>
    <a @click.prevent="if(validateForm()) { tab = 'companyDocs'; window.location.hash = 'companyDocs' }" href="#" class="px-6 py-2 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600
    rounded-md focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 hover:bg-purple-700">
        Next
    </a>
    
</div>