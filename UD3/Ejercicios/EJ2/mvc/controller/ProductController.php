<?php
namespace Ejercicios\EJ2\mvc\controller;
use Ejercicios\EJ2\mvc\controller\Controller;
use Ejercicios\EJ2\mvc\model\Model;
use Ejercicios\EJ2\mvc\model\ProductModel;

class ProductController extends Controller{

    public function listProducts(){
        $products = new ProductModel()->getProducts();

        if ($products) {
            $this->vista->showView("list-products",$products);
        }
    }

     public function showForm(){
        $this->vista->showView("add-product");
    }

   public function addProduct() {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $denominacion = $_POST['denominacion'];
        $descripcion = $_POST['descripcion'];
        $precio =  $_POST['precio']; 
        $cantidad =  $_POST['cantidad']; 


        $add = new ProductModel()->addProduct($denominacion, $descripcion, $precio, $cantidad);

      
        if ($add) {
            self::listProducts();  
        } else {
            $this->vista->showView("page-not-found");  
        }
    }
}
}