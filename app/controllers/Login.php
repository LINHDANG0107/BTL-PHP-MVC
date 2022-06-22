<?php

namespace App\Controllers;

use \App\Models\User;
use \Core\View;
use \App\Auth;
use \App\Flash;


/**
 * Home controller
 *
 * PHP version 7.0
 */
class Login extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function newAction()
    {
        View::renderTemplate('Pages/Login/new.html',[
            'users' =>User::getAll()
        ]);
    }
    /**
     * Log in a user
     *
     * @return void
     */
    public function createAction()
    {

        $user = User::authenticate($_POST['email'], $_POST['password']);
        $remember_me = isset($_POST['remember_me']);

        if ($user) {
            Auth::login($user, $remember_me);
            Flash::addMessage('Login successful');

            $this->redirect(Auth::getReturnToPage());

        } else {

            Flash::addMessage('Login unsuccessful, please try again', Flash::WARNING);
            View::renderTemplate('Pages/Login/new.html', [
                'email' => $_POST['email'],
                'remember_me' => $remember_me
            ]);
        }
    }
}