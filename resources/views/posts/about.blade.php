<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anas Alasfar - Web Developer</title>
    <!-- Include Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 15px 15px 0 0;
            text-align: center;
        }

        .card-body {
            text-align: center;
            
        }
        .img{
          
            text-align: center;
            width: 300px;
        }


        .contact-info {
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }

        .contact-info li {
            margin-bottom: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    @include('layouts.navigation')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h2>{{ __('string.Anas Alasfar') }}</h2>
                <p>{{ __('string.Web Developer') }}</p>
            </div>
            <div class="card-body">
<center>
    <div class="img">
        <img src="{{ asset('images/image.jpg') }}" alt="Anas Alasfar" class="img-fluid rounded-circle mb-3">
    
    </div>
</center>
                <ul class="contact-info">
                    <li><strong>{{ __('string.phon') }}:</strong> +31 6 37239106</li>
                    <li><strong>{{ __('string.email') }}:</strong> anasabohaza@gmail.com</li>
                </ul>
                <a href="#" class="btn btn-primary">Portfolio</a>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
