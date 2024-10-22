<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Labor;
use App\Models\Service_order;
use Livewire\Attributes\Rule;



class LaborComponent extends Component
{

    public $service_order_id;
    public $hours_worked;
    public $hourly_rate;
    public $total_value;

    public function updated($propertyName)
    {
        if ($propertyName === 'hours_worked' || $propertyName === 'hourly_rate') {
            $this->total_value = $this->hours_worked * $this->hourly_rate;
        }
    }

    public function storeLabor()
    {
        $this->validate([
            'service_order_id' => 'required',
            'hours_worked' => 'required|numeric|min:0',
            'hourly_rate' => 'required|numeric|min:0',
        ]);

        Labor::create([
            'service_order_id' => $this->service_order_id,
            'hours_worked' => $this->hours_worked,
            'hourly_rate' => $this->hourly_rate,
            'total_value' => $this->total_value,
        ]);

        session()->flash('success', 'Mão de obra cadastrada com sucesso!');
        $this->reset();
    }


    public function render()
    {
        return view('livewire.labor', [
            'serviceOrders' => Service_order::all(),
        ]);
    }
}
