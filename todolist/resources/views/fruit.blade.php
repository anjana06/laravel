<!DOCTYPE html>
<html>
<head>
	<title>Fruits View</title>
</head>
<body>
     <h1>In the Fruit View</h1>
     
     <?php
        foreach ($name as $x) {
        	echo $x;
        }
         
     ?>
     <br>
     @foreach($name as $x)
        <h3> {{ $x }}</h3>
     @endforeach
     
     

</body>
</html>