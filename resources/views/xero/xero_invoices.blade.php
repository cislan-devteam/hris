<x-app-layout>
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Xero Invoices
    </h2>

    <!-- Filter button -->
    <button id="filterButton" class="inline-flex justify-center py-2 px-2 mb-4 font-medium leading-1 text-white transition-colors duration-150 
    bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" style="width: 120px;">Filters</button>

    <!-- Modal dialog -->
    <div id="filterModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <!-- Filter form -->
            <form id="filterForm">
                <!-- Filter input fields here -->
                <div class="mb-4">
                    <label for="nameFilter" class="block text-sm font-medium text-gray-900 dark:text-gray-900">
                        Filter by Name
                    </label>
                    <div class="flex">
                        <input type="text" id="nameFilter" name="nameFilter" value="{{ $nameFilter ?? '' }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="invoiceNumberFilter" class="block text-sm font-medium text-gray-900 dark:text-gray-900">
                        Filter by Invoice Number
                    </label>
                    <div class="flex">
                        <input type="text" id="invoiceNumberFilter" name="invoiceNumberFilter" value="{{ $invoiceNumberFilter ?? '' }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="mb-4">
                    <label for="statusFilter" class="block text-sm font-medium text-gray-900 dark:text-gray-900">
                        Filter by Status
                    </label>
                    <div class="flex">
                        <input type="text" id="statusFilter" name="statusFilter" value="{{ $statusFilter ?? '' }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>                
                <div class="mb-4">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Apply</button>
                    <button type="button" class="inline-flex justify-center py-2 px-4 ml-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-gray-700 bg-gray-600 hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-600" id="cancelButton">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Display the records -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            @if ($xeroInvoices > 0)
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-bold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-4">Name</th>
                            <th class="px-4 py-4">Invoice Number</th>
                            <th class="px-4 py-4">Sub Total</th>
                            <th class="px-4 py-4">Tax</th>
                            <th class="px-4 py-4">Invoice Total</th>
                            <th class="px-4 py-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <!-- Display the records here -->
                        @foreach ($xeroInvoices as $invoice)
                            
                            @if ((empty($nameFilter) || str_contains(strtolower($invoice->getContact()->getName()), strtolower($nameFilter))) && (empty($invoiceNumberFilter) || $invoice->getInvoiceNumber() == $invoiceNumberFilter))
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3">{{ $invoice->getContact()->getName() }}</td>
                                    <td class="px-4 py-3">{{ $invoice->getInvoiceNumber() }}</td>
                                    <td class="px-4 py-3">{{ "$" . $invoice->getSubTotal() }}</td>
                                    <td class="px-4 py-3">{{ "$" . $invoice->getTotalTax() }}</td>
                                    <td class="px-4 py-3">{{ "$" . $invoice->getTotal() }}</td>
                                    <td class="px-4 py-3">{{ $invoice->getStatus() }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">No invoices found.</p>
            @endif
        </div>
    </div>

    <style>
        /* CSS styles for the modal dialog */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        #cancelButton {
            background-color: #a5a5a6;
            color: #ffffff;
        }

        #cancelButton:hover {
            background-color: #4a4b4b;
        }
    </style>

    <script>
        // Get the filter button element
        const filterButton = document.getElementById('filterButton');

        // Get the modal dialog element
        const filterModal = document.getElementById('filterModal');

        // Get the close button element in the modal
        const closeButton = filterModal.getElementsByClassName('close')[0];

        // Get the cancel button element
        const cancelButton = document.getElementById('cancelButton');

        // Event listener to open the modal when the filter button is clicked
        filterButton.addEventListener('click', () => {
            filterModal.style.display = 'block';
        });

        // Event listener to close the modal when the close button is clicked
        closeButton.addEventListener('click', () => {
            filterModal.style.display = 'none';
        });

        // Event listener to close the modal when clicking outside of it
        window.addEventListener('click', (event) => {
            if (event.target === filterModal) {
                filterModal.style.display = 'none';
            }
        });

        // Event listener to close the modal when the cancel button is clicked
        cancelButton.addEventListener('click', () => {
            filterModal.style.display = 'none';
        });
    </script>
</x-app-layout>