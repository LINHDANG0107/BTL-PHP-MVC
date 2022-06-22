<?php

namespace App\Controllers\Admin;

use \Core\View;
use App\Models\Login_Model;


/**
 * Home controller
 *
 * PHP version 7.0
 */
class Admin_Ctrl extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::renderTemplate('Admin/Pages/index.html',[
        ]);
    }
}