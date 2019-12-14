<html>
    <head>
        <meta charset="utf-8">
        		<title>  Pamplemouse </title>
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    <body >
        <div class= "position" >
             <a class="deco-button" href="menuCreateur.php?deconnexion=true"><i class="deco-button"></i> Déconnexion</a>
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
                   
                   
                }
            
            mysqli_close($db); // fermer la connexion
				
            ?>
           
            
        </div>
        <?php include ("menu.php");
			  include ("recuperation.php");
        
        ?>
        
    </body>
</html>
<!--
<html>
    <head>
        <body>
            
           <?php
   /* if ($handle = opendir("image/$idImage/")){
        while (false !== ($file = readdir($handle))){
            if ($file != "." && $file != "..") {
                echo "<a href=\"image/$idImage.jpg\" target=\"_blank\"><img width=\"150\" src=\"image/$idImage.jpg\"> </a>";
            }
        }
        closedir($handle);
    }
    else {
      echo"Pas d'images";
    }*/
    ?>            
        </body>
        
        
        
        
    </head>
    
    
    
    
</html>-->
