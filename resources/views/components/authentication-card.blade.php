<div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-gray-100 w-full">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-lg px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>