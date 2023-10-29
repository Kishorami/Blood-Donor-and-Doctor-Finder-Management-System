<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Content;

class Events extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        // $data['upcoming_event'] = Content::where('content_type', 'Upcoming Event')->orderByDesc('created_at')->paginate(2);

        $data['recent_event'] = Content::where('content_type', 'Recent Events')->take(4)->skip(1)->orderByDesc('created_at')->get();

        $data['last_event'] = Content::where('content_type', 'Recent Events')->take(1)->orderByDesc('created_at')->first();
        // dd($data['upcoming_event']);

        return view('livewire.events', compact('data'))->layout('frontend.livewire_base');
    }
}
