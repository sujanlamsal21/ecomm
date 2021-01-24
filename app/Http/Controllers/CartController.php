<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Product;
use App\User;
use App\Like;
use App\Rating;
use App\Comment;

class CartController extends Controller
{
    public function addToCart($id){
        if(Auth::user()){
            $check=Product::find($id);
            $user=Auth::user();
            $store=new Cart();
            $store->userId = Auth::user()->id;
            $store->productId = $id;
            $store->save();
            return redirect()->back();
        }else{
            return view('login');
        }
    }

    public function deleteCartItems($id){
        if(Auth::user()){
            $findId=Cart::where('id', $id)->first();
            if($findId){
                $findId->delete();
                return redirect()->back();
            }
        }
        else{
            return view('login');
        }
    }

    public function rating($product, $ratingId){
      if(Auth::user()){
        $checkRating = Rating::where(['productId'=>$product, 'userId'=>Auth::user()->id])->first();
        if($checkRating){
          if($checkRating->rating==$ratingId){
            $checkRating->delete();
            return redirect()->back();          
          }
          else{
            $checkRating->rating=$ratingId;
            $checkRating->save();
            return redirect()->back();
          }
        }
        else{
          $store = new Rating();
          $store->productId =  $product;
          $store->userId = Auth::user()->id;
          $store->rating = $ratingId;
          $store->save();
          return redirect()->back();
        }
      }
      else{
          return view('login');
      }
    }

    public function showRating($ratingId){
      return 123;
    }

    public function like($itemId, $status){
			if(Auth::user()){
        $checkLikeDislike=Like::where('userId',Auth::user()->id)->where('productId',$itemId)->first();
        if($checkLikeDislike){   //if click same button or undo the function
          if($checkLikeDislike->status==$status){
            $checkLikeDislike->delete();
            $countLike = Like::where(['productId'=>$itemId, 'status'=>1])->count();
            $countDisLike = Like::where(['productId'=>$itemId, 'status'=>0])->count();
            return response(['status'=>true,'value'=>-1,'likeCount'=>$countLike,'dislikeCount'=>$countDisLike]);
          }
          else{    //to update check weather like or delete
            $checkLikeDislike->status=$status;
            $checkLikeDislike->save();
            $countLike = Like::where(['productId'=>$itemId, 'status'=>1])->count();
            $countDisLike = Like::where(['productId'=>$itemId, 'status'=>0])->count();
            return response(['status'=>true,'value'=>$status,'likeCount'=>$countLike,'dislikeCount'=>$countDisLike]);
          }
        }
        else{     //store new data weather like or dislike
          $store = new Like();
          $store->userId = Auth::user()->id;
          $store->productId = $itemId;
          $store->status = $status;
          $store->save();
          $countLike = Like::where(['productId'=>$itemId, 'status'=>1])->count();
          $countDisLike = Like::where(['productId'=>$itemId, 'status'=>0])->count();
          return response(['status'=>true,'value'=>$status,'likeCount'=>$countLike,'dislikeCount'=>$countDisLike]);
        }
			}
			else{
				return response(['status'=>false]);
			}
    }

    public function likeCheck($userId,$itemId){
        $countLike = Like::where(['productId'=>$itemId, 'status'=>1])->count();
        $countDisLike = Like::where(['productId'=>$itemId, 'status'=>0])->count();
       if(Auth::user()){
           $checkLike = Like::where('userId',$userId)->where('productId',$itemId)->first();
           if($checkLike){
              if($checkLike->status == 1){
                return response(['status'=>"like", 'countLike'=>$countLike, 'countDislike'=>$countDislike]);
              }
              else if($checkLike->status == 0){
                return response(['status'=>'dislike','countLike'=>$countLike,'countDislike'=>$countDislike]);
              }
           } 
        }
       else{
          return response(['status'=>"yes",'countLike'=>$countLike,'countDislike'=>$countDislike]);
       }

    }

    public function viewImage($id){
      $product  = Product::find($id);
      $like = Like::where(['productId'=>$id, 'status'=>1])->get();
      $dislike =Like::where(['productId'=>$id, 'status'=>0])->get();
      $fetchComments = Comment::where('productId',$id)->get();
      $displayComment=[];
      foreach($fetchComments as $comment){
       $message = $comment->id;
       array_push($displayComment,$message);
      }
      return view('display', compact('fetchComments'))->with(['product'=>$product, 'likeCount'=>$like, 'dislikeCount'=>$dislike]);
    }

    public function addComment($itemId, Request $request){
      if(Auth::user()){
        $this->validate($request,[
          'comment'=>'required',
        ]);
        $store=new Comment(); 
        $store->productId = $itemId;
        $store->userId = Auth::user()->id;
        $store->message = $request->input('comment');
        $store->save();
        return redirect()->back();
      }
      else{
        return view('login');
    }
  }

}
