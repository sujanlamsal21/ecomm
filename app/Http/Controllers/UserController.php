<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Product;
use App\Feedback;
use App\Category;
use App\Cart;
use Hash;

class UserController extends Controller
{
    public function welcome(){
        $displayImage=Product::all();
        return view('welcome')->with('items',$displayImage);
    }

    public function searchItems(Request $request){
        $category=Category::all();
        $check = $request->input('search');
        $findItems = Product::where('productName',$check)->get();
        if(count($findItems)>0){
            return view('showSearchProduct')->with('searchItems',$findItems)->with('categories',$category);
        }
        else{
            $findAsCategory = Category::where('categoryName',$check)->first();
            if(isset($findAsCategory)){
            $findItems=Product::where('categoryId',$findAsCategory->id)->get();
            return view('showSearchProduct')->with('searchItems',$findItems)->with('categories',$category);
            }
            else{
                return view('showSearchProduct')->with('message','No any data found')->with('categories',$category);
            }
        }
    }

    public function productPage(){
        $category=Category::all();
        $items=Product::all();
        return view('product')->with('categories',$category)->with('items',$items);
    }

    public function searchProductByCategory($id){
        $categories=Category::all();
        if($id==0){
            $items=Product::all();
            return view('product')->with('categories',$categories)->with('items',$items); 
        }
        $category=Category::find($id);
        $items=Product::where('categoryId',$category->id)->get();
        return view('product')->with('categories',$categories)->with('items',$items); 
    }

    public function userProduct($id){
        if(Auth::user()){
            $categories=Category::all();
            $userInfo=Auth::user();
            if($id==0){
                $items=Product::all();
                return view('userProductPage')->with('categories',$categories)->with('items',$items)
                                              ->with('userName',$userInfo);
            }
            $category=Category::find($id);
            $items=Product::where('categoryId',$category->id)->get();
            return view('userProductPage')->with('categories',$categories)->with('items',$items)
                                          ->with('userName',$userInfo);
        }
    }

    public function aboutPage(){
        return view('aboutUs');
    }

    public function contactPage(){
        return view('contact');
    }

    public function signupPage(){
        return view('registration');
    }

    public function feedback(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'feedback'=>'required',
            'message'=>'required'
        ]);
        $store=new Feedback();
        $store->name = $request->input('name');
        $store->email = $request->input('email');
        $store->feedback = $request->input('feedback');
        $store->message = $request->input('message');
        $store->save();
        return redirect()->back();
    }

    public function loginPage(){
        if(Auth::user())
        {
            if(Auth::user()->role=='User'){
                return redirect('/returnUserHomePage');
            }else if(Auth::user()->role=='Admin'){
                return redirect('/adminDashboard');
            }
        }
        return view('login');
    }

    public function forgetPasswordPage(){
        return view('forgetPasswordPage');
    }

    public function register(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6',
            'address'=>'required',
            'number'=>'required|min:10',
        ]);
        $store = new User();
        $store->name = $request->input('name');
        $store->email = $request->input('email');
        $store->password = bcrypt($request->input('password'));
        $store->address = $request->input('address');
        $store->role = "User";
        $store->contactNumber = $request->input('number');
        $store->save();
        return redirect('/');
    }

    public function viewUser(){
        if(Auth::user()){
            if(Auth::user()->role=="User"){
                $findName=Auth::user();
                $item=Product::all();
                return view('userHomePage')->with('userName',$findName)->with('items',$item);
            }
            else{
                return redirect('/loginPage')->with('check','Please Logged-in first!!!');
            }
        }
        else{
            return redirect('/loginPage')->with('check','Please Logged-in first!!!');
        }
    }
   
    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required',
        ]);
        $email=$request->input('email');
        $password=$request->input('password');
        $userdata = array(
           'email'  => $email,
           'password'  => $password,
        );
        if(Auth::attempt($userdata)){
            if(Auth::user()){
                if(Auth::user()->role=='User'){
                    return redirect('/returnUserHomePage');
                }
                else if(Auth::user()->role=='Admin'){
                    return redirect('/adminDashboard');
                }
            }
        }
        else{
            return redirect('/')->with('check','Either email or password is wrong!!!');
        }
    }

    public function logout(){
        if(Auth::user()){
            Auth::logout();
            return redirect('/loginPage');
        }
        else{
            return redirect('/loginPage');
        }
    }

    public function userProductPage(){
        if(Auth::user()){
            $userName=Auth::user();
            $categories=Category::all();
            $item=Product::all();
            return view('userProductPage')->with('categories',$categories)->with('items',$item)
                                          ->with('userName',$userName);
        }
        else{
            return redirect('/logout');
        }
    }

    public function userInformationProfile(){
        if(Auth::user()){
            $userInfo=Auth::user();
            return view('userInformationProfile')->with('userInfo',$userInfo);
        }
        else{
            return redirect('/logout');
        }
    }

    public function editUserProfile(){
        if(Auth::user()){
            $userInfo=Auth::user();
            return view('changeUserData')->with('userInfo',$userInfo);
        }
        else{
            return redirect('/logout');
        }
    }

    public function updateUserData(Request $request,$id){
        if(Auth::user()){
            $this->validate($request,[
                'newname'=>'required',
                'newemail'=>'required',
                'newaddress'=>'required',
                'newnumber'=>'required'
            ]);
            $store= User::find($id);
            $store->name = $request->input('newname');
            $store->email = $request->input('newemail');
            $store->address = $request->input('newaddress');
            $store->contactNumber = $request->input('newnumber');
            $store->save();
            return redirect('/userInformationProfile');
        }
        else{
            return redirect('/logout');
        }
    }

    public function changePasswordPage(){
        if(Auth::user()){
            return view('changePassword');
        }
        else{
            return view('login');
        }
    }

    public function changePassword(Request $request){
        if(Auth::user()){
            $this->validate($request,[
                'currentPassword'=>'required',
                'newPassword'=>'required|min:6'
            ]);
            if(!(Hash::check($request->get('currentPassword'),Auth::user()->password))){
                return "enter password doesnot match the current password";
            }
            if(strcmp($request->get('currentPassword'),$request->get('newPassword'))==0){
                return "the current password and new password cant be same";
            }
            $user=Auth::user();
            $user->password=bcrypt($request->get('newPassword'));
            $user->save();
            return "Password change successfully";
        }else{
            return view('login');
        }
    }

    public function userCartItem(){
        if(Auth::user()){
            // $userName=Auth::user();
            $cartItems=Cart::where('userId',Auth::user()->id)->get();
            $items=[];
            foreach($cartItems as $cartItem){
                $item=Product::find($cartItem->productId);
                if($item){
                    $item->cartId = $cartItem->id;
                    array_push($items, $item);
                }
            }
            return view('addToCart',compact('cartItems'))->with('items',$items)->with('no',1);
        }
        else{
            return redirect('/logout');
        }
    }
}
