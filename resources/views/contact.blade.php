<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Product</title>
</head>
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
    .but2{
        float: right;
        padding: 12;
    }
</style>
<body>
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
                            <a class="navbar-brand" href="{{url('/')}}">WebSiteName</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{route('productPage')}}">Product</a></li>
                            <li><a href="{{route('aboutPage')}}">About Us</a></li>
                            <li class="active"><a href="{{route('contactPage')}}">Contact Us</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                        <form class="form-inline glyphicon" action="{{route('searchItems')}}" method="GET">
                            <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                            <li><a href="{{route('signupPage')}}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                            <li><a href="{{route('loginPage')}}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                        </ul>	
                    </div>
                </div>	
            </nav>
        </div>
    </div>

    <div style='text-align:center'>
    <h1>Please fill-up and provide us some feedback!!!</h1>
    </div>
    <div>
        <form class="forma was-validated" action="{{route('feedback')}}" method="POST">
            <div class="form-group">
                <label>Your Name:</label>
                <input type="text" class="form-control" name="name" palceholder="enter your name">
                @foreach($errors->get('name') as $message)
                    <div class="alert alert-warning" role="alert">
                    <strong> {{$message}}</strong> 
                   </div>
                @endforeach  
            </div>

            <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" name="email" palceholder="enter your email">
            @foreach($errors->get('email') as $message)
                <div class="alert alert-warning" role="alert">
                <strong> {{$message}}</strong> 
                </div>
            @endforeach  
            </div>

            <div class="form-group">
                <div class="form-check form-check-inline">
                    <label>Are you happy with our service:</label><br>
                    <input type="radio" name="feedback" value="Great"> Great<br>
                    <input type="radio" name="feedback" value="Not-Bad"> Not-Bad<br>
                    <input type="radio" name="feedback" value="Poor"> Poor
                    @foreach($errors->get('feedback') as $message)
                        <div class="alert alert-warning" role="alert">
                        <strong> {{$message}}</strong> 
                        </div>
                    @endforeach   
                </div>
            </div>

            <div class="form-group">
                <label>Message:</label>
                <textarea row="4" column="40" class="form-control" name="message" palceholder="enter your email">
                </textarea>
                @foreach($errors->get('message') as $message)
                    <div class="alert alert-warning" role="alert">
                    <strong> {{$message}}</strong> 
                    </div>
                @endforeach  
            </div>
            {{csrf_field()}}
            <button type="submit" class="btn btn-primary but2">Submit</button>
        </form>
    </div>
</body>
</html>