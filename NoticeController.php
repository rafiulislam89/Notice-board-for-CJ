<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{


//    public function index()
//    {
//        $notices = Notice::all(); // Fetch all notices
//        $page_title = 'Notices'; // Define the page title
//        return view('notices.index', compact('notices', 'page_title')); // Pass it to the view
//    }

//    public function create()
//    {
//        // Define the status options
//        $statusOptions = [
//            'active' => 'Active',
//            'inactive' => 'Inactive'
//        ];
//
//        // Pass the variable to the view
//        return view('notices.create', compact('statusOptions'));
//    }



    public function create()
    {
        $page_title = "Create New Notice"; // Define your page title here
        return view('notices.create', compact('page_title'));
    }
    public function index()
    {
        $notices = Notice::all(); // Fetch all notices or however you're retrieving them
        $page_title = 'Notice Board'; // Define the page title

        return view('notices.index', compact('notices', 'page_title')); // Pass it to the view
    }


//
//    public function edit($id)
//    {
//        $notice = Notice::findOrFail($id);
//        $page_title = 'Edit Notice'; // Define the page title
//        return view('notices.edit', compact('notice', 'notice')); // Pass it to the view
//    }



    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:250',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'priority' => 'required|in:normal,important',
        ]);

        $notice = new Notice([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'status' => $validatedData['status'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'priority' => $validatedData['priority'],
            'company_id' => auth()->user()->company_id, // or set a default value
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id,
        ]);

        $notice->save();

        return redirect()->route('notices.index')->with('success', 'Notice created successfully!');
    }



}
