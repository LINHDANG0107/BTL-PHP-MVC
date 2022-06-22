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

        $user = Login_Model::authenticate($_POST['admin_name'], $_POST['password']);

        if ($user) {
            Flash::addMessage('Login successful');

            $this->redirect(Auth::getReturnToPageAdmin());

        } else {
            Flash::addMessage('Login unsuccessful, please try again', Flash::WARNING);
            View::renderTemplate('Admin/Login.html', [
                'admin_name' => $_POST['admin_name'],
            ]);
        }
    }

}

?>