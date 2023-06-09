<div x-data="{open: false,accept() {console.log('accepted')}}">
 <button @click="open = true" class="inline-flex items-center py-2 px-2 hover:bg-purple-100 text-purple-600 rounded-lg
 dark:text-gray-400">
 <i class="fa-solid fa-trash-can"></i>
 </button>
 <template x-teleport="body">
   <!-- Backdrop -->
   <div x-show="open" class="fixed flex justify-center items-center left-0 top-0 bottom-0 right-0 z-10 bg-black/50">
     <!-- Dialog -->
     <div x-show="open" x-transition
       @click.outside="open = false" class="w-[90%] dark:bg-gray-800 md:w-1/2 bg-white rounded-lg">
       <!-- Modal Title -->
       <div class="px-4 py-4 bg-white text-lg text-gray-700 font-bold flex items-center rounded-t-lg
        justify-between dark:text-gray-100 dark:bg-gray-800">
         <h2 class="p-1">DELETE LEAVE REQUEST</h2>
            <button @click="open = false"
            class="flex justify-end w-6 h-6 text-gray-400 dark:text-gray-300 transition-colors duration-150 rounded
            dark:hover:text-gray-200 hover: hover:text-gray-700"
            aria-label="close" @click="closeModal">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                    <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1
                        1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd" fill-rule="evenodd">
                    </path>
                </svg>
            </button>
       </div>
       <!-- Modal Body -->
       <p class="p-4 dark:text-white">Do you want to delete this leave request?</p>
       <!-- Modal Footer -->
       <div class="py-4 px-4 text-lg flex justify-end font-semibold bg-white dark:bg-gray-800 rounded-b-lg">
       <form method="POST" action={{ route('timeoff.destroy', $timeoff->id) }}>
        @csrf @method('DELETE')
         <button @click="accept" class="inline-flex items-center py-1 px-3 bg-red-500 hover:bg-opacity-95 text-white rounded-md
         shadow mr-2">
         Yes
         </button>
        </form>
         <button @click="open = false" class="inline-flex items-center py-1 px-3 bg-gray-200 hover:bg-opacity-95 text-gray-800
           rounded-md shadow">
           Cancel
         </button>
       </div>
     </div>
   </div>
 </template>
</div>
