<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use Firebase\JWT\JWT;
use App\User;

class UserController extends BaseController
{
    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    private $request;
    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getBasicDetails()
    {
        $token = $this->request->get('token');
        $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        $user = User::find($credentials->sub);

        return response()->json([
            'displayName' => $user->name
        ], 200);
    }
}