<?php

include "../includes/head.php";
include "../includes/header.php";

if ($rank < 4) {
    header('Location: ../account/');
    exit();
}

if (isset($_GET['ban'])) {
    $id = mysqli_real_escape_string($con, $_GET['ban']);

    mysqli_query($con, "UPDATE `users` SET `STATUS` = '0' WHERE `ID` = '$id'") or die(mysqli_error($con));

    echo '<script>
			window.history.replaceState("object or string", "Title", "membres.php");
		</script>';

    echo '<script>
                                                $(document).ready(function () {
                                                    toastr["success"]("Vous avez banni ce membre.", "Bravo:")
                                                });
                                            </script>';
}

if (isset($_GET['unban'])) {
    $id = mysqli_real_escape_string($con, $_GET['unban']);

    mysqli_query($con, "UPDATE `users` SET `STATUS` = '1' WHERE `ID` = '$id'") or die(mysqli_error($con));

    echo '<script>
			window.history.replaceState("object or string", "Title", "membres.php");
		</script>';

    echo '<script>
                                                $(document).ready(function () {
                                                    toastr["success"]("Vous avez débanni ce membre.", "Bravo:")
                                                });
                                            </script>';
}


?>
<br>
<br>

  <section id="services" class="section-bg">
    <div class="container">
      <header class="section-header">
	  	  <center><img src='https://grandparisrp.cf/img/logo.png' width="110"></img></center>
        <h3>Administration LeBonCoin</h3>
        <p>Liste de tout les clients LeBonCoin de Grand Paris RP</p>
		<br>
      </header>
      <div class="row">
      
	  
	  <table class="table table-hover table-dark">
  <thead>
    <tr>
    <center>  <th scope="col">ID CLIENT</th>
      <th scope="col">Prénom & Nom</th>
      <th scope="col">Date D'inscription</th>
	  <th scope="col">Abonnement:</th>
	  <th scope="col">Compte:</th>
	  <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
<tr role="row" class="odd">
                                        <?php
                                        $result = mysqli_query($con, "SELECT * FROM users ORDER BY `ID_CLIENT` ASC") or die(mysqli_error($con));
                                        while ($resultatInfos = mysqli_fetch_array($result)) {
                                        $id = $resultatInfos['ID'];
										$prenom = $resultatInfos['PRENOM'];

                                         if ($resultatInfos['RANK'] == 5) {
                                            $grade = "<span class=\"badge badge-dark\"><font color=#1072a3>PDG LeBonCoin</font></span>";
                                        } else if ($resultatInfos['RANK'] == 4) {
                                            $grade = "<span class=\"badge badge-dark\"><font color=#ad500e>Staff LeBonCoin</font></span>";
                                        } else if ($resultatInfos['RANK'] == 3) {
                                            $grade = "<span class=\"badge badge-primary\"><font color=#ebc909>Premium LeBonCoin</font></span>";
                                        } else {
                                            $grade = "<span class=\"badge badge-secondary\"><font color=#ff5b03>Client LeBonCoin</font></span>";
                                        }

                                        if ($resultatInfos['STATUS'] == 4) {
                                            $status = "<span class=\"badge badge-warning\">Non-Confirmé</span>";
                                        } else if ($resultatInfos['STATUS'] == 5) {
                                            $status = "<span class=\"badge badge-danger\">Banni</span>";
                                        } else {
                                            $status = "<span class=\"badge badge-success\">Actif</span>";
                                        }
                                        ?>
                                        <td class="sorting_1 text-center"><?php echo $resultatInfos['ID_CLIENT']; ?></td>
                                        <td class="text-center"><?php echo $resultatInfos['PRENOM']; ?> <?php echo $resultatInfos['USERNAME']; ?></td>
                                        <td class="text-center"><?php echo date("d-m-Y à H:i:s", $resultatInfos['DATE_INSCRIPTION']); ?>
    
                                        </td>
                                        <td class="text-center"><?php echo $grade; ?></td>
                                        <td class="text-center"><?php echo $status; ?></td>
                                        <td class="text-center"><a class="btn btn-success" href="membres-edit.php?id=<?php echo $resultatInfos['ID']; ?>">Edit le client</a>
                                        </td>
                                    </tr>
									 <?php } ?>
  </tbody>
</table></center>
	  
	  
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
