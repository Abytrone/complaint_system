<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ProcessComplaintController extends Controller
{
    public function create(Complaint $complaint)
    {
        return view('complaints.process.create');
    }

    public function store(Request $request, Complaint $complaint,)
    {

    }
}
