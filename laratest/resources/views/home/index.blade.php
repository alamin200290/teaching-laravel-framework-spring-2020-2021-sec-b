<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome home! {{ $name }} </h1>
    <a href="/create">Create user</a> |
    <a href="/home/userlist">View user list</a> |
    <a href="/logout">logout</a>
    <br>
    {{$id}}

</body>
</html>
