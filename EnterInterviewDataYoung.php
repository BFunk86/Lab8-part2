<!DOCTYPE html>
<html lang="en">
<head>
    <!--
       CSC 2410 Web Programming
       Chapter 8 Lab
       Part 2:

       Author: Brandon Young
       Date: 4/21/2017

       Filename: EnterInterviewDataYoung.php
    -->
    <meta charset="UTF-8">
    <title>Entire Interview</title>
    <!-- Latest compiled and mninified JQuery for Bootstrap to work -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>Interview Entry</h1>
    </div>
    <div class="row">

        <?php
            /**
             * The EnterInterviewDataYoung page is used to add the form data from CreateInterviewsTableYoung to the
             * database.
             * Author: Brandon Young
             */

            // Check if any of the inputs are empty
            if( empty($_POST['interviewer']) || empty($_POST['position']) ||
                empty($_POST['date']) || empty($_POST['candidate']) || empty($_POST['communication']) ||
                empty($_POST['appearance']) || empty($_POST['computer_skills']) || empty($_POST['bussiness_knowledge']) ||
                empty($_POST['comments']) ) {
                echo "<p>You must fill in all Interview Form inputs. Click your browser's Back button to return to the Interview form.</p>";
            } else {
                // Establish a connection to the MySQL Server
                $DBConnect = @mysql_connect("localhost", "root", "");
                // Check if the connection to Database worked and if not display an error message
                if ($DBConnect === false) {
                    echo "<p>Unable to connect to the database server.</p>" .
                        "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";
                } else {
                    $DBName = "interview";
                    // If database does not exist than create it
                    if (!@mysql_select_db($DBName, $DBConnect)) {
                        $SQLstring = "CREATE DATABASE $DBName";
                        $QueryResult = @mysql_query($SQLstring, $DBConnect);
                        // Output error if creating the database doesn't work
                        if ($QueryResult === false) {
                            echo "<p>Unable to execute the query.</p>" .
                                "<p>Error Code " . mysql_errno($DBConnect) . ": " . mysql_error($DBConnect) . "</p>";
                        } else {
                            // Output message to first person to sign the guest book
                            echo "<p>You are the first interviewer!</p>";
                        } // end if else
                        mysql_select_db($DBName, $DBConnect);
                    } // end if
                } // end if else

                // TableName holds the name of the table to be used
                $TableName = "applicant";
                // This SQL Query looks for a table named applicant
                $SQLstring = "SHOW TABLES LIKE '$TableName'";
                $QueryResult = @mysql_query($SQLstring, $DBConnect);
                // If the table does not exist this creates the applicant table
                if (mysql_num_rows($QueryResult) == 0) {
                    // This SQL Query creates an new applicant table
                    $SQLstring = "CREATE TABLE $TableName 
                              (interviewID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
                                interviewer VARCHAR(30), position VARCHAR(80),
                                interview_date DATE, candidate VARCHAR(30),
                                communication LONGTEXT, appearance LONGTEXT,
                                computer_skills LONGTEXT, bussiness_knowledge LONGTEXT, comments LONGTEXT)";
                    $QueryResult = @mysql_query($SQLstring, $DBConnect);
                    // Display error message if creating the applicant table fails
                    if ($QueryResult === false) {
                        echo "<p>Unable to create the table.</p>"
                            . "<p>Error code " . mysql_errno($DBConnect)
                            . ": " . mysql_error($DBConnect) . "</p>";
                    } // end if
                } // end if

                // Collect the information that was submitted in the form to add to applicant table
                $interviewer = stripslashes($_POST['interviewer']);
                $position = stripslashes($_POST['position']);
                $date = $_POST['date'];
                $candidate = stripslashes($_POST['candidate']);
                $communication = stripslashes($_POST['communication']);
                $appearance = stripslashes($_POST['appearance']);
                $computerSkill = stripslashes($_POST['computer_skills']);
                $businessKnowledge = stripslashes($_POST['bussiness_knowledge']);
                $comments = stripslashes($_POST['comments']);

                // This SQL Query will add the form information to the visitor table
                $SQLstring = "INSERT INTO $TableName VALUES(NULL, '$interviewer', '$position', '$date', '$candidate', '$communication', '$appearance', '$computerSkill', '$businessKnowledge', '$comments')";
                $QueryResult = @mysql_query($SQLstring, $DBConnect);
                // If the query doesn't work display an error
                if($QueryResult === false) {
                    echo "<p>Unable to execute the query.</p>"
                        . "<p>Error code " . mysql_errno($DBConnect)
                        . ": " . mysql_error($DBConnect) . "</p>";
                } else {
                    echo "<h1>Thank you for interviewing an applicant!</h1>";
                } // end if else
                // Close the connection to the database
                mysql_close($DBConnect);
            }// end if else
        ?>
        <p><a href="CreateInterviewsTableYoung.php">Add New Interview</a></p>
        <p><a href="ViewInterviewsYoung.php">View Interviews</a></p>
    </div>
</div>
</body>
</html>