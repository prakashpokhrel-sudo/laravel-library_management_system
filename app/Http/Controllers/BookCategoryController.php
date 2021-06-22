<?php

namespace App\Http\Controllers;

use App\Models\Book_Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookcategory=Book_Category::latest()->get();
         return view('backend.bookcategory.index',compact('bookcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.bookcategory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $cover_photo= $request->file('coverphoto')->store('public/bookcategory');
    $data = $request->all();
    $data['coverphoto'] =  $cover_photo;

     Book_Category::create($data);
     return redirect()->back();
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
        $bookcategory =Book_Category::find($id);
       return view('backend.bookcategory.edit',compact('bookcategory'));
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
         $ad = Book_Category::find($id);
        $bookcategory = $ad->coverphoto;
        $data = $request->all();
        if($request->hasFile('coverphoto'))
        {
            $bookcategory= $request->file('coverphoto')->store('public/bookcategory');
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
         $row = Book_Category::find($id);
       if(Storage::delete($row->coverphoto)){
           $row->delete();
       }
       return redirect()->back()->with('message','bookcategory deleted successfully');
    
    }
}
