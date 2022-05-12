<?php

    require "./libs/PHPMAILER/Exception.php";
    require "./libs/PHPMAILER/OAuth.php";
    require "./libs/PHPMAILER/PHPMailer.php";
    require "./libs/PHPMAILER/POP3.php";
    require "./libs/PHPMAILER/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class Mensagem {
        private $para = null;
        private $assunto = null;
        private $mensagem = null;

        public function __get($name){
            return $this->$name;
        }

        public function __set($name, $value){
            $this->$name = $value;
        }

        public function mensagemValida(){
            if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)){
                return false;
            }
            return true;
        }
    }

    $mensagem = new Mensagem();
    $mensagem->__set("para", $_POST["para"]);
    $mensagem->__set("assunto", $_POST["assunto"]);
    $mensagem->__set("mensagem", $_POST["mensagem"]);

    if(!$mensagem->mensagemValida()){
        echo "Mensagem não é válida";
        header("Location: index.php");
    }

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp-relay.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'zrblackultimate@gmail.com';                     //SMTP username
        $mail->Password   = 'teste';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('zrblackultimate@gmail.com', 'Teste do mailer');
        $mail->addAddress($mensagem->__get("para"));
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');

        //Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $mensagem->__get("assunto");
        $mail->Body    = $mensagem->__get("mensagem");
        $mail->AltBody = 'É necessário utilizar um cliente que utilize suporte para HTML';

        $mail->send();
        echo 'Email enviado com sucesso';
    } catch (Exception $e) {
        echo "Mensagem não pode ser enviada. Error: {$mail->ErrorInfo}";
    }
?>