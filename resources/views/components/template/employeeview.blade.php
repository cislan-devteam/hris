<h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
    Employee Information
  </h2>
  @include('components.template.success_message')
  
<a href="/template/add-user" class="mb-6">
    <button class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg
    active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
        Add Employee
    </button>
</a>

<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
           <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400
           dark:bg-gray-800">
             <th class="px-4 py-3">Employee Name</th>
             <th class="px-4 py-3">Birthday</th>
             <th class="px-4 py-3">Mobile Number</th>
             <th class="px-4 py-3">Position</th>
             <th class="px-11 py-3">Actions</th>
           </tr>
         </thead>
         <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            {{-- @foreach ($timeoffs as $timeoff ) --}}
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
                    Juan Tamad
                </p>
                 </div>
               </div>

             </td>
             <td class="px-4 py-3 text-sm cursor-default">
               January 01, 2000
             </td>

             <td class="px-4 py-3 text-sm cursor-default">
               09987654321
             </td>
             
             <td class="px-4 py-3 text-xs cursor-default">

                CEO
              </td>
              <td class="px-4 py-3">
                <div class="flex items-center space-x-2 text-sm">

                    <a href="#">
                        <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400
                            focus:outline-none focus:shadow-outline-gray"
                            aria-label="Show">
                            <i class="fa-solid fa-eye"></i>
                        </button>
                   </a>
                    <a href="#">
                        <button
                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400
                            focus:outline-none focus:shadow-outline-gray"
                            aria-label="Edit">
                            <i class="fa-solid fa-pen"></i>
                        </button>
                    </a>

                    <form method="POST" action="">
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

                    <a href="#">
                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400
                        focus:outline-none focus:shadow-outline-gray"
                            aria-label="Directors View">
                            <i class="fa-solid fa-file-signature"></i>
                        </button>
                    </a>
                </div>
            </td>
           </tr>
           {{-- @endforeach --}}
         </tbody>
       </table>
     </div>
   </div>
</div>
