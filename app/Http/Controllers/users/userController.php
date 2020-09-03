<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BackEnd\UsersModel;
use App\Http\Requests\loginRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\registeredRequest;
use Symfony\Component\CssSelector\Parser\Token;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.registered');
    }

    /**
     * Store a newly created resource in storage.
     * Lưu trữ tài nguyên mới được tạo trong bộ nhớ.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(registeredRequest $request)
    {
        $insertUser = new UsersModel;
        $insertUser->fullname = $request->fullname;
        $insertUser->email = $request->email;
        $insertUser->Phone = $request->phone;
        $insertUser->password = bcrypt($request->password);
        $insertUser->remenber_token = $request->_token;
        $insertUser->created_at = Carbon::now();

        $insertUser->save();

        return view('users.login')->with('notify', 'Đăng ký tài khoản thành công');
    }

    public function PostLogin(loginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;


        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            Auth::attempt(['email' => $email, 'password' => $password]);
            return redirect('/')->with('notify', 'Đăng nhập thành công');
        } else {
            return redirect()->back()->with('notify', 'Email hoặc Mật khẩu không chính xác !');
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect(route('get.login'))->with('notify', 'Đăng xuất thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
