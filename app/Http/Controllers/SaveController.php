<?php

namespace App\Http\Controllers;

use App\Http\Controllers\RecordingController;
use Illuminate\Http\Request;
use App\Models\Recordings;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Storage;

class SaveController extends Controller
{

    public function create(Request $request, Recordings $recording)
    {
        $form = $request->all();

        //s3アップロード開始
        $wav = $request->file('recording_file');
        // バケットの`myprefix`フォルダへアップロード
        $path = Storage::disk('s3')->putFile('myprefix', $wav, 'public');
        // アップロードした画像のフルパスを取得
        $recording->recording_file = Storage::disk('s3')->url($path);
        
        $recording->recording_name = $request->input('recording_name');
        
        $user_id = auth()->id();
        $recording->user_id = $user_id;
        $recording->hashtag_id = null;
        $recording->tag_id = null;
        $recording->status = 'private';

        $recording->save();

        return view('mypage')->with(['recording' => $recording->get()]);
    }
    
    /* recording_nameの編集 */
    public function edit(Request $request, Recordings $recording)
    {
        $name = $request->post('recording_name');
        $id = $request->post('recording_id');
        $memo = $request->post('memo');
        return view('mypage/update')->with(['name' => $name,'id' => $id, 'memo' => $memo]);
    }
    public function update(Request $request, Recordings $recording)
    {
        $recording = Recordings::find($request->post('recording_id'));
        $recording->fill($request->all())->save();/*memoが登録できない*/
        return view('mypage')->with(['recording' => $recording->get()]);
    }
    
    public function delete(Request $request, Recordings $recording)
    {
        $recording = Recordings::find($request->post('recording_id'));
        $recording->fill($request->all())->delete();
        return view('mypage/delete');
    }
}

