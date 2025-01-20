<?php
namespace App\Http\Controllers;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class  AuthController extends Controller
{

    public function registerUser()
    {
        $userData = [
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'securepassword',
        ];
        $admin = AuthService::createUserWithRole($userData, 'admin');
    }
    

    public function signIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return response()->json([
                'message' => 'Successfully signed in',
                'user' => Auth::user(),
            ], 200);
        }

        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }

}
