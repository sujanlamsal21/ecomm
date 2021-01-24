<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <title>Data Edit Page</title>
</head>
<body>
  <div class="container-flude side">
      <div class="row">
          <div class="col-md-2">
              <h2>HelloAdmin</h2>
          </div>
          <div class="col-md-8 company-text">
              <h1>Please Update Product Category</h1>
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
                  <form action="{{route('updateCategory',['id'=>$categoryToEdit->id])}}" method="POST" class="forma was-validated">
                      <div class="form-group">
                          <label>Update Product Category:</label>
                          <input type="text" class="form-control" name="newProductCategory"  value="{{$categoryToEdit->categoryName}}">
                          @foreach($errors->get('newProductCategory') as $message)
                              <div class="alert alert-warning" role="alert">
                                  <strong> {{$message}}</strong> 
                              </div>
                          @endforeach  
                      </div>
                      {{csrf_field()}}
                      <button type="submit" class="btn btn-primary but2">Update</button>
                  </form>
              </div> 
          </div> 
      </div> 
</body>
</html>