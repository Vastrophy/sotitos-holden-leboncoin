<?php

include "../includes/head.php";
include "../includes/header.php";

if ($rank < 4) {
    header('Location: ../account/');
    exit();
}

if (isset($_POST['ajout'])) {
            if (isset($_POST['acheteur']) && isset($_POST['datefin'])) {

				$acheteur = mysqli_real_escape_string($con, $_POST['acheteur']);
				$datefin = mysqli_real_escape_string($con, $_POST['datefin']);
				$date = time();
				
				
		    mysqli_query($con, "INSERT INTO assurance (`ACHETEUR`, `DATE`, `DATEFIN`, `STAFF`, `PAIEMENT`) VALUES('$acheteur', '$date', '$datefin', '$prenom $username', 'PAYÉ')") or die(mysqli_error($con));
			mysqli_query($con, "INSERT INTO logs (`TYPE`, `DATE`, `STAFF`, `MESSAGE`) VALUES('Staff', '$date', 'Staff Assurance', 'Ajout Assurance Client $acheteur')") or die(mysqli_error($con));

       
        

        echo '<script>
                                                $(document).ready(function () {
                                                    toastr["success"]("Assurance Effectué !", "Bravo:")
                                                });
                                            </script><META http-equiv="refresh" content="2;URL=assurance.php">';
    }
}

?>
<br>
<br>

  <section id="services" class="section-bg">
    <div class="container">
      <header class="section-header">
	  	  <center><img src='https://grandparisrp.cf/img/logo.png' width="110"></img></center>
        <h3>Assurance | Administration LeBonCoin</h3>
        <p>Cette page sert l'assurance LeBonCoin de Grand Paris RP</p>
		<br>
      </header>
      
	  <center><a class="btn btn-success" href="#assurance" data-toggle="modal"><b><font color=white>Faire une Assurance pour un client</font></b></a>
<br><br>
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
	<table class="table table-striped table-dark">
	  <thead>
	      <tr>
    <th>Acheteur</th>
    <th>Staff</th>
	<th>Paiement</th>
	<th>Date de début</th>
	<th>Date de fin</th>
  </tr>
	  </thead>
	  <tbody>
			      <?php
                                        $result = mysqli_query($con, "SELECT * FROM assurance ORDER BY DATE DESC") or die(mysqli_error($con));
                                        while ($resultatInfos = mysqli_fetch_array($result)) {
                                        $ACHETEUR = $resultatInfos['ACHETEUR'];
										$STAFF = $resultatInfos['STAFF'];
                                        $PAIEMENT = $resultatInfos['PAIEMENT'];
										$DATE = $resultatInfos['DATE'];
										$DATEFIN = $resultatInfos['DATEFIN'];
										
                                        ?>
  <tr>
  <td><b><font color=white><?php echo $resultatInfos['ACHETEUR']; ?></font></b></td>
  <td><b><font color=white><?php echo $resultatInfos['STAFF']; ?></font></b></td>
  <td><b><font color=green><?php echo $resultatInfos['PAIEMENT']; ?></font></b></td>
  <td><b><font color=white><?php echo date("d-m-Y à H:i:s", $resultatInfos['DATE']); ?></font></b></td>
  <td><b><font color=white><?php echo $resultatInfos['DATEFIN']; ?></font></b></td>

  </tr>
  <?php } ?>
	      
	  </tbody>
	</table></center>
	  <br><br><br><br>
	  
    </div>
  </section>
 

<div id="assurance" class="modal fade" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <center><h4>Modification Client - LeBonCoin</h4></center>
		            <button type="button" class="close" data-dismiss="modal">×</button>

           </div>
                <div class="modal-body">
                <form method="POST" action="">
					<div class="form-group">
					    <div class="form-group">
                        <label for="exampleFormControlSelect1">Contrat pour:</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="acheteur">
						<?php
                                        $result = mysqli_query($con, "SELECT * FROM users") or die(mysqli_error($con));
                                        while ($resultatInfos = mysqli_fetch_array($result)) {
										$name2 = $resultatInfos['USERNAME'];
										$name1 = $resultatInfos['PRENOM'];
										
                                        ?>
                        <option value="<?php echo $name1; ?> <?php echo $name2; ?>"><?php echo $name1; ?> <?php echo $name2; ?></option>
						<?php } ?>
                        </select>
                        </div>
						<label for="exampleFormControlSelect1">Contrat jusqu'au:</label>
						<input type="date" name="datefin" placeholder="TEST" class="form-control" size="30" required="">
					  </div>
					<input type="submit" name="ajout" class="btn btn-success btn-lg btn-block" value="Enregistrer les modifications">
				</form>
			</div>
		</div>
    </div>
</div>

<?php

include "../includes/footer.php";

?>
