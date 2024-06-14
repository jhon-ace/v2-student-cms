<x-system-layout>
<x-user-route-page-name :routeName="'dean.index'" />
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-neutral-300 text-black dark:text-white">
        <div class="h-full ml-14 mb-10 md:ml-48 ">
            <div class="max-w-full mx-auto  mt-10 sm:px-10 md:px-12 lg:px-10 xl:px-10 ">
                <div class="text-gray-700 ml-5 text-md">Admin / Manage Dean</div>
                    <div class="container mx-auto p-4">
                    
                            <livewire:dean-show-table />

                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-system-layout>


