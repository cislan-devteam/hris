<x-app-layout>

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Xero Employees
    </h2>

    <!-- Display the records -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">

            @if ($xeroEmployees > 0)
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-bold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-4">Employee ID</th>
                            <th class="px-4 py-4">First Name</th>
                            <th class="px-4 py-4">Last Name</th>
                            <th class="px-4 py-4">Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <!-- Display the records here -->
                        @foreach ($xeroEmployees as $employee)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">{{ $employee->getEmployeeId() }}</td>
                                <td class="px-4 py-3">{{ $employee->getFirstName() }}</td>
                                <td class="px-4 py-3">{{ $employee->getLastName() }}</td>
                                <td class="px-4 py-3">{{ $employee->getStatus() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                @else
                <p class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">No employees found.</p>
            @endif
        </div>
    </div>
</x-app-layout>