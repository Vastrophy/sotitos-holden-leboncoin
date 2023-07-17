<?php

include "../includes/head.php";
include "../includes/header.php";

if ($rank < 4) {
    header('Location: ../account/');
    exit();
}

?>
<br>
<br>

  <section id="services" class="section-bg">
    <div class="container">
      <header class="section-header">
	  	  <center><img src='https://grandparisrp.cf/img/logo.png' width="110"></img></center>
        <h3>Administration LeBonCoin</h3>
        <p>Cette page sert à l'administration LeBonCoin de Grand Paris RP</p>
		<br>
      </header>
      
	  
<div class="row">
        <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-duration="1.4s">
          <div class="box">
            <center><h2 class="title">Liste de tout les Utilisateurs</h2>
			<a class="btn btn-success" href="membres.php"><b><font color=white>Voir la liste</font></b></a></center>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
          <div class="box">
            <h4 class="title">Liste de tout les Annonces:</h4>
			<a class="btn btn-success" href="encheres.php"><b><font color=white>Liste des enchères</font></b></a>
			<a class="btn btn-danger" href="annonces.php"><b><font color=white>Liste des annonces</font></b></a>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
          <div class="box">
            <center><h4 class="title">Liste des Fonctions:</h4></center>
			<a class="btn btn-success" href="partenaire.php"><b><font color=white>Les Partenaires</font></b></a>
			<a class="btn btn-danger" href="assurance.php"><b><font color=white>LeBonCoin Assurance</font></b></a>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
          <div class="box">
            <center><h4 class="title">Liste de toute les Logs:</h4>
			<a class="btn btn-success" href="logs.php"><b><font color=white>Voir les logs</font></b></a></center>
          </div>
        </div>
      </div>
	  
	  
    </div>
  </section>
 



<?php

include "../includes/footer.php";

?>
