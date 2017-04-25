<!DOCTYPE html>
<html lang="en">
<head>
    <!--
       CSC 2410 Web Programming
       Chapter 8 Lab
       Part 2:

       Author: Brandon Young
       Date: 4/21/2017

       Filename: ViewInterviewsYoung.php
    -->
    <meta charset="UTF-8">
    <title>View Interviews</title>
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
        <h1>All Interviews</h1>
    </div>
    <div class="row">
        <?php
            /**
             * The ViewInterviewsYoung page is used to display all of the current interviews that reside in the database
             * on the page. It connects to the database and pulls all information from the database. It then loops through
             * that information and outputs it to a table on screen.
             * Author: Brandon Young
             */
            // Open a connection to database
            $DBConnect = @mysql_connect("localhost", "root", "");
            // If connection to database doesn't work display an error
            if($DBConnect === false) {
                echo "<p>Unable to connect to the database server.</p>" .
                    "<p>Error code " . mysqli_errno() . ": " . mysqli_error() . "</p>";
            } else {
                $DBName = "interview";
                // Check if the database is empty first and display message if it is
                if(!@mysql_select_db($DBName, $DBConnect)) {
                    echo "<p>There are no entries in the guest book!</p>";
                } else {
                    $TableName = "applicant";
                    // This query selects everything from the applicant table
                    $SQLstring = "SELECT * FROM $TableName";
                    $QueryResult = @mysql_query($SQLstring, $DBConnect);
                    // Output message if the applicant table is empty
                    if(mysql_num_rows($QueryResult) == 0) {
                        echo "<p>There are no previous Interviews!</p>";
                    } else {
                        echo "<p>The following Interviews have taken place:</p>";
                        // This starts the beginning of a striped table
                        echo "<div class='col-xs-12'><table class='table table-striped'>";
                        // Add a head to the table
                        echo "<thead><tr><th>Interviewer's Name</th><th>Position</th><th>Date</th> " .
                                "<th>Candidate's Name</th><th>Communication Abilities</th>" .
                                "<th>Professional Appearance</th><th>Computer Skills</th>" .
                                "<th>Bussiness Knowledge</th><th>Interviewer's Comments</th></tr></thead>";
                        echo "<tbody>";
                        // Loop through the query result and add each element to a new row in table
                        while(($Row = mysql_fetch_assoc($QueryResult)) !== false) {
                            echo "<tr><td>{$Row['interviewer']}</td>";
                            echo "<td>{$Row['position']}</td>";
                            echo "<td>{$Row['interview_date']}</td>";
                            echo "<td>{$Row['candidate']}</td>";
                            echo "<td>{$Row['communication']}</td>";
                            echo "<td>{$Row['appearance']}</td>";
                            echo "<td>{$Row['computer_skills']}</td>";
                            echo "<td>{$Row['bussiness_knowledge']}</td>";
                            echo "<td>{$Row['comments']}</td></tr>";
                        } // end while
                        echo "</tbody></table>";
                        // Clear the query result
                        mysql_free_result($QueryResult);
                    } // end if else
                    // Close the database
                    mysql_close($DBConnect);
                } // end if else
            } // end if else
        ?>
    </div>
    <p><a href="CreateInterviewsTableYoung.php">Add New Interview</a></p>
</div>
</body>
</html>