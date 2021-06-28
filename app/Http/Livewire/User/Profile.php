<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $stage=[];
    public $photo;

    public function mount()
    {
        $this->stage = User::findOrFail(auth()->id())->toArray();
    }
    public function savePhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
        //dd($this->photo->hashName());
        // save Image
        User::where('id', auth()->id())->update(['image'=>$this->photo->hashName()]);

        $this->photo->store('profile',['disk'=>'public']);
    }

    public function render()
    {
        return view('livewire.user.profile');
    }
}
