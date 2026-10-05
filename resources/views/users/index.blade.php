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
        <div class="col-sm-6">
            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">Add new users</a>
        </div>
        <table class="table table-hover">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone Number</td>
                <td>Action</td>
            </tr>
        </table>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->name}}</td>
                    <td>{{ $user->email}}</td>
                    <td>{{ $user->phone_number}}</td>
                    <td>
                        <a href="">Edit</a>
                        <a href="">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">
                        There are no records to display at this moment.
                    </td>
                </tr>
            @endforelse
        </tbody>
        
    </div>
</body>
</html>