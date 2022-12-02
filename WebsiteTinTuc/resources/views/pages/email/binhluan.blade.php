<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bình luận</title>
</head>
<body>
    <h3>{{$data['hoten'] }} đã bình luận về bài viết của bạn</h3>
    <b><p>Tin tức: {{ $data['tentintuc'] }}</p></b>
    <p>Nội dung: </p>
    <p>{{ $data['noidung'] }}</p>
</body>
</html>