<?php 

namespace core\classes;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class EnviarEmail{

        // ======================================================================

    public function envar_email($email_cliente, $purl){

        // confimar o email

        // controu o purl (link para validação do email)
        $link = BASE_URL . '?a=confirmar_email&purl='. $purl;
        $mail = new PHPMailer(true);

        try {
              
            //Opções do servidor
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = EMAIL_HOST;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = EMAIL_FROM;                     //SMTP username
            $mail->Password   = EMAIL_PASS;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = EMAIL_PORT;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Emissor e receptor
            $mail->setFrom(EMAIL_FROM, APP_NAME);
            $mail->addAddress($email_cliente); 

            //assunto
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = APP_NAME. 'Confirmação de senha';

            // menssagem
            $html = '<p>Seja bem-vondo á nossa loja</p>';
            $html .='p>Para poder entrar na nossa loja, necessita confirmar o seu email.</p>';
            $html .= '<p>Para confirmar o email, click no link abaixo:</p>';
            $html .= '<p><a href="'.$link.'">Confirmar Email</p>';
            $html .= '<p><i><small>'.APP_NAME. '</small></i></p>';
            
            $mail->Body    = $html;


            $mail->send();
            return true;
        } catch (Exception $e) {
          return false;
        }

     }
}

?>