<?php

namespace App\Controllers\Admin;
use \App\Models\Login_Model;
use \Core\View;
use \App\Auth;
use \App\Flash;

/**
 * Contact controller
 *
 * PHP version 8.0
 */
class Login extends \Core\Controller
{

    public function newAction()
    {
    View::renderTemplate('Admin/Login.html');
    }
    /**
     * Show the index page
     *
     * @return void
     */
    public function createAction()
    {

        $user = Login_Model::authenticate($_POST['email'], $_POST['password']);
        $remember_me = isset($_POST['remember_me']);

        if ($user) {
            Auth::login($user, $remember_me);
            Flash::addMessage('Login successful');

            $this->redirect(Auth::getReturnToPage());

        } else {
            Flash::addMessage('Login unsuccessful, please try again', Flash::WARNING);
            View::renderTemplate('Admin/Login.html', [
                'email' => $_POST['email'],
                'remember_me' => $remember_me
            ]);
        }
    }

}

?>