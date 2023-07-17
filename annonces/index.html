<?php

include "../includes/head.php";
include "../includes/header.php";

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
<br>
<br>

  <section id="services" class="section-bg">
    <div class="container">
      <header class="section-header">
	  <center><img src='https://grandparisrp.cf/img/logo.png' width="110"></img></center>
        <h3>Les Annonces LeBonCoin</h3>
        <p>Cette page contient toute les annonces de vente LeBonCoin de Grand Paris RP</p>
		<br>
      </header>
      <div class="row">


<div class="alert alert-warning" role="alert">
  <center><h4 class="alert-heading">Votre Attention !</h4>
  <p>Notre système d'annonce est géré par les utilisateurs vous pouvez faire au temps d'annonce que vous souhaitez gratuitement. 
  Cependant nous pouvons avoir des arnaques sur notre plate-forme mais nous avons la solution profitée de l'assurance Vol ici => <strong><a href="../options">Assurance</a></strong></p>
  <hr>
  <p class="mb-0"><center><a class="btn btn-success" href="#annonce" data-toggle="modal"><b>Ajouter une annonce</b></a>   <?php if (isset($_SESSION['user'])) {  ?>
<a class="btn btn-warning" href="#mesannonces" data-toggle="modal"><b>Editer mes annonces</b></a><?php } ?></center></p></center>

</div>

  


                       </div>

                    </div>

	  
	  
  </section>
  

    <section id="why-us" class="wow fadeIn">
      <div class="container">

        <div class="row row-eq-height justify-content-center">

         <?php
                                        $result = mysqli_query($con, "SELECT * FROM annonce") or die(mysqli_error($con));
                                        while ($resultatInfos = mysqli_fetch_array($result)) {
										$ID = $resultatInfos['ID'];
                                        $OBJET = $resultatInfos['TITRE'];
										$URL = $resultatInfos['URL'];
                                        $DESCRIPTION = $resultatInfos['DESCRIPTION'];
										$VENTEPRIX = $resultatInfos['VENTEPRIX'];
										$VENDEUR = $resultatInfos['VENDEUR'];
										$DATE = $resultatInfos['DATE'];
										$ETAT = $resultatInfos['ETAT'];
										$TEL = $resultatInfos['TEL'];
										$DISCORDMAIL = $resultatInfos['DISCORDMAIL'];
										$PUBLICATION = $resultatInfos['PUBLICATION'];
										
										if ($PUBLICATION == 1)
                                         $pub = '<h3><span class="badge badge-secondary badge-success">🛒 A VENDRE !</span></h3>';
	                                    else if ($PUBLICATION == 2)
                                         $pub = '<h3><span class="badge badge-secondary badge-dark">✅ ANNONCE CERTIFIÉ !</span></h3>';
                                        else
                                         $pub = '<h3><span class="badge badge-secondary badge-danger">VENDU !</span></h3>';
										
                                        ?>
		 <div class="col-lg-4 mb-4">
            <div class="card wow bounceInUp">
				<?php echo $pub; ?>
                <center><img src="<?php echo $resultatInfos['URL']; ?>" width="220" ></img></center>
              <div class="card-body">
                <h5 class="card-title"><?php echo $resultatInfos['TITRE']; ?></h5>
                <p class="card-text"><?php echo $resultatInfos['DESCRIPTION']; ?></p>
				<h6><b>Prix: <font color=orange><?php echo $resultatInfos['VENTEPRIX']; ?></font></b></h6>
				<h6><b>Vendeur: <font color=orange><?php echo $resultatInfos['VENDEUR']; ?></font></b></h6>
				<h6><b>Date: <font color=yellow><?php echo date("d-m-Y à H:i:s", $resultatInfos['DATE']); ?></font></b></h6>
				<a class="btn btn-warning" href="#info<?php echo $resultatInfos['ID']; ?>" data-toggle="modal"><b>Plus d'informations</b></a>
              </div>
            </div>
          </div>
		  
		   <div id="info<?php echo $resultatInfos['ID']; ?>" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <center><h4>Annonce <?php echo $resultatInfos['TITRE']; ?></h4></center>
		            <button type="button" class="close" data-dismiss="modal">×</button>

           </div>
                <div class="modal-body">
				<form method="POST" action="">
					<div class="form-group">
						<label for="exampleFormControlSelect1">Titre de l'annonce:</label>
						<input type="text" placeholder="<?php echo $resultatInfos['TITRE']; ?>" class="form-control" size="30" disabled>
						<label for="exampleFormControlSelect1">Description de l'annonce:</label>
						<textarea type="text" placeholder="<?php echo $resultatInfos['DESCRIPTION']; ?>" class="form-control" size="30" disabled></textarea>
						<label for="exampleFormControlSelect1">Prix de l'annonce:</label>
						<input type="text" placeholder="<?php echo $resultatInfos['VENTEPRIX']; ?>" class="form-control" size="30" disabled>
						<label for="exampleFormControlSelect1">Etat du produit:</label>
						<input type="text" placeholder="<?php echo $resultatInfos['ETAT']; ?>" class="form-control" size="30" disabled>
						<label for="exampleFormControlSelect1">Numéro de téléphone du vendeur:</label>
						<input type="text" placeholder="<?php echo $resultatInfos['TEL']; ?>" class="form-control" size="30" disabled>
						<label for="exampleFormControlSelect1">Mail Discord du vendeur:</label>
						<input type="text" placeholder="<?php echo $resultatInfos['DISCORDMAIL']; ?>" class="form-control" size="30" disabled>
					  </div>
					<input class="btn btn-danger btn-lg btn-block" data-dismiss="modal" value="Fermer">
					</form>
			</div>
		</div>
    </div>
</div>
		  <?php } ?>

        </div>

      </div>
    </section>
 
 
 <div id="annonce" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <center><h4>Ajouter une annonce - LeBonCoin</h4></center>
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
					<center><h4><b><font color=#7a1515>Pour pouvoir faire une annonce merci de vous connecter :)</font></b></h4></center>
				   <a href="../connexion" class="btn btn-success btn-lg btn-block">Connexion</a>
                   <?php } ?>			</div>
		</div>
    </div>
</div>

										
	<div id="mesannonces" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <center><h4>Mes Annonces - LeBonCoin</h4></center>
		            <button type="button" class="close" data-dismiss="modal">×</button>

           </div>
                <div class="modal-body">
				<form method="POST" action="">
					<div class="form-group">
					<?php
       $result = mysqli_query($con, "SELECT * FROM annonce WHERE ID_CLIENT = '$ID_CLIENT'") or die(mysqli_error($con));
    while ($resultatInfos = mysqli_fetch_array($result)) {
        $TITRE = $resultatInfos['TITRE'];

?>
                        <br>
						<center><a class="btn btn-success  btn-block" href="annonce.php?id=<?php echo $resultatInfos['ID']; ?>">Editer l'annonce: <?php echo $resultatInfos['TITRE']; ?> à <?php echo $resultatInfos['VENTEPRIX']; ?></a></center>
						
						<?php } ?>
					  </div>
					<input class="btn btn-danger btn-lg btn-block" data-dismiss="modal" value="Fermer">
					</form>
			</div>
		</div>
    </div>
</div>
										





<?php

include "../includes/footer.php";

?>
