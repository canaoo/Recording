<!DOCTYPE HTML>
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <form action="/recordings/mypage" method="post" enctype="multipart/form-data">
            <!-- アップロードフォームの作成 -->
            <input type="file" name="wav">
            {{ csrf_field() }}
            <input type="submit" value="アップロード">
        </form>
    </body>
</html>