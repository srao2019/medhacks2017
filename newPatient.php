<html>
	<div>
    <head>
        <meta charset="utf-8"/>
		<link rel="stylesheet" href="patientstyle.css">
	</head>
	<body>
        <h1>New Patient Information</h1>

        <?php
            $form = "";
            if(!(isset($_POST['submit']))){
                $form = <<< EOBODY
                    <form action="{$_SERVER['PHP_SELF']}" method="post">
                       <strong> Patient Information </strong><br></br>
					   First Name: <input type="text" name="firstName" /><br /><br />
                       Last Name:<input type="text" name="lastName"/><br /><br />
                       DOB: <input type = "number" value = "month"/>/<input type="number" value="day">/<input type="number" value="year"><br /><br />
                       Address: <input type = "text" name ="address"/><br><br/>
                       <strong><p>Patient Condition</p></strong>
					   Pulse Rate(bpm): <input type="number" name="pulse_rate"><br /><br />
					   Systolic/Diastolic (mmHg): <input type="number" value="sbp">/<input type="number" value="dbp"><br /><br />
					   SpO2 %: <input type="number" value="spo2 "><br /><br />
					   Temperature: <input type="number" value="temp"><br /><br />
					   Notes: <input type="text" name="lastName"/><br /><br />
		</body>                      
                   </form>
EOBODY;
            }else{
				$form = <<< EOBODY
					<p> Patient information has been recorded </p>
EOBODY;
			}
			if(isset($_POST['pulse_rate'])){
				getBP($_POST['pulse_rate']);
			}
			echo $form;
			

        ?>
        
    <form action = "Risk Factor.php" method = "post">
        <input type="submit" name="home" value = "Proceed to Risk Factor" /><br/><br />
		</div>
		
</html>