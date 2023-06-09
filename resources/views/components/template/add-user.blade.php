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
{{-- @include('components.template.error_message') --}}

<form method="POST" action={{ url('/template/add-user') }} class="mb-8" id="add-user-form" enctype="multipart/form-data">
    @csrf
        
    
    <div x-data="{ tab: window.location.hash ? window.location.hash.substring(1) : 'personalInfo',
        errors: {},
        profilePicture: '',
        employeeName: '',
        emailAddress: '',
        contactNumber: '',
        addressPresent: '',
        addressPermanent: '',
        birthDate: '',
        birthPlace: '',
        civilStatus: '',
        nationality: '',
        position: '',
        tinNumber: '',
        sssNumber: '',
        pagibigNumber: '',
        philhealthNumber: '',
        govID1: '',
        govID2: '',
        nbiClearance: '',
        emergencyName: '',
        emergencyContactNum: '',
        emergencyRelationship: '',
        fileCV: '',
        fileTOR: '',
        fileContract: '',
        filePledge: '',
        fileCertificate: '',
        imgSketch: '',
        fileLaptopAgreement: '',
        validateField(fieldName, errorMessage) {
        if (!this[fieldName]) {
            this.errors[fieldName] = errorMessage;
        } else {
            delete this.errors[fieldName];
        }

        // Additional validation for the contactNumber field
            if (fieldName === 'contactNumber') {
                const contactNumberRegex = /^9\d{9}$/;
                if (!contactNumberRegex.test(this[fieldName])) {
                    this.errors[fieldName] = errorMessage;
                }
            } else if (fieldName === 'emergencyContactNum') {
                const emergencyContactNumRegex = /^9\d{9}$/;
                if (!emergencyContactNumRegex.test(this[fieldName])) {
                    this.errors[fieldName] = errorMessage;
                }
            } else if (fieldName === 'tinNumber') {
                const tinNumberRegex = /^\d{12}$/;
                if (!tinNumberRegex.test(this[fieldName])) {
                    this.errors[fieldName] = errorMessage;
                }
            } else if (fieldName === 'sssNumber') {
                const sssNumberRegex = /^\d{10}$/;
                if (!sssNumberRegex.test(this[fieldName])) {
                    this.errors[fieldName] = errorMessage;
                }
            } else if (fieldName === 'pagibigNumber') {
                const pagibigNumberRegex = /^\d{12}$/;
                if (!pagibigNumberRegex.test(this[fieldName])) {
                    this.errors[fieldName] = errorMessage;
                }
            } else if (fieldName === 'philhealthNumber') {
                const philhealthNumberRegex = /^\d{12}$/;
                if (!philhealthNumberRegex.test(this[fieldName])) {
                    this.errors[fieldName] = errorMessage;
                }
            }



        },
        validateFieldsByTab(tab, fieldValidations) {
        if (this.tab === tab) {
            for (const fieldValidation of fieldValidations) {
            const fieldName = fieldValidation.field;
            const errorMessage = fieldValidation.errorMessage;
            this.validateField(fieldName, errorMessage);
            }
        }
        },
        validateEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        },
        validateForm() {
            this.errors = {};
        
            // Define the field validations for each tab
            const personalInfoValidations = [
                { field: 'profilePicture', errorMessage: 'Profile picture is required.' },
                { field: 'employeeName', errorMessage: 'Employee name is required.' },
                { field: 'emailAddress', errorMessage: 'Invalid email address.' },
                { field: 'contactNumber', errorMessage: 'Invalid contact number.' },
                { field: 'addressPresent', errorMessage: 'Present address is required.' },
                { field: 'addressPermanent', errorMessage: 'Permanent address is required.' },
                { field: 'birthPlace', errorMessage: 'Birth place is required.' },
                { field: 'civilStatus', errorMessage: 'Civil status is required.' },
                { field: 'nationality', errorMessage: 'Nationality is required.' },
                { field: 'position', errorMessage: 'Position is required.' },
                
                // Add validation rules for other fields in the personal information form
            ];
        
            const governmentDocsValidations = [
                { field: 'tinNumber', errorMessage: 'TIN ID is required.' },
                { field: 'sssNumber', errorMessage: 'SSS ID number is required.' },
                { field: 'pagibigNumber', errorMessage: 'Pag-IBIG ID number is required.' },
                { field: 'philhealthNumber', errorMessage: 'PhilHealth ID number is required.' },
                { field: 'govID1', errorMessage: 'Government ID is required.' },
                { field: 'govID2', errorMessage: 'Government ID is required.' },
                { field: 'nbiClearance', errorMessage: 'NBI Clearance is required.' },
                // Add validation rules for other fields in the additional information form
            ];

            const emergencyContactValidations = [
                { field: 'emergencyName', errorMessage: 'Emergency contact name is required.' },
                { field: 'emergencyContactNum', errorMessage: 'Invalid contact number.' },
                { field: 'emergencyRelationship', errorMessage: 'Emergency contact relationship is required.' },
                // Add validation rules for other fields in the address form
            ];
        
            const companyDocsValidations = [
                { field: 'fileCV', errorMessage: 'Curriculum Vitae is required.' },
                { field: 'fileTOR', errorMessage: 'TOR is required.' },
                { field: 'fileContract', errorMessage: 'Contract is required.' },
                { field: 'filePledge', errorMessage: 'Pledge is required.' },
                { field: 'fileCertificate', errorMessage: 'Certificate of Clearance is required.' },
                { field: 'imgSketch', errorMessage: 'Sketch of Residence is required.' },
                { field: 'fileLaptopAgreement', errorMessage: 'Laptop Agreement is required.' },
                // Add validation rules for other fields in the additional information form
            ];
        
            {{-- // Validate the personal information form fields
            this.validateFieldsByTab('personalInfo', personalInfoValidations);
        
            // Validate the address form fields
            this.validateFieldsByTab('address', addressValidations);
        
            // Validate the additional information form fields
            this.validateFieldsByTab('additionalInfo', additionalInfoValidations); --}}
        
            // Perform field validations based on the active tab
                if (this.tab === 'personalInfo') {
                this.validateFieldsByTab('personalInfo', personalInfoValidations);
                } else if (this.tab === 'governmentDocs') {
                this.validateFieldsByTab('governmentDocs', governmentDocsValidations);
                } else if (this.tab === 'emergencyContact') {
                this.validateFieldsByTab('emergencyContact', emergencyContactValidations);
                } else if (this.tab === 'companyDocs') {
                this.validateFieldsByTab('companyDocs', companyDocsValidations);
                }

                // Additional validation for the emailAddress field
                if (this.emailAddress && !this.validateEmail(this.emailAddress)) {
                this.errors.emailAddress = 'Invalid email address.';
                }
            

            // Check if there are any errors
            if (Object.keys(this.errors).length > 0) {
                {{-- const errorDiv = document.getElementById('errorDiv');
                if (errorDiv) {
                    errorDiv.classList.remove('hidden');
                    errorDiv.classList.add('flex');
                } --}}
                return false; // Prevent form submission if there are errors
            }
        
            return true; // Allow form submission if there are no errors
        } 
    }" id="tab_wrapper">

        {{-- <div class="submission-fail-message items-center justify-between p-4 mb-8 text-sm font-semibold
            text-purple-100 bg-red-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-red hidden"
            x-show="Object.keys(errors).length > 0"
            id="errorDiv"
            x-cloak>
            <div>
            <i class="fa-sharp fa-solid fa-circle-exclamation fa-lg mr-2" style="color: #ffffff;"></i>
            <span>Please fill the required fields.</span>

            </div>
        </div> --}}
        {{-- Error Message --}}
        @include('components.template.error_message')

        <!-- The tabs navigation -->
        <ol class="flex items-center w-full p-3 mb-3 space-x-2 text-sm md:text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4">
    
            <li class="flex items-center" :class="{ 'text-purple-600 dark:text-purple-500': tab === 'personalInfo' }">
                <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400" :class="{ 'border-purple-600 dark:border-purple-500': tab === 'personalInfo' }">
                    1
                </span>
                Personal <span class="hidden md:inline-flex md:ml-2 ">Info</span>
                <svg aria-hidden="true" class="w-4 h-4 ml-2 sm:ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
            </li>
            <li class="flex items-center" :class="{ 'text-purple-600 dark:text-purple-500': tab === 'governmentDocs' }">
                <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400" :class="{ 'border-purple-600 dark:border-purple-500': tab === 'governmentDocs' }">
                    2
                </span>
                Government <span class="hidden md:inline-flex md:ml-2"> Documents </span>
                <svg aria-hidden="true" class="w-4 h-4 ml-2 sm:ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
            </li>
            <li class="flex items-center" :class="{ 'text-purple-600 dark:text-purple-500': tab === 'emergencyContact' }">
                <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400" :class="{ 'border-purple-600 dark:border-purple-500': tab === 'emergencyContact' }">
                    3
                </span>
                Emergency <span class="hidden md:inline-flex md:ml-2"> Contact </span>
                <svg aria-hidden="true" class="w-4 h-4 ml-2 sm:ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7M5 5l7 7-7 7"></path></svg>
            </li>
            <li class="flex items-center" :class="{ 'text-purple-600 dark:text-purple-500': tab === 'companyDocs' }">
                <span class="flex items-center justify-center w-5 h-5 mr-2 text-xs border border-gray-600 rounded-full shrink-0 dark:border-gray-500"  :class="{ 'border-purple-600 dark:border-purple-500': tab === 'companyDocs' }">
                    4
                </span>
                Company <span class="hidden md:inline-flex md:ml-2"> Documents </span>
                
                
            </li>
            
        </ol>
        
        <div x-show="tab === 'personalInfo'">
            @include('components.template.add-user-personalinfo')
        </div>
        
        <div x-show="tab === 'governmentDocs'">
            @include('components.template.add-user-governmentdocs')
        </div>
        
        <div x-show="tab === 'emergencyContact'">
            @include('components.template.add-user-emergencycontact')
        </div>
        
        <div x-show="tab === 'companyDocs'">
            @include('components.template.add-user-companydocs')
        </div>
        
  
    </div>

    

    
</form>
