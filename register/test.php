<?php
require_once "./config.php";?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="./test.css">
    <style type="text/css">
        body {  
            font: 14px sans-serif;
        }
    </style>
    <title>Test bazy danych</title>
</head>
<body>

<div class="box">
    <div class="content-wrap">
    <table>
       <tr>
      <th id="firsth"><b>Id</b></th>
      <th id="firsth"><b>Login</b></th>
      <th id="passh"><b>Hasło</b></th>

<?php
$query = "SELECT * FROM users";
if ($result = $link->query($query)) {
 
    while ($row = $result->fetch_assoc()) {
        $id = $row["id"];
        $name = $row["username"];
        $pass = $row["password"];
 
        echo "<tr><td id='content'>".$id."</td><td id='content'>".$name."</td><td id='content'>".$pass."</td></tr>";
    }
    echo"</table>";
$result->free();
}
?>
</table>
</div></div>
</body>
</html>