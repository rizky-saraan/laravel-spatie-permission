<x-admin-layout>
    <div class="py-12 w-full ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex justify-start p-2">
                    <a href="{{ route('admin.roles.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white">List Roles</a>
                </div>
                <div class="flex flex-col">
                    <div class="mt-5 md:col-span-2 md:mt-0">
                        <form action="{{ route('admin.roles.update', $role) }}" method="POST">
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
                                                value="{{ $role->name }}" />
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
            </div>
        </div>
    </div>
</x-admin-layout>
