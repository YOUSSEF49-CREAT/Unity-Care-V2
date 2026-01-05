<?php
require __DIR__ . '/../../middlewares/auth.php';


$data = DashboardController::data();
?>
<style>
  
       body {
        background: #f4f8fb;
       }


       .page-title {
         color: #0f4c75;
         margin-bottom: 25px;
         font-size: 28px;
         font-weight: 600;
       }


    .card {
  background: #ffffff;
  padding: 20px 25px;
  margin-bottom: 25px;
  border-radius: 12px;
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    }


    .card h2 {
  margin-bottom: 15px;
  color: #1b6ca8;
  font-size: 20px;
  border-left: 5px solid #1eb2a6;
  padding-left: 10px;
    }


    .clinic-table {
  width: 100%;
  border-collapse: collapse;
    }

    .clinic-table th {
  background: #1eb2a6;
  color: #ffffff;
  text-align: left;
  padding: 12px;
  font-size: 14px;
    }

    .clinic-table td {
  padding: 12px;
  border-bottom: 1px solid #eee;
  font-size: 14px;
    }


.clinic-table tr:hover td {
  background: #f1fdfb;
    }


    @media (max-width: 768px) {
  .card {
    padding: 15px;
  }

  .page-title {
    font-size: 22px;
  }
    }

</style>
<h1 class="page-title">Dashboard</h1>


<?php if ($_SESSION['role'] === 'admin'): ?>


<h2>Appointments by Status</h2>
<table class="clinic-table">
<tr>
  <th>Status</th>
  <th>Total</th>
</tr>
<?php foreach ($data['status'] as $row): ?>
<tr>
  <td><?= $row['status'] ?></td>
  <td><?= $row['total'] ?></td>
</tr>
<?php endforeach; ?>
</table>


<h2>Appointments by Doctor</h2>
<table class="clinic-table">
<tr>
  <th>Doctor</th>
  <th>Total</th>
</tr>
<?php foreach ($data['doctors'] as $row): ?>
<tr>
  <td><?= $row['first_name'] . ' ' . $row['last_name'] ?></td>
  <td><?= $row['total'] ?></td>
</tr>
<?php endforeach; ?>
</table>


<h2>Top Prescribed Medications</h2>
<table class="clinic-table">
<tr>
  <th>Medication</th>
  <th>Total</th>
</tr>
<?php foreach ($data['medications'] as $row): ?>
<tr>
  <td><?= $row['name'] ?></td>
  <td><?= $row['total'] ?></td>
</tr>
<?php endforeach; ?>
</table>

<?php elseif ($_SESSION['role'] === 'doctor'): ?>

<h2>Your Appointments Statistics</h2>
<table class="clinic-table">
<tr>
  <th>Status</th>
  <th>Total</th>
</tr>
<?php foreach ($data['status'] as $row): ?>
<tr>
  <td><?= $row['status'] ?></td>
  <td><?= $row['total'] ?></td>
</tr>
<?php endforeach; ?>
</table>

<?php else: ?>

<p>Welcome to Unity Care Clinic.</p>

<?php endif; ?>
