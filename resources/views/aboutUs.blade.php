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
                            <li class="active"><a href="{{route('aboutPage')}}">About Us</a></li>
                            <li><a href="{{route('contactPage')}}">Contact Us</a></li>
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

    <div class="container mt-4">
		<div class="banner">
        <img src="/storage/imageFile/aboutus.jpg" class="img1" alt="Product Image">
        </div>
    </div>  

    <div style='text-align:center' class="container">
    <p><h1>What Makes a Solid ‘About Us’ Page?</h1></p>
    <p>Your About Us page should be:
        Informative. It doesn’t always have to tell the whole story, but it should at least provide people 
        with an idea of who and what you are. Contain social proof, testimonials, and some personal information
        that viewers can relate to such as education, family, etc. Useful and engaging. Easy to navigate and accessible on any device.
        That may all sound complicated, but it really isn’t.

        The main purpose of your About Us page is to give visitors a glimpse into the identity of either a person or business.

        As users discover your brand, they need to distinguish what sets you apart and makes you… you.

        This often requires finding the right balance between compelling content and a design carefully planned to look the part.

        Conveying your identity in a fun and approachable – but also reliable and informative – way is challenging.

        If you know who you are and your goal for your site, the About Us page should come naturally.

        However, if you’re looking for some inspiration, you can always check out these 25 examples of creative and engaging About Us pages.

        These excellent examples will help you build a personal and engaging website journey.<p>
</body>
</html>