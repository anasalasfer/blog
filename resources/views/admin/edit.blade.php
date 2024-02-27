<!-- في ملف users/edit.blade.php -->

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

    <h1>{{__('string.edit_user')}}</h1>

    <form method="post" action="{{ route('admin.update', $user->id) }}">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">{{__('string.name')}}</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">{{__('string.role')}}</label>
            <input type="text" class="form-control" id="role" name="role" value="{{ $user->role }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{__('string.email')}}</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">{{__('string.password')}}</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">{{__('string.update')}}</button>
    </form>

