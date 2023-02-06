<div class="container">
    <div class="row">
      <div id="card border-primary mb-3 container" class="text-center container">

          <?php
            if(!isset($_SESSION['auth']))
            {
                  include("LoginForm.php");
            }
            echo("</div>");
            echo("<div id=\"card border-primary mb-3 \" class=\"text-center container\">");

            include("AskForm.php");
          ?>
      </div>
  </div>
</div>