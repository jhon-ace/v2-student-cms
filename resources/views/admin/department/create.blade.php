<x-system-layout>
<x-user-route-page-name :routeName="'department.create'" />
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-neutral-300 text-black dark:text-white">
        <div class="h-full ml-14 mb-10 md:ml-48 ">
            <div class="max-w-full mx-auto  mt-10 sm:px-10 md:px-12 lg:px-10 xl:px-10 ">
                <div class="text-gray-700 ml-5 text-md">Admin / Add Department</div>
                    <div class="container mx-auto p-4">
                        <div class="bg-white shadow-lg rounded-md p-5 sm:p-6 md:p-8 lg:p-10 text-black font-medium">
                            <div class="flex justify-end mb-4">
                                <a href="{{ route('department.index') }}"><button class="bg-blue-500 text-white px-4 py-2 rounded-md"><i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i> Back to list</button></a>
                            </div>
                            <form action="{{ route('department.store') }}" method="POST" class="">
                            <x-caps-lock-detector />
                                @csrf
                                <div class="mb-4">
                                    <label for="department_name" class="block text-gray-700 text-md font-bold mb-2">Department Name:</label>
                                    <input type="text" name="department_name" id="department_name" value="{{ old('department_name') }}"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('department_name') is-invalid @enderror" required autofocus>
                                    <x-input-error :messages="$errors->get('department_name')" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <label for="department_description" class="block text-gray-700 text-md font-bold mb-2">Department Description</label>
                                    <input type="text" name="department_description" id="department_description" value="{{ old('department_description') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('department_description') is-invalid @enderror" required>
                                    <x-input-error :messages="$errors->get('department_description')" class="mt-2" />
                                </div>
                                <div class="flex mb-4 mt-5 justify-center">
                                    <button type="submit" class="w-80 bg-blue-500 text-white px-4 py-2 rounded-md">
                                        <i class="fa-solid fa-pen" style="color: #ffffff;"></i> Add Department
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
