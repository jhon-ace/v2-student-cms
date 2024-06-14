<x-system-layout>
<x-user-route-page-name :routeName="'faculty.create'" />
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-neutral-300 text-black dark:text-white">
        <div class="h-full ml-14 mb-10 md:ml-48 ">
            <div class="max-w-full mx-auto  mt-10 sm:px-10 md:px-12 lg:px-10 xl:px-10 ">
                <div class="text-gray-700 ml-5 text-md">Admin / Add Faculty</div>
                    <div class="container mx-auto p-4">
                        <div class="bg-white shadow-lg rounded-md p-5 sm:p-6 md:p-8 lg:p-10 text-black font-medium">
                            <div class="flex justify-end mb-4">
                                <a href="{{ route('faculty.index') }}"><button class="bg-blue-500 text-white px-4 py-2 rounded-md"><i class="fa-solid fa-arrow-left" style="color: #ffffff;"></i> Back to list</button></a>
                            </div>
                            <form action="{{ route('faculty.store') }}" method="POST" class="" enctype="multipart/form-data">
                            <x-caps-lock-detector />
                                @csrf

                                <div class="mb-4">
                                    <input type="file" name="faculty_photo" id="faculty_photo" class="hidden" accept="image/*" onchange="previewImage(event)">
                                    <label for="faculty_photo" class="cursor-pointer flex flex-col items-center">
                                        <div id="imagePreviewContainer" class="mb-2 text-center">
                                            <img id="imagePreview" src="{{ asset('assets/img/user.png') }}" class="rounded-lg w-48 h-auto">
                                        </div>
                                        <span class="text-sm text-gray-500">Select Photo</span>
                                    </label>
                                    <x-input-error :messages="$errors->get('faculty_photo')" class="mt-2" />
                                </div>

                                <div class="mb-4">
                                    <label for="faculty_fullname" class="block text-gray-700 text-md font-bold mb-2">Faculty Name:</label>
                                    <input type="text" name="faculty_fullname" id="faculty_fullname" value="{{ old('faculty_fullname') }}"  class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline @error('dean_fullname') is-invalid @enderror" required autofocus>
                                    <x-input-error :messages="$errors->get('faculty_fullname')" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <label for="email" class="block text-gray-700 text-md font-bold mb-2">Faculty Email:</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}"  class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline @error('email') is-invalid @enderror" required autofocus>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                                <div class="mb-4">
                                    <label for="faculty_password" class="block text-gray-700 text-md font-bold mb-2">Faculty Password:</label>
                                    <div class="relative">
                                        <input type="password" name="password" id="password" value="{{ old('password') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline @error('password') is-invalid @enderror" required autofocus>
                                        <button type="button" class="absolute inset-y-0 right-0 px-4 py-2 text-gray-500 focus:outline-none" id="togglePassword">
                                            <i class="far fa-eye"></i> <!-- Font Awesome eye icon -->
                                        </button>
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <label for="status" class="block text-gray-700 text-md font-bold mb-2">Status:</label>
                                    <select id="status" name="status" value="{{ old('status') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline @error('department_dean') is-invalid @enderror" required autocomplete="department_dean">
                                        <option value="" selected>Select Status</option>
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                                </div>
                                <div class="mt-4">
                                    <label for="department_id" class="block text-gray-700 text-md font-bold mb-2">Select Department:</label>
                                    <select id="department_id" name="department_id" value="{{ old('department_id') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-black leading-tight focus:outline-none focus:shadow-outline @error('department_id') is-invalid @enderror" required>
                                        <option value="" selected>Select Department</option>
                                        @foreach($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                        @endforeach
                                    </select>
                                    <small class="mt-2">
                                        <span class="text-red-500">Note:</span> Your selected department for the faculty won't be changed anymore.
                                    </small>
                                    <x-input-error :messages="$errors->get('department_id')" class="mt-2" />
                                </div>
                                <div class="flex mb-4 mt-5 justify-center">
                                    <button type="submit" class="w-80 bg-blue-500 text-white px-4 py-2 rounded-md">
                                        <i class="fa-solid fa-pen" style="color: #ffffff;"></i> Add Faculty
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

<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.src = reader.result;
            document.getElementById('imagePreviewContainer').style.display = 'block';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#togglePassword').click(function() {
            var passwordField = $('#password');
            var fieldType = passwordField.attr('type');
            
            if (fieldType === 'password') {
                passwordField.attr('type', 'text');
                $(this).find('i').removeClass('far fa-eye').addClass('far fa-eye-slash'); // Toggle to show password icon
            } else {
                passwordField.attr('type', 'password');
                $(this).find('i').removeClass('far fa-eye-slash').addClass('far fa-eye'); // Toggle to hide password icon
            }
        });
    });
</script>
