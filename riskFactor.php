<html>
<link rel="stylesheet" href="patientstyle.css">
<div>
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
</div>
		</html>