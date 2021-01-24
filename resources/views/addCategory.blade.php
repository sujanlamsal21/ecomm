<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Category</title>
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
						<h1>Add New Product Category</h1>
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
								<form action="{{route('addCategory')}}" method="POST" class="forma was-validated">
										<div class="form-group">
												<label>Add New Product Category:</label>
												<input type="text" class="form-control" name="productCategory" palceholder="Product Category">
												@foreach($errors->get('productCategory') as $message)
														<div class="alert alert-warning" role="alert">
																<strong> {{$message}}</strong> 
														</div>
												@endforeach  
										</div>
										{{csrf_field()}}
										<button type="submit" class="btn btn-primary but2">Add</button>
								</form>
						</div> 
				</div>

				<div class="row">
						<table class="table table-bordered">
								<thead>
										<tr>
												<th scope="col">ID</th>
												<th scope="col">Category Name</th>
												<th scope="col">Edit</th>
												<th sccope="col">Delete</th>
										</tr>
								</thead>
								<tbody>
										
										@foreach($categories as $category)
										<tr>
												<td>{{$category->id}}</td>
												<td>{{$category->categoryName}}</td>
												<td>
													<form action="{{route('editCategory',['id'=>$category->id])}}" method="GET">
															<button type="submit" class="btn btn-danger">Edit</button>
													</form>
												</td>
												<td>
													<form action="{{route('deleteCategory',['id'=>$category->id])}}" method="GET">
															<button type="submit" class="btn btn-danger">Delete</button>
													</form>
												</td>
										</tr>
										@endforeach    
										
								</tbody>
						</table>
				</div>  
		</div> 
</body>
</html>