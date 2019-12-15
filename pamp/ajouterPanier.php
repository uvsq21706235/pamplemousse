<html>
    <head>
		<title>  Pamplemouse </title>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body>
	 <h1 class="ecriture">  Bienvenue sur ✿ Pamplemouse </h1>
        
        <div class= "position">
             <a class="deco-button" href="accueilClient.php?deconnexion=true"><i class="deco-button"></i> Déconnexion</a>
             <br>
            <!-- tester si l'utilisateur est connecté -->
            <?php
				include ("deconnexion.php");
				deco();
                
                    
          
                    
                 // connexion à la base de données
                $db_username = 'Client';
                $db_password = 'Client';
                $db_name     = 'user';
                $db_host     = 'localhost';
                $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');

                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    // afficher un message
                    $requete = " SELECT nom, prenom
                                 FROM Client
                                 WHERE '$user' = idClient";
                  $exec_requete = mysqli_query($db,$requete);
                  $reponse      = mysqli_fetch_array($exec_requete);
                   // print_r($reponse);
                    
                  // echo ' <div style = "text-align : right; "> ';
                   echo "Bonjour, $reponse[nom] $reponse[prenom] !"; 
                   
                   include ("menuClient.php");
                                     
                }
                
                //requête qui trouve un id en fonction de la taille
                $nom = $_GET['nom'];
                $taille = $GET['taille'];
                
                $sql = "SELECT idArticle FROM articles_dispo
					WHERE nom LIKE '".$nom."' AND taille LIKE '".$taille."' ";
				
				$result = $db->query($sql);
				$art = $result->fetch_assoc();
				
				//requête qui regarde si un panier a déjà été créé, en créé un sinon
                $sql = "SELECT idCommande FROM mesCommandes WHERE date IS NULL";
                $result = $db->query($sql);
               // echo $result['idCommande'];
                if ($result>0){
					echo"test";
					$row = $result->fetch_assoc();
					$commande = $row['idCommande'];
					//ajout de l'article au panier
					$sql = "UPDATE articles_dispo SET idCommande = '".$commande."' WHERE articles_dispo.idArticle = ".$art['idArticle']."";
					$result = $db->query($sql);
					if ($result->num_rows > 0) {
						echo "<div align=\"center\"> <font size=\"+3\">l'article a été ajouté au panier</font></div>";
					} else {echo "<div align=\"center\"> <font size=\"+3\">l'article n'a pas été ajouté au panier</font></div>";}
					
					
                } else {
					$id = rand ( 50 , 9999 );
					echo "test2";
					$sqll = "INSERT INTO `mes_commandes` (`idCommande`, `date`, `idClient`, `idPreparateur`) VALUES
							(3".$id.", NULL, ".$_SESSION['username'].", NULL), ";
					$result = $db->query($sqll);
					if ($result->num_rows > 0) {
						$row = $result->fetch_assoc();
						$commande = $result['idCommande'];
						
						//ajout de l'article au panier
						$sql = "UPDATE articles_dispo SET idCommande = '".$commande."' WHERE articles_dispo.idArticle = ".$art['idArticle']."";
						$result = $db->query($sql);
						if ($result->num_rows > 0) {
							echo "<div align=\"center\"> <font size=\"+3\">l'article a été ajouté au panier</font></div>";
						} else {echo "<div align=\"center\"> <font size=\"+3\">l'article n'a pas été ajouté au panier</font></div>";}
					} else {header ('Location: ajouterPanier.php?nom=".$nom."&amp;taille".$taille."');}}

mysqli_close($db); // fermer la connexion
            ?>
         
        </div>
                
   
    </body>
</html>
