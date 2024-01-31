<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css','resources/js/app.js')
    <title>Document</title>
</head>
<body>
    <form  method="PUT" action="{{ route('sellerdashboard') }}">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" value="{{ $users->name }}">
        </div>
        <div>
            <label for="name">email:</label>
            <input type="text" name="email" value="{{ $users->email }}">
        </div>
        <div>
            <label for="name">Name:</label>
            <input type="text" name="phonenumber" value="{{ $users->phonenumber }}">
        </div>
        <button type="submit">Create Seller Account</button>
    </form>
</body>
</html>