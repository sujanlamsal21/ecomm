<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="{{ asset('js/custom.js')}}"></script>
        <title>Document</title>
        <style>
        .header{
          display:block;
        }
            .forma{
                width:50%;
                height:500;
                margin: 0 auto;
                margin-top:60px;
            }

            .search{
                width:35%;
                margin: 0 auto;
                margin-top:25px;
            }
            .but1{
                float: right;
                padding:12;
                margin-top:20px;
            }

            .but2{
                float: right;
                padding: 12;
            }
            .but3{
                float:right;
                padding:12;
                margin-top:20px;
                margin-right:-115px;
            }
        </style>
    </head>
    <body>
    <h1 style='text-align:center'>Hello Welcome Logged-in Users!!!</h1>
    <div class="header">
        <div class="navbar-div">
            <nav class="navbar navbar-inverse nav-margin nav-position">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>                        
                        </button>
                        <a class="navbar-brand" href="{{route('returnUserHomePage')}}">WebSiteName</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li><a href="{{route('returnUserHomePage')}}">Home</a></li>
                            <li><a href="{{route('userProductPage')}}">Product</a></li>
                            <li class="active"><a href="{{route('userInformationProfile')}}">View Profile</a></li>
                            <li><a href="{{route('userCartItem')}}">CartItems</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                        <form class="form-inline glyphicon" action="{{route('searchItems')}}" method="GET">
                          <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                        <li><a href="{{route('logout')}}"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                        </ul>	
                    </div>
                </div>	
            </nav>
        </div>
    </div>

        
    <div>    
      <form action="{{route('updateUserData',['id'=>$userInfo->id])}}" method="POST" class="forma was-validated">
        <div class="form-group">
          <label>Full Name:</label>
          <input type="text" class="form-control" name="newname" value="{{$userInfo->name}}">
          @foreach($errors->get('newname') as $message)
            <div class="alert alert-warning" role="alert">
            <strong> {{$message}}</strong> 
            /div>
          @endforeach  
        </div>
          
        <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" name="newemail" value="{{$userInfo->email}}">
            @foreach($errors->get('newemail') as $message)
                <div class="alert alert-warning" role="alert">
                <strong> {{$message}}</strong> 
                </div>
                @endforeach     
        </div>
        
        <div class="form-group">
            <label>Address:</label>
            <input type="text" class="form-control" name="newaddress" value="{{$userInfo->address}}">
            @foreach($errors->get('newaddress') as $message)
                <div class="alert alert-warning" role="alert">
                <strong> {{$message}}</strong> 
                </div>
                @endforeach  
        </div>

        <div class="form-group">
          <label>Contact Number:</label>
          <input type="text" class="form-control" name="newnumber" value="{{$userInfo->contactNumber}}">
          @foreach($errors->get('newnumber') as $message)
            <div class="alert alert-warning" role="alert">
            <strong> {{$message}}</strong> 
            </div>
          @endforeach  
        </div>        
        {{csrf_field()}}
        <button type="submit" class="btn btn-primary but2">Update Profile</button>
      </form>
      <br>
      <div class="but3">
        <a href="{{route('changePasswordPage')}}">Change Password</a>
      </div>
    </div>   
  </body>
</html>