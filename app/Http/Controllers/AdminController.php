<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Category;
use Hash;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
	public function adminDashboard(){
		if(Auth::user()){
			if(Auth::user()->role=='Admin'){
				$countItems=Product::all()->count();
				$countCategories = Category::all()->count();
				$countUsers=User::where('role','User')->count();
				$adminName=Auth::user();
				return view('adminHomePage')->with('total',$countItems)->with('totalUser',$countUsers)
											->with('totalCategory',$countCategories)->with('adminName',$adminName);
			}
		}
		else{
			return redirect('/loginPage');
		}
	}

	public function addItemsPage(){
		if(Auth::user()){
			if(Auth::user()->role=='Admin'){
				$categories=Category::all();
				return view('addItems')->with('categories',$categories);
			}
		}
		else{
			return redirect('/loginPage');
		}	
	}

	public function addCategoryPage(){
		if(Auth::user()){
			if(Auth::user()->role=="Admin"){
				$categories=Category::all();
				$adminName=Auth::user();
				return view('addCategory')->with('categories',$categories)->with('adminName',$adminName);
			}
		}
		else{
			return redirect('/loginPage');
		}
	}

	public function userReviewPage(){
			if(Auth::user()){
					if(Auth::user()->role=="Admin"){
							$users= User::all();
							return view('userReview')->with('users',$users);
					}    
			}
			else{
					return redirect('/loginPage');
			}
	}

	public function addCategory(Request $request){
			if(Auth::user()){
					if(Auth::user()->role=='Admin'){
							$this->validate($request,[
									'productCategory'=>'required',
							]);   
							$store= new Category();
							$store->categoryName = $request->input('productCategory');
							$store->save();
							$categories=Category::all();
							return redirect()->back()->with('categories',$categories);
					}
			}
			else{
					return redirect('/loginPage');
			}
	}

	public function addItem(Request $request){
		if(Auth::user()){
			if(Auth::user()->role=='Admin'){
				$this->validate($request,[
						'productName'=>'required',
						'productPrice'=>'required',
						'productModel'=>'required',
						'productImage'=>'required|nullable',
						'category'=>'required',
				]);
				$store= new Product();
				$store->userId=Auth::user()->id;
				$store->categoryId=$request->input('category');
				$store->productName=$request->input('productName');
				$store->productPrice=$request->input('productPrice');
				$store->productModel=$request->input('productModel');
				if($request->hasFile('productImage')){
								//getFilename with extension
						$fileNameWithExtension=$request->file('productImage')->getClientOriginalName();
								//get just FileName
						$fileName=pathinfo($fileNameWithExtension,PATHINFO_FILENAME);
								//get extension
						$fileExtension=$request->file('productImage')->getClientOriginalExtension();
								//filename to store
						$fileNameToStore=$fileName.'_'.time().'.'.$fileExtension;
								//upload a file
						$path=$request->file('productImage')->storeAs('public/imageFile',$fileNameToStore);
				}
				else {
						$fileNameToStore='noimage.jpg';
				}
				$store->productImage=$fileNameToStore;
				$store->save();
				$categories=Category::all();
				return redirect()->back()->with('categories',$categories); 
			}
		}
		else{
				return redirect('/loginPage');
		}
	}

	public function deleteUsers($id){
		$deleteUser=User::find($id);
		$deleteUser->delete();
		return redirect()->back();
	}

	public function editCategory($id){
		$dataToEdit=Category::find($id);
		return view('updatePage')->with('categoryToEdit',$dataToEdit);
	}

  public function updateCategory($id, Request $request){
		$updateCategory = Category::find($id);
		$updateCategory->categoryName=$request->input('newProductCategory');
		$updateCategory->save(); 
		return redirect('/addCategoryPage');
	}

	public function deleteCategory($id){
		$deleteCategory=Category::find($id);
		$deleteCategory->delete();
		return redirect()->back();
	}

}
