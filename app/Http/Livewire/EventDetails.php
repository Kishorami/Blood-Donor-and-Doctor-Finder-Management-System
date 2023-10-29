<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Content;

class EventDetails extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $event_id;

    public function mount($id)
    {
        $this->event_id = $id;
    }

    public function render()
    {
        // $data['recent_event'] = Content::where('content_type', 'Recent Events')->orderByDesc('created_at')->paginate(1);
        $event = Content::find($this->event_id);

        return view('livewire.event-details', compact('event'))->layout('frontend.livewire_base');
    }
}
