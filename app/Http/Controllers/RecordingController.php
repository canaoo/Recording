<?php

namespace App\Http\Controllers;

use App\Models\Recordings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordingController extends Controller
{
    
    public function timeline(Recordings $recording)
    {
        return view('recordings/timeline')->with(['recording' => $recording->get()]);
    }
    public function search(Recordings $recording)
    {
        $articles =  \DB::table('recordings')->latest('updated_at')->where(function ($query) {
            // 検索機能
            if ($search = request('search')) {
                
                $query  ->where('recording_name', 'LIKE', "%{$search}%")
                        ->orWhere('memo','LIKE',"%{$search}%")
                        ->orWhere(function ($hashtag) { 
                            $hashtag->join('hashtags','hashtags.hashtag_id','=','recordings.hashtag_id')
                                ->where('hashtags.hashtag','LIKE',"%{$search}%");
                        })->orWhere(function ($tag) {
                            $tag->join('tags','tags.tag_id','=','recordings.tag_id')
                                ->where('tags.tag','LIKE',"%{$search}%");
                        });
            }
            // 8投稿毎にページ移動
        })->paginate(8);
        return view('search')->with(['recording' => $recording->get()]);
    }
    
    public function form()
    {
        return view('top');
    }
    public function confirm(Request $request)
    {
        $this->validate($request, [
           'recording_name'  => 'required',
           'recording_file' => 'required',
        ]);
        
        $recording = new Recordings($request->all());
        return view('confirm', compact('recording'));
    }
    public function process(Request $request)
    {
        $action = $request->get('action', 'back');
        $input = $request->except('action');
        if($action == '保存する') {
            //送信処理などを実装
            $param = [
                'recording_name' => $request->input('name'),
                'recording_file' => $request->input('recording_file'),
            ];
            DB::table('recordings')->insert($param);
            
            return view('complete');
        } else {
            return redirect()->route('top')->withInput($input);
        }
    }
    
}
