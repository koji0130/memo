<?php

namespace App\Http\Livewire;

use Livewire\Component;
//追加
use App\Models\Book;

class BookIndex extends Component
{
    public $liveModal = false;
    public $title;
    public $newimage;
    public $price;
    public $description;

    public function showBookModal()
    {
        $this->reset();
        $this->liveModal = true;
    }

    public function render()
    {
        return view('livewire.book-index');
    }
}
