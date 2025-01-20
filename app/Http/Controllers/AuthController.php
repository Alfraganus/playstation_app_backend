<?php
namespace App\Http\Controllers;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class  AuthController extends Controller
{

    public function registerUser(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|unique:users,email',
            'password' => 'required|string|min:4',
        ]);
        try {
            $admin = AuthService::createUserWithRole($validatedData, 'admin');
            return response()->json([
                'success' => true,
                'message' => 'Admin user registered successfully.',
                'data' => $admin,
            ], 201); // 201 status code for created resources
        } catch (\Exception $e) {
            // Return error response
            return response()->json([
                'success' => false,
                'message' => 'Failed to register admin user.',
                'error' => $e->getMessage(),
            ], 500); // 500 status code for server error
        }
    }


    public function signIn(Request $request)
    {
     $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password')
        ])) {
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
