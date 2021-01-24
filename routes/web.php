<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','UserController@welcome')->name('/');

//main page
Route::get('/productPage','UserController@productPage')->name('productPage');
Route::get('/aboutPage','UserController@aboutPage')->name('aboutPage');
Route::get('/contactPage','UserController@contactPage')->name('contactPage');

//to search produt from search bar
Route::get('/searchItems','UserController@searchItems')->name('searchItems');

//to search product by category
Route::get('/searchProductByCategory/{id}','UserController@searchProductByCategory')->name('searchProductByCategory');

//to add customer feedback
Route::post('/feedback','UserController@feedback')->name('feedback');

//to display register and login page
Route::get('/signupPage','UserController@signupPage')->name('signupPage');
Route::get('/loginPage','UserController@loginPage')->name('loginPage');

//to view image or image details
Route::get('/viewImage/{id}','CartController@viewImage')->name('viewImage');

//for user/admin registration
Route::post('/register','UserController@register')->name('register');

//for users/admin login
Route::post('/login','UserController@login')->name('login');

//to reset password or forget password
Route::get('/forgetPasswordPage','UserController@forgetPasswordPage')->name('forgetPasswordPage');

//add items to cart and remove from cart in userCartItem
Route::get('/addToCart/{id}','CartController@addToCart')->name('addToCart');
Route::get('/deleteCartItems/{id}','CartController@deleteCartItems')->name('deleteCartItems');

//like and dislike product to store and display on window onload
Route::get('/product/like/{itemId}/{status}', 'CartController@like')->name('product/like');
Route::get('/checkLike/{userId}/{itemId}','CartController@likeCheck')->name('checkLike');

//for rating the product
Route::get('/rating/{product}/{ratingId}','CartController@rating')->name('rating');

//for comment field
Route::get('/addComment/{itemId}','CartController@addComment')->name('addComment');

//for user
Route::get('/returnUserHomePage','UserController@viewUser')->name('returnUserHomePage');
Route::get('/userProductPage','UserController@userProductPage')->name('userProductPage');
Route::get('/userInformationProfile','UserController@userInformationProfile')->name('userInformationProfile');
Route::get('/userCartItem','UserController@userCartItem')->name('userCartItem');
Route::get('/user/searchProductByCategory/{id}','UserController@userProduct')->name('user/searchProductByCategory');
Route::get('/editUserProfile','UserController@editUserProfile')->name('editUserProfile');
Route::post('/updateUserData/{id}','UserController@updateUserData')->name('updateUserData');
Route::get('/changePasswordPage','UserController@changePasswordPage')->name('changePasswordPage');
Route::post('/changePassword','UserController@changePassword')->name('changePassword');

//logout for user/admin
Route::get('/logout','UserController@logout')->name('logout');

//for admin
Route::get('/adminDashboard','AdminController@adminDashboard')->name('adminDashboard');
Route::get('/addItemsPage','AdminController@addItemsPage')->name('addItemsPage');
Route::get('/addCategoryPage','AdminController@addCategoryPage')->name('addCategoryPage');
Route::get('/userReviewPage','AdminController@userReviewPage')->name('userReviewPage');
Route::post('/addCategory','AdminController@addCategory')->name('addCategory');
Route::post('/addItem','AdminController@addItem')->name('addItem');
Route::get('/deleteUsers/{id}','AdminController@deleteUsers')->name('deleteUsers');
Route::get('/editCategory/{id}','AdminController@editCategory')->name('editCategory');
Route::post('/updateCategory/{id}','AdminController@updateCategory')->name('updateCategory');
Route::get('/deleteCategory/{id}','AdminController@deleteCategory')->name('deleteCategory');
