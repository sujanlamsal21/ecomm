
$(document).ready(function(){
  $("#like").on('click', function(){
    var userId=localStorage.getItem('userId');
    var itemId=localStorage.getItem('itemId');
    $.ajax({
          url:'/product/like/'+itemId+"/"+1,
          method:"GET",
        }).done(function(response){
          if(response.status==true){
              document.getElementById("displayLikeCount").innerHTML = response.likeCount;
              document.getElementById('displayDislikeCount').innerHTML=response.dislikeCount;
              if(response.value==1){
                document.getElementById("like").style.color="green";
                document.getElementById("dislike").style.color="black";
              }
            }
            else{
              document.getElementById("displayLikeCount").innerHTML = "";
              document.getElementById("like").style.color="black";
              document.getElementById("dislike").style.color="black";
            }
        }).fail(function(err){
            alert("Hello");
        });    
      });

  $("#dislike").on('click', function(){
    var userId=localStorage.getItem('userId');
    var itemId=localStorage.getItem('itemId');
    $.ajax({
      url:'/product/like/'+itemId+"/"+0,
      method:"GET",
    }).done(function(response){
      // console.log(response);
      if(response.status==true){
        document.getElementById("displayLikeCount").innerHTML = response.likeCount;
        document.getElementById('displayDislikeCount').innerHTML=response.dislikeCount;
        if(response.value==0){
          document.getElementById("like").style.color="black";
          document.getElementById("dislike").style.color="green";
        }
      }
      else{
        document.getElementById("displayLikeCount").innerHTML = "";
        document.getElementById("like").style.color="black";
        document.getElementById("dislike").style.color="black";
      }
    }).fail(function(err){
        alert("Hello");
    });    
  });

  $("#logout").on('click',function(){
    var userId =localStorage.getItem('userId');
    localStorage.clear(userId);
  });

  $("#displayCommentBox").click(function(){
      $("#comment").toggle();
  });
});