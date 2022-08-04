<?php

namespace App\Http\Controllers;

use App\Models\EBook;
use App\Models\Gender;
use App\Models\Order;
use App\Models\OrderHistory;
use App\Models\Role;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{

    // -------------------------
    // PAGES FOR GUESTS
    // -------------------------

    // shows the index page
    public function viewindex()
    {
        return view('index');
    }

    // shows the signup page
    public function viewsignup()
    {
        $roles = Role::all();
        $genders = Gender::all();
        return view('signup',compact('roles','genders'));
    }

    // attempt to sign up the user
    public function signup(Request $request)
    {
        // TODO:
        // validation
        // dd(App::currentLocale());


        $validator = Validator::make($request->all(), [
            'firstname'     => 'required|alpha_num|max:25',
            'middlename'    => 'required|alpha_num|max:25',
            'lastname'      => 'required|alpha_num|max:25',
            'gender'        => 'required',
            'email'         => 'required|email|unique:users,email',
            'role'          => 'required|exists:roles,id',
            'password'      => 'required|min:8|regex:/.*[0-9].*/i',
            'displaypicture'=> 'required|file|mimes:jpg,bmp,png',
        ],[
            'password.regex' => 'The password needs to atleast have 1 number',
        ],[
            'displaypicture' => 'display picture',
            'firstname'      => 'first name',
            'middlename'     => 'middle name',
            'lastname'       => 'last name',
        ]);
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }
        $validated = $validator->validated();

        $user = new User;
        $user->first_name   = $validated['firstname'];
        $user->middle_name  = $validated['middlename'];
        $user->last_name    = $validated['lastname'];
        $user->gender_id    = $validated['gender'];
        $user->email        = $validated['email'];
        $user->password     = Hash::make($request->password);
        $user->role_id      = $validated['role'];
        $user->modified_at  = Date::now();
        $user->modified_by  = "user";

        $file = $request->file('displaypicture');
        $imageName = time().".".$file->getClientOriginalExtension();
        Storage::putFileAs('public/images',$file, $imageName);
        $user->display_picture_link = 'images/'.$imageName;

        $user->save();

        return redirect('/');
    }

    // shows the login page
    public function viewlogin()
    {
        return view('login');
    }

    // attempt to authenticate the user
    public function login(Request $request)
    {
        // TODO:
        // validation
        // attempt

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        }

        if(Auth::attempt([
            'email' => $request->email, 'password' => $request->password
        ])){
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ]);


    }

    // -------------------------
    // PAGES FOR REGISTERED MEMBER
    // -------------------------

    // show the home page as a registered user
    public function viewhome()
    {
        $books = EBook::all();
        return view('home',compact('books'));
    }

    // Show the detail of the book
    public function viewbookdetail(Request $request)
    {
        // TODO:
        // get book from model
        // pass book model to view
        $book = EBook::find($request->id);
        return view('bookdetail', compact('book'));
    }

    // Rent the selected book
    public function rent(Request $request)
    {
        // TODO:
        // add selected book to the current order
        $order = new Order;
        $order->account_id = Auth::user()->id;
        $order->ebook_id = $request->id;
        $order->order_date = Date::now();
        $order->save();
        return redirect('/cart');
    }

    // View the cart of the user
    public function viewcart(Request $request)
    {
        return view('cart');
    }

    // Delete cart item from user's cart
    public function deletecartitem(Request $request)
    {
        Order::destroy($request->id);
        return redirect()->back();
    }

    // Proceed user's cart to checkout
    public function submitcart(Request $request)
    {
        // delete user cart and move it to order history
        foreach (Auth::user()->orders as $order) {
            $orderhist = new OrderHistory;
            $orderhist->account_id = $order->account_id;
            $orderhist->ebook_id = $order->ebook_id;
            $orderhist->order_date = Date::now();
            $orderhist->save();
            $order->delete();
        }

        return view('success');
    }

    // View user's profile
    public function viewprofile(Request $request)
    {
        $user = Auth::user();
        $roles = Role::all();
        $genders = Gender::all();
        return view('profile', compact('user','roles','genders'));
    }

    // Update's the user's profile
    public function updateprofile(Request $request)
    {
        // TODO:
        // validation
        // attempt


        $validator = Validator::make($request->all(), [
            'firstname'     => 'required|alpha_num|max:25',
            'middlename'    => 'alpha_num|max:25',
            'lastname'      => 'required|alpha_num|max:25',
            'gender'        => 'required',
            'email'         => 'required|email',
            'password'      => 'required|min:8|regex:/.*[0-9].*/i',
            'displaypicture'=> 'required|file|mimes:jpg,bmp,png',
        ],[
            'password.regex' => 'The password needs to atleast have 1 number',
        ],[
            'displaypicture' => 'display picture',
            'firstname'      => 'first name',
            'middlename'     => 'middle name',
            'lastname'       => 'last name',
        ]);
        if($validator->fails()){
            return back()
            ->withErrors($validator)
            ->withInput();
        }

        $validated = $validator->validated();

        $user = User::find(Auth::user()->id);
        $user->first_name   = $validated['firstname'];
        $user->middle_name  = $validated['middlename'];
        $user->last_name    = $validated['lastname'];
        $user->gender_id    = $validated['gender'];
        if(Auth::user()->email != $request->email){
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|unique:users,email'
            ]);
            if($validator->fails()){
                return back()
                ->withErrors($validator)
                ->withInput();
            }
            $user->email        = $validated['email'];
        }
        $user->password     = Hash::make($request->password);
        $user->modified_at  = Date::now();
        $user->modified_by  = "user";

        $file = $request->file('displaypicture');
        $imageName = time().".".$file->getClientOriginalExtension();
        Storage::putFileAs('public/images',$file, $imageName);
        $user->display_picture_link = 'images/'.$imageName;

        $user->save();

        return view('saved');
    }


    // Log the authenticated user out
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return view('logout');
    }

    // -------------------------
    // CHANGE LOCALE
    // -------------------------

    public function changelocale(Request $request){
        Cookie::queue('locale',$request->locale);
        App::setlocale($request->locale);
        return redirect()->back();
    }

}
