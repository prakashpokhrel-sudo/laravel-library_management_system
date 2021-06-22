<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Models\BookIssue;
use Illuminate\Support\Facades\DB;


class BookRequestController extends Controller
{
      public function index()
    {
        $book=Book::latest()->get();
         return view('backend.bookrequest.index',compact('book'));
    }
    public function create()
    {
        return view('backend.bookrequest.create');
    }
     public function store(Request $request)
    {
     $db_flag = false;
    $cover_photo= $request->file('coverphoto')->store('public/book');
    $data = $request->all();
    
    
    $user_id = Auth::guard('admin')->id();
    
    $data['coverphoto'] = $cover_photo;
    $data['added_by']=$user_id;

    

     $book_title= Book::create($data);
     
     $newId = $book_title->id;
			
			if(!$book_title){
				$db_flag = true;
			} else {
				$number_of_issues = $data['quantity'];

				for($i=0; $i<$number_of_issues; $i++){

					$issues = BookIssue::create([
						'book_id'	=> $newId,
						'added_by'	=> $user_id
					]);

					if(!$issues){
						$db_flag = true;
					}
				}
			}

			if($db_flag)
				return'Invalid update data provided';

		// });

		return "Books Added successfully to Database";

    }

    public function bookrequestinactive($status){

DB::table('users')->where('id',$status)->update(['approved'=>0]);

return Redirect()->back();

}
public function bookrequestactive($status){

DB::table('users')->where('id',$status)->update(['approved'=>1]);

return Redirect()->back();

}
public function edit($id)
    {
        $bookedit=Book::findorFail($id);
        return view('backend.bookrequest.edit',compact('bookedit'));
    }

    public function update(Request $request,$id)
    {
         $ad = Book::find($id);
        $bookcategory = $ad->coverphoto;
        $data = $request->all();
        if($request->hasFile('coverphoto'))
        {
            $bookcategory= $request->file('coverphoto')->store('public/book');
        }
         $data['coverphoto'] = $bookcategory;
          $ad->update($data);
    
    }
    public function checkedit($id)
    {
        $bookcheckedit=Book::findorFail($id);
        return view('backend.bookrequest.checkedit',compact('bookcheckedit'));
    }
    
   public function checkupdate(Request $request,$id)
    {
         $ad = Book::find($id);
        $bookcategory = $ad->coverphoto;
        $data = $request->all();
        if($request->hasFile('coverphoto'))
        {
            $bookcategory= $request->file('coverphoto')->store('public/book');
        }
         $data['coverphoto'] = $bookcategory;
          $ad->update($data);
    
    }
    

}
