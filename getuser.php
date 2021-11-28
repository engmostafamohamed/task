<?php
require_once('connect.php');
if (isset($_GET)) {
  $y = $_GET['y'];
  $d = $_GET['d'];
  if ($d == 'all') {
    $query = "SELECT `Mon`as 'month', SUM(`Number of item`) as 'sumnum', SUM(`actual`) as 'sumact', sum(`diffrent`) as 'sumdif' FROM `inventory` WHERE  `year`='$y'  GROUP BY(Mon)";
    $query1 = "SELECT SUM(`Number of item`) as 'sumnum', SUM(`actual`) as 'sumact', sum(`diffrent`) as 'sumdif' FROM `inventory`";
  } else {
    $query = "SELECT `Mon`as 'month', SUM(`Number of item`) as 'sumnum', SUM(`actual`) as 'sumact', sum(`diffrent`) as 'sumdif' FROM `inventory` WHERE `warehouse` = '$d 'AND `year`='$y'  GROUP BY(Mon)";
    $query1 = "SELECT SUM(`Number of item`) as 'sumnum', SUM(`actual`) as 'sumact', sum(`diffrent`) as 'sumdif' FROM `inventory`";
  }

  // echo $y ;
  // echo $d ;
}
// $query = "SELECT `warehouse`,`id` from inventory GROUP by(`warehouse`)";
// $query = "SELECT * FROM `inventory` WHERE `warehouse` ='$q'";

// echo $query;
// die();
$result = mysqli_query($connection, $query);
$result1 = mysqli_query($connection, $query1);

// print_r($result);
//  die();
//Array ( [month] => october [sumnum] => 70 [sumact] => 5 [sumdif] => 23

//  print_r($result);
// die();
// print_r($result);
// if($result->num_rows > 0){

//   while ($row = $result->fetch_assoc()) {
//     // print_r($row);
//     echo $row["warehouse"];
// }
?>


<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

  <table class="table ">
    <thead class="thead-dark">
      <tr>

        <th scope="col">month</th>
        <th scope="col">sume of item</th>
        <th scope="col">sume of actual</th>
        <th scope="col">sume of differece</th>
        <th scope="col">target</th>
      
      </tr>
    </thead>
    <tbody>
      <?php
      if (mysqli_num_rows($result) > 0) {
        while ($data = mysqli_fetch_assoc($result)) { ?>
          <tr>

            <?php echo '<td >' . $data['month'] . '</td>' ?>
            <?php echo '<td>' . $data['sumnum'] . '</td>' ?>
            <?php echo '<td>' . $data['sumact'] . '</td>' ?>
            <?php echo '<td>' . $data['sumdif'] . '</td>' ?>
            <?php echo '<td>' . round((($data['sumdif']/$data['sumnum'])*100)) . '%'.'</td>' ?>

          </tr>

          <!-- <tr>
                <th scope="row"><?php echo $id ?></th>
                <td><?php echo $year ?></td>
                <td><?php echo $Mon ?></td>
                <td><?php echo $warehouse ?></td>
                <td><?php echo $Numberofitem ?></td>
                <td><?php echo $actual ?></td>
              </tr> -->
        <?php

        }
      }
      if (mysqli_num_rows($result1) > 0) {
        while ($data1 = mysqli_fetch_assoc($result1)) { ?>
          <tr class="p-3 mb-2 bg-secondary text-white">
            <?php echo '<td>' . 'Grand Total' . '</td>' ?>
            <?php echo '<td>' . $data1['sumnum'] . '</td>' ?>
            <?php echo '<td>' . $data1['sumact'] . '</td>' ?>
            <?php echo '<td>' . $data1['sumdif'] . '</td>' ?>
          </tr>
          
          
        <?php
            }
          }
              ?>
    </tbody>
  </table>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>