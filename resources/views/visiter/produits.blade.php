<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>produits</title>
</head>
<body>
    @foreach ($produits as $produit)
    <div>
        {{$produit->name }}
    </div>
    @endforeach
</body>
</html>