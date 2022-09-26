<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected function guard()
    {
        return Auth::guard('admin-auth');
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        //        $this->middleware('guest:admin-auth')->except('logout');
    }

    public function login(Request $request)
    {
        if ($request->login_scope == 1) {
            if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::guard('web')->user()->type == 0) {
                    if (Auth::guard('web')->user()->verified == 1) {
                        return 1;
                    } else {
                        // scope code generator
                        $code = generate_code(CODE_LENGTH);
                        Session::put('codes', $code);
                        $phone = Auth::guard('web')->user()->phone;
                        $response = [
                            "code" => $code,
                            "phone" => $phone
                        ];
                        $client = new \GuzzleHttp\Client();
                        $client->request('GET', 'http://www.sms4ksa.com/api/sendsms.php?username=yahy&password=102030&message=رمز التحقق الخاص بك: ' . $code . '&numbers=' . Auth::guard('web')->user()->phone . '&sender=kafaat');
                        Auth::guard('web')->logout();
                        return $response;
                    }
                } else {
                    Auth::guard('web')->logout();
                    return 2;
                }
            } else {
                return response()->json($this->sendFailedLoginResponse($request));
            }
        } else {
            if (Auth::guard('admin-auth')->attempt(['email' => $request->email, 'password' => $request->password])) {
                if (Auth::guard('admin-auth')->user()->type == 1) {
                    return 1;
                } else {
                    Auth::guard('admin-auth')->logout();
                    return 2;
                }
            }
        }
    }

    public function adminLogin(Request $request)
    {
        if ($auth = Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if ($request->login_scope == 1) {
                if (Auth::user()->type == 0) {
                    if (Auth::user()->verified == 1) {
                        return 1;
                    } else {
                        // scope code generator
                        $code = generate_code(CODE_LENGTH);
                        Session::put('codes', $code);
                        $phone = Auth::user()->phone;
                        $response = [
                            "code" => $code,
                            "phone" => $phone
                        ];
                        $client = new \GuzzleHttp\Client();
                        $client->request('GET', 'http://www.sms4ksa.com/api/sendsms.php?username=yahy&password=102030&message=رمز التحقق الخاص بك: ' . $code . '&numbers=' . Auth::user()->phone . '&sender=kafaat');
                        Auth::logout();
                        return $response;
                    }
                } else {
                    Auth::logout();
                    return 2;
                }
            } else {
                if (Auth::user()->type == 1) {
                    return 1;
                } else {
                    Auth::logout();
                    return 2;
                }
            }
        } else {
            return response()->json($this->sendFailedLoginResponse($request));
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/login');
    }

    public function adminLogout()
    {
        Auth::guard('admin-auth')->logout();
        return redirect('/admin/login');
    }

    public function showAdminLoginForm()
    {
        return view('auth.admin-login');
    }
}
