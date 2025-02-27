<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>create</title>
</head>
<body>
    @csrf
    <form action="" method="post">
        <div class="mb-3">
            <label for="nameProduit" class="form-label">Name</label>
            <input type="text" class="form-control" id="nameProduit" placeholder="Produit name">
        </div>
        <div class="mb-3">
            <label for="prixProduit" class="form-label">Prix</label>
            <input type="number" class="form-control" id="prixProduit" placeholder="Produit prix">
        </div>
        <div class="mb-3">
            <label for="imageProduit" class="form-label">Image</label>
            <input type="text" class="form-control" id="imageProduit" placeholder="Produit image">
        </div>
        <div class="mb-3">
            <label for="descriptionProduit" class="form-label">Description</label>
            <textarea class="form-control" id="descriptionProduit" rows="3"></textarea>
        </div>

        <button type="submit">submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>