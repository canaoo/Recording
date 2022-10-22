@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="/confirm" method = "post">
    @csrf
    <form action="/recordings/confirm" method="post" style="display:inline">
    <input type="text" name="name">
    <input type="file" name="recording_file">
    <input type="submit" value="confirm">
</form>