<?php
       //Reseteamos variables a 0.
       $nombre = $email = $mensaje = $para = NULL;

       if (isset($_POST['submit'])) {

          //Obtenemos valores input formulario
          $nombre = $_POST['name'];
          $email = $_POST['email'];
          $mensaje = $_POST['message'];
          $para = 'epzilonzeronorequiem@gmail.com';


          //Compones nuestro correo electronico

          //Incluimos libreria PHPmailer (deberas descargarlo).
          require'class.phpmailer.php';

          //Nuevo correo electronico.
          $mail = new PHPMailer;
          //Caracteres.
          $mail->CharSet = 'UTF-8';

          //De dirección correo electrónico y el nombre
          $mail->From = "epzilonzeronorequiem@gmail.com";
          $mail->FromName = "Nombre de dominio";

          //Dirección de envio y nombre.
          $mail->addAddress($para, $nombre);
          //Dirección a la que responderá destinatario.
          $mail->addReplyTo("epzilonzeronorequiem@gmail.com","Tunombre");

          //Enviar codigo HTML o texto plano.
          $mail->isHTML(true);

          //Cuerpo email con HTML.
          $mail->Body = "
                  <h1>Envio libreria PHPMailer</h1>

                  Nombre: $nombre<br />
                  Email: $email <br />
                 Mensaje: $mensaje <br />

          ";

        //Comprobamos el envio.
        if(!$mail->send()) {
            echo "<script language='javascript'>
                alert('fallado');
             </script>";
        } else {
            echo "<script language='javascript'>
                alert('Mensaje enviado, muchas gracias.');
             </script>";
        }
      }
    ?>
