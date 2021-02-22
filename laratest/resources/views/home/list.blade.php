<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User List</title>
</head>
<body>

    <h1>User list</h1>
    <a href="/home">Back</a> |
    <a href="/logout">logout</a>

    <br>

    <table border="1">
        <tr>
            <td>ID</td>
            <td>USERNAME</td>
            <td>PASSWORD</td>
            <td>TYPE</td>
            <td>Action</td>
        </tr>

        @for($i=0; $i < count($list); $i++)
        <tr>
            <td>{{ $list[$i]['userId'] }}</td>
            <td>{{ $list[$i]['username'] }}</td>
            <td>{{ $list[$i]['password'] }}</td>
            <td>{{ $list[$i]['type'] }}</td>
            <td>
                <a href="{{ route('home.edit', [$list[$i]['userId']]) }}">Edit</a> |
                <a href="/home/delete/{{ $list[$i]['userId'] }}">Delete</a> |
                <a href="/home/details/{{ $list[$i]['userId'] }}">Details</a>
            </td>
        </tr>
        @endfor
    </table>
</body>
</html>
