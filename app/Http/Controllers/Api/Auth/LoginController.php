<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\FailedResource;
use App\Http\Resources\SuccessResource;
use App\Models\User;
use Laravel\Passport\Client;
use GuzzleHttp\Client as GuzzleHttpClient;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = Client::find('98027ed3-263d-45a2-abe5-d99298ad4eab');
    }

    public function login(Request $request)
    {
        $http = new GuzzleHttpClient();

        $user = [
            'email' => $request->email,
            'password' => $request->password,
            'isAdmin' => false,
        ];
        $admin  = [
            'email' => $request->email,
            'password' => $request->password,
            'isAdmin' => true
        ];

        $check = User::where('email', $request->email)->first();

        if ($check != null) {
            if (Auth::attempt($user) || Auth::attempt($admin)) {
                // $response = Http::asForm()->post(URL::to('/') . '/oauth/token', [
                //     'grant_type' => 'password',
                //     'client_id' => $this->client->id,
                //     'client_secret' => $this->client->secret,
                //     'username' => $request->email,
                //     'password' => $request->password,
                //     'scope' => '',
                // ]);
                // $var = json_decode((string) $response->getBody(), true);
                $var = [];
                $var = collect($var);

                $var->put("access_token", $check->createToken('authToken')->accessToken);
                $var->put("user_id", $check->id);
                $var->put("is_admin", $check->isAdmin);
                $var = json_decode((string) $var, true);
                $return = [
                    'api_code' => 200,
                    'api_status' => true,
                    'api_message' => 'Berhasil masuk aplikasi.',
                    'api_results' => $var
                ];
                return SuccessResource::make($return);
            } else {
                $return = [
                    'api_code' => Response::HTTP_FORBIDDEN,
                    'api_status' => false,
                    'api_message' => 'Login gagal, password tidak sesuai.'
                ];
                return FailedResource::make($return);
            }
        }
    }

    public function logout()
    {
        $return = [
            'api_code' => 200,
            'api_status' => true,
            'api_message' => 'Berhasil logout.',
            'api_results' => Auth::user()
        ];
        $accesstoken = Auth::user()->currentAccessToken();
        DB::table('oauth_refresh_tokens')->where('access_token_id', $accesstoken->id)->update(['revoked' => true]);
        $accesstoken->revoke();

        return SuccessResource::make($return);
    }
}
