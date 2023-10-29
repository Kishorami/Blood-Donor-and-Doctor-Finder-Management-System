<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Content;

class BloodInfo extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $data = Content::where('content_type','More About Blood')->orderByDesc('created_at')->paginate(9);
        // dd($data);
        return view('livewire.blood-info', compact('data'))->layout('frontend.livewire_base');
    }
}
