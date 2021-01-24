<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>view user profile</title>
</head>
<style>
.text-style{
    text-align:center;
    color:#ff0000;
}

.text-style1{
    text-align:center;
    font-size:30px;
    color:#0000A0;
}

.text-style2{
    text-align:center;
    font-size:25px;
    color:#808080;
}
</style>
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
    <h1 class='text-style'>Here are your profile information!!!</h1>
    </div>
    <div>
    <h4 class='text-style'>You can change your information if you like to!!!</h4>
    </div>
    <div class='text-style1'>
        <b><p>Full Name:</p><p class="text-style2"><i>{{$userInfo->name}}</i></p>
        <p>Email:</p><p class="text-style2"><i>{{$userInfo->email}}</i></p>
        <p>Address:</p><p class="text-style2"><i>{{$userInfo->address}}</i></p>
        <p>Contact Number:</p><p class="text-style2"><i>{{$userInfo->contactNumber}}</i></p></b>
        <form action="{{route('editUserProfile')}}" method="GET">
            <button type="submit" class="btn btn-info">Edit Profile</button>
        </form>
    </div>
</body>
</html>