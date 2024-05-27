<?php

namespace App\Livewire;

use App\Models\MService;
use App\Models\MServiceCategory;
use Livewire\Component;

class Book extends Component
{

    public $selectedServices = [];

    public $flagService = true, $flagPickDateAndTime = false, $flagInformationClient = false, $flagSummary = false;


    public function render()
    {
        $serviceCategory = MServiceCategory::with('services')->where('status',true)->get();

        // dd($serviceCategory);

        // $service = MService::where('status',true)->orderBy('name_service')->get();

        // dd($service);


        return view('livewire.book',compact('serviceCategory'));
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
