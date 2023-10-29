<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Content;

class NewsDetails extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $news_id;

    public function mount($id)
    {
        $this->news_id = $id;
    }

    public function render()
    {
        $data['all_news'] = Content::where('content_type','News')->orderByDesc('created_at')->paginate(6);

        $data['read_more_detail'] = Content::find($this->news_id);

        return view('livewire.news-details', compact('data'))->layout('frontend.livewire_base');
    }
}
