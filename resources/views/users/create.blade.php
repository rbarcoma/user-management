<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <label for="">Full Name: </label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Enter you Name" required>

            <label for="">Email: </label>
            <input type="email" name="email" id="name" value="{{ old('name') }}" placeholder="Enter you Name" required>

            <label for="">Phone Number: </label>
            <input type="text" name="phone_number" id="phone_number" value="{{ old('name') }}" placeholder="Enter you Name" required>

            <label for="">Password: </label>
            <input type="password" name="password" id="password" placeholder="Enter you Name" required>

            <label for="">Confirm Password: </label>
            <input type="password" name="password_confirmation" id="password" placeholder="Enter you Name" required>

            <input type="submit" value="Add new user">
        </form>

    </div>
</body>
</html>