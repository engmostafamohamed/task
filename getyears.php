<?php
require_once('connect.php');
if (isset($_GET)) {
  $q = $_GET['q'];
  if ($q == 'all') {
    $query = "SELECT `year` FROM `inventory` GROUP BY(year)";
  } else {
    $query = "SELECT `year` FROM `inventory` WHERE `warehouse`='$q'GROUP BY(year)";
  }
}



$result = mysqli_query($connection, $query);

?>
<form>
  <select class="form-control" name="years" onchange="showresult(this.value)">
    <option value="">Select a person:</option>
    <?php
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
    ?>

        <option value="<?= $row["year"] ?>"><?= $row["year"] ?></option>
    <?php
      }
    }
    ?>
  </select>
</form>