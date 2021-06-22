<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book_Category;
use App\Models\BookRack;

class Book extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'author', 'quantity', 'price','code_no','coverphoto','bookcategory_id','isbn_no','rack_id','edition_no','edition_date','publisher','published_date','notes','added_by','book_status'];


     public function bookcategory()
    {
        return $this->hasMany(Book_Category::class);
    }
     public function bookrack()
    {
        return $this->hasOne(BookRack::class);
    }
     public function issues()
    {
        return $this::count();
    }
}
