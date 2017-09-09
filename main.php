<html>
    <head>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>
            ER Patient System
        </h1>
        <table>
            <tr>
                <td>Patient Name</td>
                <td>Diagnosis</td>
                <td>Priority Score</td>
                <td>Physician</td>
                <td>Status</td>
                <td>Processed By</td>
            </tr>
        </table>
        <br /><br />
        <form action="newPatient.php" method="post">
            <input type="submit" name="submitButton" value = "Add a new patient" /><br/>
        </form>
    </body>
</html>