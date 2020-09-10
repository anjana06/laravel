@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __(' My Dashboard') }} </div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            
                        </div>
                 
                    @endif

                    {{ __('Hello!! Your Dashboard!') }}
                    <table border="1" align="center">
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
                        <td><a href="delete/{{$d->id}}">Delete</a></td>
                    </tr>
                    @endforeach
                </table>
                <br>
                <a href="form" target="_blank" >ADD TASK</a>

                </div>
                
            </div>
        
            
        </div>
    </div>
</div>
@endsection
