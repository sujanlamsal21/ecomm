<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/8ab5e2a711.js" crossorigin="anonymous"></script>
    <title>Product</title>
</head>
<style>
	.like-class{
		color:"green";
	}
  .rating-color{
    padding:"100px";
  }

.box1234{
	
  text-align: -webkit-center;
    width: 30%;
    border: 2px solid black;
    padding: 10px;
    background: linear-gradient(45deg, #7e7979, transparent);
    color: black;
	margin-top:5px;
}



</style>
<script>
	window.onload = (function(){
		var userId=localStorage.getItem('userId');
		var itemId=localStorage.getItem('itemId');
		$.ajax({
			url:"/checkLike/"+userId+"/"+itemId,
			method:"GET",
		}).done(function(response){
			// console.log(response);
			if(response.status=="like"){
				document.getElementById("displayLikeCount").innerHTML = response.countLike;
				document.getElementById("like").style.color="green";
				
			}
			else if(response.status=="dislike"){
				document.getElementById("displayLikeCount").innerHTML = response.countLike;
				document.getElementById("dislike").style.color="green";
			}
			
		});
	});
</script>

<?php
	$likes=count($likeCount);
	$dislikes=count($dislikeCount);
	// $userId = $userId;
	// echo $userId;
?>
<body>
	<div class="container">
		<div class="row">
    	<div class="col-sm-4" id="display-items">
				<img src="/storage/imageFile/{{$product->productImage}}" alt="Product Image" style="height:auto; width:300px; margin-top:50px">
			</div>
			<div class="col-sm-4" style="margin-top:80px">
				<h2>{{$product->productName}}</h2>
				<div class="row">
					<div class="col-md-4">
						<h4>${{$product->productPrice}}</h4>
					</div>
					<div class="col-sm-6">
						<div class="rating">
							<div class="stars">
								<a href="{{url('/rating/'.$product->id.'/1')}}"><span class="fa fa-star" type="radio" id="star1"></span></a>
								<a href="{{url('/rating/'.$product->id.'/2')}}"><span class="fa fa-star" type="radio" id="star1"></span></a>
								<a href="{{url('/rating/'.$product->id.'/3')}}"><span class="fa fa-star" type="radio" id="star1"></span></a>
								<a href="{{url('/rating/'.$product->id.'/4')}}"><span class="fa fa-star" type="radio" id="star1"></span></a>
								<a href="{{url('/rating/'.$product->id.'/5')}}"><span class="fa fa-star" type="radio" id="star1"></span></a>
							</div>
						</div>
					</div>
					<div class="col-sm-6" style="margin-top:10px">
						<form action="{{route('addToCart',['id'=>$product->id])}}" method="GET">
							<button type="submit" class="button-style btn btn-primary btn-sm">Add to Cart</button>
						</form>
					</div>
				</div>
				<div class="row" style="margin-top:20px">
				
					<div class="col-sm-3 generalLikeDislike" id="like">Like
						<i class="far fa-thumbs-up" style="font-size:20px"></i>
						<p id="displayLikeCount">{{$likes}}</p>
					</div>
					<div class="col-sm-3 generalLikeDislike" id="dislike">Dislike 
						<i class="far fa-thumbs-down" style="font-size:20px"></i>
						<p id="displayDislikeCount">{{$dislikes}}</p>
					</div>
					<div class="col-sm-4" id="displayCommentBox">Comment 
						<i class="far fa-comments" style="font-size:30px"></i>
					</div>
					<div style="display:none" id="comment"> <form action="{{route('addComment',['itemId'=>$product->id])}}" method="GET">
					<input type="text" name="comment" placeholder="place your comment here">
						<button type="submit" class="btn btn-primary btn-sm" style="margin-left:300px">Comment</button>
					{{csrf_field()}}</form></div>
				</div>
			</div>	
		</div>
		@foreach($fetchComments as $comment)
			<div class="container box1234" >{{$comment->message}}</div>
		@endforeach
		<p style="display:none">{{$itemId=$product->id}}</p>
		<p style="display:none">{{$userId = Auth::user()->id}}</p>
		<?php $userId=$userId; ?>
		<script>
			localStorage.setItem('itemId',{{$itemId}});
			localStorage.setItem('userId',{{$userId}});  
		</script>
		<script src="{{asset('js/like.js')}}"></script>
</body>
</html>







               