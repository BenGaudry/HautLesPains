<?php

function getIp(){
  if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
  return $ip;
}

function sendEmail(
    STRING $title, 
    STRING $pagetitle, 
    STRING $pagecontent, 
    ARRAY $options = NULL
  ): BOOL{

  $headers = [
    'from' => 'From: web.hautlespains@outlook.fr',
    'version' => 'MIME-Version: 1.0',
    'content-type' => 'Content-type: text/html; charset=utf-8',
  ];

  $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
     
     <html xmlns:v="urn:schemas-microsoft-com:vml">
     <head>
         <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
     </head>    
     
     <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
         <table width="100%" bgcolor="white" color="black" border="0" cellpadding="0" cellspacing="0">
             <tr>
                <td style="text-align:center;"><h1 style="font-size:1.2em">'.$pagetitle.'</h1></td>
              </tr>
              <tr>
                <td style="padding:10px;text-align:center;"><p>'.$pagecontent.'</p></td>
              </tr>
              <tr>
                <td style="font-style:italic;font-size: 1em; padding:10px;text-align:center;">Ceci est un envoi automatique, il est inutile de r&#233pondre<br>Le service web de Haut les Pains</td>
             </tr>
         </table>
     </body>';

  if(isset($options['mailto'])) {
    $mailto = $options['mailto'];
  } else {
    $mailto = $_SESSION['email'];
  }

  if(isset($options['redirect'])) {
    $redirect = $options['redirect'];
  }

  $mail = [
    'to' => $mailto,
    'title' => $title,
    'content' => $body,
    'headers' => $headers['from']."\n".$headers['content-type']."\n".$headers['version']."\n\n",
  ];

  if(mail($mail['to'], $mail['title'], $mail['content'], $mail['headers'])) {
    if(isset($options['redirect'])) {
      header('Location: '.$redirect['success']);
    }
    $return = true;
  } else {
    if(isset($options['redirect'])) {
      header('Location: '.$redirect['fail']);
    }
    $return = false;
  }

  return $return;
}

function set_session_vars(
    INT $id = NULL,
    STRING $user = NULL,
    STRING $lastName = NULL,
    STRING $email = NULL,
    STRING $tel = NULL,
    $registerDate = NULL)
  {

  if($id !== NULL) {
    $_SESSION['id'] = $id;
  }

  if($user !== NULL) {
    $_SESSION['user'] = $user;
  }

  if($lastName !== NULL) {
    $_SESSION['lastName'] = $lastName;
  }

  if($email !== NULL) {
    $_SESSION['email'] = $email;
  }
  
  if($tel !== NULL) {
    $_SESSION['tel'] = $tel;
  }

  if($registerDate !== NULL) {
    $_SESSION['registerDate'] = $registerDate;
  }
}