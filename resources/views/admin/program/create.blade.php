<x-system-layout>
<x-user-route-page-name :routeName="'program.create'" />
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-neutral-300 text-black dark:text-white">
        <div class="h-full ml-14 mb-10 md:ml-48 ">
            <div class="max-w-full mx-auto  mt-10 sm:px-10 md:px-12 lg:px-10 xl:px-10 ">
                <div class="text-gray-700 ml-5 text-md">Admin / Add Program</div>
                    <div class="container mx-auto p-4">
                        <div class="bg-white shadow-lg rounded-md p-5 sm:p-6 md:p-8 lg:p-10 text-black font-medium">
                            <div class="flex justify-end mb-4">
                                <a href="{{ route('program.index') }}"><button class="bg-blue-500 text-white px-4 py-2 rounded-md"><i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i> Back to list</button></a>
                            </div>
                            <form action="{{ route('program.store') }}" method="POST" class="">
                                @csrf
                                <x-caps-lock-detector />
                                <div class="mt-4">
                                    <label for="department_id" class="block text-gray-700 text-md font-bold mb-2">Assign Department:</label>
                                    <select id="department_id" name="department_id" value="{{ old('department_id') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('department_id') is-invalid @enderror" required>
                                        <option value="" selected>Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="name" class="block text-gray-700 text-md font-bold mb-2">Program Abbreviation:</label>
                                    <input type="text" name="program_abbreviation" id="name" value="{{ old('program_abbreviation') }}"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('program_abbreviation') is-invalid @enderror" required autofocus>
                                    <x-input-error :messages="$errors->get('program_abbreviation')" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <label for="program_description" class="block text-gray-700 text-md font-bold mb-2">Program Description:</label>
                                    <input type="text" name="program_description" id="program_description" value="{{ old('program_description') }}"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('program_description') is-invalid @enderror" required>
                                    <x-input-error :messages="$errors->get('program_description')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <label for="status" class="block text-gray-700 text-md font-bold mb-2">Status:</label>
                                    <select id="status" name="status" value="{{ old('status') }}"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('status') is-invalid @enderror" required autocomplete="status">
                                        <option value="" selected>Select status</option>
                                        <option value="Offered">Offered</option>
                                        <option value="Not yet offered">Not yet offered</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                </div>
                                <div class="flex  mb-4 mt-5 justify-center">
                                    <button type="submit" class="w-80 bg-blue-500 text-white px-4 py-2 rounded-md">
                                        <i class="fa-solid fa-pen" style="color: #ffffff;"></i> Add Program
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