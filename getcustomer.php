<?php
$mysqli = new mysqli("DESKTOP-075UBFL", "sa", "123", "CUSTOMERINFO");
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT Id, AddressId, Name, Email, DOB, Gender
FROM Customer WHERE Id = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($Id, $AddressId, $Name, $Email, $DOB, $Gender);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>CustomerID</th>";
echo "<td>" . $Id . "</td>";
echo "<th>AddressId</th>";
echo "<td>" . $AddressId . "</td>";
echo "<th>ContactName</th>";
echo "<td>" . $Name . "</td>";
echo "<th>Email</th>";
echo "<td>" . $Email . "</td>";
echo "<th>DOB</th>";
echo "<td>" . $DOB . "</td>";
echo "<th>Gender</th>";
echo "<td>" . $Gender . "</td>";
echo "</tr>";
echo "</table>";
?>