<?php

namespace App\Http\Controllers;

use App\Models\Recordings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecordingController extends Controller
{
    /* タイムライン：投稿全表示 */
    public function timeline(Recordings $recording)
    {
        $recording = Recordings::latest('updated_at');
        return view('recordings/timeline')->with(['recording' => $recording->get()]);
    }
    
    /* 検索 */
    public function search(Recordings $recording)
    {
        // 登録順にレコーディングテーブルからデータを取る
        $recording = Recordings::latest('updated_at');
        // joinの時にエラーを防ぐため，recordings.idをとらないようにする
        $recording->select('recordings.*')
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
        return view('search')->with(['recording' => $recording->paginate(8)]);//8投稿ごと
    }
    
    /* マイページ：ログインユーザの投稿全表示 */
    public function mypage(Recordings $recording)
    {
        $recording = Recordings::latest('updated_at');
        return view('mypage')->with(['recording' => $recording->get()]);
    }
    
    public function form()
    {
        return view('top');
    }
    
}
