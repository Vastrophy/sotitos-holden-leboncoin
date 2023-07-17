<?php

require '../includes/head.php';
require '../includes/header.php';

if (!isset($_SESSION['user'])) {
    header('Location: ../connexion/');
    exit();
}


if (!isset($_GET['id'])) {
    header('Location: annonces.php');
    exit();
}

if ($rank < 4) {
    header('Location: ../account/');
    exit();
}

$idUser = mysqli_real_escape_string($con, $_GET['id']);
$result = mysqli_query($con, "SELECT * FROM `annonce` WHERE `ID` = '$idUser' LIMIT 1") or die(mysqli_error($con));

while ($userInfo = mysqli_fetch_array($result)) {
    $ID_CLIENT = $userInfo['ID_CLIENT'];
	$TITRE = $userInfo['TITRE'];
    $VENTEPRIX = $userInfo['VENTEPRIX'];
	$OBJET = $userInfo['OBJET'];
    $DESCRIPTION = $userInfo['DESCRIPTION'];
	$TEL = $userInfo['TEL'];
	$URL = $userInfo['URL'];
    $DISCORDMAIL = $userInfo['DISCORDMAIL'];
	$PUBLICATION = $userInfo['PUBLICATION'];

}


if ($rank == 4 && $rank == 5) {
    header('Location: annonces.php');
    exit();
}

if (isset($_POST['vendu'])) {
        mysqli_query($con, "DELETE FROM `annonce` WHERE `ID` = '$idUser'") or die(mysqli_error($con));
		$date = time();
		mysqli_query($con, "INSERT INTO vendu (`FIN`, `CVENDEUR`, `CVENTEPRIX`, `CTITRE`) VALUES('$date', '$username', '$VENTEPRIX', '$TITRE')") or die(mysqli_error($con));
		mysqli_query($con, "INSERT INTO logs (`TYPE`, `DATE`, `STAFF`, `MESSAGE`) VALUES('Staff', '$date', '$username', 'Suppresion annonce $TITRE prix de vente: $VENTEPRIX')") or die(mysqli_error($con));

        echo '<script>
                                                $(document).ready(function () {
                                                    toastr["success"]("Suppresion enchère !", "Bravo:")
                                                });
                                            </script><META http-equiv="refresh" content="2;URL=index.php">';
    
}


if (isset($_POST['edit'])) {
	if (isset($_POST['TITRE'])) {
		$TITRE = mysqli_real_escape_string($con, $_POST['TITRE']);
        mysqli_query($con, "UPDATE `annonce` SET `TITRE` = '$TITRE' WHERE `id` = '$idUser'") or die(mysqli_error($con));
		
		$date = time();
		mysqli_query($con, "INSERT INTO logs (`TYPE`, `DATE`, `STAFF`, `MESSAGE`) VALUES('Client', '$date', '$username', 'Modification Annonce $TITRE')") or die(mysqli_error($con));

    }
	
	if (isset($_POST['URL'])) {
		$URL = mysqli_real_escape_string($con, $_POST['URL']);
        mysqli_query($con, "UPDATE `annonce` SET `URL` = '$URL' WHERE `id` = '$idUser'") or die(mysqli_error($con));
        
    }
	
	if (isset($_POST['DESCRIPTION'])) {
		$DESCRIPTION = mysqli_real_escape_string($con, $_POST['DESCRIPTION']);
        mysqli_query($con, "UPDATE `annonce` SET `DESCRIPTION` = '$DESCRIPTION' WHERE `id` = '$idUser'") or die(mysqli_error($con));
        
    }
	
	if (isset($_POST['OBJET'])) {
		$OBJET = mysqli_real_escape_string($con, $_POST['OBJET']);
        mysqli_query($con, "UPDATE `annonce` SET `OBJET` = '$OBJET' WHERE `id` = '$idUser'") or die(mysqli_error($con));
        
    }
	
	if (isset($_POST['VENTEPRIX'])) {
		$VENTEPRIX = mysqli_real_escape_string($con, $_POST['VENTEPRIX']);
        mysqli_query($con, "UPDATE `annonce` SET `VENTEPRIX` = '$VENTEPRIX' WHERE `id` = '$idUser'") or die(mysqli_error($con));
        
    }
	
	if (isset($_POST['TEL'])) {
		$TEL = mysqli_real_escape_string($con, $_POST['TEL']);
        mysqli_query($con, "UPDATE `annonce` SET `TEL` = '$TEL' WHERE `id` = '$idUser'") or die(mysqli_error($con));
        
    }
	
	if (isset($_POST['DISCORDMAIL'])) {
		$DISCORDMAIL = mysqli_real_escape_string($con, $_POST['DISCORDMAIL']);
        mysqli_query($con, "UPDATE `annonce` SET `DISCORDMAIL` = '$DISCORDMAIL' WHERE `id` = '$idUser'") or die(mysqli_error($con));
        
    }
	
	if (isset($_POST['PUBLICATION'])) {
		$PUBLICATION = mysqli_real_escape_string($con, $_POST['PUBLICATION']);
        mysqli_query($con, "UPDATE `annonce` SET `PUBLICATION` = '$PUBLICATION' WHERE `id` = '$idUser'") or die(mysqli_error($con));
        
    }

    echo '<script>
                                                $(document).ready(function () {
                                                    toastr["success"]("Modification faite :)", "Bravo:")
                                                });
                                            </script><META http-equiv="refresh" content="2;URL=index.php">';
}



?>
<br>
<br>

  <section id="services" class="section-bg">
    <div class="container">
      <header class="section-header">
	  	  <center><img src='https://grandparisrp.cf/img/logo.png' width="110"></img></center>
        <h3>Edition LeBonCoin</h3>
        <p>Edition d'une annonce LeBonCoin de Grand Paris RP</p>
		<br>
      </header>
      <div class="row">
      
	        
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title-wrap bar-success">
            <center><h3 class="box-title m-b-0">Annonce: <?php echo $TITRE; ?></h3>
                        <p class="text-muted m-b-30">Remplissez le formulaire ci-dessous pour modifier l'annonce</p></center>
          </div>
        </div>
        <div class="card-body">
          <div class="card-block">
            <div class="row my-2">
              <div class="col-md-11">
                <div class="form-group">
                        <form class="form" action="#" method="POST">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-2 col-form-label">Titre de l'annonce</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="TITRE" value="<?php echo $TITRE; ?>"
                                           id="example-text-input">
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Url de de l'image</label>
                                <div class="col-10">
                                    <input class="form-control" name="URL" type="search" value="<?php echo $URL; ?>"
                                           id="example-search-input">
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Message de l'annonce</label>
                                <div class="col-10">
                                    <textarea class="form-control" name="DESCRIPTION" type="search"
                                           id="example-search-input"><?php echo $DESCRIPTION; ?></textarea>
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Objet en vente:</label>
                                <div class="col-10">
                                    <input class="form-control" name="OBJET" type="search" value="<?php echo $OBJET; ?>"
                                           id="example-search-input">
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Prix de l'annonce:</label>
                                <div class="col-10">
                                    <input class="form-control" name="VENTEPRIX" type="search" value="<?php echo $VENTEPRIX; ?>"
                                           id="example-search-input">
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Téléphone:</label>
                                <div class="col-10">
                                    <input class="form-control" name="TEL" type="search" value="<?php echo $TEL; ?>"
                                           id="example-search-input">
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Mail discord:</label>
                                <div class="col-10">
                                    <input class="form-control" name="DISCORDMAIL" type="search" value="<?php echo $DISCORDMAIL; ?>"
                                           id="example-search-input">
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="example-password-input" class="col-2 col-form-label">Status De l'annonce</label>
                                <div class="col-10">
                                    <select class="form-control" name="PUBLICATION">
                                        <?php
                                        function selectedS($check, $PUBLICATION1)
                                        {
                                            if ($check == $PUBLICATION1) {
                                                return 'selected="selected"';
                                            }
                                        }

                                        ?>

                                        <option value="1" <?php echo selectedS(1, $PUBLICATION); ?>> 🛒 A VENDRE !
                                        </option>
										<option value="2" <?php echo selectedS(2, $PUBLICATION); ?>> ✅ ANNONCE CERTIFIÉ !</option>
										<option value="0" <?php echo selectedS(0, $PUBLICATION); ?>> VENDU !</option>
                                    </select>
                                </div>
                            </div>

                            <center>
                                <button type="submit" name="edit" class="btn btn-info waves-effect waves-light m-r-10">
                                    Editer l'annonce
                                </button>
								<br><br>
								 <button type="submit" name="vendu" class="btn btn-success waves-effect waves-light m-r-10">
                                    L'annonce est vendu !
                                </button>
                                <br/>
                            </center>
                        </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


	  
	  
      </div>
	  <br>
  <br>
  <br>
  <br>

  </section>
 



<?php

include "../includes/footer.php";

?>
