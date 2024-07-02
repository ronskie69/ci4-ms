<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Auth\AuthModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function __construct()
    {
        helper(['url','form']);
    }
    public function login()
    {
        $users = new AuthModel();

        $validation = [
            'email' => 'required',
            'password' => 'required',
        ];

        if($this->validate($validation)) {
            $user_matched = $users->where('email', $this->request->getVar('email'))->first();

            if(!empty($user_matched)) {
                
                if(password_verify($this->request->getVar('password'), $user_matched['password'])){
                    $session_data = [
                        'username' => $user_matched['username'],
                        'email'    => $user_matched['email'],
                    ];

                    $session = session();
                    $session->set('user_logged', $session_data);
                    
                    return redirect()->to('dashboard');

                } else {
                    return redirect()->back()->with('error', 'Password not matched!');
                }
            } else {
                return redirect()->back()->with('error', 'Invalid username or password!');
            }
        } else {
            return view('auth/login');
        }
    }

    public function register(){

        $users = new AuthModel();

        $validation = [
            'email' => 'required|valid_email',
            'username' => 'required|min_length[8]|max_length[15]',
            'password' => 'required|min_length[8]',
        ];

        if($this->validate($validation)) {
            $users->save([
                'email'    => $this->request->getVar('email'),
                'username' => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
            ]);

            return redirect()->to('login')->with('success', 'Successfully registered. Please login your account.');
        } else {
            $data['validation'] = $this->validator;

            return view('auth/register', $data);
        }
    }

    public function logout() {
        session()->remove('user_logged');
        return redirect()->to('login');
    }
}
