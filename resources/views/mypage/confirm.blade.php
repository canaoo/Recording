<form action="/recordings/process" method="post">
    @csrf
    {{ $recording->recording_name }}
    <br>
    <input type="submit" name="action" value="戻る">
    <input type="submit" name="action" value="保存する">
    
    @foreach($recording->getAttributes() as $key => $value)
        <input type="hidden" name="{{$key}}" value="{{$value}}">
    @endforeach
</form>