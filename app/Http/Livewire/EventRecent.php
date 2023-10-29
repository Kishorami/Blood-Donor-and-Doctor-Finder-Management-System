<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Content;

class EventRecent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $data_recent['recent_event'] = Content::where('content_type', 'Recent Events')->orderByDesc('created_at')->paginate(4);

        return view('livewire.event-recent',compact('data_recent'));
    }
}
