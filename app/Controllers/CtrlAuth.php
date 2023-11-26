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
                'title' => '¡Bienvenido a Art Zone!',
                'message' => '!Gracias por haberte registrado con nosotros¡ Ahora disfruta de las magníficas obras que tenemos para ti',
                'type' => 'success'
            ];

            session()->set('user', [
                'userId' => $userData['userId'],
                'name' => $userData['name'],
                'userImage' => '',
            ]);

            return redirect()->to('/')->with('response', $response);
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

            $user = (new User())->select('users.userId, name, imageProfile, password')->join('userDetails', 'users.userId = userDetails.userId','left')->where('email', $userData['email'])->first();
            $loginValidator->validateCredentials($user, $userData['password']);

            session()->set('user', [
                'userId' => $user['userId'],
                'name' => $user['name'], 
                'userImage' => $user['imageProfile'] ?? ''
            ]);
            
            return redirect()->to("/" . $user['userId']);
        } catch (InvalidDataInputException $th) {
            return redirect()->to('/auth/login')->withInput();
        } /* catch (\Throwable $th) {
            $response = [
                'title' => 'Oops! Ha ocurrido un error',
                'message' => 'Ha ocurrido un error al iniciar sesión, por favor intente nuevamente',
                'type' => 'error',
            ];
            return redirect()->to('/auth/login')->withInput()->with('response', $response);
        } */
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to("/");
    }
}
