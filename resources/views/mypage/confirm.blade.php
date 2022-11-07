<!-- すべての投稿が編集できてしまう -->
@foreach($recording as $rc)
<form action="/recordings/update" method="post">
    @csrf
    {{ $rc->recording_name }}
    <br>
    <input type="submit" name="action" value="戻る">
    <input type="submit" name="action" value="保存する">
    
    
        <input type="hidden" name="recording" value="name">
    
</form>
@endforeach