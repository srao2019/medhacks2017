<html>
    <head>
        <meta charset="utf-8"/>
		<script src= "conditions.js"></script>
		<script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <?php
			session_start();
		?>
    </head>
	<div class="tab">
  <button class="tablinks" onclick="openFolder(event, 'Patient Information')">Patient Information</button>
  <button class="tablinks" onclick="openFolder(event, 'Risk Factor Evaluation')">Risk Factor Evaluation</button>
	</div>
    <body>
		<div id="Patient Information" class="tabcontent">
        <h1>New Patient Information</h1
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
				   </div>
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
		</div>
		<div id="Risk Factor Evaluation" class="tabcontent">
        <h1>Risk Factor Evaluation</h1>
        <?php
            $form = "";
            if(!(isset($_POST['submit']))){
                $form = <<< EOBODY
                    <form action="{$_SERVER['PHP_SELF']}" method="post">
                       <strong>Age: </strong><input type="text" name="Age" /><br /><br />
                       <strong>Diabetic </strong><input type="text" name="diabetic"/><br /><br />
                       <strong>History of Heart Disease</strong><input type = "text" name = "hdHistory"/><br /><br />
 	            <input type="submit" name="submit" value = "Submit" /><br/>
                       
                   </form>
EOBODY;
            }else{
				$form = <<< EOBODY
					<p> Risk Factor Evaluation has been recorded </p>
EOBODY;
			}
			
			echo $form;

        ?>
        
    <form action = "main.php" method = "post">
        <input type="submit" name="home" value = "Return to Home" /><br/>
    </form>
		</div>
    </body>
</html>