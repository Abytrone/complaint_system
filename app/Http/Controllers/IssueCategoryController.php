<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IssueCategoryController extends Controller
{
    public function index()
    {
        return view('setups.issue-category.index');
    }
    
}
