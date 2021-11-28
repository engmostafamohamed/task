<?php

include 'connect.php';
$year = $_POST['year'];
$month = $_POST['month'];
$warehouse = $_POST['warehouse'];
$items = $_POST['items'];
$actual = $_POST['actual'];
$dif = $_POST['dif'];
$rate = (($dif/$items)*100);

$sql = "INSERT INTO `inventory` ( `year`, `Mon`, `warehouse`, `Number of item`, `actual`, `diffrent`, `rate`) VALUES  ('$year','$month','$warehouse','$items','$actual','$dif','$rate')";

if (mysqli_query($connection, $sql)) {
    echo json_encode(array("statusCode" => 200));
} else {
    echo json_encode(array("statusCode" => 201));
}
mysqli_close($connection);
