 <?php
                $db_username = 'createur';
                $db_password = 'Createur';
                $db_name     = 'user';
                $db_host     = 'localhost';
                $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');
       
       
     if ( isset($_POST['nom'], $_POST['categorie'],  $_POST['idArticle'], $_POST['prix'], $_POST['idCreateur'], $_POST['couleur'], $_POST['taille'] ))
       {
//if  ($_POST['envoyez']== 'Enregistrez l\'article') {
           {
            $nom = $_POST['nom'] ;
            $categorie = $_POST['categorie'];
            $idArticle =  $_POST['idArticle'];
            $prix =  $_POST['prix'];
            $idCreateur = $_POST['idCreateur'];
            $couleur =$_POST['couleur'];
            $taille = $_POST['taille'];
       
            if(strlen($nom) > 255 AND strlen($prenom) > 255 AND strlen($aressePostale) > 255 AND strlen($mail) > 255 AND strlen($idClient) > 255 AND strlen($telephone) > 255 AND strlen($mail) > 255)
                   $erreur=" Il ne Faut pas depasser 255 caratères.";
               
              elseif (!filter_var($mail,FILTER_VALIDATE_EMAIL))
                    $erreur="Entrez une boite e_mail correcte.";
                    
              elseif($telephone > 999999999)
                    $erreur="numéro de telephone trop grand.";
                
               
           
              else{

                    
                   
                        $idClientCount=$bdd->prepare('SELECT * FROM Client WHERE idClient=?');
                        $idClientCount->execute(array($idClient));
                        $idClientExist=$idClientCount->rowCount();

                        

                    if ($idClientExist != 0)
                        $erreur="idClient existe déjà !";
                
                    else{
       
          
            /*requete pour inserer l'article  */
                         
                $sql = "INSERT INTO Article (idArticle,nom, taille, couleur, prix, idCreateur, idCommande, categorie)
                      VALUES ('" .$idArticle. "','" .$nom. "','" .$taille. "','" .$couleur. "','" .$prix. "','" .$idCreateur. "', NULL,'" .$categorie. "')";
                   
              
                $conn = mysqli_query ($db, $sql);
                  if ($conn === TRUE)
                  {
                  header('Location: ajoutOK.php');
                  }
                  else
                  {
                   
                  var_dump( $erreur);
                  echo "Error: " . $sql . "<br>" . $conn->error;
                  
                  }
    
           }
        
         }
                              
           // echo '<li> <a href = \"validation.php\"> validez l\'article </a> </li>';
          
        //   }
         
      }
} 
	else
	 {
        
        header('Location: ajoutNOT.php?erreur=1'); // utilisateur ou mot de passe incorrect
     }
  ?>