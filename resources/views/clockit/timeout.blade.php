<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Time Tracking') }}
        </h2>
    </x-slot>

    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Time Tracking
    </h2>

    <form action="{{ route('clockit.clockout') }}" method="post" class="mb-6">
        @csrf
        <button type="submit" class=" px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Clock Out</button>
    </form>
    

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-bold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-4">Date</th>
                        <th class="px-4 py-4">Clock In</th>
                        <th class="px-4 py-4">Clock Out</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($records as $record)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">{{ Carbon\Carbon::parse($record['date'])->toFormattedDateString() }}</td>
                            <td class="px-4 py-3">{{ $record->clock_in->format('H:i:s') }}</td>
                            <td class="px-4 py-3">{{ $record->clock_out }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>