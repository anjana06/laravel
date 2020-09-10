<!DOCTYPE html>
<html>
<head>
	<title>Task</title>
</head>
<body>
             
      @if($errors->any())
      <ul>
         @foreach($errors->all() as $er)
         <li style="color:red">{{$er}}</li>
         @endforeach


      </ul>

      @endif
	<form method="POST" action="/update/{{$data->id}}">
      @csrf
		<table>
   	            <tr>
   	            	<td>Title:</td>
   	            	<td>
   	            		<input type="text" name="title" value="{{$data->title}}">
   	            	</td>
   	            </tr>
   	            <tr>
   	            	<td>Details:</td>
   	            	<td>
   	            		<input type="text" name="detail" value="{{$data->detail}}">
   	            	</td>
   	            </tr>
   	            <tr>
   	            	<td>Date:</td>
   	            	<td>
   	            		<input type="date" name="date" value="{{$data->date}}">
   	            	</td>
   	            </tr>
                  <tr>
                     <td><input type="submit" name="send" value="UPDATE"></td>
                     
                  </tr>


        </table>
	</form>
   
</body>
</html>