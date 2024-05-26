<?php

namespace App\Livewire;

use Livewire\Component;

class Book extends Component
{

    public $selectedServices = [];

    public $flagService = true, $flagPickDateAndTime = false, $flagInformationClient = false, $flagSummary = false;


    public function render()
    {
        $service = [
            [
                'id' => 0,
                'category' => 'Gel-X',
                'name' => 'Gel-X Short',
                'price' => 75
            ],
            [
                'id' => 1,
                'category' => 'Gel-X',
                'name' => 'Gel-X Medium',
                'price' => 80
            ],
            [
                'id' => 2,
                'category' => 'Gel-X',
                'name' => 'Gel-X Fills',
                'price' => 85
            ],

        ];

        // dd($service);


        return view('livewire.book',compact('service'));
    }


    // Service Section
    public function addServies($idService,$nameService,$categoryService,$priceService){
        $this->selectedServices[] = [
            'id' => $idService,
            'category' => $categoryService,
            'name' => $nameService,
            'price' => $priceService
        ];


    }

    // ------------------------


    // Page Section

    public function next($currentStep)
    {
        $this->resetFlags();
        switch ($currentStep) {
            case 'service':
                $this->flagPickDateAndTime = true;
                break;
            case 'pickDateAndTime':
                $this->flagInformationClient = true;
                break;
            case 'informationClient':
                $this->flagSummary = true;
                break;
            case 'summary':
                // Process the final step
                break;
        }
    }

    public function back($currentStep)
    {
        $this->resetFlags();
        switch ($currentStep) {
            case 'pickDateAndTime':
                $this->flagService = true;
                break;
            case 'informationClient':
                $this->flagPickDateAndTime = true;
                break;
            case 'summary':
                $this->flagInformationClient = true;
                break;
        }
    }

    private function resetFlags()
    {
        $this->flagService = false;
        $this->flagPickDateAndTime = false;
        $this->flagInformationClient = false;
        $this->flagSummary = false;
    }

    // ------------------------
}
