<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('titel')</title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
    <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.1.0" rel="stylesheet" />
    <style>
        .flip-card {
            perspective: 1000px;
        }
        .flip-card-inner {
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }
        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }
        .flip-card-front, .flip-card-back {
            backface-visibility: hidden;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .flip-card-back {
            transform: rotateY(180deg);
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex">
    <!-- Sidebar -->
    <div class="w-1/5 bg-white p-6" style="position: relative;">
        <div class="mb-8" style="position: fixed">
            <h1 class="text-2xl font-bold">
                YouShope
            </h1>
        </div>
        <nav class="mb-8" style="position: fixed; top: 10%;">
            <ul>
                <li class="mb-4">
                    <a class="flex items-center text-blue-600" href="/home">
                        <i class="fas fa-compass mr-2">
                        </i>
                        Home
                    </a>
                </li>
                <li class="mb-4">
                    <a class="relative" href="/panier">
                        <i class="fas fa-shopping-cart text-gray-600">
                        </i>
                        Paniy
                    </a>
                </li>
                
            </ul>
        </nav>
        <div class="mb-8" style="position: fixed; top: 23%;">
            <h3 class="text-gray-500 mb-4">
                Quick actions
            </h3>
            <ul>
                <li class="mb-4">
                    <a class="flex items-center text-gray-600" href="/produit/create">
                        <i class="fas fa-plus mr-2">
                        </i>
                        Create Produit
                    </a>
                </li>
                <li class="mb-4">
                    <a class="flex items-center text-gray-600" href="#">
                        <i class="fas fa-user-plus mr-2">
                        </i>
                        Add member
                    </a>
                </li>
            </ul>
        </div>
        <div style="position: fixed; top: 40%;">
            @if (!Auth::check())
                <a href="/login" class="btn"><i class="fa-solid fa-arrow-right-to-bracket"> </i>Login</a>
                <a href="/register" class="btn"><i class="fa-solid fa-registered"></i> Register</a>
            @else
                <a class="flex items-center text-gray-600" href="#">
                    <i class="fas fa-sign-out-alt mr-2">
                    </i>
                    Log out
                </a>
            @endif
        </div>
    </div>

    @yield('countent')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        methodForm = function(method){
            document.getElementById('formthode').value = method;
        }  
    </script>
</body>
</html>