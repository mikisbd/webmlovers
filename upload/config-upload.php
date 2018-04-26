<?php 

/* Borrado automático de archivos tras 3 meses en el servidor */
$dir = "../files/";
$intervalo = strtotime('-12 month');

foreach (glob($dir."*") as $file) {
    if (filemtime($file) <= $intervalo) {
        unlink($file);
    }
}

/* Comprobación de los archivos al ser subidos:
- Si son .webm o .gif
- Si ocupan <= 10 MB
- Guardado automático en la carpeta 'files'
- Previsualización por pantalla de la info correspondiente a cada archivo */

if(isset($_POST["boton_subir"])){
    
    $titulo = $_POST["nombre_archivo"];
    $nombre = $_FILES['archivo']['name']; 
    $tmp = $_FILES['archivo']['tmp_name'];
    $tipo = $_FILES['archivo']['type']; 
    $tamano = $_FILES['archivo']['size'];
    $formato = pathinfo($nombre); 
    $md5 = substr(md5($nombre), 0, 8);
    $ext = $formato['extension'];
    $urlnueva = "../files/".$titulo . "." . $md5 . "." . $formato['extension']; 
     
     
    if(is_uploaded_file($tmp) && $tamano <= 10000000){ 
        
        if (($tipo == "video/webm") || ($tipo == "image/gif")){
            copy($tmp, $urlnueva);
            echo "<h5 class='alert-box success'>Tu archivo ha sido subido <b>correctamente</b></h5><br>";
            
            if ( $tipo == "image/gif" ){
                echo '<img class="responsive-img" src="'.$urlnueva.'" /><br><br>';

                echo "<div class='row'>";
                echo "<div class='col s2 offset-s3'><p style='font-size:17px'><b>Image URL:</b></p></div>";
                echo "<div class='col s5'><textarea id='ta-gif-uno'>http://webmlovers.xyz/files/$titulo.$md5.$ext</textarea></div>";
                echo "<div class='col'><i id='copia-gif-uno' class='material-icons'>library_books</i></div>";
                echo "</div>";

                echo "<div class='row'>";
                echo "<div class='col s2 offset-s3'><p style='font-size:17px'><b>HTML Code:</b></p></div>";
                echo "<div class='col s5'><textarea id='ta-gif-dos'><img src='http://webmlovers.xyz/files/$titulo.$md5.$ext'></textarea></div>";
                echo "<div class='col'><i id='copia-gif-dos' class='material-icons'>library_books</i></div>";
                echo "</div>";

                echo "<div class='row'>";
                echo "<div class='col s2 offset-s3'>
                      <a href='http://webmlovers.xyz/contacto.html' class='waves-effect waves-teal btn-flat'>
                      <i class='material-icons left'>new_releases</i>Reportar</a>
                      </div>";
                echo "</div>"; 
            } else {
                echo "<div class='row'><video src='".$urlnueva."' type='video/webm' autoplay preload controls class='responsive-video'></div><br>";

                echo "<div class='row'>";
                echo "<div class='col s2 offset-s3'><p style='font-size:17px'><b>Video URL:</b></p></div>";
                echo "<div class='col s5'><textarea id='ta-webm-uno'>http://webmlovers.xyz/files/$titulo.$md5.$ext</textarea></div>";
                echo "<div class='col'><i id='copia-webm-uno' class='material-icons'>library_books</i></div>";
                echo "</div>";

                echo "<div class='row'>";
                echo "<div class='col s2 offset-s3'><p style='font-size:17px'><b>HTML Code:</b></p></div>";
                echo "<div class='col s5'>
                     <textarea id='ta-webm-dos'><video src='http://webmlovers.xyz/files/$titulo.$md5.$ext' type='video/webm' controls preload></textarea>
                     </div>"; 
                echo "<div class='col'><i id='copia-webm-dos' class='material-icons'>library_books</i></div>";
                echo "</div>";

                echo "<div class='row'>";
                echo "<div class='col s2 offset-s3'>
                     <a href='http://webmlovers.xyz/contacto.html' class='waves-effect waves-teal btn-flat'>
                     <i class='material-icons left'>new_releases</i>Reportar</a>
                     </div>";
                echo "</div>";
            }

        } else { 
         
            echo "<h5 class='alert-box error'>Sólo se permiten imágenes con formato <b>.webm</b> o <b>.gif</b></h5><br>";
             
        }
            
    } else { 
         
        echo "<h5 class='alert-box error'>Debes seleccionar primero un archivo (menor a <b>10MB</b>).</h5><br>"; 
             
    } 
                 
}



?> 