<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Time Off
  </h2>
  <a href="/create-time-off" class="mb-6">
      <button class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg
      active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
          Create leave request
      </button>
  </a>

  <div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
           <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400
           dark:bg-gray-800">
             <th class="px-4 py-3">Employee Name</th>
             <th class="px-4 py-3">Leave Type</th>
             <th class="px-4 py-3">Start Date</th>
             <th class="px-4 py-3">End Date</th>
             <th class="px-4 py-3">Status</th>
             <th class="px-11 py-3">Actions</th>
           </tr>
         </thead>
         <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($timeoffs as $timeoff )
           <tr class="text-gray-700 dark:text-gray-400">
             <td class="px-4 py-3">
               <div class="flex items-center text-sm">
                 <!-- Avatar with inset shadow -->
                 <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                   <img class="object-cover w-full h-full rounded-full"
                     src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                     alt="icon"
                     loading="lazy"
                   />
                   <div
                     class="absolute inset-0 rounded-full shadow-inner"
                     aria-hidden="true"
                   ></div>
                 </div>
                 <div class="cursor-default">
                   <p class="font-semibold">
                    {{ $timeoff->employee_name }}
                </p>
                 </div>
               </div>

             </td>
             <td class="px-4 py-3 text-sm cursor-default">
               {{ $timeoff->leave_type }}
             </td>

             <td class="px-4 py-3 text-sm cursor-default">
               {{ Carbon\Carbon::parse($timeoff['start_date'])->toFormattedDateString() }}
             </td>
             </td>
             <td class="px-4 py-3 text-sm cursor-default">
                {{ Carbon\Carbon::parse($timeoff['end_date'])->toFormattedDateString() }}
              </td>
             <td class="px-4 py-3 text-xs cursor-default">

                @if($timeoff->status == "Approve")
                    <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full
                    dark:bg-green-700 dark:text-green-100">
                    Approved
                    </span>
                @elseif($timeoff->status == "Denied")
                    <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full
                    dark:text-red-100 dark:bg-red-700">
                    Denied
                    </span>
               @else
                    <span class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full
                    dark:text-white dark:bg-orange-600">
                    Pending
                    </span>
               @endif
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center space-x-2 text-sm">

                    <a href={{ route('timeoff.shows', $timeoff->id) }}>
                        <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400
                            focus:outline-none focus:shadow-outline-gray"
                            aria-label="Show">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                   </a>
                    <a href={{ route('timeoff.edit', $timeoff->id) }}>
                        <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400
                            focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </a>

                    <form method="POST" action={{ route('timeoff.destroy', $timeoff->id) }}>
                    @csrf
                    @method('DELETE')

                        <button
                            onclick="return confirm('Are you sure you want to delete this request?')"
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400
                            focus:outline-none focus:shadow-outline-gray"
                            aria-label="Delete"
                            >
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </form>

                    <a href={{ route('directors.edit', $timeoff->id) }}>
                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400
                        focus:outline-none focus:shadow-outline-gray"
                            aria-label="Directors View">
                            <i class="fa-solid fa-file-signature"></i>
                        </button>
                    </a>
                </div>
            </td>
           </tr>
           @endforeach
         </tbody>
       </table>
     </div>
   </div>
</div>
