<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        //return response()->json($users);
        return response()->json([
            'results'=> $users
        ], 200);
    }

    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'position' => ['required'],
            'password' => ['required'],
        ]);

        $user = User::create($input);

        if ($user->save()){

            return response()->json([
                'Message: ' => 'Success!',
                'User created: ' => $user
            ], 200);

        }else {

            return response([

                'Message: ' => 'We could not create a new User.',

            ], 500);
        }

    }

    public function update(Request $request, $id)
    {
        try
        {
            $users = User::find($id);

            if(!$users)
            {
                return $users()->json([
                    'message'=> "User not found!"
                ], 404);
            }

            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = $request->password;

            $users->save();

            return response()->json([
                'message'=> "User Successfully Updcdated!"
            ], 200);

        }
        catch(Exception $e)
        {
            return response()->json([
                'message'=> "something went wrong!"
            ], 500);
        }
    }

    public function show($id)
    {
        $user = User::find($id);
        if(!empty($user))
        {
            return response()->json($user);
        }
        else
        {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }

    }

    public function destroy($id)
    {
        // Detail 
        $users = User::find($id);
        if(!$users){
          return response()->json([
             'message'=>'User Not Found.'
          ],404);
        }
         
        // Delete User
        $users->delete();
       
        // Return Json Response
        return response()->json([
            'message' => "User successfully deleted."
        ],200);
    }
}
