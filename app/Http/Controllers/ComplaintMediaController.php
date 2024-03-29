<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\ComplaintMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use function Pest\Laravel\delete;

class ComplaintMediaController extends Controller
{
    public function index(Complaint $complaint)
    {
        return view('complaints.media.index', compact('complaint'));
    }

    public function create(Complaint $complaint)
    {
        return view('complaints.media.create', compact('complaint'));
    }

    public function destroy(Complaint $complaint, ComplaintMedia $medium)
    {

        try {
            Storage::delete(storage_path($medium->file_name));
        } catch (\Exception $e) {
        }
        $medium->delete();
        return 1;
    }

    public function table(Complaint $complaint)
    {

        return [
            'data' => ComplaintMedia::where('complaint_id', $complaint->issue_id)
                ->with('type')
                ->get()
        ];
    }
}
