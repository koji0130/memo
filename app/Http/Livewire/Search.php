<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use Auth;

class Search extends Component
{
    use WithPagination;
    public $search = '';

    public function render()
    {
        $id = Auth::user()->id;
        if( $this->search!="" ){
            $users = User::where('id', '<>' , $id)
            ->where('over_name','like','%' . $this->search. '%')
            ->orWhere('under_name','like','%' . $this->search. '%')
            ->orderBy('id','ASC')->paginate(10);

            return view('livewire.search',compact('users'));
        }else{
            $users = User::select('over_name','under_name','birth_day')
            ->where('id', '<>' , $id)
            ->orderBy('id','ASC')->paginate(10);
            return view('livewire.search',compact('users'));
        }
    }
}
