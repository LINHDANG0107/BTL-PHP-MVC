<?php
namespace App\Controllers\Admin;

use \Core\View;

use App\Models\Products;

class List_Product extends \Core\Controller
{

    public function productsAction()
    {
        View::renderTemplate('Admin/Pages/list_products.html',[
            'products' =>Products::getAll()
        ]);
    }

}
?>