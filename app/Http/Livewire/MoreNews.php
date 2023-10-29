<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Content;

class MoreNews extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        $data2['all_news'] = Content::where('content_type','News')->orderByDesc('created_at')->paginate(6);
        return view('livewire.more-news', compact('data2'));
    }
}
