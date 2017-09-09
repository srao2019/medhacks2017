<html>
    <head>
        <meta charset="utf-8"/>
        <?php
			session_start();
		?>
    </head>
    <body>
        <h1>Add a new patient</h1>
		<form action="{$_SERVER['PHP_SELF']}" method="post">
			<script>getConditions();</script>
			<input type = "hidden" id = "conditions" name = "conditions">
		</form>
        <?php
			$conditions = json_decode($_POST["conditions"]);
			echo $conditions;
            $form = "";
            if(!(isset($_POST['submit']))){
                $form = <<< EOBODY
                    <form action="{$_SERVER['PHP_SELF']}" method="post">
                       <strong>First Name: </strong><input type="text" name="firstName" /><br /><br />
                       <strong>Last Name: </strong><input type="text" name="lastName"/><br /><br />
                       <strong>SSN: </strong><input type = "text" name = "ssn"/><br /><br />
                       
                       <p>Patient Condition</p>
					   
					   Syncope<input type = "checkbox" name = "syncope" value = "Syncope"/><br /><br />
					   
                       
                       
                       <input type="submit" name="submit" value = "Submit" /><br/>
                       
                   </form>
EOBODY;
            }else{
				$form = <<< EOBODY
					<p> Patient information has been recorded </p>
EOBODY;
			}
			
			echo $form;

        ?>
        
    <form action = "main.php" method = "post">
        <input type="submit" name="home" value = "Return to Home" /><br/>
    </form> 
    </body>
</html>