 <?php
                $db_username = 'user';
                $db_password = 'user';
                $db_name     = 'user';
                $db_host     = 'localhost';
                $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');
       
       
     if ( isset($_POST['idClient'], $_POST['mail'],  $_POST['mdp'], $_POST['adressePostale'], $_POST['nom'], $_POST['prenom'], $_POST['telephone'] ))
       {
//if  ($_POST['envoyez']== 'Enregistrez l\'article') {
           {/* Pour sécurisez la connecxion */
       
            $idClient = $_POST['idClient'] ;
            $mail = $_POST['mail'];
            $mdp =  $_POST['mdp'];
            $adressePostale =  $_POST['adressePostale'];
            $nom = $_POST['nom'];
            $prenom =$_POST['prenom'];
            $telephone = $_POST['telephone'];
            /*requete pour inserer l'article  */
                         
                $sql = "INSERT INTO Client (idClient,mail, mdp, adressePostale, nom, prenom, telephone)
						VALUES ('" .$idClient. "','" .$mail. "','" .$mdp. "','" .$adressePostale. "','" .$nom. "','" .$prenom. "','" .$telephone. "')";
$conn = mysqli_query ($db, $sql);
if ($conn === TRUE) {
    header('Location: inscriptionOK.php');
} /*else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/
          
          
          else
	 {
        
        header('Location: inscriptionNOT.php?erreur=1'); // utilisateur ou mot de passe incorrect
     }      
                              
           // echo '<li> <a href = \"validation.php\"> validez l\'article </a> </li>';
          
        //   }
         
        }
} 
  ?>
