<?php

namespace App\Http\Livewire\Admin;

use App\Libraries\Whatsapp;
use Livewire\Component;

class WhatsappSend extends Component
{
    public $templates;


    public function getTemplatesProperty(){
        $wp = new Whatsapp();
        $templates = $wp->loadTemplates();

        if ($templates) {    
                   
            $this->templates = $templates;
           }
    }
    public function render()
    {
        return view('livewire.admin.whatsapp-send')->layout('layouts.whatsapp-app');
    }
}
