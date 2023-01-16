<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\FruitName;

class Fruit extends Component
{

    public $name;

    protected $rules = [
        'name' => 'max:6|required',
    ];

    protected $messages = [
        'name.max' => '6文字以内でよろしく',
        'name.required' => '入力必須だよ'
    ];

    public function updated($name)
    {
        $this->validateOnly($name);
    }

    public function render()
    {
        return view('livewire.fruit');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'max:6|required',
        ]);

        FruitName::create([
            "name" => $this->name,
        ]);

        session()->flash('message', '保存したよ');
    }
}
