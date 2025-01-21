<?php
namespace App\Http\Controllers;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class  AuthController extends Controller
{

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function registerUser(Request $request)
    {
       $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|unique:users,email',
            'password' => 'required|string|min:4',
        ]);
        try {
            $role = $request->input('is_admin') == 1 ? AuthService::ADMIN_ROLE : AuthService::WORKER_ROLE;

            $admin =$this->authService->createUserWithRole($request->toArray(), $role);
            return response()->json([
                'success' => true,
                'message' => 'Admin user registered successfully.',
                'data' => $admin,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to register admin user.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


    public function signIn(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->input('username'))->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            $token = $user->createToken('API Token')->plainTextToken;

            return response()->json([
                'message' => 'Successfully signed in',
                'user' => $user,
                'token' => $token,
            ], 200);
        }

        return response()->json([
            'message' => 'Invalid credentials',
        ], 401);
    }

}
