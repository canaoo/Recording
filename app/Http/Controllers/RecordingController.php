<?php

namespace App\Http\Controllers;

use App\Models\Recordings;
use Illuminate\Http\Request;

class RecordingController extends Controller
{
    
    public function timeline(Recordings $recording)
    {
        return view('recordings/timeline')->with(['recording' => $recording->get()]);
    }
    
    public function save(Request $request)
    {
        $request->validate([
           'name' => ['required'],
           'reording_file' => ['recording_file'],
           'stats' => ['stats'],
        ]);
        
    }
    
}
