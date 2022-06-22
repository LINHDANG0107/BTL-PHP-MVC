<?php
namespace App\Controllers;

use \Core\View;

use App\Models\Products;

class Catalog extends \Core\Controller
{

    public function productsAction()
    {
        View::renderTemplate('Pages/Catalog/index.html',[
            'products' =>Products::getAll()
        ]);
    }

}
?>