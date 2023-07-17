<?php

require '../includes/head.php';
require '../includes/header.php';

if (!isset($_GET['id'])) {
    header('Location: encheres.php');
    exit();
}

if ($rank < 4) {
    header('Location: ../account/');
    exit();
}

$idUser = mysqli_real_escape_string($con, $_GET['id']);
$result = mysqli_query($con, "SELECT * FROM `enchere` WHERE `ID` = '$idUser' LIMIT 1") or die(mysqli_error($con));

while ($userInfo = mysqli_fetch_array($result)) {
    $ID = $userInfo['ID'];
	$URL = $userInfo['URL'];
    $TITRE = $userInfo['TITRE'];
	$DESCRIPTION = $userInfo['DESCRIPTION'];
    $DEPARTPRIX = $userInfo['DEPARTPRIX'];
	$VENTEPRIX = $userInfo['VENTEPRIX'];
    $FIN = $userInfo['FIN'];
	$ORGANISATEUR = $userInfo['ORGANISATEUR'];

}


if ($rank == 4 && $rank == 5) {
    header('Location: encheres.php');
    exit();
}


if (isset($_POST['edit'])) {
	if (isset($_POST['TITRE'])) {
        if ($rank == 5 || $rank == 4) {
		$TITRE = mysqli_real_escape_string($con, $_POST['TITRE']);
        mysqli_query($con, "UPDATE `enchere` SET `TITRE` = '$TITRE' WHERE `id` = '$idUser'") or die(mysqli_error($con));
		$date = time();
		mysqli_query($con, "INSERT INTO logs (`TYPE`, `DATE`, `STAFF`, `MESSAGE`) VALUES('Staff', '$date', '$username', 'Modification de enchère $TITRE')") or die(mysqli_error($con));
        }
    }
	
	if (isset($_POST['URL'])) {
        if ($rank == 5 || $rank == 4) {
		$URL = mysqli_real_escape_string($con, $_POST['URL']);
        mysqli_query($con, "UPDATE `enchere` SET `URL` = '$URL' WHERE `id` = '$idUser'") or die(mysqli_error($con));
        }
    }
	
	if (isset($_POST['DESCRIPTION'])) {
        if ($rank == 5 || $rank == 4) {
		$DESCRIPTION = mysqli_real_escape_string($con, $_POST['DESCRIPTION']);
        mysqli_query($con, "UPDATE `enchere` SET `DESCRIPTION` = '$DESCRIPTION' WHERE `id` = '$idUser'") or die(mysqli_error($con));
        }
    }
	
	if (isset($_POST['DEPARTPRIX'])) {
        if ($rank == 5 || $rank == 4) {
		$DEPARTPRIX = mysqli_real_escape_string($con, $_POST['DEPARTPRIX']);
        mysqli_query($con, "UPDATE `enchere` SET `DEPARTPRIX` = '$DEPARTPRIX' WHERE `id` = '$idUser'") or die(mysqli_error($con));
        }
    }
	
	if (isset($_POST['VENTEPRIX'])) {
        if ($rank == 5 || $rank == 4) {
		$VENTEPRIX = mysqli_real_escape_string($con, $_POST['VENTEPRIX']);
        mysqli_query($con, "UPDATE `enchere` SET `VENTEPRIX` = '$VENTEPRIX' WHERE `id` = '$idUser'") or die(mysqli_error($con));
        }
    }
	
	if (isset($_POST['FIN'])) {
        if ($rank == 5 || $rank == 4) {
		$FIN = mysqli_real_escape_string($con, $_POST['FIN']);
        mysqli_query($con, "UPDATE `enchere` SET `FIN` = '$FIN' WHERE `id` = '$idUser'") or die(mysqli_error($con));
        }
    }

    if (isset($_POST['ORGANISATEUR'])) {
        if ($rank == 5 || $rank == 4) {
		$ORGANISATEUR = mysqli_real_escape_string($con, $_POST['ORGANISATEUR']);
        mysqli_query($con, "UPDATE `enchere` SET `ORGANISATEUR` = '$ORGANISATEUR' WHERE `id` = '$idUser'") or die(mysqli_error($con));
        }
    } 

    echo '<script>
                                                $(document).ready(function () {
                                                    toastr["success"]("Modification faite :)", "Bravo:")
                                                });
                                            </script><META http-equiv="refresh" content="2;URL=encheres.php">';
}


if (isset($_POST['delete'])) {
    if ($rank == 4 || $rank == 5) {
        mysqli_query($con, "DELETE FROM `enchere` WHERE `id` = '$idUser'") or die(mysqli_error($con));
		$date = time();
		mysqli_query($con, "INSERT INTO logs (`TYPE`, `DATE`, `STAFF`, `MESSAGE`) VALUES('Staff', '$date', '$username', 'Suppresion enchère $TITRE prix de vente: $VENTEPRIX')") or die(mysqli_error($con));

        echo '<script>
                                                $(document).ready(function () {
                                                    toastr["success"]("Suppresion enchère !", "Bravo:")
                                                });
                                            </script><META http-equiv="refresh" content="2;URL=encheres.php">';
    }
}
?>
<br>
<br>

  <section id="services" class="section-bg">
    <div class="container">
      <header class="section-header">
	  	  <center><img src='https://grandparisrp.cf/img/logo.png' width="110"></img></center>
        <h3>Administration LeBonCoin</h3>
        <p>Liste de toute les enchères LeBonCoin de Grand Paris RP</p>
		<br>
      </header>
      <div class="row">
      
	        
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title-wrap bar-success">
            <center><h3 class="box-title m-b-0">Enchère: <?php echo $TITRE; ?></h3>
                        <p class="text-muted m-b-30">Remplissez le formulaire ci-dessous pour modifier l'enchère</p></center>
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
                                <label for="example-search-input" class="col-2 col-form-label">Message de l'enchère</label>
                                <div class="col-10">
                                    <input class="form-control" name="DESCRIPTION" type="search" value="<?php echo $DESCRIPTION; ?>"
                                           id="example-search-input">
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Prix de départ</label>
                                <div class="col-10">
                                    <input class="form-control" name="DEPARTPRIX" type="search" value="<?php echo $DEPARTPRIX; ?>"
                                           id="example-search-input">
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Fin de l'enchère</label>
                                <div class="col-10">
                                    <input class="form-control" name="FIN" type="date" value="<?php echo $FIN; ?>"
                                           id="example-search-input">
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Organisateur</label>
                                <div class="col-10">
                                    <input class="form-control" name="ORGANISATEUR" type="search" value="<?php echo $ORGANISATEUR; ?>"
                                           id="example-search-input">
                                </div>
                            </div>
							
							<div class="form-group row">
                                <label for="example-search-input" class="col-2 col-form-label">Prix de vente</label>
                                <div class="col-10">
                                    <input class="form-control" name="VENTEPRIX" type="search" value="<?php echo $VENTEPRIX; ?>"
                                           id="example-search-input">
                                </div>
                            </div>

                            <center>
                                <button type="submit" name="edit" class="btn btn-info waves-effect waves-light m-r-10">
                                    Editer l'enchère
                                </button>
                                <br/>
								                                <br/>

								<button type="submit" name="delete" class="btn btn-danger waves-effect waves-light m-r-10">
                                    Supprimer l'enchère
                                </button>
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
