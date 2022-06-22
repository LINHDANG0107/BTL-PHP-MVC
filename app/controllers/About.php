<?php

namespace App\Controllers;

use \Core\View;

/**
 * Contact controller
 *
 * PHP version 8.0
 */
class About extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction()
    {
        View::renderTemplate('Pages/About/index.html');
    }
}

?>