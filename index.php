<?php require_once('db-connect.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Scheduling</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="main.min.css">
<script src=".jquery-3.6.0.min.js"></script>
<script src=".bootstrap.min.js"></script>
<script src=".main.min.js"></script>
<style>
  /* Add your styles here */
:root {
    --bs-success-rgb: 71, 222, 152 !important;
  }

  html,
  body {
    height: 100%;
    width: 100%;
  }

  .btn-info.text-light:hover,
  .btn-info.text-light:focus {
    background: #000;
  }
  table, tbody, td, tfoot, th, thead, tr {
    border-color: #ededed !important;
    border-style: solid;
    border-width: 1px !important;
  }

  button {
    margin: 5px 5px;
  }

</style>
</head>
<div class="container py-5" id="page-container">
<div class="row">
<div class="col-md-12">
<div id="calendar"></div>
</div>
</div>
</div>
<!-- Event Details Modal -->
<div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
<div class="modal-dialog modal-dialog-centered">
<div class="modal-content rounded-0">
<div class="modal-header rounded-0">
<h5 class="modal-title">Schedule Details</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body rounded-0">
<div class="container-fluid">
<dl>
<dt class="text-muted">Title</dt>
<dd id="title" class="fw-bold fs-4"></dd>
<dt class="text-muted">Description</dt>
<dd id="description" class=""></dd>
<dt class="text-muted">Start</dt>
<dd id="start" class=""></dd>
<dt class="text-muted">End</dt>
<dd id="end" class=""></dd>
</dl>
</div>
</div>
<!-- Event Details Modal -->

<?php
$schedules = $conn->query("SELECT * FROM `schedule_list`");
$sched_res = [];
foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
$row['sdate'] = date("F d, Y h:i A", strtotime($row['start_datetime']));
$row['edate'] = date("F d, Y h:i A", strtotime($row['end_datetime']));
$sched_res[$row['id']] = $row;
}
?>
<?php
if (isset($conn)) $conn->close();
?>
</body>
<script>
var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
</script>
<script src="script.js"></script>

</html>