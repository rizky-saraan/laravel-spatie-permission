<x-admin-layout>
    <div class="py-12 w-full ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justify-start p-2">
                    <a href="{{ route('admin.permissions.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white">List permissions</a>
                </div>
                <div class="flex flex-col">
                    <div class="mt-5 md:col-span-2 md:mt-0">
                        <form action="{{ route('admin.permissions.update', $permission) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="overflow-hidden shadow sm:rounded-md">
                                <div class="bg-white px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="name"
                                                class="block text-sm font-medium text-gray-700">Name</label>
                                            <input type="text" name="name" id="name"
                                                autocomplete="given-name"
                                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                                value="{{ $permission->name }}" />
                                            @error('name')
                                                <span class="text-red-400 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="sm:col-span-6 pt-5">
                                            <button type="submit"
                                                class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-6 p-2 bg-slate-200">
                    <h2 class="text-2xl font-semibold">Roles</h2>
                    <div class="flex space-x-2 mt-2 p-2">
                        @if ($permission->roles)
                            @foreach ($permission->roles as $permission_role)
                                <form class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md text-xs"
                                    method="POST"
                                    action="{{ route('admin.roles.permissions.revoke', [$permission->id, $permission_role->id]) }}"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">{{ $permission_role->name }}</button>
                                </form>
                            @endforeach
                        @endif
                    </div>
                    <div class="w-full">
                        <form action="{{ route('admin.permissions.roles', $permission->id) }}" method="POST">
                            @csrf
                            <div class="overflow-hidden shadow sm:rounded-lg">
                                <div class="bg-white px-4 py-5 sm:p-6 w-full">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="role"
                                                class="block text-sm font-medium text-gray-700">Permission</label>
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
            </div>
        </div>
    </div>
</x-admin-layout>
