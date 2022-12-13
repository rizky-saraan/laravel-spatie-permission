<x-admin-layout>
    <div class="py-12 w-full ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justify-start p-2">
                    <a href="{{ route('admin.users.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white">List User</a>
                </div>
                <div class="flex flex-col p-2 bg-slate-200">
                    <div>User Name : {{ $user->name }}</div>
                    <div>User Email : {{ $user->email }}</div>
                </div>
                <div class="mt-6 p-2 bg-slate-200">
                    <h2 class="text-2xl font-semibold">Roles</h2>
                    <div class="flex space-x-2 mt-2 p-2">
                        @if ($user->roles)
                            @foreach ($user->roles as $user_role)
                                <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md text-xs"
                                    method="POST"
                                    action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">{{ $user_role->name }}</button>
                                </form>
                            @endforeach
                        @endif
                    </div>
                    <div class="w-full">
                        <form action="{{ route('admin.users.roles', $user->id) }}" method="POST">
                            @csrf
                            <div class="overflow-hidden shadow sm:rounded-lg">
                                <div class="bg-white px-4 py-5 sm:p-6 w-full">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="role"
                                                class="block text-sm font-medium text-gray-700">user</label>
                                            <select id="role" name="role" autocomplete="role-name"
                                                class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->name }}">{{ $role->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('role')
                                                <span class="text-red-400 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="sm:col-span-6 pt-5">
                                            <button type="submit"
                                                class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white">Assign</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-6 p-2 bg-slate-200">
                    <h2 class="text-2xl font-semibold">Permissions</h2>
                    <div class="flex space-x-2 mt-2 p-2">
                        @if ($user->permissions)
                            @foreach ($user->permissions as $user_permission)
                                <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md text-xs"
                                    method="POST"
                                    action="{{ route('admin.users.permissions.revoke', [$user, $user_permission]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">{{ $user_permission->name }}</button>
                                </form>
                            @endforeach
                        @endif
                    </div>
                    <div class="w-full">
                        <form action="{{ route('admin.users.permissions', $user) }}" method="POST">
                            @csrf
                            <div class="overflow-hidden shadow sm:rounded-lg">
                                <div class="bg-white px-4 py-5 sm:p-6 w-full">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="permission"
                                                class="block text-sm font-medium text-gray-700">Permission</label>
                                            <select id="permission" name="permission" autocomplete="permission-name"
                                                class="mt-1 block w-full rounded-md border border-gray-300 bg-white py-2 px-3 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm">
                                                @foreach ($permissions as $permission)
                                                    <option value="{{ $permission->name }}">{{ $permission->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                            @error('name')
                                                <span class="text-red-400 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="sm:col-span-6 pt-5">
                                            <button type="submit"
                                                class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white">Assign</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
