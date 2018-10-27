<!DOCTYPE html>
<html>
<head>
	<title>Users</title>
</head>
<body>
	<h1>USERS</h1>
	@foreach($users as $user)
	<p>{{ $user->name }}</p>
	@endforeach
	<p></p>
</body>
</html>