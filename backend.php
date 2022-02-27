<?php
require 'connection.php';
if (isset($_POST['stream_id'])) {
	$query = "SELECT * FROM semesters where streams_id=".$_POST['stream_id'];
	$result = mysqli_query($conn,$query);
	if (mysqli_num_rows($result) > 0 ) {
			echo '<option selected disabled>Select Semester</option>';
		 while ($row = mysqli_fetch_assoc($result)) {
		 	echo '<option value='.$row['id'].'>'.$row['sem'].'</option>';
		 }
	}else{

		echo '<option>No Semester Found!</option>';
	}

}
else if(isset($_POST['upload'])){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $stream = $_POST['stream'];
    $sem = $_POST['sem'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $topic = $_POST['topic'];
    $date = date("d-m-Y");
    date_default_timezone_set('Asia/Kolkata');
    $currentTime = date( 'h:i:s A', time () );

    if($stream==1)
        $stream="BCA";
    else if($stream==2)
        $stream="BBA";
    else if($stream==3)
        $stream="MCA";
    else if($stream==4)
        $stream="MSC";
    if($sem==1||$sem==7||$sem==13||$sem==17)
        $sem="First Semester";
    else if($sem==2||$sem==8||$sem==14||$sem==18)
        $sem="Second Semester";
    else if($sem==3||$sem==9||$sem==15||$sem==19)
        $sem="Third Semester";
    else if($sem==4||$sem==10||$sem==16||$sem==20)
        $sem="Fourth Semester";
    else if($sem==5||$sem==11)
        $sem="Fifth Semester";
    else if($sem==6||$sem==12)
        $sem="Sixth Semester";

    $filepath='';
    $filename='';
    $x=count($_FILES['a']['name']);
    for($i=0;$i<$x;$i++){
        $temp=$_FILES['a']['tmp_name'][$i];
        $url = "Notes/".$roll."-".$stream."-".$sem."-".$date."-".$subject."-";
        $var=$_FILES['a']['name'][$i];
        $furl = $url.$var;
        $filename = $filename.$var.',';
        $filepath=$filepath.$furl.',';
        move_uploaded_file($_FILES['a']['tmp_name'][$i],$furl);
        $temp='';
    }

    $sql = "select * from users where roll='$roll'";
    $query = mysqli_query($conn,$sql);
    if(mysqli_num_rows($query)==0){
        $sql = "INSERT INTO `users`(`name`, `roll`, `stream`, `sem`, `section`) VALUES ('$name','$roll','$stream','$sem','$section')";
        $query = mysqli_query($conn,$sql);
    }



    $sql = "INSERT INTO `notes`( `name`, `roll`, `stream`, `sem`, `section`, `subject`, `topic`, `file`, `filename`, `date`, `time`) VALUES ('$name','$roll','$stream','$sem','$section','$subject','$topic','$filepath','$filename','$date','$currentTime')";
    $query = mysqli_query($conn,$sql);
    if($query){
        echo '<script>alert("Files Uploaded");
        history.back();</script>';
    }else{
        echo '<script>alert("Error occured");
        history.back();</script>';
    }
}
else{
    header('location:index.php');
}




?>