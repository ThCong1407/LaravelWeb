<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>

<body>
    <div class="container">
        <div class="nav">
            <a href="{{ route('login') }}">Home</a> |
            <a href="{{ route('login') }}">Log out</a>
        </div>
        <div class="list-box">
            <h2>List user</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th>{{ $user->id }}</th>
                        <th>{{ $user->name }}</th>
                        <th>{{ $user->email }}</th>
                        <th>
                            @foreach($user->roles as $role)
                                <a href="{{ route('user.role', ['id' => $role->id]) }}">
                                    {{ $role->name . '-' }}
                                </a>
                            @endforeach
                        </th>
                        <th>
                            <a href="{{ route('user.readUser', ['id' => $user->id]) }}">View</a> |
                            <a href="{{ route('user.updateUser', ['id' => $user->id]) }}">Edit</a> |
                            <a href="{{ route('user.deleteUser', ['id' => $user->id]) }}">Delete</a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
                {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
        <div class="footer">
        </div>
    </div>
</body>

</html>