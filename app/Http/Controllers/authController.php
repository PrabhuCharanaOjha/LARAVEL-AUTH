<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function registerUser(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required|unique:users|email',
                'password' => 'required',
                'mobile' => 'required',
                'age' => 'required',
                'userType' => 'required',
                // 'profilePicture' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
                'profilePicture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
                'description' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json(['msg' => 'fail', 'reason' => $validator->errors()->all()]);
            }

            $image = $request->file('profilePicture');
            $profilePicture = 'FILE_'.time().$image->getClientOriginalExtension();
            $image->move(public_path('uploadDocuments/users'), $profilePicture);

            DB::table('users')->insertGetId([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'mobile' => $request->mobile,
                'age' => $request->age,
                'userType' => $request->userType,
                'profilePicture' => $profilePicture,
                'description' => $request->description,
                'status' => 1,
            ]);

            return response()->json(['msg' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['msg' => 'fail', 'reason' => [$e->getMessage()]]);
        }
    }

    public function login(Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            $route = $this->checkUserType();
            $user = User::where('email', $request->email)->first();
            $token = $user->createToken('my-app-token')->plainTextToken;
            return response()->json(['msg' => 'success', 'route' => $route, 'token' => $token]);
        }
        return response()->json(['msg' => 'fail']);
    }


    public function checkUserType(){
        $route = '/';
        if(Auth::user() && Auth::user()->userType == 1){
            $route = '/super-admin/dashboard';
        }else if(Auth::user() && Auth::user()->userType == 2){
            $route = '/admin/dashboard';
        }else if(Auth::user() && Auth::user()->userType == 3){
            $route = '/admin/dashboard';
        }
        return $route;
    }

    public function getToken(Request $request){
        $user = User::where('email', $request->email)->first();
        // print_r($user);
        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json(['msg' => 'Password not match']);
        }
        $token = $user->createToken('my-app-token')->plainTextToken;
        return response()->json(['token' => $token, 'user' => $user]);
    }

    public function apiLogin(Request $request){
        if(Auth::attempt($request->only('email', 'password'))){
            $route = $this->checkUserType();
            return response()->json(['msg' => 'success', 'route' => $route]);
        }
        return response()->json(['msg' => 'fail']);
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
