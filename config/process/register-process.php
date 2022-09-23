<?php 
  require_once '../databaseConnect.php';

	function email_exists(string $email, array $options = null):bool {
		global $bdd;
		if(isset($options['inDeletedUsers']) && $options['inDeletedUsers'] === true) {
			$req = $bdd->prepare('SELECT email FROM deleted_users WHERE email = :email');
		} else {
			$req = $bdd->prepare('SELECT email FROM users WHERE email = :email');
		}

		$req->execute(['email' => $email]);
    $emailsInDb = $req->rowCount();
		return ($emailsInDb === 0) ? true : false;
	}

  if(isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['pass']) && isset($_POST['pass-confirm'])){
		$name = htmlspecialchars($_POST['prenom']);
		$lastName = htmlspecialchars($_POST['nom']);
		$email = htmlspecialchars($_POST['email']);
		$phone = htmlspecialchars($_POST['tel']);
		$password = htmlspecialchars($_POST['pass']);
		$password_confirm = htmlspecialchars($_POST['pass-confirm']);

		if(!email_exists($email)){
			if(!email_exists($email)) {
				if(strlen($email) < 255){
					if(strlen($name) < 100){
						if(strlen($lastName) < 100){
							if(filter_var($email, FILTER_VALIDATE_EMAIL)){
								if($password === $password_confirm){

									sleep(1);
									$password = hash('sha256', $password);
									$ip = getIp();

									$insert = $bdd->prepare('INSERT INTO users(prenom, nom, email, tel, pass, registerDate, ip) VALUES(:name, :lastName, :email, :phone, :password, NOW(), :ip)');
									$insert->execute(array(
										'name' => $name,
										'lastName' => $lastName,
										'email' => $email,
										'phone' => $phone,
										'password' => $password,
										'ip' => getIp()
									));
										
									$req = $bdd->prepare('SELECT id, registerDate FROM users WHERE email = :email');
									$req->execute([
										'email' => $email
									]);
										
									$data = $req->fetch();
									set_session_vars($data['id'], $name, $lastName, $email, $phone, $data['registerDate']);
										
									$token = hash('sha256',$name . time());
									setcookie("authToken", $token, time()+60*60*24*365); // le coookie expire dans 365 jours
									header('Location: ../../templates/auth/checkEmail.php');


								} else header('Location:../../templates/auth/register-password.php?n=FERR5');
							} else header('Location:../../templates/auth/register.php?n=FERR4');
						} else header('Location:../../templates/auth/register.php?n=FERR3');
					} else header('Location:../../templates/auth/register.php?n=FERR3');
				} else header('Location:../../templates/auth/register.php?n=FERR3');
			}else header('Location:../../templates/auth/register.php?n=FERR3');
		} else header('Location:../../templates/auth/register.php?n=FERR2');
  } else header('Location:../../templates/auth/register.php?n=FERR1');
?>