<!-- START OF ADMIN NAVIGATION -->
@php
    if (Auth::check() && Auth::user()->user_type === 'admin') {
@endphp
<div class="fixed flex flex-col   left-0 w-14 hover:w-48 md:w-48 bg-white h-full text-white transition-all duration-300 border-none z-10 sidebar">
    <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
        <ul class="flex flex-col py-2 space-y-1 text-gray-800" >
            <a href="#">
                <img class="w-auto h-auto object-contain" src="{{ asset('assets/img/user.png') }}" alt="SCMS Logo">
            </a>
            <label class="relative flex flex-row justify-center items-center h-1 focus:outline-none   text-white-600 hover:text-white-800 border-l-4 border-transparent  pr-6 ">
                <span class=" text-sm tracking-wide truncate text-gray-800">{{ Auth::user()->name }}</span>
            </label>
            <label class="relative flex flex-row justify-center h-5 focus:outline-none   text-white-600 hover:text-white-800 border-l-4 border-transparent   ">
                <span class=" text-xs tracking-wide truncate text-black">{{ Auth::user()->email }}</span>
            </label>
            <div class="border-t"></div>
            <li>
            <a href="{{route('admin.dashboard')}}" class="relative flex flex-row items-center h-11 focus:outline-none  hover:bg-blue-800 dark:hover:bg-slate-700 text-slate-700 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-green-500 hover:text-white pr-6 {{ request()->routeIs('admin.dashboard') ? ' border-l-green-500 bg-slate-700 text-gray-700 dark:text-gray-200' : 'hover:bg-blue-800 dark:hover:bg-slate-700 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-green-500 hover:text-white' }}">
                <span class="inline-flex justify-center items-center ml-4">
                    <i class="fa-solid fa-gauge-high fa-lg" style="color: #fffff;"></i>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                </a>
            </li>
            <li class="px-5 hidden md:block">
                <div class="flex flex-row items-center h-8">
                <div class="text-sm font-light tracking-wide text-gray-500 uppercase">Manage</div>
                </div>
            </li>
            <li>
                <a  href="{{ route('department.index') }}"  
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-slate-700 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-green-500 hover:text-white pr-6
                        {{ request()->routeIs('department.index') || request()->routeIs('department.edit') || request()->routeIs('department.create') ? 'border-l-green-500 bg-slate-700 text-gray-700 dark:text-gray-200' : '' }}">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fa-sharp fa-solid fa-rectangle-list fa-flip-vertical fa-md" style="color: #fffff;"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Department</span>
                </a>
            </li>
            <li>
                <a  href="{{ route('dean.index') }}"  
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-slate-700 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-green-500 hover:text-white pr-6
                        {{ request()->routeIs('dean.index') || request()->routeIs('dean.edit') || request()->routeIs('dean.create') ? 'border-l-green-500 bg-slate-700 text-gray-700 dark:text-gray-200' : '' }}">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fa-sharp fa-solid fa-rectangle-list fa-flip-vertical fa-md" style="color: #fffff;"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Deans</span>
                </a>
            </li>
            <li>
                <a  href="{{ route('program.index') }}"  
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-slate-700 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-green-500 hover:text-white pr-6
                        {{ request()->routeIs('program.index') || request()->routeIs('program.edit') || request()->routeIs('program.create') ? 'border-l-green-500 bg-slate-700 text-gray-700 dark:text-gray-200' : '' }}">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fa-sharp fa-solid fa-rectangle-list fa-flip-vertical fa-md" style="color: #fffff;"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Programs</span>
                </a>
            </li>
            <li>
                <a  href="{{ route('course.index') }}"  
                    class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-slate-700 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-green-500 hover:text-white pr-6
                        {{ request()->routeIs('course.index') || request()->routeIs('course.edit') || request()->routeIs('course.create') ? 'border-l-green-500 bg-slate-700 text-gray-700 dark:text-gray-200' : '' }}">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fa-sharp fa-solid fa-rectangle-list fa-flip-vertical fa-md" style="color: #fffff;"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Course</span>
                </a>
            </li>
           <!--  -->
            <li>
                <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none  hover:bg-blue-800 dark:hover:bg-slate-700 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-green-500 hover:text-white pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                    <i class="fa-solid fa-user-group fa-md" style="color: #fffff;"></i>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Students</span>
                <!-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span> -->
                </a>
            </li>
            
            <li class="px-5 hidden md:block">
                <div class="flex flex-row items-center mt-5 h-8">
                <div class="text-sm font-light tracking-wide text-gray-500 uppercase">Tools</div>
                </div>
            </li>
            
            <li>
              <a href="{{ auth()->user()->user_type === 'admin' ? route('admin_profile.edit') : (auth()->user()->user_type === 'faculty' ? route('instructor_profile.edit') : route('profile.edit')) }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-slate-700 text-slate-700 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-green-500 hover:text-white pr-6 {{ request()->routeIs('admin_profile.edit') ? 'border-l-green-500 bg-slate-700 text-gray-700 dark:text-gray-200' : 'hover:bg-blue-800 dark:hover:bg-slate-700 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-green-500 hover:text-white' }}">
                    <span class="inline-flex justify-center items-center ml-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">{{ __('Profile') }}</span>
                </a>

            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" 
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-slate-700 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-green-500 hover:text-white pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">{{ __('Log Out') }}</span>
                    </a>
                </form>
            </li>
        </ul>
            <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs text-black">Copyright @2021</p>
    </div>
</div>
<!-- end of admin navigation -->

@php
    } else if (Auth::check() && Auth::user()->user_type === 'teacher') {
@endphp

<!-- START OF INSTRUCTOR NAVIGATION -->
<div class="fixed flex flex-col  left-0 w-14 hover:w-48 md:w-48 bg-white h-full text-white transition-all duration-300 border-none z-10 sidebar">
    <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
        <ul class="flex flex-col py-2 space-y-1 text-gray-800" >
            <a href="#">
                <img class="w-auto h-auto object-contain" src="{{ asset('assets/img/user.png') }}" alt="SCMS Logo">
            </a>
            <label class="relative flex flex-row justify-center items-center h-1 focus:outline-none   text-white-600 hover:text-white-800 border-l-4 border-transparent  pr-6 ">
                <span class=" text-sm tracking-wide truncate text-gray-800">{{ Auth::user()->name }}</span>
            </label>
            <label class="relative flex flex-row justify-center h-5 focus:outline-none   text-white-600 hover:text-white-800 border-l-4 border-transparent   ">
                <span class=" text-xs tracking-wide truncate text-black">{{ Auth::user()->email }}</span>
            </label>
            <div class="border-t"></div>
            <li>
            <a href="{{route('teacher.dashboard')}}" class="relative flex flex-row items-center h-11 focus:outline-none  hover:bg-blue-800 dark:hover:bg-slate-700 text-slate-700 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-green-500 hover:text-white pr-6 {{ request()->routeIs('teacher.dashboard') ? ' border-l-green-500 bg-slate-700 text-gray-700 dark:text-gray-200' : 'hover:bg-blue-800 dark:hover:bg-slate-700 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-green-500 hover:text-white' }}">
                <span class="inline-flex justify-center items-center ml-4">
                    <i class="fa-solid fa-gauge-high fa-lg" style="color: #fffff;"></i>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                </a>
            </li>
            <li class="px-5 hidden md:block">
                <div class="flex flex-row items-center h-8">
                <div class="text-sm font-light tracking-wide text-gray-500 uppercase">Manage</div>
                </div>
            </li>
            <li>
                <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none  hover:bg-blue-800 dark:hover:bg-slate-700 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-green-500 hover:text-white pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                <i class="fa-solid fa-folder-open fa-md" style="color: #fffff;"></i>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Courses</span>
                <!-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span> -->
                </a>
            </li>
            <li>
                <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none  hover:bg-blue-800 dark:hover:bg-slate-700 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-green-500 hover:text-white pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                <i class="fa-solid fa-user-group fa-md" style="color: #fffff;"></i>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Students</span>
                <!-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span> -->
                </a>
            </li>
            <li>
                <a href="#" class="relative flex flex-row items-center h-11 focus:outline-none  hover:bg-blue-800 dark:hover:bg-slate-700 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-green-500 hover:text-white pr-6">
                <span class="inline-flex justify-center items-center ml-4">
                    <i class="fa-solid fa-user-group fa-md" style="color: #fffff;"></i>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">Modules</span>
                <!-- <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-indigo-50 rounded-full">New</span> -->
                </a>
            </li>
            
            <li class="px-5 hidden md:block">
                <div class="flex flex-row items-center mt-5 h-8">
                <div class="text-sm font-light tracking-wide text-gray-500 uppercase">Tools</div>
                </div>
            </li>
            
            <li>
            <a href="{{ auth()->user()->isUserType('instructor') ? route('instructor_profile.edit') : '#' }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-slate-700 text-slate-700 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-green-500 hover:text-white pr-6 {{ request()->routeIs('instructor_profile.edit') ? ' border-l-green-500 bg-slate-700 text-gray-700 dark:text-gray-200' : 'hover:bg-blue-800 dark:hover:bg-slate-700 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-green-500 hover:text-white' }}">
                <span class="inline-flex justify-center items-center ml-4">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                </span>
                <span class="ml-2 text-sm tracking-wide truncate">{{ __('Profile') }}</span>
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" 
                        class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-slate-700 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-green-500 hover:text-white pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">{{ __('Log Out') }}</span>
                    </a>
                </form>
            </li>
        </ul>
            <p class="mb-14 px-5 py-3 hidden md:block text-center text-xs text-black">Copyright @2021</p>
    </div>
</div>
<!-- end of Instructor Navigation -->
@php
}
@endphp