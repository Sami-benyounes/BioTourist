<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiTokenController;
use App\Http\Resources\User as UserResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{

    public function store(Request $request, ApiTokenController $apiTokenController)
    {
        $requestParameters = $apiTokenController->verifyAdminCredentials();

        if(!$requestParameters)
        {
            return response()->json([
                'message'   => 'Your credentials are not valid',
                'status'    => '400',
            ]);
        }

        $data = request()->all();

        $validator = Validator::make($data, [
            'user_name' => ['required', 'string', 'max:45'],
            'user_surname' => ['required', 'string', 'max:45'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_postal_code' => ['integer'],
            'user_phone' => ['unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'user_img' => ['string'],
        ]);

        if($validator->fails())
        {
            return response()->json([
                'message'   => 'The request is not good',
                'error'     => $validator->errors(),
                'status'    => "400"
            ]);
        }

        $data['Status_User_idStatus_User'] = 1;
        $data['password'] = Hash::make($data['password']);
        $data['api_token'] = Str::random(80);
        unset($data['password_confirmation']);
        unset($data['_token']);
        $user = User::create($data);

        return response()->json([
            'message'   => 'information has been updated',
            'status'    => '200',
            'user'      => $user
        ]);
    }
}