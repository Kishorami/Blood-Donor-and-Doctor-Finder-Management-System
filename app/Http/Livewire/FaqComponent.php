<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Faq;

class FaqComponent extends Component
{
    public function render()
    {

        $faqs = Faq::all();

        return view('livewire.faq-component',compact('faqs'))->layout('frontend.livewire_base');
    }
}
