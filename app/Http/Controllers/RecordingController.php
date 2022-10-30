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
        
        $recording = Recordings::latest();
        // 登録順にレコーディングテーブルからデータを取る
        $recording->latest('updated_at')
                // joinの時にエラーを防ぐため，recordings.idをとらないようにする
                ->select('recordings.*')
                // hashtagsをjoinする
                //->join('hashtags', 'recordings.hashtag_id', '=', 'hashtags.hashtag_id')
                // tagsをjoinする
                //->join('tags','tags.tag_id','=','recordings.tag_id')
                // 検索する
                ->where(function ($query) {
                    // $searchを定義する
                    $search = request('search');
                    // 名前，メモ，ハッシュタグ，タグから検索する．
                    $query->where('recording_name', 'LIKE', "%" . $search . "%")
                        ->orWhere('memo','LIKE',"%" . $search . "%");
                        //->orWhere('hashtags.hashtag','LIKE',"%" . $search . "%")
                        //->orWhere('tags.tag','LIKE',"%" . $search . "%");
                });
                
        
        // paginateを最後に実行
        return view('search')->with(['recording' => $recording->paginate(8)]);
    }
    
    public function mypage(Recordings $recording)
    {
        return view('mypage')->with(['recording' => $recording->get()]);
    }
    
    public function form()
    {
        return view('top');
    }
    /*public function confirm(Request $request)
    {
        $this->validate($request, [
           'recording_name'  => 'required',
           'recording_file' => 'required',
        ]);
        
        $recording = new Recordings($request->all());
        return view('confirm', compact('recording'));
    }/*
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
    }*/
    
}
