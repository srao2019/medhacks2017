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
                    <form action="processPatient.php" method="post">
                       <strong>First Name: </strong><input type="text" name="firstName" /><br /><br />
                       <strong>Last Name: </strong><input type="text" name="lastName"/><br /><br />
                       <strong>DOB: </strong><input type = "number" name = "month"/>/<input type="number" name="day">/<input type="number" name="year"><br /><br />
                       
                       <strong><p>Patient Condition</p></strong>
					   Pulse Rate(bpm): <input type="number" name="pulse_rate"><br /><br />
					   Systolic/Diastolic (mmHg): <input type="number" name="sbp">/<input type="number" name="dbp"><br /><br />
					   SpO2 %: <input type="number" name="spo2 "><br /><br />
					   Temperature: <input type="number" name="temp"><br /><br />
					   Notes: <input type="text" name="notes"/><br /><br />
					   <input type = "submit" name = "vitalsSubmit" value = "Submit"><br /><br />
                   </form>
EOBODY;
            }else{
				$form = <<< EOBODY
					<p> Patient information has been recorded </p>
EOBODY;
			}
			echo $form;
			

        ?>
        
    <form action = "Risk Factor.php" method = "post">
        <input type="submit" name="riskFactor" value = "Proceed to Risk Factor" /><br/><br />
	</form>
	</body>	
	</div>		
</html>