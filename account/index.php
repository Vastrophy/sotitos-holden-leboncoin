<?php

include "../includes/head.php";
include "../includes/header.php";

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
}

$result = mysqli_query($con, "SELECT * FROM `users` WHERE `USERNAME` = '$username'") or die(mysqli_error($con));

while ($row = mysqli_fetch_array($result)) {
    $email = $row['EMAIL'];
    $id_client = $row['ID_CLIENT'];
    $dateOfRegister = $row['DATE_INSCRIPTION'];
    $rank = $row['RANK'];
    $naissance = $row['NAISSANCE'];
	

    if ($rank == 5)
        $grade = "<font color=#1072a3>PDG LeBonCoin</font>";
	else if ($rank == 4)
        $grade = "<font color=#ad500e>Staff LeBonCoin</font>";
    else if ($rank == 3)
        $grade = "<font color=#ebc909>Premium LeBonCoin</font>";
    else
        $grade = "<font color=#ff5b03>Client LeBonCoin</font>";

}

if (isset($_POST['modif'])) {
            if (isset($_POST['username']) && isset($_POST['naissance'])) {

				$username = mysqli_real_escape_string($con, $_POST['username']);
				$naissance = mysqli_real_escape_string($con, $_POST['naissance']);
				$date = time();
				
				
			mysqli_query($con, "UPDATE `users` SET `USERNAME` = '$username' WHERE `ID_CLIENT` = '$ID_CLIENT'") or die(mysqli_error($con));
			mysqli_query($con, "UPDATE `users` SET `NAISSANCE` = '$naissance' WHERE `ID_CLIENT` = '$ID_CLIENT'") or die(mysqli_error($con));
		    mysqli_query($con, "INSERT INTO logs (`TYPE`, `DATE`, `STAFF`, `MESSAGE`) VALUES('Client', '$date', 'Aucun Staff', 'Modification du client $prenom $username')") or die(mysqli_error($con));

       
        

        echo '<script>
                                                $(document).ready(function () {
                                                    toastr["success"]("Sauvegarde Effectué !", "Bravo:")
                                                });
                                            </script><META http-equiv="refresh" content="2;URL=../accueil">';
    }
}

?>
<br>
<br>

  <section id="services" class="section-bg">
    <div class="container">
      <header class="section-header">
        <h3>Espace Client LeBonCoin</h3>
        <p>Cette page contient toute vos informations de votre compte LeBonCoin de Grand Paris RP</p>
		<center><a class="btn btn-warning" href="#modification" data-toggle="modal"><b>Je souhaite faire une modification</b></a></center>
		<br>
      </header>
      <div class="row">
        <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-duration="1.4s">
          <div class="box">
            <h4 class="title">ID LeBonCoin</h4>
            <b><p class="description"><font color=#ff5b03><?php echo $id_client; ?></font></p></b>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-duration="1.4s">
          <div class="box">
            <h4 class="title">Prénom & Nom</h4>
           <b> <p class="description"><font color=#ff5b03><?php echo $username; ?></font></p></b>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
          <div class="box">
            <h4 class="title">Date D'inscription:</h4>
           <b> <p class="description"><font color=#ff5b03><?php echo date("d-m-Y", $dateOfRegister); ?></font></p></b>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
          <div class="box">
            <h4 class="title">Abonnement:</h4>
           <b> <p class="description"><font color=#ff5b03><?php echo $grade; ?></font></p></b>
          </div>
        </div>
        <div class="col wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
          <div class="box">
            <center><h4><b>Date de naissance:</b></h4>
            <a><b><font color=#ff5b03><?php echo $naissance; ?></font></a></p></center>
          </div>
        </div>
      </div>
    </div>
  </section>
 


<div id="modification" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <center><h4>Modification Client - LeBonCoin</h4></center>
		            <button type="button" class="close" data-dismiss="modal">×</button>

           </div>
                <div class="modal-body">
                <form method="POST" action="">
					<div class="form-group">
						<input type="text" name="username" placeholder="<?php echo $username; ?>" class="form-control" size="30" required="">
						<br>
						<input type="date" name="naissance" placeholder="<?php echo $naissance; ?>" class="form-control" size="30" required="">
					  </div>
					<input type="submit" name="modif" class="btn btn-success btn-lg btn-block" value="Enregistrer les modifications">
				</form>
			</div>
		</div>
    </div>
</div>



<?php

include "../includes/footer.php";

?>
