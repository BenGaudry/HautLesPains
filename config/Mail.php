<?php

class Mail {

  public function __construct(STRING $title, STRING $pageTitle, STRING $pageContent, ARRAY $options = NULL) {
    $this->title = $title;
    $this->pageTitle = $pageTitle;
    $this->pageContent = $pageContent;
    $this->options = $options;
  }

  public $headers = [
    'from' => 'From: web.hautlespains@outlook.fr',
    'version' => 'MIME-Version: 1.0',
    'content-type' => 'Content-type: text/html; charset=utf-8'
  ];

  public function generateBody () {
    return ('
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

    <html xmlns:v="urn:schemas-microsoft-com:vml">
    <head>
      <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    </head>    

    <body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
      <table width="100%" bgcolor="white" color="black" border="0" cellpadding="0" cellspacing="0">
          <tr>
              <td style="text-align:center;"><h1 style="font-size:1.2em">'.$this->pageTitle.'</h1></td>
            </tr>
            <tr>
              <td style="padding:10px;text-align:center;"><p>'.$this->pageContent.'</p></td>
            </tr>
            <tr>
              <td style="font-style:italic;font-size: 1em; padding:10px;text-align:center;">Ceci est un envoi automatique, il est inutile de r&#233pondre<br>Le service web de Haut les Pains</td>
          </tr>
      </table>
    </body>');
  }

  public function send($recipient) {
    try {
      mail($recipient, $this->title, $this->generateBody(), $this->headers);
      return true;
    } catch (\Throwable $e) {
      return $e;
    } 
  }

}