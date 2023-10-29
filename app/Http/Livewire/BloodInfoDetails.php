<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Content;

class BloodInfoDetails extends Component
{
    public $info_id;

    public function mount($id)
    {
        $this->info_id = $id;
    }

    public function render()
    {
        $data['all_news']=Content::where('content_type','More About Blood')->inRandomOrder()
                ->limit(5)->get();

        $data['read_more_detail'] = Content::find($this->info_id);

        return view('livewire.blood-info-details', compact('data'))->layout('frontend.livewire_base');
    }
}
