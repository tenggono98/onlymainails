<div>
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}






    <div class="container p-4 mx-auto">



        <!-- Service Selection -->
        <div x-data="{ open: @entangle('flagService') }">
            <div x-show="open" x-transition>
                <div x-data="{ openCategory: null }" class="">

                    <h2 class="mb-4 text-xl font-bold">Select Service</h2>
                    <!-- Service selection form goes here -->

                    <div class="flex flex-col">
                        <label for="">Number Of People</label>
                        <select name="" id="">
                            @for ($i = 1;$i<99;$i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>

                    {{-- Category --}}
                    <div class="flex flex-col gap-4 mt-10 mb-2 lg:flex-row">
                        @foreach ($serviceCategory as $key => $cat)
                            <div x-on:click="openCategory = openCategory === {{ $key }} ? null : {{ $key }}"
                                :class="openCategory === {{ $key }} ? 'border-white bg-[#fadde1]' : 'border-[#fadde1]'"
                                class="flex-auto p-4 border rounded-lg hover:cursor-pointer hover:border-white hover:bg-[#fadde1]">
                                <h1>{{ $cat->name_service_categori}}</h1>
                            </div>
                        @endforeach
                    </div>
                    {{-- -------------- --}}

                    @foreach ($serviceCategory as $key => $cat)
                    {{-- Category Item --}}
                    <div x-bind:class="openCategory !== {{ $key }} ? 'hidden' : ''"
                        class="border rounded-lg border-[#fadde1] mb-10 mt-2">
                        @foreach ($cat->services as $serv)
                            <label for="{{ $cat->id }}-{{ $serv->id }}" >
                                <div class="flex justify-between p-2 hover:cursor-pointer hover:border-white hover:bg-[#fadde1]">
                                    <div>
                                        {{ $serv->name_service }}
                                    </div>
                                    <div class="flex items-center justify-center p-2">
                                        <div>
                                            @if($serv->is_merge == true)

                                            <input
                                            wire:click='toggleService({{ $serv->id }},"checkbox")'
                                                id="{{ $cat->id }}-{{ $serv->id }}"
                                                type="checkbox"
                                                class="w-42"
                                                @if(in_array($serv->id, array_column($selectedServices, 'id')))
                                                    checked
                                                @endif
                                            >
                                            @else
                                            <input
                                            wire:click='toggleService({{ $serv->id }},"radio")'
                                                id="{{ $cat->id }}-{{ $serv->id }}"
                                                name="{{ $cat->id }}"
                                                type="radio"
                                                class="w-42"
                                                @if(in_array($serv->id, array_column($selectedServices, 'id')))
                                                    checked
                                                @endif
                                            >

                                            @endif
                                        </div>
                                        <div class="flex items-center ml-2">
                                            <div>
                                                <p class="p-0 m-0 text-sm">${{ $serv->price_service }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </label>
                        @endforeach
                    </div>
                @endforeach

                    <button {{ (empty($selectedServices))? 'disabled':'' }} wire:click="next('service')" class="px-4 py-2 text-white  {{ (empty($selectedServices))? 'bg-gray-500':'bg-blue-500' }} rounded ">Next</button>
                </div>

            </div>
        </div>






        <!-- Date and Time Selection -->
        <div x-data="{ open: @entangle('flagPickDateAndTime') }">
            <div x-show="open" x-transition>
                <h2 class="mb-4 text-xl font-bold">Pick Date and Time</h2>
                <!-- Date and time selection form goes here -->
                <button wire:click="back('pickDateAndTime')"
                    class="px-4 py-2 mr-2 text-white bg-gray-500 rounded">Back</button>
                <button wire:click="next('pickDateAndTime')"
                    class="px-4 py-2 text-white bg-blue-500 rounded">Next</button>
            </div>
        </div>

        <!-- Client Information -->
        <div x-data="{ open: @entangle('flagInformationClient') }">
            <div x-show="open" x-transition>
                <h2 class="mb-4 text-xl font-bold">Client Information</h2>
                <!-- Client information form goes here -->
                <button wire:click="back('informationClient')"
                    class="px-4 py-2 mr-2 text-white bg-gray-500 rounded">Back</button>
                <button wire:click="next('informationClient')"
                    class="px-4 py-2 text-white bg-blue-500 rounded">Next</button>
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

    {{-- Info  --}}

    <div class="container p-4 mx-auto ">
        <h2 class="mb-4 text-xl font-bold">Service</h2>

        <div class="p-3 overflow-x-scroll border border-[#fadde1] rounded-lg">
            <table class="w-full ">
                <thead>
                    <th class="text-left">Name of Service</th>
                    <th class="text-left">Number of Person</th>
                    <th class="text-left">Price</th>
                    <th class="text-left">Total Price</th>
                </thead>
                <tbody class="w-full">
                    @foreach ($selectedServices as $key => $selected )
                    @php
                        $total_price += (int)$selected['price'] * (int)$selected['qty'];
                    @endphp
                    <tr class="gap-3 border-b ">
                        <td class="py-3">{{ $selected['category'] }} - {{ $selected['name'] }}</td>
                        <td class="py-3">
                            @if(in_array($selected['id'], array_column($selectedServices, 'id')))
                                @php
                                    $selectedServiceKey = array_search($selected['id'], array_column($selectedServices, 'id'));
                                @endphp
                                <div>
                                    <select name="" id="" wire:model.live="selectedServices.{{ $selectedServiceKey }}.qty">
                                        @for ($i = 1; $i < 99; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            @endif
                        </td>
                        <td class="py-3">${{ $selected['price'] }}</td>
                        <td class="py-3">${{ (int)$selected['price'] * (int)$selected['qty'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h1 class="mt-4">The required deposit is <span class="font-bold"> ${{ (int)$this->deposit->value }}</span>, which will be deducted from the total price.</h1>
        </div>

        <div class="flex flex-col gap-3 my-3 lg:flex-row ">
            <div class="border border-[#fadde1] p-3 rounded-lg">
                <h1 class="text-xl">Total Price (Before Deducted)</h1>
                <p class="text-4xl">$ {{ $total_price ?? 0 }}</p>
            </div>

            <div class="border border-[#fadde1] p-3 rounded-lg">
                <h1 class="text-xl">Total Payment (After Deducted)</h1>
                <p class="text-4xl">$ {{  ((int)$total_price > 0)?  (int)$total_price - (int)$this->deposit->value  : 0 }}</p>
            </div>

        </div>

    </div>
    {{-- Info --}}






</div>
