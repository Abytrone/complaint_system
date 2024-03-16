<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Status;

class ComplaintController extends Controller
{
    public function index()
    {
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->where('status_id', Status::IS_NEW)
            ->get();
        return view('complaints.index', [
            'complaints' => $complaints,
            'title' => 'New Complaints',
            'hasNew' => true,
            'hasActions' => true
        ]);
    }

    public function submitted()
    {
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->where('status_id', Status::IS_SUBMITTED)
            ->get();
        return view('complaints.index', [
            'complaints' => $complaints,
            'title' => 'Submitted Complaints',
        ]);
    }

    public function received()
    {
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->where('status_id', Status::IS_RECEIVED)
            ->get();
        return view('complaints.index', [
            'complaints' => $complaints,
            'title' => 'Received Complaints',
        ]);
    }

    public function processed()
    {
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->where('status_id', Status::IS_PROCESSED)
            ->get();
        return view('complaints.index', [
            'complaints' => $complaints,
            'title' => 'Processed Complaints',
        ]);
    }

    public function resolved()
    {
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->where('status_id', Status::IS_RESOLVED)
            ->get();
        return view('complaints.index', [
            'complaints' => $complaints,
            'title' => 'Resolved Complaints',
        ]);
    }

    public function closed()
    {
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->where('status_id', Status::IS_CLOSED)
            ->get();
        return view('complaints.index', [
            'complaints' => $complaints,
            'title' => 'Closed Complaints',
        ]);
    }

    public function reopened()
    {
//        todo: add filter to get only the complaints created by current user
        $complaints = Complaint::with(['category', 'subcategory', 'status'])
            ->where('status_id', Status::IS_REOPENED)
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
