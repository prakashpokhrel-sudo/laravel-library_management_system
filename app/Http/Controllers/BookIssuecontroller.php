<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookIssue;
use App\Models\BookIssueLog;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BookIssuecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $logs = BookIssueLog::select('id','book_issue_id','user_id','issued_at')
			->where('return_time', '=', 10)
			->orderBy('issued_at', 'DESC');

			// dd($logs);
		
		$logs = $logs->get();

		for($i=0; $i<count($logs); $i++){
	        
	        $issue_id = $logs[$i]['book_issue_id'];
	        $student_id = $logs[$i]['user_id'];
	        
	        // to get the name of the book from book issue id
	        $issue = BookIssue::find($issue_id);
	        $book_id = $issue->book_id;
	        $book = Book::find($book_id);
			$logs[$i]['book_name'] = $book->title;

			// to get the name of the student from student id
			$student = User::find($student_id);
			$logs[$i]['name'] = $student->name;

			// change issue date and return date in human readable format
			$logs[$i]['issued_at'] = date('d-M', strtotime($logs[$i]['issued_at']));
			
			if ($issue->return_time ==10) {
				$logs[$i]['return_time'] =  '<p class="color:red">Pending</p>';
			}elseif($issue->return_time >10) 
			{
				$logs[$i]['return_time'] =  '<p class="color:red">Expire</p>';
			}
			else{
				$logs[$i]['return_time'] = date('d-M',  strtotime($logs[$i]['return_time']));
			}

		}

         return view('backend.bookissue.index',compact('logs'));
	}






    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.bookissue.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   {
         
		$data = $request->all();
		$bookID = $data['book_id'];
        $studentID = $data['user_id'];

		
		
		$student = User::find($studentID);
		
		if($student == NULL){
			return "Invalid Student ID";
		} else {
			$approved = $student->approved;
			
			if($approved == 0){

				return "Student still not approved by Admin Librarian";
				// throw new Exception('');
			} else {
				$books_issued = $student->books_issued;
				
				
				$max_allowed = User::firstOrFail()->max_allowed;
				
				if($books_issued >= $max_allowed){

					return 'Student cannot issue any more books';
				} else {

					$book = BookIssue::where('book_id', $bookID)->where('available_status', '!=', 0)->first();

					if($book == NULL){

						return 'Invalid Book Issue ID';

					} else {

						$book_availability = $book->available_status;
						// dd($book);
						if($book_availability != 1){
							return 'Book not available for issue';
						} else {

							// book is to be issued
							DB::transaction( function() use($bookID, $studentID) {
								$log = new BookIssueLog();

								$log->book_issue_id = $bookID;
								$log->user_id	= $studentID;
								$log->issue_by		= 1;
								$log->issued_at		= date('Y-m-d H:i');
								$log->return_time	= 10;

								$log->save();

								$book = BookIssue::where('book_id', $bookID)->where('available_status', '!=', 0)->first();
								// changing the availability status
								$book_issue_update = BookIssue::where('book_id', $bookID)->where('issue_id', $book->issue_id)->first();
								$book_issue_update->available_status = 0;
								$book_issue_update->save();

								// increasing number of books issed by student
								$student = User::find($studentID);
								$student->books_issued = $student->books_issued + 1;
								$student->save();
							});

							return 'Book Issued Successfully!';
						}
					}
				}
			}
		}
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
    public function edit( $id)
    {
        $issueID = BookIssue::findOrFail($id);
		return view('backend.bookissue.create',compact('issueID'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {     $data=$request->all();
         $issueID = $data['book_id'];
		 

		$conditions = array(
			'book_issue_id'	=> $issueID,
			'return_time'	=> 10
		);

		$log = BookIssueLog::where($conditions);

		if(!$log->count()){
			return 'Invalid Book ID entered or book already returned';
		} else {
		
			$log = BookIssueLog::where($conditions)->firstOrFail();


			$log_id = $log['id'];
			$student_id = $log['user_id'];
			$issue_id = $log['book_issue_id'];

        
			DB::transaction( function() use($log_id, $student_id, $issue_id) {
				// change log status by changing return time
				$log_change = BookIssueLog::find($log_id);
				$log_change->return_time = date('Y-m-d H:i');
				$log_change->save();

				// decrease student book issue counter
				$student = User::find($student_id);
				$student->books_issued = $student->books_issued - 1;
				$student->save();

				// change issue availability status
				$issue = BookIssue::find($issue_id);
				$issue->available_status = 1;
				$issue->save();
				
			});
         
			
            return 'Book Retun Successfully!';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
