<?php
ini_set('max_execution_time', 3600);
define('OAUTH2_CLIENT_ID', '736322089430024275');
define('OAUTH2_CLIENT_SECRET', 'KvvH6_SY4nNE-iZ_Umfh40K6xpfzxe_i');
$authorizeURL = 'https://discordapp.com/api/oauth2/authorize';
$tokenURL = 'https://discordapp.com/api/oauth2/token';
$apiURLBase = 'https://discordapp.com/api/users/@me';
session_start();

if(get('code')) {

  $token = apiRequest($tokenURL, array(
    "grant_type" => "authorization_code",
    'client_id' => OAUTH2_CLIENT_ID,
    'client_secret' => OAUTH2_CLIENT_SECRET,
    'redirect_uri' => 'http://193.70.77.120/accueil',
    'code' => get('code')
  ));
  $logout_token = $token->access_token;
  $_SESSION['access_token'] = $token->access_token;
  header('Location: ' . $_SERVER['PHP_SELF']);
}
if(session('access_token')) {
  $user = apiRequest($apiURLBase);
    if (!isset($_SESSION['user']) && !isset($_GET['inscription'])) {
        $codevendeur = mysqli_real_escape_string($con, $user->id);

        $result = mysqli_query($con, "SELECT * FROM `users` WHERE `CODEVENDEUR` = '$codevendeur'") or die(mysqli_error($con));
        if (mysqli_num_rows($result) < 1) {
            echo "<script>
                              $(document).ready(function () {
                                   toastr[\"error\"](\"Ce compte est introuvable.\", \"Erreur:\")
                              });
                           </script>";
                      header('Location: ../inscription?inscription');
        }

        while ($row = mysqli_fetch_array($result)) {
           if ($row['STATUS'] == "5") {
                echo "<script>
                              $(document).ready(function () {
                                   toastr[\"warning\"](\"Vous êtes banni.\", \"Erreur:\")
                              });
                           </script>";
            } else {
                $_SESSION['user'] = $row;
                $_SESSION['ID'] = $row['ID'];

                $usernameTemp = $_SESSION['user']['username'];

                echo  "<script>
                                  $(document).ready(function () {
                                       toastr[\"success\"](\"Connexion réussie !\", \"Bravo:\")
                                  });
                               </script> <META http-equiv=\"refresh\" content=\"2;URL=../accueil\"></div>";
            }
        }
    }
}

if(get('action') == 'logout') {

  $params = array(
    'access_token' => $logout_token
  );

  header('Location: https://discordapp.com/api/oauth2/token/revoke' . '?' . http_build_query($params));
  die();
}
 if(isset($_GET['connexiondiscord'])) {
  $params = array(
    'client_id' => '736322089430024275',
    'redirect_uri' => 'http://193.70.77.120/accueil',
    'response_type' => 'code',
    'scope' => 'identify'
  );

  header('Location: https://discordapp.com/api/oauth2/authorize' . '?' . http_build_query($params));
  die();
if (isset($token->access_token)) {
  header('Location: ../index.php');
}
}
function apiRequest($url, $post=FALSE, $headers=array()) {
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  $response = curl_exec($ch);
  if($post)
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
  $headers[] = 'Accept: application/json';
  if(session('access_token'))
    $headers[] = 'Authorization: Bearer ' . session('access_token');
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  $response = curl_exec($ch);
  return json_decode($response);
}

function get($key, $default=NULL) {
  return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
}
function session($key, $default=NULL) {
  return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
}
?>