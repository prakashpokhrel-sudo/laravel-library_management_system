<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Book;
USE Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\BookIssue;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book=Book::latest()->get();



        for($i=0; $i<count($book); $i++){

	        $id = $book[$i]['book_id'];
	        $conditions = array(
	        	'book_id'			=> $id,
	        	'available_status'	=> 1
        	);

	        $book[$i]['total_books'] = BookIssue::select()
	        	->where('book_id','=',$id)
	        	->count();

	        $book[$i]['avaliable'] = BookIssue::select()
	        	->where($conditions)
	        	->count();
		}

     
        return view('backend.book.index',compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $db_flag = false;
    $cover_photo= $request->file('coverphoto')->store('public/book');
    $data = $request->all();
    $user_id =  Auth::guard('admin')->id();
    
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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookedit=Book::findorFail($id);
        return view('backend.book.edit',compact('bookedit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $row = Book::find($id);
       if(Storage::delete($row->coverphoto)){
           $row->delete();
       }
       return redirect()->back()->with('message','bookcategory deleted successfully');
    
    
    }
}
