  <!--==========================
  Header
  ============================-->
  <header id="header" class="fixed-top">
    <div class="container">

      <div class="logo float-left">
        <a class="scrollto"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="../"><b>Accueil</b></a></li>
          <li><a href="../annonces"><b>Les Annonces</b></a></li>
          <li><a href="../encheres"><b>Nos Enchères</b></a></li>
          <li><a href="../conditions"><b>Nos Conditions</b></a></li>
		  <li><a href="../options"><b>Nos Options</b></a></li>

		  <?php if (isset($_SESSION['user'])) {  ?>
		  <li class="drop-down"><a href="./"><b><font color=orange>Espace Client</font></b></a>
          <ul>
            <li><a href="../account"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Mon Compte LeBonCoin</b></font></font></a></li>
			<hr>
			<?php if ($rank == 5 || $rank == 4) { ?>
			<li><a href="../administration"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Panel Administration</b></font></font></a></li>
            <?php } ?>
			<hr>
			 <li><a href="../deconnexion"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Deconnexion</b></font></font></a></li>
          </ul>
        </li>
		  <?php } else { ?>
		  <li class="drop-down"><a><b>Espace Client</b></a>
          <ul>
            <li><a href="?connexiondiscord"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Connexion</b></font></font></a></li>
          </ul>
        </li>
		  <?php } ?>
          <li><a href="https://top-serveurs.net/gta/redirect/grand-paris-rp-v2?target=discord" class="btn btn-warning"><b><font color=black>Discord GrandParisRP</b></font></a></li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->
