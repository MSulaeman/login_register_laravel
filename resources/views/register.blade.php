<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    <form method="POST" action="/register">
        @csrf
        <input type="text" name="name" placeholder="Nama"><br><br>
        <input type="email" name="email" placeholder="Email"><br><br>
        <input type="password" name="password" placeholder="Password"><br><br>
        <button type="submit">Register</button>
    </form>

    <a href="/login">Login</a>
</body>
</html>

