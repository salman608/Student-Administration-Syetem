<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function addBook(){
      return view('admin.book.add_form');
    }

    public function listBook(){
     $user = \App\User::find(auth()->user()->id);
     $book=$user->books()->latest()->get();
     return view('admin.book.book_list',compact('book'));
    }

    public function storBook(Request $request){
      $this->validate($request,[
        'book_name' => 'required',
        'file' => 'required',
      ]);
      $book=new Book();
      $book->user_id = request()->user()->id;
      if($request->file('file')){
        $file=$request->file('file');
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('storage/book/',$filename);
        $book->file=$filename;
      }
      $book->book_name=$request->book_name;
      $book->save();
      return redirect()->route('list-book');
    }

    public function deleteBook($id){
      $book=Book::find($id)->delete();
      return back();
    }


    public function downloadFile($file){
      return response()->download('storage/book/'.$file);
    }

    public function studentBookList(){
      $book=Book::latest()->get();
      return view('admin.book.student_book_list',compact('book'));
    }
}
