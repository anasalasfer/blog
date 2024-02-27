<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comments Page</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h3 {
            color: #333;
        }

        .comment {
            border-bottom: 1px solid #eee;
            padding: 10px;
            margin-bottom: 10px;
        }

        p {
            margin: 0;
            color: #555;
        }

        .delete-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        .add-comment-form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 3px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">

    <h3>Comments</h3>

    @forelse($post->comments as $comment)
        <div class="comment">
            <p>{{ $comment->content }}</p>
            <p>By: {{ $comment->name }}</p>

            <!-- زر حذف التعليق -->
            <form action="{{ route('comments.destroy', ['post' => $post, 'comment' => $comment]) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this comment?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">Delete Comment</button>
            </form>
        </div>
    @empty
        <p>No comments yet.</p>
    @endforelse

    <!-- نموذج إضافة تعليق -->
    <div class="add-comment-form">
        <h3>Add Comment</h3>
        <form action="{{ route('comments.store', ['post' => $post]) }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="content">Comment</label>
                <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </form>
    </div>
</div>

</body>
</html>
