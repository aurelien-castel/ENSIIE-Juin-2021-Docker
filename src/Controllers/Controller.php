<?php
namespace Controllers;
use Exception;
use PDO;

class Controller
{

    private string $chemin ="../src/view/";

    public function rendu($view,$data)
    {
        ob_start();
        require($this->chemin.$view.".php");
        $contenu = ob_get_clean();

        require($this->chemin."Default.php");
        require($this->chemin."Footer.php");
    }

    public function disconnect()
    {
        session_destroy();
    }

}
