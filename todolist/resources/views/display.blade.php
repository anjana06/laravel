<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
    <form>
    <table border="1">
    	<tr>
    		<th>title</th>
    		<th>Detail</th>
    		<th>Date</th>
    		<th>Edit</th>
    		<th>Delete</th>
    	</tr>
        @foreach($data as $d)
        <tr>
        	<td>{{$d->title}}</td>
        	<td>{{$d->detail}}</td>
        	<td>{{$d->date}}</td> 
        	<td><a href="edit/{{$d->id}}">Edit</a></td>
        	<td><a href="Delete/{{$d->id}}">Delete</a></td>
        </tr>
        @endforeach
    </table>
</form>
</body>
</html>