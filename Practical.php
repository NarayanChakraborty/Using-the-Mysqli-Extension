<?php
require_once 'login.php';
$connection=new mysqli($db_hostname,$db_username,$db_password,$db_database);
if(!$connection->connect_error) die($connection->connect_error);
if(isset($_POST['delete']) && isset($_POST['isbn']))
{
$isbn=$_POST['isbn'];
$query="DELETE FROM Classics WHERE isbn='$isbn'";
$result=$connection->query($query);
if(!$result) echo "DELETE FAILED:$query<br>".$connection->error."<br><br>";
}
if(isset($_POST['author']) &&
isset($_POST['author']) &&
isset($_POST['author']) &&
isset($_POST['author']) &&
isset($_POST['author']))
{
  $author=$_POST['author'];
  $title=$_POST['title'];
  $category=$_POST['category'];
  $year=$_POST['year'];
  $isbn=$_POST['isbn'];
  $query="INSERT INTO Classics VALUES('$author','$title','$category','$year','$isbn')";
  $result=connection->query($result);
  if(!$result) echo "INSERT failed:Query</br> $connection->error"."<br><br>";
  }
  echo<<<_END
  <form action="mysqlitest.php" method="POST"><pre>
  Author<input type="text" name="author">
  Title<input="text" name="title">
  Category<input type="text"name="category">
  Year<input type="text" name="year">
  ISBN<input type="text" name="isbn">
  <input type="submit"value="Add Record">
  </pre></form>
_END;
$query="SELECT * FROM classics";
$result=$connection->query($query);
if(!$result) die("Database access failed:".$connection->error);
$rows=$result->num_rows;
for($j=0;$j<$rows;++$j)
{
 $result->data_seek($j);
$row=$result->fetch_array(MYSQLI_NUM);
echo<<<_END
<pre>
Author $row[0]
Title $row[1]
Category $row[2]
Year $row[3]
ISBN $row[4]
</pre>
<form action="Practical.php" method="post">
<input type="hidden" name="delete" value="yes">
<input type="hidden" name="isbn" value="$row[4]">
<input type="submit" value="DELETE RECORD"></form>
_END;
}
$result->close();
$connection->close();
?> 