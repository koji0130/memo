<?php

namespace App\Http\Livewire;

use Livewire\Component;
//追加
use App\Models\Book;
//ファイルをアップロードするための追加
use Livewire\WithFileUploads;
//ページネートするための追加
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class BookIndex extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $liveModal = false;
    public $title;
    public $newImage;
    public $price;
    public $description;
    public $Id;
    public $oldImage;
    public $editWork = false;
    public $search = '';

    public function showBookModal()
    {
        $this->reset();
        $this->liveModal = true;
    }

    public function bookPost()
    {
        $this->validate([
            'title' => 'required',
            'newImage' => 'image|max:2048',
            'price' => 'required|integer',
            'description' => 'required',
        ]);
        $image = $this->newImage->store('public/books');
        Book::create([
            'title' => $this->title,
            'image'=> $image,
            'price' => $this->price,
            'description' => $this->description,
        ]);
        $this->reset();
    }

    public function showEditBookModal($id)
    {
        $book = Book::findOrFail($id);
        $this->Id = $book->id;
        $this->title = $book->title;
        $this->oldImage = $book->image;
        $this->price = $book->price;
        $this->description = $book->description;
        $this->editWork = true;
        $this->liveModal = true;
    }

    public function updateBook($Id)
    {
        $this->validate([
            'title' => 'required',
            'price' => 'required|integer',
            'description' => 'required',
        ]);
        if($this->newImage){
            $image = $this->newImage->store('public/books');
            Book::where('id', $Id)->update([
                'title' => $this->title,
                'image' => $image,
                'price' => $this->price,
                'description' => $this->description,
            ]);
        }else{
            Book::where('id', $Id)->update([
                'title' => $this->title,
                'price' => $this->price,
                'description' =>$this->description,
            ]);
        }
        session()->flash('message','更新しました！');
        $this->reset();
    }

    public function deleteBook($id)
    {
        $book = Book::findOrFail($id);
        Storage::delete($book->image);
        $book->delete();
        session()->flash('message','削除しました！');
        $this->reset();
    }

    public function render()
    {
        // return view('livewire.book-index',[
        //     'books' => Book::select('id','title','price','image','description')
        //     ->orderBy('id','DESC')->paginate(3),
        // ]);
        if( $this->search!="" ){
            // return view('livewire.book-index',[
            //     'books' => Book::where('title','like','%' .$this->search. '%')
            //     ->orderBy('id','ASC')->paginate(3),
            // ]);
            $books = Book::where('title','like','%' . $this->search. '%')
            ->orderBy('id','ASC')->paginate(3);

            return view('livewire.book-index',compact('books'));
        }else{
            // return view('livewire.book-index',[
            //     'books' => Book::select('id','title','price','image','description')
            //     ->orderBy('id','ASC')->paginate(3),
            //     ]);
            $books = Book::select('id','title','price','image','description')
            ->orderBy('id','ASC')->paginate(3);
            return view('livewire.book-index',compact('books'));
        }
    }
}
