 <html>
    <head>
		<title>  Pamplemouse </title>
        <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    
    <div class= "position">
             <a class="deco-button" href="menuCreateur.php?deconnexion=true"><i class="deco-button"></i> Déconnexion</a>
             <br>
            <!-- tester si l'utilisateur est connecté -->
            <?php
				include ("deconnexion.php");
				deco();
			?>
	</div> 
             <?php
                $db_username = 'createur';
                $db_password = 'Createur';
                $db_name     = 'user';
                $db_host     = 'localhost';
                $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');
       
       
     if ( isset($_POST['nom'], $_POST['categorie'],  $_POST['idArticle'], $_POST['Prix'], $_POST['idCreateur'], $_POST['couleur'], $_POST['taille'] ))
       {

//if  ($_POST['envoyez']== 'Enregistrez l\'article') {

           {/* Pour sécurisez la connecxion */
       
            $nom = $_POST['nom'] ;
            $categorie = $_POST['categorie'];
            $idArticle =  $_POST['idArticle'];
            $Prix =  $_POST['Prix'];
            $idCreateur = $_POST['idCreateur'];
            $couleur =$_POST['couleur'];
            $taille = $_POST['taille'];
            /*requete pour inserer l'article  */
                         
                $sql = "INSERT INTO Article (idArticle,nom, taille, couleur, prix, idCreateur, idCommande, categorie)
						VALUES ('" .$idArticle. "','" .$nom. "','" .$taille. "','" .$couleur. "','" .$Prix. "','" .$idCreateur. "', NULL,'" .$categorie. "')";

$conn = mysqli_query ($db, $sql);

if ($conn === TRUE) {
	echo "L'article a bien été ajouté! " ;
	//header('Location: ajoutArticle.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
                
                              
           // echo '<li> <a href = \"validation.php\"> validez l\'article </a> </li>';
          
        //   }
         
        }
} 

	else
	 {
        header('Location: ajoutArticle.php?erreur=1'); // utilisateur ou mot de passe incorrect
     }
     
     mysqli_close($db); // fermer la connexion
  ?>
</html>
