<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\MailController;
use App\Models\Answer;
use App\Models\Settings;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register(Request $request){
        $validator = Validator::make($request->all(),[

            'name' => 'required|string|max:120',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'number' => 'required|integer',

        ]);

        if($validator->fails()){
            return back()->withErrors($validator);
        }else{
            $checker = $request->role_as;
            $pass = substr(str_shuffle("0123456789ABCDEFGHIJKLMONPQRSTUVWXYZ"), 0, 7);
            $getAnswer = Answer::where('id', 1)->first();
            $userNumber = $request->number;
            $settings = Settings::find(1);
            if($checker == 1){
                return redirect()->back()->with('error', 'something went wrong..');
            }else{

                $users = new User;
                $users->name = $request->name;
                $users->email = $request->email;
                $users->password = Hash::make($request->password);
                $users->verification_code = $pass;
                if($userNumber == $getAnswer->number){
                    $users->save();
                    if($settings->email_notify == 0){
                        return redirect()->route('login')->with('message','Registration was successful');
                    }else{
                        if($users != null){
                            MailController::SendSignUpEmail($users->name, $users->email, $users->verification_code);
                            return redirect('/verification')->with('message','Check Your Email for OTP Verification Code');
                        }
                        else{
                            return redirect()->back()->with('error','Something Went Wrong');
                        }
                    }
                }else{
                    return redirect()->back()->with('error','Answer is not correct');
                }
            }
        }
    }


    public function verifyPage(){
        $data['setting'] = Settings::findOrFail(1);
        return view('auth.validate_page', $data);
    }

    public function verifyNow(Request $request){
        $data = \Illuminate\Support\Facades\Request::get('otp');
        $users = User::where(['verification_code' => $data])->orderBy('created_at','DESC')->limit(1)->first();
        if($users != null){
            $users->email_status = 1;
            $users->save();
            return redirect()->route('login')->with('message','Account Verified Successfully');
        }
        else{
             return redirect()->back()->with('error','Verification OTP is Invalid');
        }
    }



}
