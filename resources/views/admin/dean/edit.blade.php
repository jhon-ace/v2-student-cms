<x-system-layout>
<x-user-route-page-name :routeName="'dean.edit'" />
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-neutral-300 text-black dark:text-white">
        <div class="h-full ml-14 mb-10 md:ml-48 ">
            <div class="max-w-full mx-auto  mt-10 sm:px-10 md:px-12 lg:px-10 xl:px-10 ">
                <div class="text-gray-700 ml-5 text-md">Admin / Edit Dean</div>
                    <div class="container mx-auto p-4">
                        <div class="bg-white shadow-lg rounded-md p-5 sm:p-6 md:p-8 lg:p-10 text-black font-medium">
                            <div class="flex justify-end mb-4">
                                <a href="{{ route('dean.index') }}"><button class="bg-blue-500 text-white px-4 py-2 rounded-md"><i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i> Back to list</button></a>
                            </div>
                            <form action="{{ route('dean.update', $dean->id) }}" method="POST" class="">
                            <x-caps-lock-detector />
                                @csrf
                                @method('PUT')

                                <div class="mb-4">
                                    <label for="dean_fullname" class="block text-gray-700 text-md font-bold mb-2">Dean Full Name:</label>
                                    <input type="text" name="dean_fullname" id="dean_fullname" value="{{ old('dean_fullname', $dean->dean_fullname) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required autofocus>
                                    <x-input-error :messages="$errors->get('dean_fullname')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <label for="dean_status" class="block text-gray-700 text-md font-bold mb-2">Dean Status:</label>
                                    <select id="dean_status" name="dean_status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required >
                                        @if($dean->dean_status === 'Active')
                                            <option value="{{ $dean->dean_status }}" selected>{{ $dean->dean_status }}</option>
                                            <option value="Inactive">Inactive</option>
                                        @else
                                            <option value="{{ $dean->dean_status }}" selected>{{ $dean->dean_status }}</option>
                                            <option value="Active">Active</option>
                                        @endif
                                        <x-input-error :messages="$errors->get('dean_status')" class="mt-2" />
                                    </select>
                                </div>
                                <div class="mt-4">
                                    <label for="department_name" class="block text-gray-700 text-md font-bold mb-2">Department Assign</label>
                                    <select id="department_name" name="department_id"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('department_id') is-invalid @enderror" required>
                                        @if($dean->department->department_name)
                                            <option value="{{ $dean->department->id }}" selected>{{ $dean->department->department_name }}</option>
                                        @else    
                                            <option value="" selected>Select Dean Status</option>
                                        @endif
                                    </select>
                                    <small class="mt-2">
                                        <span class="text-red-500">Note:</span> The department where dean {{$dean->dean_fullname}} is assigned can't be changed.
                                    </small>
                                </div>
                                <div class="flex  mb-4 mt-5 justify-center">
                                        <button type="submit" class="w-80 bg-blue-500 text-white px-4 py-2 rounded-md">
                                            <i class="fa-solid fa-pen" style="color: #ffffff;"></i> Update Dean
                                        </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-system-layout>