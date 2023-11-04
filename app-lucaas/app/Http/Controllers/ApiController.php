<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        //dd($request->all());
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                
                $token = $user->createToken("example");

                return response()->json(['code'=> Response::HTTP_OK ,
                'message'=>'User access', 'token'=>$token->plainTextToken], Response::HTTP_OK);

            }else{
                return response()->json(['code'=> Response::HTTP_NO_CONTENT,
            'message'=>'Incorrect credentials'], Response::HTTP_NO_CONTENT);
            }
        }else{
            return response()->json(['code'=> Response::HTTP_NO_CONTENT,
            'message'=>'User not found'], Response::HTTP_NO_CONTENT);
        }
    }
}
