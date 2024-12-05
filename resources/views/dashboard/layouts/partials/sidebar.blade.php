<div class="flex" x-data="{ isOpen: false }">
    <aside :class="isOpen ? 'w-64' : 'w-[20px]'"
        class="block md:hidden flex flex-col w-64 h-screen px-4 py-8 bg-white border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700 fixed z-20 ">
        @include('dashboard.layouts.partials.sidebartemplate')
    </aside>
    <aside
        class="hidden md:block flex flex-col w-64 h-screen px-4 py-8 bg-white border-r rtl:border-r-0 rtl:border-l dark:bg-gray-900 dark:border-gray-700 fixed z-20 ">
        @include('dashboard.layouts.partials.sidebartemplate')
    </aside>
</div>