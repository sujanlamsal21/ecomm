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

    .nav-position{
        position:fixed;
        width:100%;
        z-index:2;
    }

    .banner{
        max-width:100%;
        display:flex;
        flex-direction:column;
        margin-top:10px;
    }

    .banner img{
        height:500px;
        object-fit:cover;
        margin-top:50px;
    }
</style>
<body>
    <h1 style= 'text-align:center'>Hello Welcome Logged-in Users!!!</h1>
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
                            <li><a href="{{route('userInformationProfile')}}">View Profile</a></li>
                            <li class="active"><a href="{{route('userCartItem')}}">CartItems</a></li>
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


    <div class="container"style="margin-top:50px">
        <table class="table table-bordered table-hover">
        <caption><h1>Here are your cart items!!!</h1></caption>
        <thead>
            <tr>
            <th scope="col">S.N.</th>
            <th scope="col">Product Image</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Price</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                <td>{{$no++}}</td>
                <td><img src="/storage/imageFile/{{$item->productImage}}" height="50px" width="auto"></td>
                <td>{{$item->productName}}</td>
                <td>{{$item->productPrice}}</td>
                <td>
                <form action="{{route('deleteCartItems',['id'=>$item->cartId])}}" method="get">
                    <button type="submit" class="btn btn-danger">Remove Item</button></td>
                </form>
                </tr>
            @endforeach  
        </tbody>       
        <table> 
        <button type="submit" class="btn btn-success" style="float:right">Purchase</button>
    </div>       

</body>
</html>