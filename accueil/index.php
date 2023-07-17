<?php

include "../includes/head.php";
include "../includes/header.php";

$result = mysqli_query($con, "SELECT * FROM `users`") or die(mysqli_error($con));
$usersNb = mysqli_num_rows($result);

$result = mysqli_query($con, "SELECT * FROM `vendu`") or die(mysqli_error($con));
$venduNb = mysqli_num_rows($result);

$result = mysqli_query($con, "SELECT * FROM `annonce`") or die(mysqli_error($con));
$annonceNb = mysqli_num_rows($result);

$result = mysqli_query($con, "SELECT * FROM `assurance`") or die(mysqli_error($con));
$assuranceNb = mysqli_num_rows($result);

if (isset($_POST['ajout'])) {
            if (isset($_POST['TITRE']) && isset($_POST['DESCRIPTION']) && isset($_POST['VENTEPRIX']) && isset($_POST['OBJET']) && isset($_POST['ETAT']) && isset($_POST['DISCORDMAIL']) && isset($_POST['TEL'])) {

				$TITRE = mysqli_real_escape_string($con, $_POST['TITRE']);
				$ID = '' . rand(1000000, 9999999) . '';
				$DESCRIPTION = mysqli_real_escape_string($con, $_POST['DESCRIPTION']);
				$VENTEPRIX = mysqli_real_escape_string($con, $_POST['VENTEPRIX']);
				$OBJET = mysqli_real_escape_string($con, $_POST['OBJET']);
				$TEL = mysqli_real_escape_string($con, $_POST['TEL']);
				$ETAT = mysqli_real_escape_string($con, $_POST['ETAT']);
				$DISCORDMAIL = mysqli_real_escape_string($con, $_POST['DISCORDMAIL']);
				$URL = mysqli_real_escape_string($con, $_POST['URL']);
				$date = time();
				
				
			mysqli_query($con, "INSERT INTO annonce (`ID`, `ID_CLIENT`, `VENTEPRIX`, `OBJET`, `DESCRIPTION`, `TEL`, `USERNAME`, `ETAT`, `VENDEUR`, `DISCORDMAIL`, `DATE`, `PUBLICATION`, `URL`, `TITRE`) VALUES('$ID', '$ID_CLIENT', '$VENTEPRIX', '$OBJET', '$DESCRIPTION', '$TEL', 'Pas encore', '$ETAT', '$username', '$DISCORDMAIL', '$date', '1', '$URL', '$TITRE')") or die(mysqli_error($con));
			mysqli_query($con, "INSERT INTO logs (`TYPE`, `DATE`, `STAFF`, `MESSAGE`) VALUES('Client', '$date', 'Annonce', 'Ajout Annonce du Client $ID_CLIENT $username')") or die(mysqli_error($con));

       
        

        echo '<script>
                                                $(document).ready(function () {
                                                    toastr["success"]("Annonce Effectué !", "Bravo:")
                                                });
                                            </script><META http-equiv="refresh" content="2;URL=index.php">';
    }
}

?>

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container">

      <div class="intro-img">
        <img src="../assets/img/intro-img.svg" alt="" class="img-fluid">
      </div>

      <div class="intro-info">
        <h2>Bienvenue sur<br><span><font color=orange>LeBonCoin</font></span><br> Site de revente de vos objets fiable !</h2>
        <div>
		<?php if (isset($_SESSION['user'])) {  ?>
		          <a href="../account" class="btn-get-started scrollto"><?php echo $username; ?></a>
		  <?php } else { ?>
		  <a href="../connexion" class="btn-get-started scrollto">Connexion</a>
		  <?php } ?>
          <p href="#annonce" data-toggle="modal" class="btn-services scrollto">Vendre un produit</p>
        </div>
      </div>

    </div>
  </section><!-- #intro -->

  <main id="main">

   

  
    <!--==========================
      Why Us Section
    ============================-->
    <section id="why-us" class="wow fadeIn">
      <div class="container">
        <header class="section-header">
          <h3>Pourquoi nous ?</h3>
          <p>Car tout simplement nous sommes une plateforme libre d'accès et fiable dans toutes les ventes de vos anciennes voiture, bouteille etc... .</p>
        </header>

        <div class="row row-eq-height justify-content-center">

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <center><img src="../assets/accueil/Fiabilité.png" width="220" ></img></center>
              <div class="card-body">
                <h5 class="card-title">Fiabilité</h5>
                <p class="card-text">LeBonCoin vous propose une assurance pour éviter toute les arnaques en france.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <center><img src="../assets/accueil/securité.png" width="220" ></img></center>
              <div class="card-body">
                <h5 class="card-title">Sécurité</h5>
                <p class="card-text">LeBonCoin vous propose un site avec des donnèes crypter de A à Z.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
                <center><img src="../assets/accueil/unnamed.png" width="220" ></img></center>
              <div class="card-body">
                <h5 class="card-title">Premium</h5>
                <p class="card-text">LeBonCoin vous propose une option supplémentaire afin de mieux vendre vos produits et de profiter des meilleurs acheteur.</p>
              </div>
            </div>
          </div>

        </div>

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php echo $usersNb; ?></span>
            <p>Clients</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php echo $venduNb; ?></span>
            <p>Produits Vendu</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php echo $annonceNb; ?></span>
            <p>Annonces</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up"><?php echo $assuranceNb; ?></span>
            <p>Total d'Assurances</p>
          </div>
  
        </div>

      </div>
    </section>

    <section id="clients" class="section-bg">
    <div class="container">
      <div class="section-header">
        <h3>Publicité LeBonCoin</h3>
        <p>Toute les publicités sont en contrat avec LeBonCoin afin de le faire de la pub.</p>
      </div>
      <div class="row no-gutters clients-wrap clearfix wow fadeInUp">
	  <?php
                                        $result = mysqli_query($con, "SELECT * FROM partenaire") or die(mysqli_error($con));
                                        while ($resultatInfos = mysqli_fetch_array($result)) {
										$ID = $resultatInfos['ID'];
                                        $TITRE = $resultatInfos['TITRE'];
										$URL = $resultatInfos['URL'];
                                        $MESSAGE = $resultatInfos['MESSAGE'];
										
                                        ?>
        <div class="col-lg-3 col-md-4 col-xs-6">
          <div class="client-logo"><img src="<?php echo $resultatInfos['URL']; ?>" class="img-fluid" alt="Pub LeBonCoin">
		  <br><br>
		  <center><p class="btn btn-dark" href="#pub<?php echo $ID; ?>" data-toggle="modal"><b>Voir plus</b></p></center>
		  </div>
        </div>
		
		<?php } ?>
      </div>
    </div>
  </section>


    <!--==========================
     Section LeBonCoin Staff
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header">
          <h3>Nos employés</h3>
          <p>L'entreprise LeBonCoin à une équipe fiable et compétente afin de vous servir du mieux que possible.</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="../assets/staff/pablo.png" class="img-fluid" width="350">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Pablo Sacra</h4>
                  <span>Fondateur du Groupe LeBonCoin</span>
                  <div class="social">
                  <h6><b><font color=white>Numéro de téléphone: 06.99.49.64.59</font></B></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

              <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="../assets/staff/steve.png" class="img-fluid" width="350">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Steve Delano</h4>
                  <span>CoFondateur du Groupe LeBonCoin</span>
                  <div class="social">
                  <h6><b><font color=white>Numéro de téléphone: 06.06.75.65.91</font></B></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

                        <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="https://cmsphoto.ww-cdn.com/superstatic/62974/art/grande/30054003-28834812.jpg?v=1548326849" class="img-fluid" width="350">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Nous Recrutons</h4>
                  <span>Envoie ton CV à Pablo Sacra sur le mail</span>
                  <div class="social">
                  <h6><b><font color=white>Si aucune réponse contacte le 06.99.49.64.59</font></B></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

                        <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="https://cmsphoto.ww-cdn.com/superstatic/62974/art/grande/30054003-28834812.jpg?v=1548326849" class="img-fluid" width="350">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Nous Recrutons</h4>
                  <span>Envoie ton CV à Pablo Sacra sur le mail</span>
                  <div class="social">
                  <h6><b><font color=white>Si aucune réponse contacte le 06.99.49.64.59</font></B></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #team -->

	  <?php
                                        $result = mysqli_query($con, "SELECT * FROM partenaire") or die(mysqli_error($con));
                                        while ($resultatInfos = mysqli_fetch_array($result)) {
										$ID = $resultatInfos['ID'];
                                        $TITRE = $resultatInfos['TITRE'];
										$URL = $resultatInfos['URL'];
                                        $MESSAGE = $resultatInfos['MESSAGE'];
										
                                        ?>
<div id="pub<?php echo $ID; ?>" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <center><h4><?php echo $TITRE; ?> - LeBonCoin</h4></center>
		            <button type="button" class="close" data-dismiss="modal">×</button>

           </div>
                <div class="modal-body">
                <form method="POST" action="">
					<div class="form-group">
					    <input type="text" placeholder="Titre de la publicité: <?php echo $TITRE; ?>" class="form-control" size="30" disabled>
						<br>
						<textarea type="text" placeholder="<?php echo $MESSAGE; ?>" class="form-control" size="1450" disabled></textarea>
					  </div>
					<input type="button" data-dismiss="modal" class="btn btn-danger btn-lg btn-block" value="Fermer">
				</form>
			</div>
		</div>
    </div>
</div>
<?php } ?>
   

  </main>
  
   <div id="annonce" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <center><h4>Vendre un produit - LeBonCoin</h4></center>
		            <button type="button" class="close" data-dismiss="modal">×</button>

           </div>
                <div class="modal-body">
				<?php if (isset($_SESSION['user'])) {  ?>
				<form method="POST" action="">
					<div class="form-group">
						<input type="text" name="TITRE" placeholder="Titre de l'annonce" class="form-control" size="30" required="">
						<br>
						<textarea type="text" name="DESCRIPTION" placeholder="Description de l'annonce" class="form-control" size="30" required=""></textarea>
						<br>
						<input type="text" name="VENTEPRIX" placeholder="Prix de l'annonce" class="form-control" size="30" required="">
						<br>
						<input type="text" name="OBJET" placeholder="Objet en vente ?" class="form-control" size="30" required="">
						<br>
						<select class="form-control" id="exampleFormControlSelect1" name="ETAT">
                        <option value="Neuf">Neuf</option>
						<option value="Ancien">Ancien</option>
						<option value="Cassé">Cassé</option>
						<option value="Etat Moyen">Etat Moyen</option> 
                        </select>
						<br>
						<input type="text" name="URL" placeholder="https://noelshack.com" class="form-control" size="30" required="">
						<br>
						<input type="text" name="DISCORDMAIL" placeholder="Mail Discord (VOTREPSEUDO#4223)" class="form-control" size="30" required="">
						<br>
						<input type="text" name="TEL" placeholder="Numéro de téléphone (Parisien)" class="form-control" size="30" required="">
					  </div>
					<input type="submit" name="ajout" class="btn btn-success btn-lg btn-block" value="Publier l'annonce">
					</form>
					<?php } else { ?>
					<center><h4><b><font color=#7a1515>Pour pouvoir vendre un produit merci de vous connecter :)</font></b></h4></center>
				   <a href="../connexion" class="btn btn-success btn-lg btn-block">Connexion</a>
                   <?php } ?>			</div>
		</div>
    </div>
</div>
  
<?php
include "../includes/footer.php";
?>