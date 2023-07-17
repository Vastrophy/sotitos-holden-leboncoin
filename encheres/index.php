<?php

include "../includes/head.php";
include "../includes/header.php";
$prixmin = 0;
if (isset($_POST['ajout'])) {
            if (isset($_POST['PRIX'])) {
				
				$PRIX = mysqli_real_escape_string($con, $_POST['PRIX']);
				$ID = '' . rand(1000000, 9999999) . '';
				$date = time();
				
				
		    mysqli_query($con, "INSERT INTO encherir (`ID`, `PRIX`, `ENCHERISSEUR`, `DATEPRIX`) VALUES('$ID', '$PRIX', '$username', '$date')") or die(mysqli_error($con));
			mysqli_query($con, "INSERT INTO logs (`TYPE`, `DATE`, `STAFF`, `MESSAGE`) VALUES('Client', '$date', '$username', 'Enchérisseur à $PRIX')") or die(mysqli_error($con));

       
        

        echo '<script>
                                                $(document).ready(function () {
                                                    toastr["success"]("Enchère qui monte :)", "Bravo:")
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
        <h3>Les Enchères LeBonCoin</h3>
        <p>Page des Enchères LeBonCoin de Grand Paris RP</p>
		<br>
      </header>
	  

      <div class="row">
     
                                        <?php
                                        $result = mysqli_query($con, "SELECT * FROM enchere") or die(mysqli_error($con));
                                        while ($resultatInfos = mysqli_fetch_array($result)) {
										$url = $resultatInfos['URL'];
                                        $titre = $resultatInfos['TITRE'];
										$description = $resultatInfos['DESCRIPTION'];
										$organisateur = $resultatInfos['ORGANISATEUR'];
										$fin = $resultatInfos['FIN'];
										$departprix = $resultatInfos['DEPARTPRIX'];
										$venteprix = $resultatInfos['VENTEPRIX'];
                    $prixmin = preg_replace("/[^0-9.]/", "", $departprix)

                                        
                                        ?>
 <div class="offset-lg-1 wow bounceInUp" data-wow-duration="1.4s">
          <div class="box">
            <center><img src="<?php echo $url; ?>" width="150"></center>
            <h4 class="title"><center><?php echo $titre; ?> <br> <font color=#6e3030><?php echo $description; ?></font></center></h4>
			<h3 class="title"><center>Vendeur: <font color=#4c1682><?php echo $organisateur; ?></font><br> Prix de départ: <font color=#264085><?php echo $departprix; ?></font> <br><br> Prix de vente Actuellement: <font color=#264085><?php
                                        $result = mysqli_query($con, "SELECT * FROM encherir ORDER BY DATEPRIX DESC limit 1") or die(mysqli_error($con));
                                        while ($resultatInfos = mysqli_fetch_array($result)) {
                                        $ID = $resultatInfos['ID'];
										$PRIX = $resultatInfos['PRIX'];
                                        $DATEPRIX = $resultatInfos['DATEPRIX'];
										$ENCHERISSEUR = $resultatInfos['ENCHERISSEUR'];
                                         $prixmin = $PRIX;
                                        ?><?php echo $PRIX; ?> de <?php echo $ENCHERISSEUR; ?><?php } ?></font></center></h3>
			<center><p class="description"><b>Attention les personnes n'ayant pas les moyens et qui participe au Enchères (Troll) seront bannie de la plateforme merci.</b></p></center>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a class="btn btn-dark" href="#encherir" data-toggle="modal"><b><font color=white>Enchérir l'annonce !</font></b></a>   <a class="btn btn-danger"><b><font color=white>Fin de l'enchère: <?php echo $fin; ?></font></b></a>
          </div>
        </div>
		<?php } ?>
		
	  
      </div>
	  <style>
    table {
      border-collapse: collapse;
      text-align: center;
    }
    .table {
      width: 100%;
      max-width: 100%;
      margin-bottom: 1rem;
      background-color: transparent;
    }

    .table th,
    .table td {
      padding: 0.75rem;
      vertical-align: top;
      border-top: 1px solid #dee2e6;
    }

    .table thead th {
      vertical-align: bottom;
      border-bottom: 2px solid #dee2e6;
	   text-align: center;
    }

    .table tbody + tbody {
      border-top: 2px solid #dee2e6;
    }

    .table .table {
      background-color: #fff;
    }

    .table-sm th,
    .table-sm td {
      padding: 0.3rem;
    }

    .table-bordered {
      border: 1px solid #dee2e6;
    }

    .table-bordered th,
    .table-bordered td {
      border: 1px solid #dee2e6;
    }

    .table-bordered thead th,
    .table-bordered thead td {
      border-bottom-width: 2px;
    }

    .table-borderless th,
    .table-borderless td,
    .table-borderless thead th,
    .table-borderless tbody + tbody {
      border: 0;
    }

    .table-striped tbody tr:nth-of-type(odd) {
      background-color: rgb(#100E2E);
	  color: #000000;
    }

    .table-hover tbody tr:hover {
      background-color: rgba(0, 0, 0, 0.075);
    }

    .table-primary,
    .table-primary > th,
    .table-primary > td {
      background-color: #b8daff;
    }

    .table-hover .table-primary:hover {
      background-color: #9fcdff;
    }

    .table-hover .table-primary:hover > td,
    .table-hover .table-primary:hover > th {
      background-color: #9fcdff;
    }

    .table-secondary,
    .table-secondary > th,
    .table-secondary > td {
      background-color: #d6d8db;
    }

    .table-hover .table-secondary:hover {
      background-color: #c8cbcf;
    }

    .table-hover .table-secondary:hover > td,
    .table-hover .table-secondary:hover > th {
      background-color: #c8cbcf;
    }

    .table-success,
    .table-success > th,
    .table-success > td {
      background-color: #c3e6cb;
    }

    .table-hover .table-success:hover {
      background-color: #b1dfbb;
    }

    .table-hover .table-success:hover > td,
    .table-hover .table-success:hover > th {
      background-color: #b1dfbb;
    }

    .table-info,
    .table-info > th,
    .table-info > td {
      background-color: #bee5eb;
    }

    .table-hover .table-info:hover {
      background-color: #abdde5;
    }

    .table-hover .table-info:hover > td,
    .table-hover .table-info:hover > th {
      background-color: #abdde5;
    }

    .table-warning,
    .table-warning > th,
    .table-warning > td {
      background-color: #ffeeba;
    }

    .table-hover .table-warning:hover {
      background-color: #ffe8a1;
    }

    .table-hover .table-warning:hover > td,
    .table-hover .table-warning:hover > th {
      background-color: #ffe8a1;
    }

    .table-danger,
    .table-danger > th,
    .table-danger > td {
      background-color: #f5c6cb;
    }

    .table-hover .table-danger:hover {
      background-color: #f1b0b7;
    }

    .table-hover .table-danger:hover > td,
    .table-hover .table-danger:hover > th {
      background-color: #f1b0b7;
    }

    .table-light,
    .table-light > th,
    .table-light > td {
      background-color: #fdfdfe;
    }

    .table-hover .table-light:hover {
      background-color: #ececf6;
    }

    .table-hover .table-light:hover > td,
    .table-hover .table-light:hover > th {
      background-color: #ececf6;
    }

    .table-dark,
    .table-dark > th,
    .table-dark > td {
      background-color: #c6c8ca;
    }

    .table-hover .table-dark:hover {
      background-color: #b9bbbe;
    }

    .table-hover .table-dark:hover > td,
    .table-hover .table-dark:hover > th {
      background-color: #b9bbbe;
    }

    .table-active,
    .table-active > th,
    .table-active > td {
      background-color: rgba(0, 0, 0, 0.075);
    }

    .table-hover .table-active:hover {
      background-color: rgba(0, 0, 0, 0.075);
    }

    .table-hover .table-active:hover > td,
    .table-hover .table-active:hover > th {
      background-color: rgba(0, 0, 0, 0.075);
    }

    .table .thead-dark th {
      color: #fff;
      background-color: rgb(15, 31, 39);
      border-color: #32383e;
    }

    .table .thead-light th {
      color: #495057;
      background-color: #e9ecef;
      border-color: #dee2e6;
    }

    .table-dark {
      color: #fff;
      background-color: rgb(15, 31, 39);
    }

    

</style>
<section>
	<center><table class="table table-striped table-dark">
	  <thead>
	      <tr>
  <th>#</th>
    <th>PRIX</th>
    <th>ENCHERISSEUR</th>
	<th>DATE</th>
  </tr>
	  </thead>
	  <tbody>
			      <?php
                                        $result = mysqli_query($con, "SELECT * FROM encherir ORDER BY DATEPRIX DESC") or die(mysqli_error($con));
                                        while ($resultatInfos = mysqli_fetch_array($result)) {
                                        $ID = $resultatInfos['ID'];
										$PRIX = $resultatInfos['PRIX'];
                                        $DATEPRIX = $resultatInfos['DATEPRIX'];
										$ENCHERISSEUR = $resultatInfos['ENCHERISSEUR'];
										
                                        ?>
  <tr>
  <td><b><font color=white><?php echo $resultatInfos['ID']; ?></font></b></td>
  <td><b><font color=orange><?php echo $resultatInfos['PRIX']; ?></font></b></td>
  <td><b><font color=white><?php echo $resultatInfos['ENCHERISSEUR']; ?></font></b></td>
   <td><b><font color=white><?php echo date("d-m-Y à H:i:s", $resultatInfos['DATEPRIX']); ?></font></b></td>

  </tr>
  <?php } ?>
	      
	  </tbody>
	</table></center>
	  <br><br><br><br><br><br><br><br>
	  
    </div>
  </section>
    </div>
	
	
	<div id="encherir" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <center><h4>Enchérir - LeBonCoin</h4></center>
		            <button type="button" class="close" data-dismiss="modal">×</button>

           </div>
                <div class="modal-body">
                <form method="POST" action="">
					<div class="form-group">
					<?php if (isset($_SESSION['user'])) {  ?>
						<center><label for="exampleFormControlSelect1"><b>Prix:</b></label></center>
						<input type="number" name="PRIX" min="<?= $prixmin ?>" placeholder="Exemple: 15 000€" class="form-control" size="30" required="">
					  </div>
					  					<input type="submit" name="ajout" class="btn btn-success btn-lg btn-block" value="Enchérir sur l'annonce">

				   <?php } else { ?>
				   <center><h4><b><font color=#7a1515>Pour pouvoir enchérir merci de vous connecter :)</font></b></h4></center>
				   <a href="../connexion" class="btn btn-success btn-lg btn-block">Connexion</a>
                   <?php } ?>
				</form>
			</div>
		</div>
    </div>
</div>


  </section>
 



<?php

include "../includes/footer.php";

?>
