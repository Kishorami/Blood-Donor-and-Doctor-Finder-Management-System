<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Content;

class UpcomingEvent extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $data2['upcoming_event'] = Content::where('content_type', 'Upcoming Event')->orderByDesc('created_at')->paginate(2);
        return view('livewire.upcoming-event',compact('data2'));
    }
}
