<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Errors\InvalidDataInputException;
use App\Models\User;
use App\Models\UserDetails;
use App\Validators\LoginValidation;
use App\Validators\SignupValidation;

class CtrlAuth extends BaseController
{
    public function index()
    {
        return view("pages/auth/index");
    }

    public function signupView()
    {

        return view("pages/auth/signup");
    }

    public function signup()
    {
        try {
            $userData = $this->request->getPost();
            $signupValidator =  new SignupValidation();
            $signupValidator->validateInputs($userData);

            (new User())->insert($userData);

            $response = [
                'title' => 'Registro exitoso',
                'message' => 'El usuario ha sido registrado, por favor inicie sesión para continuar',
                'type' => 'success'
            ];

            return redirect()->to('/auth/signup')->with('response', $response);
        } catch (InvalidDataInputException $th) {
            return redirect()->to('/auth/signup')->withInput();
        } catch (\Throwable $th) {
            $response = [
                'title' => 'Oops! Ha ocurrido un error',
                'message' => 'Ha ocurrido un error al guardar los datos del usuario, por favor intente nuevamente',
                'type' => 'error',
            ];
            return redirect()->to('/auth/signup')->withInput()->with('response', $response);
        }
    }

    public function login()
    {
        try {
            $userData = $this->request->getPost();
            $loginValidator = new LoginValidation();
            $loginValidator->validateInputs($userData);

            $user = (new User())->where('email', $userData['email'])->first();
            $loginValidator->validateCredentials($user, $userData['password']);

            session()->set('user', [
                'userId' => $user['userId'],
                'email' => $user['email']
            ]);
            
            $userDetails = (new UserDetails())->where('userId', $user['userId'])->first(); 
            if (!$userDetails){
                $response = [
                    'title' => '¡Bienvenido de vuelta!',
                    'message' => 'Por favor completa tu registro para poder continuar navegando en el sitio', 
                    'type' => 'success'
                ];

                return redirect()->to("/user/" . $user['userId'] . "/edit")->with('response', $response);
            }


            return redirect()->to("/user/" . $user['userId']);
        } catch (InvalidDataInputException $th) {
            return redirect()->to('/auth/login')->withInput();
        } catch (\Throwable $th) {
            $response = [
                'title' => 'Oops! Ha ocurrido un error',
                'message' => 'Ha ocurrido un error al iniciar sesión, por favor intente nuevamente',
                'type' => 'error',
            ];
            return redirect()->to('/auth/login')->withInput()->with('response', $response);
        }
    }

    public function logout(){
        session()->destroy(); 
        return redirect()->to("/"); 
    }
}
