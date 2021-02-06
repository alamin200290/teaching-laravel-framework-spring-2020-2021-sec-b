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
            <td>NAME</td>
            <td>EMAIL</td>
            <td>PASSWORD</td>
        </tr>

        @for($i=0; $i < count($list); $i++)
        <tr>
            <td>{{ $list[$i]['id'] }}</td>
            <td>{{ $list[$i]['name'] }}</td>
            <td>{{ $list[$i]['email'] }}</td>
            <td>{{ $list[$i]['password'] }}</td>
        </tr>
        @endfor
    </table>
</body>
</html>
