<?php
	$failure = false;

	# authenticate username and password below
	function authenticate($email,$pw){
		require_once 'phpmysqlconnect.php';
		# above require_once creates PDO object that connects to
		# paphi_website_db using PDO, object is called $conn
		# PDO prepare/execute is safer than query, compiles query server side
		# and allows you to pass parameters, avoid SQL injection
		$stmt = $conn->prepare('SELECT * from user_info
		    WHERE email = :email AND password = :password');
		$stmt->bindParam(':email', $email, PDO::PARAM_STR);
		$stmt->bindParam(':password', $pw, PDO::PARAM_STR);
		# uncomment die statement below to view query debug summary
		#die($stmt->debugDumpParams());
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		# uncomment die statement below to view result of query fetchAll
		#die(var_dump($rows));
		$res = $stmt->rowCount();
		#uncomment die statement below to view parameters passed and size of resultset
		#die($email." ".$pw." ".$res);
		# check if any values returned when searching for given username and password
		# redirects to main page if found, otherwise displays error
		return $res == 0 ? false : true;
	}

	if(isset($_POST['login'])){
		if(authenticate($_POST['email'],$_POST['pw'])){
			header("Location: home.php?name=".urlencode($_POST['email']).urlencode($_POST['password']));
			exit;
		} else {
			$failure = "incorrect username or password";
		}
	}
?>
<?php
	require "nav.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>3cfbdf46</title>
</head>
<body>
	<div class="container">
		<h1>Please Log In</h1>
		<?php
			if ( $failure !== false ) {
			    // Look closely at the use of single and double quotes
			    echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
			}
		?>
		<form method="post" align="center">
			<input type="email" name="email" placeholder="email">
			<input type="password" name="pw" placeholder="password">
			<!-- ACTION ITEM, ADD RADIO BUTTON TO REMEMBER PASSWORD
				AND NECESSARY FUNCTIONALITY -->
			<input type="submit" name="login" placeholder="submit">
		</form>
	</div>
</body>
