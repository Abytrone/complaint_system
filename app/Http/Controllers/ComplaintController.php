<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Status;

class ComplaintController extends Controller
{


    public function index()
    {
        session()->put('complaint-url', request()->url());
        session()->put('side-bar-index', 1);
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->where('status_id', Status::IS_NEW)
            ->where('created_by', auth()->id())
            ->get();
        return view('complaints.index', [
            'complaints' => $complaints,
            'title' => 'New Complaints',
        ]);
    }

    public function submitted()
    {
        session()->put('complaint-url', request()->url());
        session()->put('side-bar-index', 2);
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->where('status_id', Status::IS_SUBMITTED)
            ->get();
        return view('complaints.index', [
            'complaints' => $complaints,
            'title' => 'Submitted Complaints',
        ]);
    }


    public function processed()
    {
        session()->put('side-bar-index', 3);
        session()->put('complaint-url', request()->url());
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->whereIn('status_id', [Status::IS_PROCESSED, Status::IS_REOPENED])
            ->get();
        return view('complaints.index', [
            'complaints' => $complaints,
            'title' => 'Processed Complaints',
        ]);
    }

    public function resolved()
    {
        session()->put('side-bar-index', 4);
        session()->put('complaint-url', request()->url());
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->where('status_id', Status::IS_RESOLVED)
            ->get();
        return view('complaints.index', [
            'complaints' => $complaints,
            'title' => 'Resolved Complaints',
        ]);
    }



    public function reopen()
    {
        session()->put('side-bar-index', 6);
        session()->put('complaint-url', request()->url());
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->where('status_id', Status::IS_CLOSED)
            ->get();
        return view('complaints.index', [
            'complaints' => $complaints,
            'title' => 'Reopened Complaints',
        ]);
    }


    public function create()
    {
        return view('complaints.create');
    }


    public function show(Complaint $complaint)
    {
        return view('complaints.show', compact('complaint'));
    }

    public function edit(Complaint $complaint)
    {
        return view('complaints.edit', compact('complaint'));
    }

    public function destroy($id)
    {
        $com = Complaint::query()->find($id);
        $com->delete();

        return to_route('complaints.index')->with('message', 'Record Deleted Successfully');
    }


}
