<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <base href="public">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Windmill Dashboard - Forms</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
    @include('manage.users.assets.links')
    
    @include('manage.users.assets.scripts')

    <style>
      .bg-green-600 {
          --tw-bg-opacity: 1;
          background-color: rgb(22 163 74 / var(--tw-bg-opacity));
      }

      .bg-red-600 {
          --tw-bg-opacity: 1;
          background-color: rgb(220 38 38 / var(--tw-bg-opacity));
      }

      .gap-4 {
          gap: 1rem/* 16px */;
      }

      .p-0 {
          padding: 0px;
      }

      input[type=file] {
        font-size: 0.875rem/* 14px */;
        line-height: 1.25rem/* 20px */;
      }

      input[type=file]::file-selector-button {
        --tw-bg-opacity: 1;
        background-color: rgb(147 51 234 / var(--tw-bg-opacity));
        color: #fff;
        border: 0px;
        border-right: 1px solid rgb(147 51 234);
        padding: 8px 1rem;
        margin-right: 20px;
        font-weight: 500;
        transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 150ms;
      }

      input[type=file]::file-selector-button:hover {
        background-color: rgb(126 34 206 );
        border-right: 1px solid rgb(126 34 206 );
      }

      .unit {
        position: absolute;
        display: block;
        left: 14px;
        z-index: 9;
      }

      .unitp {
        top: 12.5px;
      }

      .unitc {
        top: 12.5px;
      }

      input[type="number"]::-webkit-inner-spin-button,
      input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      input[type="date"]::-webkit-calendar-picker-indicator {
        filter: invert(1) brightness(85%);
      }

      .error, .error-border {
          border-color: red !important;
      }
      
      @media (prefers-color-scheme: dark) {
          .dark\:border-red-600 {
              --tw-border-opacity: 1;
              border-color: rgb(220 38 38 / var(--tw-border-opacity));
          }
      }
      
    </style>


  </head>
  <body>
    <div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen}"
    >
      @include('manage.users.sidebar')

      <div class="flex flex-col flex-1">
        
        @include('manage.users.header')

        <main class="h-full pb-16 overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            
            @include('manage.users.add-user')

          </div>
        </main>
      </div>
    </div>

    <script>
        const addressInput = document.getElementById("addressPresent");
        const presentAddressInput = document.getElementById("addressPermanent");
        const presentAddressCheckbox = document.getElementById("addressCheck");

        presentAddressCheckbox.addEventListener("change", () => {
            if (presentAddressCheckbox.checked) {
                presentAddressInput.value = addressInput.value;
                presentAddressInput.setAttribute("readonly", true);
            } else {
                presentAddressInput.value = "";
                presentAddressInput.removeAttribute("readonly");
            }
        });

        function formatWithHyphen(input, positions) {
            let value = input.value.replace(/[^\d-]/g, ""); // Remove any characters that aren't digits or hyphens

            // Add hyphen at specified positions
            for (let i = 0; i < positions.length; i++) {
                const pos = positions[i];
                if (value.length > pos && value.charAt(pos) !== "-") {
                    value = value.slice(0, pos) + "-" + value.slice(pos);
                }
            }

            // Remove dash when the number on its right is deleted
            if (value.charAt(value.length - 1) === "-") {
                value = value.slice(0, value.length - 1);
            } else if (
                value.charAt(value.length - 2) === "-" &&
                value.charAt(value.length - 1) === " "
            ) {
                value = value.slice(0, value.length - 2);
            }

            input.value = value;
        }

        function formatPhoneNumber(input) {
            let value = input.value;

            if (value.charAt(0) === "0") {
                input.value = "";
                return;
            }

            formatWithHyphen(input, [3, 7]);
        }

        function formatTIN(input) {
            formatWithHyphen(input, [3, 7, 11]);
        }

        function formatSSS(input) {
            formatWithHyphen(input, [2, 10]);
        }

        function formatPagIbig(input) {
            formatWithHyphen(input, [4, 9]);
        }

        function formatPhilHealth(input) {
            formatWithHyphen(input, [2, 12]);
        }

        // const addUser = document.getElementById("add-user-form");

        // addUser.addEventListener()

        // const submitAddUser = document.getElementById("submit-button");

        // const pfpUpload = document.getElementById("pfp-file-upload");

        // submitAddUser.addEventListener("click", function() {
        //   event.preventDefault();
          
        //   if(pfpUpload.value == "") {
        //     pfpUpload.classList.add
        //   }
          

        //   if (pfpUpload.value == "") {
        //     p
        //   }

        // })
        const phoneInputs = document.querySelectorAll('.phone-input');
        const successMessage = document.querySelector(".submission-success-message");
        const failMessage = document.querySelector(".submission-fail-message");
        // Add click event listener to the submit button
        $('#submit-button').click(function(event) {
            var isValid = true;

            // const phoneNumberInput = document.("phoneNumberContact");
            // validatePhoneNumber(phoneNumberInput);

            phoneInputs.forEach(function(input) {
                validatePhoneNumber(input);

                if (input.classList.contains("error-border")) {
                    isValid = false;
                }
            });

            // Loop through each file upload input
            $('.file-upload').each(function() {

                var errorMessage = $(this).next('.error-message');
                // Check if a file has been selected
                if ($(this).get(0).files.length === 0) {
                    // Add the error class and set border color to red
                    $(this).addClass('error');
                    errorMessage.show();
                    isValid = false;
                } else {
                    // Remove the error class and border color
                    $(this).removeClass('error');
                    errorMessage.hide();
                }
            });


            // Prevent form submission if validation fails
            if (!isValid) {
                event.preventDefault();
                
                failMessage.style.display = "flex";
                successMessage.style.display = "none";
            } else {
              failMessage.style.display = "none";
              successMessage.style.display = "flex";
            }
        });

        function validatePhoneNumber(input) {
        const value = input.value;
        const maxLength = parseInt(input.getAttribute("maxlength"), 10);
        const errorSpan = input.parentNode.nextElementSibling;

        if (value.length === maxLength) {
            input.classList.remove("error-border");
            errorSpan.classList.add("hidden");
        } else {
            input.classList.add("error-border");
            errorSpan.classList.remove("hidden");
        }
    }

      function hideElement(element) {
        element.classList.add('hidden');
      }

    </script>
  

  </body>
</html>
