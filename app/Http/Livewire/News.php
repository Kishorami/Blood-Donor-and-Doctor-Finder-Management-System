<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Content;

class News extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function render()
    {
        // $data['all_news'] = Content::where('content_type','News')->orderByDesc('created_at')->paginate(6);
        $data['last_news'] = Content:: where('content_type', 'News')->take(1)->orderByDesc('created_at')->first();

        $data['recent_news'] = Content:: where('content_type', 'News')->take(4)->skip(1)->orderByDesc('created_at')->get();

        return view('livewire.news', compact('data'))->layout('frontend.livewire_base');
    }
}
