<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a onclick="playSound('123.wav')" class="navbar-brand">
        <img src="logoFormiie.PNG" width="60" height="60" alt="formiie-logo">
        Formiie
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=createForm">Créer un nouveau formulaire</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php?action=manageForms">Lister mes formulaires</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="index.php">Repondre à un formulaire</a>
      </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?action=disconnect">Se déconnecter</a>
        </li>
    </ul>
  </div>
</nav>

<script>
   var playSound = function (soundFile) {
        var audio = new Audio(soundFile);
        audio.play();
        window.setTimeout(function(){

           // Move to a new location or you can do something else
           window.location.href = "index.php";

       }, 500);
   }
</script>