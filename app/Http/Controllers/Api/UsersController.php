<?php

namespace App\Http\Controllers\Api;

use Dingo\Api\Routing\Helpers;
use Illuminate\Routing\Controller;
use JWTAuth;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
class UsersController extends Controller
{
    use Helpers;
    public function index(){
//        return User::all();
        $user = $this->auth->user();

        return $user;
    }

    // 刷新 token
    public function token()
    {
        $token = JWTAuth::getToken();
        if(!$token){
            throw new BadRequestHttpException('Token not provided');
        }
        try{
            $token = JWTAuth::refresh($token);
        }catch(TokenInvalidException $e){
            throw new AccessDeniedHttpException('The token is invalid');
        }
        return $this->response->withArray(['token'=>$token]);
    }
}
