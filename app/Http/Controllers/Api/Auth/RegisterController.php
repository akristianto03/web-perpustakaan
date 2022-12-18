<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\FailedResource;
use App\Http\Resources\SuccessResource;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'isAdmin' => 'required'
        ], [
            'email.unique' => 'E-Mail sudah terdaftar di database.'
        ]);

        if ($validator->fails()) {
            $return = [
                'api_code' => Response::HTTP_BAD_REQUEST,
                'api_status' => false,
                'api_message' => $validator->errors(),
            ];

            return FailedResource::make($return);
        }

        $user = $this->create($request->all());
        if (empty($user)) {
            $return = [
                'api_code' => Response::HTTP_BAD_REQUEST,
                'api_status' => false,
                'api_message' => 'Error.',
            ];
            return FailedResource::make($return);
        } else {
            event(new Registered($user));
            $newuser = User::where('email', $user->email)->first();
            $return = [
                'api_code' => 200,
                'api_status' => true,
                'api_message' => 'Akun berhasil terbuat!',
                'api_results' => $newuser
            ];
            return SuccessResource::make($return);
        }
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'isAdmin' => $data['isAdmin']
        ]);
    }
}
