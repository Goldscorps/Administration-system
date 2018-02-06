<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Admin;
use DB;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth:admin');
        // $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        
        return view('admin');
    }


    public function ChangeUser(Request $request){
        $users = DB::select("SELECT * FROM `users`");
        $admins = DB::select("SELECT * FROM `admins`");
        $cnt=1;

        foreach ($users as $user) {
                if($cnt == $request->answer){
                    foreach ($admins as $adm) {
                        if($adm->email != $user->email){
                    $admin = new Admin;
                    $admin->name = $user->name;
                    $admin->email = $user->email;
                    $admin->password = $user->password;
                    $admin->remember_token = $user->remember_token;
                    $admin->created_at = $user->created_at;                    
                    $admin->updated_at   = $user->updated_at;
                    $admin->save();    
                    DB::table('users')->where('name',$user->name)->delete(); 
                        }
                    }      
                }
                $cnt++;
            }    
        
        return view('Admin.Change')->withUsers($users)->withAdmins($admins);
    }

public function showUsers()
    {
        $users = DB::select("SELECT * FROM `users`");
              
        return view('Admin.showUsers')->withUsers($users);
        
        
    }
public function showAdmins()
    {
        $admins = DB::select("SELECT * FROM `admins`");
              
        return view('Admin.showAdmins')->withAdmins($admins);
        
        
    }
public function find()
    {
        $users = DB::select("SELECT * FROM `users`");
        $admins = DB::select("SELECT * FROM `admins`");
              
        return view('Admin.find')->withUsers($users)->withAdmins($admins);
        
        
    }
    public function findresult(Request $request)
    {
        if($request->has('Text')){
                if($request->has('language')){
                $var = $request->language;
                $users  = DB::table('users')->where('name','like',$request->Text)->take($var)->get();
                $admins = DB::table('admins')->where('name','like',$request->Text)->take($var)->get();
                $request->flash();
                return view('Admin.findresult')->withUsers($users)->withAdmins($admins);
            }
            else{
                $users  = DB::table('users')->where('name','like',$request->Text)->get();
                $admins = DB::table('admins')->where('name','like',$request->Text)->get();
            }
            $request->flash();
            return view('Admin.findresult')->withUsers($users)->withAdmins($admins);
        }
        else
        {
            return redirect()->route('find');
        }
        
    }
    public function cancelAdmin(Request $request){
        $users = DB::select("SELECT * FROM `users`");
        $admins = DB::select("SELECT * FROM `admins`");
        $cnt=1;
        $user = new User;
            foreach ($admins as $admin) {
                if($cnt == $request->answer){
                    foreach ($users as $usr) {
                        if($usr->email != $admin->email){
                    $user->name = $admin->name;
                    $user->email = $admin->email;
                    $user->password = $admin->password;
                    $user->remember_token = $admin->remember_token;
                    $user->created_at = $admin->created_at;                    
                    $user->updated_at  = $admin->updated_at;
                    $user->save();    
                    DB::table('admins')->where('name',$admin->name)->delete(); 
                        }
                    }      
                }
                $cnt++;
            }    
        
        return view('Admin.cancelAdmin')->withUsers($users)->withAdmins($admins);
    }

}

