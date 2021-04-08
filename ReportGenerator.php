<?php

echo "<html><body>

		<form ReportGenerator=\"ReportGenerator.php\" method=\"post\">
		Enter Faculty Name: <input type=\"text\" name=\"faculty\">
		Enter Committee Name: <input type=\"text\" name=\"committee\">
		Enter ElectionID: <input type=\"text\" name=\"election\">
		Enter Meeting Date(yyyy-mm-dd): <input type=\"text\" name=\"meeting\">
		<br> <p>
		<input type=\"submit\" name=\"submit\">
		<br> <p></form>";
		

$conn = new mysqli('localhost', 'root', 'root', 'ufoc');
	if ($conn->connect_error) {die("Failed: " . $conn->connect_error);
	}

function get_faculty (string $faculty) {

	$sql2 = "select * from faculty where FacName like \"%$faculty%\"";
	$result = $conn-> query($sql2);
//."ID:". $row["FacID"]."date hire:". $row["dateHire"]."tenure:". $row["tenure"]
	if ($result-> num_rows > 0) {
		
		while($row = $result->fetch_assoc()) {
			return "<br> name:". $row["FacName"];
		}
	} else {
	
		return "no results";
	} 
}

if (isset($_POST['submit'])) {
	$faculty = $_POST['faculty'];
	$committee = $_POST['committee'];
	$election = $_POST['election'];
	$meeting = $_POST['meeting'];
	$sql2 = "select * from faculty where FacName like \"%$faculty%\"";
	$sql3 = "select * from committee where CommitteeName like \"%$committee%\"";
	$sql4 = "select * from election where electionID like \"%$election%\"";
	$sql5 = "select * from meeting where meetingDate like \"%$meeting%\"";
	$result = $conn-> query($sql2);

	
	if ($result-> num_rows > 0) {
		
		while($row = $result->fetch_assoc()) {
			echo "<br> name:". $row["FacName"]." ID:". $row["FacID"]." date hire:". $row["dateHire"]." tenure:". $row["tenure"];
		}
	} else {
		echo"fuck you";
	}
	

	$result = $conn-> query($sql3);

	if ($result-> num_rows > 0) {
		echo "wtf";
		while($row = $result->fetch_assoc()) {
			echo "<br> ComID:". $row["CommitteeID"]." ComName:". $row["CommitteeName"]." NumMembs:". $row["numMembs"]." Duty:". $row["ComitDuty"];
		}
	} else {
		print'fuck you';
	}
	$result = $conn-> query($sql4);
	if ($result-> num_rows > 0) {
		
		while($row = $result->fetch_assoc()) {
			echo "<br> ElectionID:". $row["ElectionID"]." Results:". $row["Results"]." Nominees". $row["Nominates"];
		}
	} else {
		print'fuck you';
	}
	$result = $conn-> query($sql5);
	if ($result-> num_rows > 0) {
		
		while($row = $result->fetch_assoc()) {
			echo "<br> MeetingID". $row["MeetingID"]." Attendance:". $row["Attendance"]." date". $row["MeetingDate"];
		}
	} else {
		print'fuck you';
	}

}
?>