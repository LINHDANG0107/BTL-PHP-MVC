<?php

namespace App\Controllers;

use \Core\View;
use App\Models\User;


/**
 * Home controller
 *
 * PHP version 7.0
 */
class Shopping_Cart extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::renderTemplate('Pages/Shopping_Cart/index.html');
    }
}