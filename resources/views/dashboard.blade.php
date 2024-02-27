<x-app-layout>
    <x-slot name="header">
<center>
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('string.Home page') }}
    </h2>
</center>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 transform rotate-90 origin-top-right">
                <!-- Box 1 -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-right">
                    <h3 class="text-lg font-semibold mb-3">{{__('string.You can provide unique content')}}</h3>
                    <p class="text-gray-700 dark:text-gray-300"> {{__('string.We provide distinctive and unique content that meets your needs and enriches your knowledge.')}}</p>
                </div>
    
                <!-- Box 2 -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-right">
                    <h3 class="text-lg font-semibold mb-3"> {{__('string.Ease of use')}}</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{__('string.Easy to use experience and friendly user environment.')}}</p>
                </div>
    
                <!-- Box 3 -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-right">
                    <h3 class="text-lg font-semibold mb-3"> {{__('string.Interact with the community')}}</h3>
                    <p class="text-gray-700 dark:text-gray-300">{{__('string.Interact with the community through comments and social interaction.')}}</p>
                </div>
    
                <!-- Box 4 -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-right">
                    <h3 class="text-lg font-semibold mb-3"> {{__('string.Periodic updates')}}</h3>
                    <p class="text-gray-700 dark:text-gray-300"> {{__('string.Regular updates bring you the latest information and content.')}}</p>
                </div>
            </div>
        </div>
    </div>
    


</x-app-layout>
