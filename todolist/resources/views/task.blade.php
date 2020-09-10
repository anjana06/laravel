<!DOCTYPE html>
<html>
<head>
	<title>Task</title>
</head>
<body>
             <!-- Error msg start-->
   <!-- If validation fails we need to show error messages to the user laravel has per-defined error messages for ech rule and those are stored in resources/lang/en/validation.php
   When a validation fails,the pre-defined eror message related to that rule is stored or flased in the session so they are availble everywhere (since they are in the session)
      
   All error messages in the laravel are stored in the instance or object $errors.
   
   $errors->all()=>

-->
      @if($errors->any())
      <ul>
         @foreach($errors->all() as $er)
         <li style="color:red">{{$er}}</li>
         @endforeach


      </ul>





      @endif



                 <!--Error msg end--->


	<form method="POST" action="/insert">
      @csrf
		<table>
   	            <tr>
   	            	<td>Title:</td>
   	            	<td>
   	            		<input type="text" name="title" placeholder="your Name">
   	            	</td>
   	            </tr>
   	            <tr>
   	            	<td>Details:</td>
   	            	<td>
   	            		<input type="text" name="detail" placeholder="your detail">
   	            	</td>
   	            </tr>
   	            <tr>
   	            	<td>Date:</td>
   	            	<td>
   	            		<input type="date" name="date">
   	            	</td>
   	            </tr>
                <!-- <tr>
                     <td>Conuntry:</td>           
                     <td>
                        <select name="country">
                          <!-- <option>select</option>do validation-->
                          <!-- <option value="india">India</option>
                           <option value="sri lanka">sri lanka</option>
                           <option value="america">America</option>

                        </select>
                     </td>
                  </tr>
                   <tr>
                     <td> Select Course:</td>
                     <td>
                        <input type="checkbox" name="c[]" value="HTML">HTML<br>
                        <input type="checkbox" name="c[]" value="CSS">CSS<br>
                        <input type="checkbox" name="c[]" value="JavaScript">JavaScript<br>
                        <input type="checkbox" name="c[]" value="PHP">PHP<br>
                        <input type="checkbox" name="c[]" value="Laravel">Laravel<br>
                     </td>
                  </tr>-->
                  <tr>
                     <td><input type="submit" name="send" value="send"></td>
                     
                  </tr>


        </table>
	</form>
   
</body>
</html>