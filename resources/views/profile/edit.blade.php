@php
    if (Auth::check() && Auth::user()->user_type === 'admin') {
@endphp
<x-system-layout>
    <x-user-route-page-name :routeName="'admin_profile.edit'" />
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-neutral-300 text-black dark:text-white">
        <div class="h-full  ml-14 mb-10 md:ml-48 ">
            <div class="max-w-full mx-auto  sm:px-10 md:px-12 lg:px-10 xl:px-10 ">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-system-layout>
@php
    } else if (Auth::check() && Auth::user()->user_type === 'instructor') {
@endphp
<x-system-layout>
    <x-user-route-page-name :routeName="'instructor_profile.edit'" />
        <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-slate-50 text-black dark:text-white">
        <div class="h-full  ml-14 mb-10 md:ml-48 ">
            <div class="max-w-full mx-auto  sm:px-10 md:px-12 lg:px-10 xl:px-10 ">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-system-layout>
@php
    } else {
@endphp
<x-system-layout>
    <x-user-route-page-name :routeName="'student_profile.edit'" />
        <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-slate-50 text-black dark:text-white">
        <div class="h-full  ml-14 mb-10 md:ml-48 ">
            <div class="max-w-full mx-auto  sm:px-10 md:px-12 lg:px-10 xl:px-10 ">
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </x-system-layout>
@php
    }
@endphp

