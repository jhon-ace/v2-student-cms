<x-system-layout>
<x-user-route-page-name :routeName="'course.edit'" />
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-neutral-300 text-black dark:text-white">
        <div class="h-full ml-14 mb-10 md:ml-48 ">
            <div class="max-w-full mx-auto  mt-10 sm:px-10 md:px-12 lg:px-10 xl:px-10 ">
                <div class="text-gray-700 ml-5 text-md">Admin / Edit Course</div>
                    <div class="container mx-auto p-4">
                        <div class="bg-white shadow-lg rounded-md p-5 sm:p-6 md:p-8 lg:p-10 text-black font-medium">
                            <div class="flex justify-end mb-4">
                                <a href="{{ route('course.index') }}"><button class="bg-blue-500 text-white px-4 py-2 rounded-md"><i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i> Back to list</button></a>
                            </div>
                            <form action="{{ route('course.update', $course->id) }}" method="POST" class="">
                            <x-caps-lock-detector />
                                @csrf
                                @method('PUT')
                                <div class="mt-4">
                                    <label for="program_id" class="block text-gray-700 text-md font-bold mb-2">Program:</label>
                                    <select id="program_id" name="program_id"  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('department_id') is-invalid @enderror" required>
                                        @if($course->program->program_abbreviation)
                                            <option value="{{ $course->program->id }}" selected>{{ $course->program->program_description }}</option>
                                        @else    
                                            <option value="" selected>Select Program</option>
                                        @endif
                                    </select>
                                    <small class="mt-2">
                                        <span class="text-red-500">Note:</span> The program where the course {{$course->course_code}} - {{$course->course_name}} is assigned can't be changed.
                                    </small>
                                </div>
                                <div class="mb-4">
                                    <label for="course_code" class="block text-gray-700 text-md font-bold mb-2">Course Code:</label>
                                    <input type="text" name="course_code" id="course_code" value="{{ old('course_code', $course->course_code) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required autofocus>
                                    <x-input-error :messages="$errors->get('course_code')" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <label for="course_name" class="block text-gray-700 text-md font-bold mb-2">Course Name:</label>
                                    <input type="text" name="course_name" id="course_name" value="{{ old('course_name', $course->course_name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required autofocus>
                                    <x-input-error :messages="$errors->get('course_name')" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <label for="course_description" class="block text-gray-700 text-md font-bold mb-2">Course Description:</label>
                                    <input type="text" name="course_description" id="course_description" value="{{ old('course_description', $course->course_description) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required autofocus>
                                    <x-input-error :messages="$errors->get('course_description')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <label for="course_semester" class="block text-gray-700 text-md font-bold mb-2">Course Semester:</label>
                                    <select id="course_semester" name="course_semester" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required >
                                        @if($course->course_semester === '1st Semester')
                                            <option value="{{ $course->course_semester }}" selected>{{ $course->course_semester }}</option>
                                            <option value="2nd Semester">2nd Semester</option>
                                        @else
                                            <option value="{{ $course->course_semester }}" selected>{{ $course->course_semester }}</option>
                                            <option value="1st Semester">1st Semester</option>
                                            
                                        @endif
                                        <x-input-error :messages="$errors->get('course_semester')" class="mt-2" />
                                    </select>
                                </div>
                                <div class="flex  mb-4 mt-5 justify-center">
                                        <button type="submit" class="w-80 bg-blue-500 text-white px-4 py-2 rounded-md">
                                            <i class="fa-solid fa-pen" style="color: #ffffff;"></i> Update Course
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