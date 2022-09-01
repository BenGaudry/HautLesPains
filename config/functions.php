<?php

if(!isset($_SESSION)) {
  session_start();
}

function transformSpecialChars($string){
  $chars = ['é', 'è', 'É', 'È', 'à', '€', 'ç'];
  $replaceBy = ['&#233;','&#232;','&#201;','&#200;','&#224;', '&#8364;', '&#231;'];
  return(str_replace($chars, $replaceBy, $string));
}

function sendEmail($title, $pagetitle, $pagecontent, $redirectSuccess = NULL, $redirectFail = NULL){
  $pagetitle = transformSpecialChars($pagetitle);
  $pagecontent = transformSpecialChars($pagecontent);

  $headers = array(
    'from' => 'From: web.hautlespains@outlook.fr',
    'version' => 'MIME-Version: 1.0',
    'content-type' => 'Content-type: text/html; charset=ISO-8859-1',
  );

  $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
     
     <html xmlns:v="urn:schemas-microsoft-com:vml">
     <head>
         <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
     </head>    
     
     <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
         <table bgcolor="#303030" width="100%" border="0" cellpadding="0" cellspacing="0">
             <tr>
                <td bgcolor="#dbdbdb" style="text-align:center;"><h1>'.$pagetitle.'</h1></td>
              </tr>
              <tr>
                <td bgcolor="#fff" style="padding:10px;"><p>'.$pagecontent.'</p></td>
              </tr>
              <tr>
                <td bgcolor="#dbdbdb" style="font-style:italic;font-size: 0.8em; padding:10px;">Ceci est un envoi automatique, il est inutile de r&#233pondre<br>Le service web de Haut les Pains</td>
             </tr>
         </table>
     </body>';

  $mail = array(
    'to' => $_SESSION['email'],
    'title' => $title,
    'content' => $body,
    'entetes' => $headers['from']."\n".$headers['content-type']."\n".$headers['version']."\n\n",
  );

  if(mail($mail['to'], $mail['title'], $mail['content'], $mail['entetes'])){
    if($redirectSuccess != NULL){
      header('Location: '.$redirectSuccess.'');
    }

    return ($success = true);
  } else {
    if($redirectFail != NULL){
      header('Location: '.$redirectFail.'');
    } else if ($redirectFail == NULL && $redirectSuccess != NULL){
      header('Location: '.$redirectSuccess);
    }

    return ($success = false);
  }
}