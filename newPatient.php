<html>
	<div>
    <head>
        <meta charset="utf-8"/>
		<link rel="stylesheet" href="patientstyle.css">
	</head>
	<body>
        <h1>New Patient Information</h1>
		<form action="processPatient.php" method="post">
		   <strong> Patient Information </strong><br></br>
		   First Name: <input type="text" name="firstName" /><br /><br />
		   Last Name:<input type="text" name="lastName"/><br /><br />
		   DOB: <input type = "number" name = "month"/>/<input type="number" name="day">/<input type="number" name="year"><br /><br />
		   Address: <input type = "text" name ="address"/><br><br/>
		   <strong><p>Patient Condition</p></strong>
		   Pulse Rate(bpm): <input type="number" name="pulse_rate"><br /><br />
		   Systolic/Diastolic (mmHg): <input type="number" name="sbp">/<input type="number" name="dbp"><br /><br />
		   SpO2 %: <input type="number" name="spo2 "><br /><br />
		   Temperature: <input type="number" name="temp"><br /><br />
		   Notes: <input type="text" name="notes"/><br /><br />
		   <strong><p>Risk Factor Evaluation</p></strong>
		   Age: <input type="text" name="age" /><br /><br />
		   Diabetic: <input type="text" name="diabetic"/><br /><br />
		   History of Heart Disease: <input type = "text" name = "hdHistory"/><br /><br />
		   <input type="submit" name = "patientSubmit" value = "Submit">
		</form>
	</body>
</div>
		
</html>