<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="mystyle.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        <title>Projet web 2021</title>
    </head>
 
    <body>
        <?php
            if(isset($_SESSION['auth']))
            {
                include("Navbar.php");
            }
        ?>

        <div class="row container">
            <div class="message-container">
                <?php
                if( count($data['messages']) > 0 )
                {
                    foreach($data['messages'] as $message)
                    {
                        echo("<div class=\"alert alert-".$message['type']."\" role=\"alert\">".$message['text']."</div>");
                    }

                }
                if(isset($data['confirmationCreateUser']))
                {
                    echo("<div class=\"alert alert-success\" role=\"alert\">Utilisateur crée</div>");
                }
                ?>
            </div>
        </div>
