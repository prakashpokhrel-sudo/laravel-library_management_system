<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookIssueLog extends Model
{
    use HasFactory;
    protected $fillable = array('book_issue_id', 'user_id', 'issue_by', 'issued_at', 'return_time');

    public $timestamps = false;

	protected $table = 'book_issue_logs';
	protected $primaryKey = 'id';

	protected $hidden = array();
}
