<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="style.css">
        <?php
            session_start();
        ?>
    </head>
    <body>
        <h1>
            ER Patient System
        </h1>
        <?php
            $form = "";
			if (!(isset($_SESSION['username'])) && !(isset($_SESSION['password']))){
				$form = <<< EOBODY
					<form action="{$_SERVER['PHP_SELF']}" method="post">
						<strong>Username: </strong><input type="text" name="username" /><br /><br />
						<strong>Password: </strong><input type="password" name="password"/><br /><br />
						<input type="submit" name="login" value = "Login" /><br/>
                    </form>	
EOBODY;
			}
            $bottom = "";
            if (isset($_POST["login"]) || isset($_SESSION['username'])){
                if(isset($_POST["login"])){
                    $nameValue = trim($_POST["username"]);
                    $passwordValue = trim($_POST["password"]);
                    if ($nameValue === ""){ 
                        $bottom= "<strong>Name Value Missing</strong><br />";
                    }else if($passwordValue === "" || ($nameValue !=="srao") || ($passwordValue !== "123")){
                        $bottom= "<strong>Invalid login information provided</strong><br />";
                        $passwordValue = "";
                    }else{
                        $bottom = "";
                    }
                }if($bottom === ""){
                    if(!(isset($_SESSION['username'])) && !(isset($_SESSION['password']))){
                        $_SESSION['username'] = $nameValue;
                        $_SESSION['password'] = $passwordValue;
                    }
                    $form = <<< EOBODY
                        <table>
                            <tr>
                                <td>Patient Name</td>
                                <td>Diagnosis</td>
                                <td>Priority Score</td>
                                <td>Status</td>
                                <td>Processed By</td>
                            </tr>
                        </table>
                        <br /><br />
                        <form action="newPatient.php" method="post">
                            <input type="submit" name="submitButton" value = "Add a new patient" /><br/>
                        </form>
EOBODY;
                } 
            }
            $body = $form.$bottom;
			echo $body;
        ?>
    </body>
</html>