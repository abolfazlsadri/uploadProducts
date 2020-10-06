<?php 

namespace App\Services\API\V1\Services\User;

use App\User;
use App\Services\API\V1\Interfaces\UserInterface;
use Auth;

class UserService implements UserInterFace
{
    public function checkUser(array $request) : array
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $token =  $user->createToken('MyApp')->accessToken; 
            return [ 'token' => $token, "status" => 200]; 
        } 
        else{ 
            return ['error'=>'Unauthorised' , 'status' => 401]; 
        } 
    }

    public function createUser(array $request) : array
    {
        $request['password'] = bcrypt($request['password']); 
        $user = User::create($request);
        $user->attachRole('customer');
        $token =  $user->createToken('MyApp')->accessToken; 
        return ['name' => $user->name, 'status' => 200]; 
    }

    public function createAdmin(array $request) : array
    {
        $request['password'] = bcrypt($request['password']); 
        $user = User::create($request);
        $user->attachRole('admin');
        $token =  $user->createToken('MyApp')->accessToken; 
        return ['name' => $user->name, 'status' => 200]; 
    }
} 