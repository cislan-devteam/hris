<form method="POST" action={{ route('tasks.update', $user->id) }}>
    @method('PUT')
    @csrf
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400 font-bold">Name</span>
            <input
                class="block w-full mt-1 mb-3 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Name" name="name" type="text" value={{ $user->name }} required autofocus />
        </label>
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400 font-bold">Email</span>
            <input
                class="block w-full mt-1 mb-3 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Email" type="email" name="email" value={{ $user->email }} required />
        </label>
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400 font-bold">Password</span>
            <input
                class="block w-full mt-1 mb-3 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Password" name="password" type="password" value={{ $user->password }} required />
        </label>
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400 font-bold">Confirm</span>
            <input
                class="block w-full mt-1 mb-3 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                placeholder="Confirm password" name="password_confirmation" type="password" value={{ $user->password }}
                required />
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400 font-bold">
                Select Role
            </span>
            <select name="role_id"
                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="1" {{ $user->role_id == '1' ? 'selected' : '' }}>Super Admin</option>
                <option value="2" {{ $user->role_id == '2' ? 'selected' : '' }}>HR Admin</option>
                <option value="3" {{ $user->role_id == '3' ? 'selected' : '' }}>IT Admin</option>
                <option value="4" {{ $user->role_id == '4' ? 'selected' : '' }}>Director</option>
                <option value="5" {{ $user->role_id == '5' ? 'selected' : '' }}>Client</option>
                <option value="6" {{ $user->role_id == '6' ? 'selected' : '' }}>Employee</option>
            </select>
        </label>

        <div class="pt-5 pb-2">
            <button type="submit"
                class="w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Update User
            </button>
        </div>
    </div>
</form>
