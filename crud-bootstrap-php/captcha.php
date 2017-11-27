<?php
 //Inicia uma nova sessão.
 session_start();
 
// Criar o texto para o captcha.
 $codigoCaptcha = substr(md5( time()) ,0,9);
 
// Guardar o texto numa variável session.
 $_SESSION['captcha'] = $codigoCaptcha;
 
// Criar um novo recurso de imagem a partir de um arquivo.
 $imagemCaptcha = imagecreatefrompng("fundocaptcha.png");
 
//Carregar uma nova fonte.
 $fonteCaptcha = imageloadfont("anonymous.gdf");
 
//Carregar a cor da fonte.
 $corCaptcha = imagecolorallocate($imagemCaptcha,255,0,0);
 
// Escrever a string na cor escolhida.
 imagestring($imagemCaptcha,$fonteCaptcha,15,5,$codigoCaptcha,$corCaptcha);
 
// Definir o header como image/png para indicar que esta página contém dados do tipo image->PNG.
 header("Content-type: image/png");
 
// Mostrar a imagem captha no formato PNG.
 imagepng($imagemCaptcha);
 
// Liberar memória.
 imagedestroy($imagemCaptcha);
 
?>
