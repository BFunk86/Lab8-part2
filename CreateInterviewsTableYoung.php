<!DOCTYPE html>
<html lang="en">
<head>
    <!--
       CSC 2410 Web Programming
       Chapter 8 Lab
       Part 8:

       Author: Brandon Young
       Date: 4/21/2017

       Filename: CreateInterviewsTableYoung.php
    -->
    <meta charset="UTF-8">
    <title>Create Interviews</title>
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
        <div class="col-xs-8">
            <form action="EnterInterviewDataYoung.php" method="post">
                <div class="form-group col-xs-6">
                    <label for="interviewer">Interviewer's Name:</label>
                    <input id="interviewer" class="form-control" type="text" name="interviewer" placeholder="Interviewers Name" required/>
                </div>
                <div class="form-group col-xs-6">
                    <label for="position">Position:</label>
                    <input id="position" class="form-control" type="text" name="position" placeholder="Position Applying For" required/>
                </div>
                <div class="form-group col-xs-6">
                    <label for="date">Date of Interview:</label>
                    <!-- By using the date type it forces the correct date format that matches MySQL date type even though the browser may show it differently -->
                    <input id="date" class="form-control" type="date" name="date"  required/>
                </div>
                <div class="form-group col-xs-6">
                    <label for="candidate">Candidate's Name:</label>
                    <input id="candidate" type="text" class="form-control" name="candidate" placeholder="Candidate's Name" required/>
                </div>
                <div class="form-group col-xs-12">
                    <label for="communication">Communication Abilities:</label>
                    <textarea name="communication" id="communication" cols="30" rows="6" class="form-control" required></textarea>
                </div>
                <div class="form-group col-xs-12">
                    <label for="appearance">Professional Appearance:</label>
                    <textarea name="appearance" id="appearance" cols="30" rows="6" class="form-control" required></textarea>
                </div>
                <div class="form-group col-xs-12">
                    <label for="computer_skills">Computer Skills:</label>
                    <textarea name="computer_skills" id="computer_skills" cols="30" rows="6" class="form-control" required></textarea>
                </div>
                <div class="form-group col-xs-12">
                    <label for="bussiness_knowledge">Bussiness Knowledge:</label>
                    <textarea name="bussiness_knowledge" id="bussiness_knowledge" cols="30" rows="6" class="form-control" required></textarea>
                </div>
                <div class="form-group col-xs-12">
                    <label for="comments">Interviewer's Comments:</label>
                    <textarea name="comments" id="comments" cols="30" rows="6" class="form-control" required></textarea>
                </div>
                <input class ="btn" type="submit" value="Submit">
                <input class ="btn" type="reset" value="Clear Form">
            </form>
            <p><a href="ViewInterviewsYoung.php">View Interviews</a></p>
        </div>
    </div>
</div>
</body>
</html>