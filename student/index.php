<?php
include 'student.php';
$objStudent = new student();
?>

<html>
<head>
<meta name="description" content="Php Code for View,Search, Edit and DeleteRecord" />
<meta http-equiv="Content-Type" content="text/html;charset=iso-8859-1" />
<title>Search Student Record</title>
</head>
<body>
<center><h1><u>Student Database</u></h1></center>
<span style="color:#00aa00"><?php echo (isset($_GET["msg"]) ? $_GET["msg"] : '') . "<br>"; ?></span>
<form name="search" method="post" action="index.php">
<table style="border:1px solid silver" cellpadding="5px" cellspacing="0px"align="center" border="0">
<tr>
<td colspan="3" style="background:#0066FF; color:#FFFFFF; font-size:20px">Search</td>
</tr>
<tr>
<td>Enter Search Keyword</td>
<td><input type="text" name="search" size="40" /></td>
<td><input type="submit" value="Search" /></td>
</tr>
<tr bgcolor="#666666" style="color:#FFFFFF">
<td>Name</td>
<td>Email</td>
<td>&nbsp;</td>
</tr>

<?php
$search = isset($_POST["search"]) ? $_POST["search"] : '';
$flag = 0;
$result = $objStudent->getStudent($search, false);
$id;
$name;
$email;

foreach ($result as $row) 
{
    $flag = 1;

    echo '<tr>
        <td><a href="view.php?id='.$row[0].'">'.$row[1].'</a></td><td>'.$row[2].'</td>
        <td><a href="edit.php?id='.$row[0].'">Edit</a> | <a href="del.php?id='.$row[0].'&name='.$row[1].'">Delete</a></td>
        </tr>';
}

if($flag == 0)
{
    echo "<tr>
        <td colspan='3' align='center' style='color:red'>Record not found</td>
        </tr>";
}
?>

<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr bgcolor="#CCCCCC">
<th colspan="3" align="right"><a href="add.php">Add Record</a></th>
</tr>
</table>
</form>
</body>
</html>
