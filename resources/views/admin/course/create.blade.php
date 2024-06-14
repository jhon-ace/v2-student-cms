<x-system-layout>
<x-user-route-page-name :routeName="'course.create'" />
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-neutral-300 text-black dark:text-white">
        <div class="h-full ml-14 mb-10 md:ml-48 ">
            <div class="max-w-full mx-auto  mt-10 sm:px-10 md:px-12 lg:px-10 xl:px-10 ">
                <div class="text-gray-700 ml-5 text-md">Admin / Add Course</div>
                    <div class="container mx-auto p-4">
                        <div class="bg-white shadow-lg rounded-md p-5 sm:p-6 md:p-8 lg:p-10 text-black font-medium">
                            <div class="flex justify-end mb-4">
                                <a href="{{ route('course.index') }}"><button class="bg-blue-500 text-white px-4 py-2 rounded-md"><i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i> Back to list</button></a>
                            </div>
                            <form action="{{ route('course.store') }}" method="POST" class="">
                            <x-caps-lock-detector />
                                @csrf
                                <div class="mt-4">
                                    <label for="program_id" class="block text-gray-700 text-md font-bold mb-2">Choose Program for the course:</label>
                                    <select id="program_id" name="program_id" value="{{ old('program_id') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline @error('department_id') is-invalid @enderror" required>
                                        <option value="" selected>Select Program</option>
                                        @foreach($programs as $program)
                                            <option value="{{ $program->id }}">{{ $program->program_abbreviation }}</option>
                                        @endforeach
                                    </select>
                                    <small class="mt-2">
                                        <span class="text-red-500">Note:</span> Your selected program for the course won't be changed anymore.
                                    </small>
                                    <x-input-error :messages="$errors->get('program_id')" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <label for="course_code" class="block text-gray-700 text-md font-bold mb-2">Course Code:</label>
                                    <input type="text" name="course_code" id="course_code" value="{{ old('course_code') }}"  class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline @error('dean_fullname') is-invalid @enderror" required autofocus>
                                    <x-input-error :messages="$errors->get('course_code')" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <label for="course_name" class="block text-gray-700 text-md font-bold mb-2">Course Name:</label>
                                    <input type="text" name="course_name" id="course_name" value="{{ old('course_name') }}"  class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline @error('dean_fullname') is-invalid @enderror" required autofocus>
                                    <x-input-error :messages="$errors->get('course_name')" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <label for="course_description" class="block text-gray-700 text-md font-bold mb-2">Course Description:</label>
                                    <input type="text" name="course_description" id="course_description" value="{{ old('course_description') }}"  class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline @error('dean_fullname') is-invalid @enderror" required autofocus>
                                    <x-input-error :messages="$errors->get('course_description')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <label for="course_semester" class="block text-gray-700 text-md font-bold mb-2">Course Semester:</label>
                                    <select id="course_semester" name="course_semester" value="{{ old('course_semester') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline @error('department_dean') is-invalid @enderror" required autocomplete="department_dean">
                                        <option value="" selected>Select Semester</option>
                                        <option value="1st Semester">1st Semester</option>
                                        <option value="2nd Semester">2nd Semester</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('course_semester')" class="mt-2" />
                                </div>
                                <div class="flex mb-4 mt-5 justify-center">
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
