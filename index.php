<?php


require_once('connect.php');
$query = "SELECT `warehouse`,`id` from inventory GROUP by(`warehouse`)";
$result = mysqli_query($connection, $query);

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
  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col-md-6">
        <div class=" col-6 form-group">
          <form>
            <select class="form-control" name="users" onchange="showUser(this.value)">
              <option value="">Select a person:</option>
              <option value="all">Select All</option>
              <?php
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
              ?>

                  <option value="<?= $row["warehouse"] ?>"><?= $row["warehouse"] ?></option>
              <?php
                }
              }
              ?>
            </select>
          </form>

        </div>
        <div class="  col-6  ">
          <div id="txtHint" class="form-group"><b> selet years will</b></div>

        </div>
        <div id="data"><b>Person info will be listed here...</b></div>
      </div>
      <div class="col-md-6">


        <div>
          <div class="alert alert-success alert-dismissible" id="close" style="display:none;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
          </div>
          <form id="myForm" name="myForm" method="post">
            <div class="form-group">
              <label for="year"> year</label>
              <input type="number" class="form-control" id="year" placeholder="input year">
            </div>
            <div class="form-group">
              <label for="month"> Month</label>
              <input type="text" class="form-control" id="month" placeholder="input Month">
            </div>
            <div class="form-group">
              <label for="warehouse"> warehouse</label>
              <input type="text" class="form-control" id="warehouse" placeholder="input warehouse">
            </div>
            <div class="form-group">
              <label for="items">Number of items</label>
              <input type="number" class="form-control" id="items" placeholder="Apartment, studio, or floor">
            </div>
            <div class="form-group">
              <label for="actual">Number of actual</label>
              <input type="number" class="form-control" id="actual" placeholder="Apartment, studio, or floor">
            </div>
            <button type="submit" id="submit" name="submit" class="btn btn-primary">enter data</button>
          </form>
        </div>
      </div>
    </div>
    <br>


  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
      $('#submit').on('click', function() {
        $("#submit").attr("disabled", "disabled");
        var year = $('#year').val();
        var month = $('#month').val();
        var warehouse = $('#warehouse').val();
        var items = $('#items').val();
        var actual = $('#actual').val();
        if (month != '' && items != '' && actual != '') {
          console.log('light');
          $.ajax({
            url: "save.php",
            type: "POST",
            data: {
              year: parseInt(year),
              month: month,
              warehouse: warehouse,
              items: parseInt(items),
              actual: parseInt(actual),
              dif: (parseInt(items) - parseInt(actual)),
              // rate: math.round(((parseInt(actual) / parseInt(items)) * 100))

            },
            cache: false,
            success: function(response) {
              var response = JSON.parse(response);
              if (response.statusCode == 200) {
                $("#submit").removeAttr("disabled");
                $('#myForm').find('input:text').val('');
                $("#close").show();
                $('#close').html('Data added successfully !');
              } else if (dataResult.statusCode == 201) {
                alert("Error occured !");
              }
            }
          })
          console.log(typeof(parseInt(actual)));
        } else {
          alert('Please fill all the field !');
        }
      });
    });

    function showUser(str) {
      if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
      } else {
        r = str;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("txtHint").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "getyears.php?q=" + str, true);
        xmlhttp.send();
      }
    }

    function showresult(year) {
      if (year == "") {
        document.getElementById("data").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("data").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "getuser.php?y=" + year + "&d=" + r, true);
        xmlhttp.send();
      }

    }
  </script>

</body>

</html>