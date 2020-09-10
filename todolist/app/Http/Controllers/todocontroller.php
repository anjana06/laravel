<?php

namespace App\Http\Controllers;
use Illuminate\support\facades\storage;
use Illuminate\Http\Request;
use App\task;
use Illuminate\Support\Facades\Auth;

class todocontroller extends Controller
{
    public function index(Request $r)
    {
    	//return view('fruit',['name'=>'Mango']);
    	/* in view fruit.blade.php we can add {{$name}} or <?php echo $name; ?>*/
    	/*return view('fruit',['name'=>['Mango','Apple','Cheery','Jackfruit']]);*/
    	//grabbing the input given by the user
    	//echo"Form submit now in controller";
    	//to grab the input from a request we need to create the object of the request class
    	/*From the request class we use input() method to grab inputs from the request*/
    	//print_r($r->input());
        /* Valiadation in Laravel:
        Validation in the laravel is achieved with the help of validate() Method of Request class. In order to access the validate() method we need to creat the object for the Request class.
        $r->validate([],        []  );
                     array1    array2
        first parameter:
        $r->validate(['fieldname1'=>'rule1|rule2|rule3...|rulen',
        ]); 

        Array2: We can hav customize message.


        */
         /*$r->validate(['title'=>'required|email',
                        'detail'=>'required|alpha',
                        'date'=>'required',],
                        ['title.required'=>'cannot be blank',
                             'title.email'=>'Title must be in vaild email format'



         ]);*/        
         //create object of model(task) class
         $t=new task();
         $uid=Auth::id();
         $user = Auth::user();
         $uname= $user['email'];

         
        $t->uid=$uid;

        $t->uname=$uname;

        $t->title= $r->input('title');
    	
    	$t->detail= $r->input('detail');
    	
    	$t->date= $r->input('date');
    	
        $res= $t->save();//insert function
        if($res==1)
        {
            //echo"Record inserted Suceefully";
            return redirect('home');
        }
        else
        {
            echo"Failed to insert the record";
        }



    	/*echo $r->input('country');
    	echo "<br>";
    	//print_r( $r->input('c'));
    	$name=array();
    	$name=$r->input('c');
    	//print_r($name);
    	$n=count($name);
    	for($i=0;$i<$n;$i++)
    	{
    		echo $name[$i];
    		echo"<br>";
    	}*/


    }
    public function edit($rid)
    {
    	//return $rid;
    	/*
    	 Redirection syntax:
    	     return redirect('url')
    	*/
    	     //return redirect('form');
             //searching 
        $data=task::find($rid);
        //print_r($data);
        /*echo $data->title;
        echo"<br>";
        echo $data->detail;
        echo"<br>";
        echo $data->date;
        echo"<br>";*/
        return view('editform',compact("data"));


    }

    public function store(request $r)
    {
    	/* file ('filename') is the method in the Request class*//* in order the uploaded file we use store() method. uploaded files are stored in storage/app/public directory, sp while excutiong store we need to speicfy the directory name.

    	store('public')
    	Image name in lravel get converted into md5-hash when we store the file in storage/app/public directory using store() method.

    	*/
    	 //return $r->file('fname')->store('public');
    	 /* Storing the image with its original name
    	 1) get the original name of the file with the mwthod getClientOriginalName()
    	 2) To store with the file original name use storeAs('public',fileoriginalname);*/
    	 $oname=$r->file('fname')->getClientOriginalName();
    	  return $r->file('fname')->storeAs('public',$oname);
    	  /* If you want to display image on the browser stored in storage/app/public
    	  1) Get the path of the image from the storage directory.
    	  stoarge::url(filename);
    	  2) use the image tag to get image*/
    	  $url=storage::url($oname);
    	  return "<img src=".$url.">";
    	  /*upload files storage in stoarge app and when you want access file it storage in public folder */
    }
    public function display()
    {
        //to display the record from the table.
        /* to fetch the record from the database 
        $variable=modelname::all();*/

        //$data=task::all();

        //print_r($data);
       /* foreach ($data as $d) 
        {
            echo $d->title;
            echo "<br>";
            echo $d->detail;
            echo "<br>";
            echo $d->date;
            echo "<br>";

        }*/
        $uid=Auth::id();
        $user = Auth::user();
        $uname= $user['email'];
        // use where clause to fetch a particular record
        $data=task::where('uid','=',$uid)->get();
        return view('display',compact('data'));


    }
     public function delete($rid)
    {
        //return $rid;
        //searching 
         $t=task::find($rid);
        //delete
        $t->delete();
       return redirect('home');
                
        

    }
   

    public function updaterecord( Request $r,$rid)
    {
        /*echo $rid;
        echo "<br>";
        echo $r->input('title');
        echo "<br>";
        echo $r->input('detail');
        echo "<br>";
        echo $r->input('date');
        echo "<br>";*/
        //checking whether we are getting edited vlues in the controller
        $t=task::find($rid);
        $t->title= $r->input('title');
        
        $t->detail= $r->input('detail');
        
        $t->date= $r->input('date');
        
        $res= $t->save();//insert function
        if($res==1)
        {
            //echo"Record inserted Suceefully";
            return redirect('home');
        }
        else
        {
            echo"Failed to update the record";
        }


    }

}
