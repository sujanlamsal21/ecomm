<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Items</title>
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
                <h1>Add New Items</h1>
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
                    <form action="{{route('addItem')}}" enctype="multipart/form-data" method="POST" class="forma was-validated">
                        <div class="form-group">
                            <label>Product Name:</label>
                            <input type="text" class="form-control" name="productName" palceholder="Product Name">
                            @foreach($errors->get('productName') as $message)
                                <div class="alert alert-warning" role="alert">
                                    <strong> {{$message}}</strong> 
                                </div>
                            @endforeach  
                        </div>
                        
                        <div class="form-group">
                            <label>Product Price:</label>
                            <input type="number" class="form-control" name="productPrice" palceholder="Product Price">
                                @foreach($errors->get('productPrice') as $message)
                                    <div class="alert alert-warning" role="alert">
                                        <strong> {{$message}}</strong> 
                                    </div>
                                @endforeach     
                        </div>

                        <div class="form-group">
                            <label>Product Model</label>
                            <input type="text" class="form-control" name="productModel" palceholder="Model Number">
                            @foreach($errors->get('productModel') as $message)
                                <div class="alert alert-warning" role="alert">
                                <strong> {{$message}}</strong> 
                                </div>
                                @endforeach  
                        </div>

                    <div class="form-group">
                        <label>Image:</label>
                        <input type="file" name="productImage" class="form-control">
                        @foreach($errors->get('productImage') as $message)
                            <div class="alert alert-warning" role="alert">
                            <strong> {{$message}}</strong> 
                            </div>
                        @endforeach  
                    </div>

                    <div class="form-group">
                        @if(isset($categories))
                            <select class="custom-select custom-select-sm" name="category">
                                <option selected>Select Product Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}"> {{$category->categoryName}}</option>
                                @endforeach
                            </select>
                        @endif
                    </div>
                    
                   
                    {{csrf_field()}}
                    <button type="submit" class="btn btn-primary but2">Upload</button>
                </form>
            </div> 
       </div> 
    </div>      
</body>
</html>