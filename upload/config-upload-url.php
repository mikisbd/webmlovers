<?php 

// Archivos subidos desde URL

$titulo = $_POST["nombre_archivo"];
$url = $_POST['url'];
$archivourl = basename($url);
list($txt, $exten) = explode(".", $archivourl);
$md55 = substr(md5($archivourl), 0, 8);
$archivourl = $txt;
$archivourl = $titulo.".".$md55.".".$exten;

if($exten == "gif" || $exten == "webm"){

    $upload = file_put_contents("../files/$archivourl",file_get_contents($url));
    
    if ( $exten == "gif" ){
        echo '<img class="responsive-img" src="../files/'.$archivourl.'" /><br><br>';

        echo "<div class='row'>";
        echo "<div class='col s2 offset-s3'><p style='font-size:17px'><b>Image URL:</b></p></div>";
        echo "<div class='col s5'><textarea id='ta-url-uno'>http://webmlovers.xyz/files/$titulo.$md55.$exten</textarea></div>";
        echo "<div class='col'><i id='copia-url-uno' class='material-icons'>library_books</i></div>";
        echo "</div>";

        echo "<div class='row'>";
        echo "<div class='col s2 offset-s3'><p style='font-size:17px'><b>HTML Code:</b></p></div>";
        echo "<div class='col s5'><textarea id='ta-url-dos'><img src='http://webmlovers.xyz/files/$titulo.$md55.$exten'></textarea></div>";
        echo "<div class='col'><i id='copia-url-dos' class='material-icons'>library_books</i></div>";
        echo "</div>";

        echo "<div class='row'>";
        echo "<div class='col s2 offset-s3'>
              <a href='http://webmlovers.xyz/contacto.html' class='waves-effect waves-teal btn-flat'>
              <i class='material-icons left'>new_releases</i>Reportar</a>
              </div>";
        echo "</div>"; 
    } else {
        echo "<div class='row'><video src='../files/".$archivourl."' type='video/webm' autoplay preload controls class='responsive-video'></div><br>";

        echo "<div class='row'>";
        echo "<div class='col s2 offset-s3'><p style='font-size:17px'><b>Video URL:</b></p></div>";
        echo "<div class='col s5'><textarea id='ta-url-tres'>http://webmlovers.xyz/files/$titulo.$md55.$exten</textarea></div>";
        echo "<div class='col'><i id='copia-url-tres' class='material-icons'>library_books</i></div>";
        echo "</div>";

        echo "<div class='row'>";
        echo "<div class='col s2 offset-s3'><p style='font-size:17px'><b>HTML Code:</b></p></div>";
        echo "<div class='col s5'>
             <textarea id='ta-url-cuatro'><video src='http://webmlovers.xyz/files/$titulo.$md55.$exten' type='video/webm' controls preload></textarea>
             </div>"; 
        echo "<div class='col'><i id='copia-url-cuatro' class='material-icons'>library_books</i></div>";
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


?> 