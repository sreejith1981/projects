<?php
include 'student.php';
$objStudent = new student();
?>

<html>
<head>
<meta name="description"content="Php Code for View, Search,Edit and Delete Record" />
<meta http-equiv="Content-Type"content="text/html; charset=iso-8859-1" />
<title>Add Student Record</title>

<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<center><h1><u>Student Database</u></h1></center>

<?php
$nameErr = $$emailErr = $dateErr = "";
$name = $email = $createdDate = "";

if($_POST["do"] == "store")
{
    if(empty($_POST["sname"]))
    {
        $nameErr = "Name is required";
    }
    else
    {
        $name = test_input($_POST["sname"]);

        if(!preg_match("/^[a-zA-Z ]*$/", $name))
        {
            $nameErr = "Only letters and white space allowed";
        }
    }

    if(empty($_POST["email"]))
    {
        $emailErr = "Email is required";
    }
    else
    {
        $email = test_input($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "Invalid email format";
        }
    }

    if(empty($_POST["cdate"]))
    {
        $dateErr = "Date is required";
    }
    else
    {
        $createdDate = $_POST["cdate"];
    }

    if($nameErr == "" && $emailErr == "" && $dateErr == "")
    {
        $result = $objStudent->createStudent($name, $email, $createdDate);
        if($result) echo "<center>Successfully store in DATABASE</center>";
        $name = $email = $createdDate = "";
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

<form name="add" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
<table style=" border:1px solid silver" cellpadding="5px" cellspacing="0px"align="center" border="0">
<tr>
<td colspan="3" style="background:#0066FF; color:#FFFFFF; font-size:20px">ADD STUDENT RECORD</td>
</tr>
<tr>
<td colspan="3" style="font-size:15px" class="error">* required</td>
</tr>
<tr>
<td>Enter Name</td><td><input type="text" name="sname" size="20" value="<?php echo htmlentities($name); ?>"></td>
<td class="error">* <?php echo $nameErr; ?></td>
</tr>
<tr>
<td>Enter Email</td><td><input type="text" name="email" size="20" value="<?php echo htmlentities($email); ?>"></td>
<td class="error">* <?php echo $emailErr; ?></td>
</tr>
<tr>
<td>Enter Date</td><td><input type="date" name="cdate" size="20" value="<?php echo htmlentities($createdDate); ?>"></td>
<td class="error">* <?php echo $dateErr; ?></td>
</tr>
<tr>
<td colspan="3" align="center"><input type="hidden" name="do" value="store">
<input type="submit" value="ADD RECORD"></td>
</tr>
</table>
</form>
<p align="center"><a href="index.php">Go Back to Home</a></p>
<?php include("index.php"); ?>
</body>
</html>
