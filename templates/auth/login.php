<?php 
require_once '../../res/components/header.php';
require_once('../../config/databaseConnect.php');

if(isset($_COOKIE['authToken']) && isset($_COOKIE['id'])){
  print('hey');
  $req = $bdd->prepare('SELECT id, prenom, nom, email, tel FROM users WHERE id = :id');
  $req->execute(array('id' => $_COOKIE['id']));
  $data = $req->fetch();
  if(!empty($data)){
    $token = hash('sha256',$data['prenom'] . $data['email']);
    if($token === $_COOKIE['authToken']){
      $_SESSION['user'] = $data['prenom'];
      $_SESSION['lastName'] = $data['nom'];
      $_SESSION['email'] = $data['email'];
      $_SESSION['tel'] = $data['tel'];
      $_SESSION['id'] = $data['id'];
      $_SESSION['registerDate'] = $data['registerDate'];
      setcookie("authToken", $token, time()+60*60*24*365); // le coookie expire dans 365 jours
      setcookie('id', $data['id'], time()+60*60*24*365);

      header('Location: ../../templates/index.php');
    }
  }
}
?>


<h1 class="page-title">Se connecter</h1>

<form action="../../config/process/login-process.php" method="POST" class="auth-form">

  <label class="input-desc" for="email">Email</label>
  <input type="email" name="email" id="email" required onchange="check.email(this)">

  <label class="input-desc" for="pass">Mot de passe</label>
  <input type="password" name="pass" id="pass" required onchange="check.password(this)">

  <button type="submit" class="auth-submit">Connexion</button>

  <p class="change-auth-method">Pas encore de compte ? <a href="register.php">Inscrivez-vous</a></p>
  <p class="change-auth-method"><a href="forgot-pass.php">Mot de passe oublié ?</a></p>

</form>

<script src="../../res/scripts/auth-checkings.js"></script>

<?php require_once '../../res/components/footer.php'; ?>
