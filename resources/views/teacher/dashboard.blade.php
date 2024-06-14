<x-faculty-layout>

    <x-slot name="title">
        {{ __('Instructor Dashboard') }}
    </x-slot>

<div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-slate-50 text-black dark:text-white">
    <div class="h-full mt-10 ml-14 mb-10 md:ml-48 ">
        <div class="max-w-full mx-auto  sm:px-10 md:px-12 lg:px-10 xl:px-10 ">
            <div class="text-gray-500 ml-5 text-md">Teacher / Dashboard</div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 p-4 gap-4">
                    <div class="bg-white shadow-lg rounded-md flex items-center justify-between p-10 border-b-4 border-gray-300 dark:border-gray-600 text-black font-medium group">
                        <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <i class="fa-sharp fa-solid fa-rectangle-list fa-flip-vertical fa-2xl" style="color: #24a0ff;"></i>
                        </div>
                        <div class="text-right">
                            <p class="text-4xl">12</p>
                            <p>Programs</p>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded-md flex items-center justify-between p-10 border-b-4 border-gray-300 dark:border-gray-600 text-black font-medium group">
                        <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <i class="fa-solid fa-building-user fa-2xl" style="color: #ee2f2f;"></i>
                        </div>
                        <div class="text-right">
                            <p class="text-4xl">6</p>
                            <p>Departments</p>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded-md flex items-center justify-between p-10 border-b-4 border-gray-300 dark:border-gray-600 text-black font-medium group">
                        <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <i class="fa-solid fa-folder-open fa-2xl" style="color: #00b825;"></i>
                        </div>
                        <div class="text-right">
                            <p class="text-4xl">12</p>
                            <p>Courses</p>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded-md flex items-center justify-between p-10 border-b-4 border-gray-300 dark:border-gray-600 text-black font-medium group">
                        <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <i class="fa-solid fa-user-group fa-2xl" style="color: #ef8915;"></i>
                        </div>
                        <div class="text-right">
                            <p class="text-4xl">34</p>
                            <p>Instructor</p>
                        </div>
                    </div>
                    <div class="bg-white shadow-lg rounded-md flex items-center justify-between p-10 border-b-4 border-gray-300 dark:border-gray-600 text-black font-medium group">
                        <div class="flex justify-center items-center w-14 h-14 bg-white rounded-full transition-all duration-300 transform group-hover:rotate-12">
                            <i class="fa-solid fa-user-group fa-2xl" style="color: #ef8915;"></i>
                        </div>
                        <div class="text-right">
                            <p class="text-4xl">1,856</p>
                            <p>Students</p>
                        </div>
                    </div>
                </div>
                <div class="container mx-auto mt-2 p-4">
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h2 class="text-2xl font-bold mb-4">Student Enrollees</h2>
                        <canvas id="enrolleesChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
</x-faculty-layout>
