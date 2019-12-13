<html>
    <head>
        <body>
            
             <?php
    if ($handle = opendir("image/$idImage/")){
        while (false !== ($file = readdir($handle))){
            if ($file != "." && $file != "..") {
                echo "<a href=\"image/$idImage.jpg\" target=\"_blank\"><img width=\"150\" src=\"image/$idImage.jpg\"> </a>";
            }
        }
        closedir($handle);
    }
    else {
      echo"Pas d'images";
    }
    ?> 
            
            
            
            
            
            
        </body>
        
        
        
        
    </head>
    
    
    
    
</html>