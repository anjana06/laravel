<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
</head>
<body>

	<form  method="POST" action="/upload" enctype="multipart/form-data">
	@csrf
     Upload File:<input type="file" name="fname"><br>
     <input type="submit" name="send" value="upload">
    </form>
</body>
</html>