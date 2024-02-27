<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Post</title>
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
            max-width: 800px;
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

        .card img {
            max-width: 100%;
            height: auto;
            border-radius: 15px;
            margin-top: 20px;
        }

        .comment-form {
            margin-top: 30px;
        }

        .comments-container {
            display: none; /* تبقي التعليقات مخفية ابتدائياً */
        }
    </style>
</head>
<body>

    @include('layouts.navigation')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1>{{ $post->title }}</h1>
            </div>
            <div class="card-body">
                @if($post->image)
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid mb-3">
                @endif
                <p>{{ $post->content }}</p>
            </div>
        </div>
    </div>
    
    <div class="container comment-form">
        <h2>Add a Comment</h2>
        <form method="post" action="{{ route('comments.store', $post) }}">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}" readonly required>

            </div>
            
            <div class="form-group">
                <label for="content">Content:</label>
                <textarea name="content" class="form-control" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </form>
    </div>
    {{-- <a href="{{ route('comments.showComments', ['postId' => $post->id]) }}">مشاهدة جميع التعليقات</a> --}}
<center>    <button type="submit" class="btn btn-primary">
    <a href="{{ route('comments.showComments', ['postId' => $post->id]) }}" style="color: #fff; text-decoration: none;">
        <p style="margin: 0;">مشاهدة جميع التعليقات</p>
    </a>
</button></center>
    
    <!-- Include Bootstrap JS and Popper.js -->
    <!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- Include Bootstrap Collapse library -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

</body>
</html>
