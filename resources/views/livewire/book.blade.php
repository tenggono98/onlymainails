<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}




    <div class="container p-4 mx-auto">


        
        <!-- Service Selection -->
        <div x-data="{ open: @entangle('flagService') }">
            <div x-show="open" x-transition>
                <h2 class="mb-4 text-xl font-bold">Select Service</h2>
                <!-- Service selection form goes here -->
                <button wire:click="next('service')" class="px-4 py-2 text-white bg-blue-500 rounded">Next</button>
            </div>
        </div>






        <!-- Date and Time Selection -->
        <div x-data="{ open: @entangle('flagPickDateAndTime') }">
            <div x-show="open" x-transition>
                <h2 class="mb-4 text-xl font-bold">Pick Date and Time</h2>
                <!-- Date and time selection form goes here -->
                <button wire:click="back('pickDateAndTime')" class="px-4 py-2 mr-2 text-white bg-gray-500 rounded">Back</button>
                <button wire:click="next('pickDateAndTime')" class="px-4 py-2 text-white bg-blue-500 rounded">Next</button>
            </div>
        </div>

        <!-- Client Information -->
        <div x-data="{ open: @entangle('flagInformationClient') }">
            <div x-show="open" x-transition>
                <h2 class="mb-4 text-xl font-bold">Client Information</h2>
                <!-- Client information form goes here -->
                <button wire:click="back('informationClient')" class="px-4 py-2 mr-2 text-white bg-gray-500 rounded">Back</button>
                <button wire:click="next('informationClient')" class="px-4 py-2 text-white bg-blue-500 rounded">Next</button>
            </div>
        </div>

        <!-- Summary -->
        <div x-data="{ open: @entangle('flagSummary') }">
            <div x-show="open" x-transition>
                <h2 class="mb-4 text-xl font-bold">Summary</h2>
                <!-- Summary of all selections goes here -->
                <button wire:click="back('summary')" class="px-4 py-2 mr-2 text-white bg-gray-500 rounded">Back</button>
                <button wire:click="next('summary')" class="px-4 py-2 text-white bg-green-500 rounded">Submit</button>
            </div>
        </div>
    </div>






</div>
