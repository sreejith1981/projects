<?php
include 'student.php';
$objStudent = new student();
?>
<html>
<head>
<meta name="description" content="Php Code for View, Search, Edit and DeleteRecord" />
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Add Student Record</title>
</head>
<body>
<?php
$id = $_GET['id'];
$name = $_GET['name'];
$result = $objStudent->deleteStudent($id);
if($result)
{
    header("Location: index.php?msg=<center>Successfully deleted '$name'</center>");
}
?>
</body>
</html>
