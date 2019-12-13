   <html>
           <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    <head></head>
   </html>   
 
  
  <!DOCTYPE html>
   <html>
    <head>
     <meta charset="utf-8">
         <link rel="stylesheet" href="style.css" media="screen" type="text/css" />
    </head>
    
    <body>
     
       <form>
        <label class="ecriture"> <b>Categorie de l'article </b></label>
             <br> 
             <select class="ecriture" name = "categorie">
              <option value="Jupe">Jupe</option>
              <option value="Pantalon">Pantalon</option>
              <option value="Jean">Jean</option>
              <option value="Tee-shirt">Tee-shirt</option>
              <option value="Robe">Robe</option>
         
             </select>
             <br><br>
             
             <label class="ecriture"> <b>Couleur de l'article</b></label>  <br>
             <input type="color" placeholder="Ex : blue" name ="couleur" required>
             <br>
              <br>
          <label class="ecriture"> <b>Id de l'article</b></label>  <br>
          <input type="number" placeholder="Ex : 188924" name ="idArticle" required>
          <br>  <br>
          <label class="ecriture" > <b>Prix de l'article en €</b></label>  <br>
          <input type="number" placeholder="Ex : 13 €" name ="Prix" required>
            <br>  <br>
            <label class="ecriture"> <b>Votre ID Créateur</b></label> <br>
          <input type="number" placeholder="Ex : 348200 " name ="idCreateur" required>
            <br> <br>
          <label class="ecriture"> <b>Nom de l'article</b></label>
          <input type="text" placeholder="Ex : Pantalon Jubela" name ="nom" required>
          <br>
           
           <label class="ecriture"> <b>Taille de l'article</b></label>
          <input type="text" placeholder="Ex : XS " name ="taille" required>
            <br>  
         
           
         <input type ="submit" value="Enregistrez l'article"  name = "envoyez"/>
       
                <br>
       </form>
     <?php if (isset($message)) {echo $message;} ?>
     <?php
                $db_username = 'createur';
                $db_password = 'Createur';
                $db_name     = 'user';
                $db_host     = 'localhost';
                $db = mysqli_connect($db_host, $db_username, $db_password,$db_name) or die('could not connect to database');
       
       
     if ( ! isset($_POST['nom'], $_POST['categorie'],  $_POST['idArticle'], $_POST['Prix'], $_POST['idCreateur'], $_POST['couleur'], $_POST['taille'] ))
       {
  

//if  ($_POST['envoyez']== 'Enregistrez l\'article') {

           {/* Pour sécurisez la connecxion */
       
            $nom = $_POST['nom'] ;
            $categorie = $_POST['categorie'];
            $idArticle =  $_POST['idArticle'];
            $idPrix =  $_POST['Prix'];
            $idCreateur =  $_POST['idCreateur'];
            $couleur =$_POST['couleur'];
            $taille = $_POST['taille'];
            /*requete pour inserer l'article  */
         echo $nom.'<br>'.$taille;  
            $ins =$bd->prepare('INSERT INTO Article(idArticle,nom, taille, couleur, Prix, idCreateur, idCommande,categorie)
                                VALUES (?, ?, ?, ?, ?, ? , ?)');
            
            $ins->execute(array ($idArticle,$nom, $taille, $couleur, $Prix, $idCreateur, $idCommande, $categorie));                
           // echo '<li> <a href = \"validation.php\"> validez l\'article </a> </li>';
          
        //   }
         
        }
} 
  ?>
    </body>
   </html>
                
