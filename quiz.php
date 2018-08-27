<?php

//Connect to Db and fetch questions
require_once('include/connect.php');

//Create a query to fetch all the questions
$query = "select * from questions";
$query_result = mysql_query($query);

//Count the number of returned items from the database
$num_questions_returned = mysql_num_rows($query_result);

if ($num_questions_returned < 1){
    echo "There is no question in the database";
    exit();}

//Create an array to hold all the returned questions
$questionsArray = array();

//Add all the questions from the result to the questions array
while ($row = mysql_fetch_assoc($query_result)){
    $questionsArray[] = $row;
}

//Create an array of Correct answers
$correctAnswerArray = array();
foreach($questionsArray as  $question){
    $correctAnswerArray[$question['questionid']] = $question['answer'];
}


//Build the questions array from query result
$questions = array();
foreach($questionsArray as $question) {
    $questions[$question['questionid']] = $question['name'];
 }

//Build the choices array from query result
$choices = array();
foreach ($questionsArray as $row) {
    $choices[$row['questionid']] = array($row['choice1'], $row['choice2'], $row['choice3'], $row['answer']);
  }



?>











