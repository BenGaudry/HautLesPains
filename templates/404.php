<?php 
require_once '../res/components/header.php';
require_once('../config/Mail.php');
?>

<h1>404</h1>
<p>La page demandée (<?php print_r($_SERVER['REQUEST_URI']) ?>) n'a pas été trouvée...</p>
<p>Essayez de <a href="commander">commander ici</a></p>

<?php 

$mail = new Mail('Hello', 'Hola', 'Olé');
$mail->send('bengaudry@outlook.fr')

?>

<?php require_once '../res/components/footer.php'; ?>