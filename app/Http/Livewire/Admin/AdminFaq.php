<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;



use App\Models\Faq;
use Auth;

class AdminFaq extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;


    public $question, $answer;

    public $e_question, $e_answer;

    public $question_id;


    public function storeQuestion()
    {
        $data = new Faq();

        $data->category = "faq";
        $data->question = $this->question;
        $data->answer = $this->answer;
        $data->author_id = Auth::id();

        $data->save();
        session()->flash('message','Question Stored Successfully.');
        $this->emit('storeSomething');
        // dd($data);


    }


    public function getQuestion($id)
    {
        $this->question_id = $id;
        $data = Faq::find($id);

        $this->e_question = $data->question;
        $this->e_answer = $data->answer;

    }

    public function updateQuestion()
    {
        $data = Faq::find($this->question_id);

        $data->question = $this->e_question;
        $data->answer = $this->e_answer;
        $data->author_id = Auth::id();

        $data->save();
        session()->flash('message','Question Updated Successfully.');
        $this->emit('storeSomething');

        // dd($data);
    }

    public function deleteID($id)
    {
        $this->question_id = $id;
    }

    public function delete()
    {
        Faq::find($this->question_id)->delete();

        session()->flash('message','Question Deleted Successfully.');
        $this->emit('storeSomething');
    }


    public function render()
    {
        $allFaqs = Faq::paginate($this->paginate);

        return view('livewire.admin.admin-faq', compact('allFaqs'))->layout('layouts.admin_base');
    }
}
