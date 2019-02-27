<?php
namespace app\utilidades;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class UtilidadesMailer
{

    public  function mail($params){
        $mail = new PHPMailer(true);  
        try {
            $mail->Host         = 'smtp.gmail.com';
            $mail->Port         = '465';
            $mail->CharSet      = 'UTF-8';
            $mail->SMTPAuth     = true;
            $mail->SMTPDebug    = 0;
            $mail->SMTPSecure   = 'ssl';
            $mail->Username     = 'jdamianjm@gmail.com';
            $mail->Password     = 'Kuna9579/_$s';
            $mail->isSMTP();
            $mail->isHTML(true); 
            #Es seteado lo siguiente cuando ocurren problemas al enviar correos desde determinado host
            $mail->SMTPOptions  = array (
                'ssl' => array (
                    'verify_peer'       => false,
                    'verify_peer_name'  => false,
                    'allow_self_signed' => true
                )
            );
            //Recipients
            $mail->setFrom($params['from']['address'], $params['from']['name']);

            foreach ($params['addresses'] as $address) {
                $mail->addAddress($address['address'], $address['name']);
            }

            if (isset($params['addReplyTo'])) {
                foreach ($params['addReplyTo'] as $replyTo) {
                    $mail->addReplyTo($replyTo['address'], $replyTo['information']);
                }
            }

            if (isset($params['cc'])) {
                foreach ($params['cc'] as $cc) {
                    $mail->addCC($cc);
                }
            }

            if (isset($params['bcc'])) {
                foreach ($params['bcc'] as $bcc) {
                    $mail->addBCC($bcc);
                }
            }


            if (isset($params['attachments'])) {
                foreach ($params['attachments'] as $attachment) {
                    $mail->addAttachment($attachment['path'], $attachment['name']);
                }
            }

            if(isset($params['embedded_image'])){
               foreach ($params['embedded_image'] as $image) {
                   $mail->addEmbeddedImage($image['url'], $image['name']);               
               }
            }

            //Content
            if (isset($params['subject'])) {
                $mail->Subject = $params['subject'];
            }
            $mail->Body = $params['body'];
            if (isset($params['altBody'])) {
                $mail->AltBody = $params['altBody'];
            }
            if ($mail->send()) {
                return true;
            }
            return $mail->ErrorInfo;

        }catch(Exception $e) {
            \Yii::$app->response->data = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;

        }
    }
}


