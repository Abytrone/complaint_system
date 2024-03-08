<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IssueFieldController extends Controller
{
    public function index()
    {
        return view('setups.issue-field.index');
    }
}
