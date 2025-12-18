<?php
namespace Ejercicios\EJ2\mvc\controller;
use Ejercicios\EJ2\mvc\controller\Controller;
use Ejercicios\EJ2\mvc\model\ClientModel;

class ClientController extends Controller{
    public function listClients(){
        $clientes = new ClientModel()->getClients();

        if ($clientes) {
            $this->vista->showView("list-clients", $clientes);
        }
    }

    public function showForm(){
        $this->vista->showView("add-client");
    }

    public function addClient(){
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['telefono'];
            $mail = $_POST['mail'];

            $add = new ClientModel()->addClient($nombre,$apellidos,$telefono,$mail);

            if ($add) {
                self::listClients();
            } else {
                $this->vista->showView("page-not-found");
            }
        }
    }
}