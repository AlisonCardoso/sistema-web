<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\RegionalCommand;
use App\Models\SubCommand;
use App\Models\Company;


class CreateCompany extends Component


{
    public $regional_command;
    public $regional_commandId;
    public $sub_commandId;
    public $sub_commands;
    public $sub_command ;
    public $companies;
   
    public function mount()
    { 
      //  $this->regional_command = $regional_command; 
      $this->regional_command =RegionalCommand::all();
     
      $this->sub_commands = collect();
    } 
    
    public function filterSubCommandById()
    { 
        //dd($this->regional_command);
       $this->sub_commands = $this->regional_command->find($this->regional_commandId)->sub_command; 
    }

    
    

    public function render()
    {
        return view('livewire.create-company');
    }
}
