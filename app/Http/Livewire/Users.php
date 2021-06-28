<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $modalShow=false;

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }

    public function addRecord()
    {
        $this->modalShow=true;
        $this->dispatchBrowserEvent('modal',['modal'=>'formModal', 'action'=>'show'] );
    }

    public function render()
    {
        $data = User::when($this->searchTerm, function($q){
            $q->where('name', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('email', 'like', '%'.$this->searchTerm.'%');
        })->paginate(10);
        return view('livewire.users', [
            'data'=>$data
        ]);
    }
}
