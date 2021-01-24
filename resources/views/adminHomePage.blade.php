<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
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
        background-color:#d3d3d3;
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
                <h2>{{strtoupper($adminName->name)}}</h2>
            </div>
            <div class="col-md-8 company-text">
                <h1>Company Name</h1>
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
                    <h1>Total Product</h1>
                    @if(isset($total))
                        <p class="text-style">{{$total}}</p>
                    @endif
                </div> 
            </div>

            <div class='row text-spacing'>
                <div class='col-md-12 flex-item'>    
                    <h1>Total Sale</h1>
                        <p class="text-style">12hfssfhfhf3456</p>
                </div>   
            </div>

            <div class='row text-spacing'>
                <div class='col-md-12 flex-item'>    
                    <h1>Total Item category</h1>
                    @if(isset($totalCategory))
                        <p class='text-style'>{{$totalCategory}}</p>
                    @endif
                </div>   
            </div>

            <div class='row text-spacing'>
                <div class='col-md-12 flex-item'>    
                    <h1>Total Users</h1>
                    @if(isset($totalUser))
                       
                            <p class='text-style'>{{$totalUser}}</p>
                        
                    @endif        
                </div>   
            </div>
        </div>  
    </div>      
</body>
</html>