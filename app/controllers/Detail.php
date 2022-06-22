<?php
namespace App\Controllers;

use \Core\View;

use App\Models\Products;

class Detail extends \Core\Controller
{

    public function productsAction()
    {


        View::renderTemplate('Pages/Details/index.html',[

            'products' =>Products::getProduct(explode("/",$_SERVER['QUERY_STRING'])[2])
        ]);
    }

}
?>