<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Post</title>
    <!-- Include Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

    @include('layouts.navigation')
    <div class="container mt-5">
        <div class="row">
            @foreach($posts->sortByDesc('created_at') as $post)
            @if($post->published_by == Auth::user()->name)

                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            {{-- <p class="card-text">{{ $post->content }}</p> --}}
                            @if($post->image)
                                <img src="{{ asset($post->image) }}" alt="{{ $post->title }}" class="img-fluid mb-3 rounded" style="max-height: 200px; width: 100%; object-fit: cover;">
                            @endif
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="text-muted">Published by: {{ $post->published_by  }}</span>
                                <div class="btn-group">
                                    <a href="{{ route('posts.show1', ['id' => $post->id]) }}" class="btn btn-primary">View Post</a>
                                    <a href="{{ route('posts.edit', ['id' => $post->id]) }}" class="btn btn-warning">Edit Post</a>
                                    <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this post?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete Post</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            @endforeach
        </div>
    </div>
<!-- عرض التعليقات -->


<!-- نموذج إضافة تعليق -->


    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
