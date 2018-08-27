<?php session_start();
require_once('include/connect.php');
 $catid=$_REQUEST['catid'];
$sessid=session_id();
$response=mysql_query("select id,question_name,answer from questions where catid='$catid'");
	 $i=1;
	 $right_answer=0;
	 $wrong_answer=0;
	 $unanswered=0;
	 while($result=mysql_fetch_array($response)){ 
	       if($result['answer']==$_POST["$i"]){
		       $right_answer++;
		   }else if($_POST["$i"]==5){
		       $unanswered++;
		   }
		   else{
		       $wrong_answer++;
		   }
		   $i++;
	 }
	 		//$_SESSION['rightAns']=$right_answer;
			//$_SESSION['wrongAns']=$wrong_answer;
	 		//$_SESSION['unsAns']=$unanswered;
$name=$_SESSION['stdname'];
$session=$name.'-'.$sessid;
$s="select max(maxdigit) cn from results";
$r=mysql_query($s);
$ro=mysql_fetch_array($r);
$count=$ro['cn'];
$totmax=$count+1;
$sql="insert into results (id,catid,righttans,wrongans,unans,sessid,maxdigit) values('','$catid',$right_answer,$wrong_answer,$unanswered,'$session','$totmax')";
$rs=mysql_query($sql);
	 echo "<div id='answer'>";
	 echo " Right Answer  : <span class='highlight'>". $right_answer."</span><br><br><br>";

	 echo " Wrong Answer  : <span class='highlight'>". $wrong_answer."</span><br><br><br>";

	 echo " Unanswered Question  : <span class='highlight'>". $unanswered."</span><br><br><br><br>";
	 echo "</div>";
?>