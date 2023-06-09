<!-- User File Uploads -->
<h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
    Company Documents
</h4>
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    <!-- CV and TOR/Diploma -->
    <div class="grid md:grid-cols-2 gap-2">
        <div class="z-0 w-full group block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Upload Curriculum vitae</span>
            <input x-model="fileCV" x-bind:class="{ 'border-red-500 dark:border-red-500': errors.fileCV }" class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300  dark:border-gray-600 dark:bg-gray-700
            focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300  form-input"
            accept="image/png, image/jpg, image/jpeg , application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"
            id="cv-file-upload" name="file_cv" type="file" :value="('file_cv')" required/>
            <span class="text-gray-400 text-xs dark:text-gray-500">
                JPEG, JPG, PNG, DOCS or PDF (MAX 10MB)
            </span>
            <span x-text="errors.fileCV" class="text-xs text-red-600 dark:text-red-400"></span>
        </div>
        <div class="z-0 w-full group block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Upload Transcript of Record/Diploma</span>
            <input x-model="fileTOR" x-bind:class="{ 'border-red-500 dark:border-red-500': errors.fileTOR }" class="block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
            focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
            accept="image/png, image/jpg, image/jpeg , application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"
            id="tor-file-upload" name="file_tor" type="file" :value="('file_tor')"/>
            <span class="text-gray-400 text-xs dark:text-gray-500">
                JPEG, JPG, PNG or PDF (MAX 10MB)
            </span>
            <span x-text="errors.fileTOR" class="text-xs text-red-600 dark:text-red-400"></span>
        </div>
    </div>
    <!-- Contract and Pledge -->
    <div class="grid md:grid-cols-2 gap-4 mt-2">
        <div class="z-0 w-full group block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Contract</span>
            <input x-model="fileContract" x-bind:class="{ 'border-red-500 dark:border-red-500': errors.fileContract }" class="block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
            focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
            accept="application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"
            id="memo-file-upload" name="file_contract" type="file" :value="('file_contract')"/>
            <span class="text-gray-400 text-xs dark:text-gray-500">
                PDF or DOCS (MAX 10MB)
            </span>
            <span x-text="errors.fileContract" class="text-xs text-red-600 dark:text-red-400"></span>
        </div>
        <div class="z-0 w-full group block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Pledge</span>
            <input x-model="filePledge" x-bind:class="{ 'border-red-500 dark:border-red-500': errors.filePledge }" class="block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
            focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
            accept="application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"
            id="pfpFileUploadne-file-upload" name="file_pledge" type="file" :value="('file_pledge')" required/>
            <span class="text-gray-400 text-xs dark:text-gray-500">
                PDF or DOCS (MAX 10MB)
            </span>
            <span x-text="errors.filePledge" class="text-xs text-red-600 dark:text-red-400"></span>
        </div>
    </div>

    <!-- Sketch of Residence and Certificate of Clearance from Previous Employer -->
    <div class="grid md:grid-cols-2 gap-4 mt-2">
        <div class="z-0 w-full group block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Certificate of Clearance from Previous Employer</span>
            <input x-model="fileCertificate" x-bind:class="{ 'border-red-500 dark:border-red-500': errors.fileCertificate }" class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
            focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
            accept="image/png, image/jpg, image/jpeg , application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"
            id="p-file-upload" name="file_certificate_of_former_employer" type="file" :value="('file_certificate_of_former_employer')" required/>
            <span class="text-gray-400 text-xs dark:text-gray-500">
                JPEG, JPG, PNG, DOCS or PDF (MAX 10MB)
            </span>
            <span x-text="errors.fileCertificate" class="text-xs text-red-600 dark:text-red-400"></span>
        </div>
        <div class="z-0 w-full group block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Sketch of Residence</span>

            <input x-model="imgSketch" x-bind:class="{ 'border-red-500 dark:border-red-500': errors.imgSketch }" class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
            focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
            accept="image/png, image/jpg, image/jpeg" id="contract-file-upload" name="img_sketch_of_residence"
            type="file" :value="('img_sketch_of_residence')" required/>
            <span class="text-gray-400 text-xs dark:text-gray-500">
                JPEG, JPG, PNG (MAX 10MB)
            </span>
            <span x-text="errors.imgSketch" class="text-xs text-red-600 dark:text-red-400"></span>
        </div>
    </div>
    <!-- Laptop Agreement, Memo and Notice to Explain  -->
    <div class="grid md:grid-cols-2 gap-4 mt-2">
        <div class="z-0 w-full group block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Laptop Agreement</span>
            <input x-model="fileLaptopAgreement" x-bind:class="{ 'border-red-500 dark:border-red-500': errors.fileLaptopAgreement }" class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
            focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
            accept="application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"
            id="sketch-file-upload" name="file_laptop_agreement" type="file" :value="('file_laptop_agreement')" required/>
            <span class="text-gray-400 text-xs dark:text-gray-500">
                PDF or DOCS (MAX 10MB)
            </span>
            <span x-text="errors.fileLaptopAgreement" class="text-xs text-red-600 dark:text-red-400"></span>
        </div>
        <div class="z-0 w-full group block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Memo</span>
            <input class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
            focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
            accept="application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword" id="certE-file-upload"
            name="file_memo" type="file" :value="('file_memo')" required/>
            <span class="text-gray-400 text-xs dark:text-gray-500">
                PDF or DOCS (MAX 10MB)
            </span>
            
        </div>
    </div>
    <div class="grid md:grid-cols-2 gap-4 mt-2">
        <div class="z-0 w-full group block text-sm">

            <span class="text-gray-700 dark:text-gray-400">Notice to Explain</span>
            <input class="file-upload block w-full mt-1 text-sm p-0 rounded border border-gray-300 dark:border-gray-600 dark:bg-gray-700
            focus:border-purple-400 focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 dark:text-gray-300 form-input"
            accept="application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/msword"
            id="sketch-file-upload" name="notice_to_explain" type="file" :value="('notice_to_explain')" required/>
            <span class="text-gray-400 text-xs dark:text-gray-500">
            PDF or DOCS (MAX 10MB)
            </span>
            
        </div>
    </div>
</div>

<div class="container px-5 mx-auto flex justify-end gap-4">
    <a @click.prevent="tab = 'emergencyContact'; window.location.hash = 'emergencyContact'" href="#" class="px-6 py-2 text-gray-600 rounded-md focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600
    border dark:border-gray-600 hover:bg-gray-700 hover:text-white">
        Previous
    </a>
    
    <button id="submit-button" type="submit" @click.prevent="validateForm()" class="px-6 py-2 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600
    rounded-md focus:ring-1 focus:ring-purple-200 dark:focus:ring-purple-600 hover:bg-purple-700">
        Submit
    </button>
    
</div>