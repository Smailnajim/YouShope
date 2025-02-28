<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>categoris</title>
</head>
<body>
    @foreach ($categoris as $categori)
    <div>
        {{ $categori->name }}
    </div>
    @endforeach
</body>
</html>