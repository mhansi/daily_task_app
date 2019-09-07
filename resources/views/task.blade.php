<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
       <div class="text-center">
          <h1>Daily Tasks</h1>
          <div class="row">
            <div class="col-md-12">
            @foreach($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
              {{$error}}
            </div>
            @endforeach
              <form method="post" action="/saveTask">
                {{ csrf_field() }}
              <input type="text" class="form-control" name="task" placeholder="Please enter your task hear">
               <br/>
               <input type="submit" class="btn btn-primary" value="SAVE">
               <input type="button" class="btn btn-warning" value="CLEAR">
              </form>
               <br/>
               <table class="table table-dark">
              
                 <tr>
                   <th>ID</td>
                   <th>Tasks</th>
                   <th>Is completed</th>
                   <th>Action</th>
                 </tr>
                 @foreach($tasks as $task)
                 <tr>
                   <td>{{$task->id}}</td>
                   <td>{{$task->task}}</td>
                   <td>
                   @if($task->iscompleted)
                   <a href="/markasnotcompleted/{{$task->id}}" class="btn btn-success">Completed</a>
                   @else
                   <a href="/markascompleted/{{$task->id}}" class="btn btn-warning">Not Completed</a>
                   @endif
                   </td>
                   <td>
                   <a href="/delete/{{$task->id}}" class="btn btn-danger">Delete</a>
                   <a href="/update/{{$task->id}}" class="btn btn-primary">Update</a>
                   </td>
                 </tr>
                 @endforeach
               </table>
            </div>
          </div>
       </div>
    </div>
</body>
</html>