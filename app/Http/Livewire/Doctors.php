<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Doctor;
use Livewire\WithPagination;

class Doctors extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $searchTerm;

    public function updatedSearchTerm()
    {
        $this->resetPage();
    }
    public function render()
    {
        $data = Doctor::when($this->searchTerm, function($q){
            $q->where('practice_number', 'like', '%'.$this->searchTerm.'%')
                ->orWhere('practice_name', 'like', '%'.$this->searchTerm.'%');
        })
            ->paginate(10);
        return view('livewire.doctors',
    ['data'=>$data]);
    }
}
