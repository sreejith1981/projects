<?php
include 'student.php';
$objStudent = new student();
$id = $_GET["id"];
$result = $objStudent->getStudent($id, true);

foreach($result as $row)
{
    $name = $row["name"];
    $email = $row["email"];
    $date = $row["createdDate"];
}
?>

<html>
<head>
<meta name="description" content="Php Code for View,Search, Edit and DeleteRecord" />
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<title>Update Student Record</title>

<style>
.error {color:#ff0000;}
</style>

</head>
<body>

<?php
$status = isset($_POST["do"]) ? $_POST["do"] : '';
if($status == "update")
{
    $name = test_input($_POST["sname"]);
    $email = test_input($_POST["email"]);
    $date = test_input($_POST["cdate"]);

    $result = $objStudent->updateStudent($id, $name, $email, $date);
    if($result)
    {
        header("Location: index.php?msg=<center>Successfully Updated '$name'</center>");
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
?>

<center><h1><u>Student Database</u></h1></center>
<form name="update" method="post" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" onsubmit="return validateForm()">
<table style=" border:1px solid silver" cellpadding="5px" cellspacing="0px"align="center" border="0">
<tr>
<td colspan="3" style="background:#0066FF; color:#FFFFFF; font-size:20px">ADD STUDENT RECORD</td>
</tr>
<tr>
<td colspan="3" style="font-size:15px" class="error">* required field</td>
</tr>
<tr>
<td>Enter Name</td><td><input type="text" id="txtName" name="sname" size="20" value="<?php echo $name; ?>"></td>
<td class="error">* <span id="msgName"></span></td>
</tr>
<tr>
<td>Enter Email</td><td><input type="text" id="txtEmail" name="email" size="20" value="<?php echo $email; ?>"></td>
<td class="error">* <span id="msgEmail"></span></td>
</tr>
<tr>
<td>Enter Date</td><td><input type="date" id="dtmDate" name="cdate" size="20" value="<?php echo $date; ?>"></td>
<td class="error">* <span id="msgDate"></span></td>
</tr>
<tr>
<td colspan="4" align="center">
<input type="hidden" name="do"value="update">
<input type="submit" value="UPDATE RECORD">
</tr>
</table>
</form>
<p align="center"><a href="index.php">Go Back to Home</a></p>

<script src="validateStudent.js"></script>
</body>
</html>
