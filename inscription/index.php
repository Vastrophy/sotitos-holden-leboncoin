<?php

include "../includes/head.php";

if (isset($_SESSION['user'])) {
    header('Location: ../account');
    exit();
}

function get_ip()
{
    if (isset($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } else if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
    }
}

if (isset($_POST['login'])) {
            if (isset($_POST['username']) && isset($_POST['naissance']) && isset($user->id)) {
                $id_client = 'ID-' . rand(1000000, 9999999) . '';
                $username = mysqli_real_escape_string($con, $_POST['username']);
                $email = mysqli_real_escape_string($con, preg_replace('/[^A-Za-z0-9\-]/', '', $_POST['email']));
				$naissance = mysqli_real_escape_string($con, preg_replace('/[^A-Za-z0-9\-]/', '', $_POST['naissance']));
				$codevendeur = mysqli_real_escape_string($con, preg_replace('/[^A-Za-z0-9\-]/', '', $_POST['codevendeur']));

                $date = time();

                $ip = get_ip();

                $result3 = mysqli_query($con, "SELECT * FROM `users` WHERE `IP_ADRESS` = '$ip'") or die(mysqli_error($con));
				$result4 = mysqli_query($con, "SELECT * FROM `users` WHERE `CODEVENDEUR` = '$codevendeur'") or die(mysqli_error($con));

                if (mysqli_num_rows($result3) > 0) {
                    echo "<script>
                              $(document).ready(function () {
                                   toastr[\"error\"](\"Vous possédez déjà un compte avec cette IP.\", \"Erreur:\")
                              });
                           </script>";
                } else {
                    if (mysqli_num_rows($result4) > 0) {
                        echo "<script>
                              $(document).ready(function () {
                                   toastr[\"error\"](\"Code de connexion déjà enregistré.\", \"Erreur:\")
                              });
                           </script>";
                    } else {
                            {
                                    {
                                        mysqli_query($con, "INSERT INTO `users` (`ID_CLIENT`, `USERNAME`, `NAISSANCE`, `DATE_INSCRIPTION`, `IP_ADRESS`, `CODEVENDEUR`) VALUES ('$id_client', '$username', '$naissance', '$date', '$ip', '$user->id')") or die(mysqli_error($con));

                                        echo "<script>
                                  $(document).ready(function () {
                                       toastr[\"success\"](\"Inscription réussi !\", \"Bravo:\")
                                  });
                               </script> <META http-equiv=\"refresh\" content=\"2;URL=../accueil\"></div>";

                                    }
                                } 
                      
                    }
                }

            } else {
                echo "<script>
              $(document).ready(function () {
                   toastr[\"error\"](\"Veuillez remplir tous les champs.\", \"Erreur:\")
              });
           </script>";
            }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo SITE_NAME; ?> | Connexion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/connexioncssv3/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/connexioncssv3/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/connexioncssv3/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/connexioncssv3/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../assets/connexioncssv3/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/connexioncssv3/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../assets/connexioncssv3/css/util.css">
	<link rel="stylesheet" type="text/css" href="../assets/connexioncssv3/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('https://i.goopics.net/0YPLq.png');">
			<div class="wrap-login100 p-t-19 p-b-30">
				<form action="#" method="post" class="login100-form validate-form">
					<div class="login100-form-avatar">
						<img src="https://grandparisrp.cf/img/logo.png">
					</div><br>
					<span class="login100-form-title p-b-55">
						Inscription LeBonCoin
					</span>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Prénom & Nom Obligatoire !">
						<input class="input100" type="text" name="username" class="form-control" placeholder="Prénom & Nom de famille" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="fa fa-user-circle-o"></span>
						</span>
					</div>
					
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Date de naissance Obligatoire !">
						<input class="input100" type="date" name="naissance" class="form-control" placeholder="Date de naissance" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
                        <i class="fa fa-calendar"></i></span>
						</span>
					</div>
					
					<div class="container-login100-form-btn p-t-25">
					<input type="submit" name="login" class="login100-form-btn" value="Inscription">
					</div>
				</form>
			</div>
		</div>
	</div>
	

	
<!--===============================================================================================-->	
	<script src="../assets/connexioncssv3/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/connexioncssv3/vendor/bootstrap/js/popper.js"></script>
	<script src="../assets/connexioncssv3/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/connexioncssv3/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../assets/connexioncssv3/js/main.js"></script>

</body>
</html>





<?php

include "../includes/footer.php";

?>