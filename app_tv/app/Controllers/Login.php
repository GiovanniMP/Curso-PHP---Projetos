<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Libraries\Hash;

class Login extends BaseController
{
    public function __construct(){
        helper(['url', 'form']);
    }

    public function login()
    {
        echo view('loginView');
    }

    public function signup(){
        
        $msg['erros'] = '';
        
        if($this->request->getMethod() == 'post'){
            $user = new UserModel();
            $data = [
                'nome' => $this->request->getPost('nome'),
                'email' => $this->request->getPost('email'),
                'senha' => Hash::make($this->request->getPost('senha'))
            ];

            $query = $user->save($data);
            if($query){
                $last_id = $user->insertID();
                session()->set('loggedUser', $last_id);
                return redirect()->to('User');
            }else{
                $msg['erros'] = $user->errors();
                redirect()->back()->with('fail', 'Alguma coisa deu errado!');
            }
        }

        echo view('signupView', $msg);
    }

    public function check(){
        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[usuarios.email]',
                'errors' => [
                    'required' => 'Email é obrigatório',
                    'valid_email' => 'Entre com um email válido',
                    'is_not_unique' => 'Este email não está cadastrado'
                ]
            ],
            'senha' => [
                'rules' => 'required|min_length[6]|max_length[25]',
                'errors' => [
                    'required' => 'Senha é obrigatório',
                    'min_length' => 'Senha deve ter pelo menos 6 caracteres',
                    'max_length' => 'Senha deve ter menos que 25 caracteres'
                ]
            ]
        ]);

        if(!$validation){
            return view('loginView',['validation'=>$this->validator]);
        }else{
            $email = $this->request->getPost('email');
            $senha = $this->request->getPost('senha');
            $user = new UserModel();
            $user_info = $user->where('email', $email)->first();
            $check_password = Hash::check($senha, $user_info['senha']);

            if(!$check_password){
                session()->setFlashdata('fail', 'Senha incorreta');
                return redirect()->to('Login/login')->withInput();
            }else{
                $user_id = $user_info['id'];
                session()->set('loggedUser', $user_id);
                return redirect()->to('User');
            }
        }
    }

    public function logout(){
        if(session()->has('loggedUser')){
            session()->remove('loggedUser');
            return redirect()->to('Login/login?access=out')->with('fail', 'Você foi desconectado');
        }
    }

}
