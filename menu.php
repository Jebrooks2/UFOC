<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Menu</title>
    <link rel="stylesheet" href="style.css">

</head>
<?php
echo "<html>
<body class = \"body\"><form index=\"index.php\" method = post>
<h1 class = h1>
    Main Menu
</h1>


<div class = buttonrow>
<button class = menubutton>My Account</button>
<button class = menubutton>Open Positions</button>
<button class = menubuttonbutton type=\"submit\" name=\"activity\">Your Activity</button>
<button class = menubuttonbutton type=\"submit\" name=\"activity2\">All Activity</button>
</div>
<div class = buttonrow>
<button class = menubutton>Committee Vacancies</button>
<button class = menubutton>Voting Portal</button>
<button class = menubutton>Log Out</button>
</div>
</form>
";

if (isset($_POST['activity'])) {
	header("Location: ReportGenerator.php");
}

if (isset($_POST['activity2'])) {
	header("Location: ReportGenerator2.php");
}
?>
</body>
</html>