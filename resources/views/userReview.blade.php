<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Review</title>
</head>
<style>
    body{
        background-color: #fff ;
    }

    .side{
        margin-top:30px;
        margin-left:30px;
    }

    .col-color{
        background-color:#CCCC99 ;
    }

    .text-spacing{
        padding: 5px;
        text-align:center;
    }

    .company-text{
        text-align:center;
    }

    .column-layout{
        max-width:1300px;
        margin:10px auto 0 -20px;
        line-height:1.65;
        padding:20px 50px;
        display:flex;
    }
    
    .nav-column{
        flex:1;
    }

    .contant-column{
        flex:3;
    }

    .text-style{
        color:#000000;
        border: 2px solid red;
        border-radius: 5px;
        text-align:center;
        font-style:oblique;
        border:1px solid red;
        font-size:20px;
        background-color:#0000FF;
    }

    .flex-item{
        display:flex; 
        flex-direction:column;
        align-items:center;
        justify-content:center;
    }
    
</style>
<body>

    <div class="container-flude side">
        <div class="row">
            <div class="col-md-2">
                <h2>HelloAdmin</h2>
            </div>
            <div class="col-md-8 company-text">
                <h1>Review Users</h1>
            </div>
        </div>    
    </div>

    <div class='column-layout'>
        <div class='nav-column'>
            <ul class="nav flex-column">
                <li class="nav-item text-spacing">
                    <a class="nav-link active" href="{{route('adminDashboard')}}">Dashboard</a>
                </li>
                <li class="nav-item text-spacing">
                    <a class="nav-link" href="{{route('addItemsPage')}}">Add Items</a>
                </li>
                <li class="nav-item text-spacing">
                    <a class="nav-link" href="{{route('addCategoryPage')}}">Add Category</a>
                </li>
                <li class="nav-item text-spacing">
                    <a class="nav-link" href="{{route('userReviewPage')}}">Review Users</a>
                </li>
                
                <li class="nav-item text-spacing">
                    <form action="{{route('logout')}}" method="GET">
                        <button type="submit" class="btn btn-danger">Log-out</button>
                    </form>  
                </li>
                
            </ul>    
        </div> 

        <div class='contant-column'>
            <div class='row text-spacing'>
                <div class='col-md-12 flex-item'>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">User Name</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Address</th>
                                <th scope="col">Contact Number</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->contactNumber}}</td>
                                <td>{{$user->role}}</td>
                                <td>
                                @if($user->role=='User')
                                <form action="{{route('deleteUsers',['id'=>$user->id])}}" method="GET">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>    
                </div> 
            </div>
        </div>  
    </div>      
</body>
</html>