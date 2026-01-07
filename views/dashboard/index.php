<style>
  body {
  background: #f4f8fb;
  font-family: 'Segoe UI', Tahoma, sans-serif;
}

/* content */
.main-content {
  margin-top: 90px; /* إلى عندك navbar فوق */
  padding: 30px;
}

/* title */
.page-title {
  color: #0f4c75;
  margin-bottom: 30px;
  font-size: 28px;
  font-weight: 600;
}

/* grid */
.grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
  gap: 25px;
  margin-bottom: 25px;
}

/* card */
.card {
  background: #ffffff;
  padding: 22px 25px;
  border-radius: 14px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
}

/* card title */
.card h2 {
  margin-bottom: 15px;
  color: #1b6ca8;
  font-size: 20px;
  border-left: 5px solid #1eb2a6;
  padding-left: 12px;
}

/* table */
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

/* welcome */
.welcome {
  text-align: center;
  font-size: 16px;
}

/* responsive */
@media (max-width: 768px) {
  .main-content {
    padding: 20px;
  }

  .page-title {
    font-size: 22px;
  }
}

</style>
<?php
// require __DIR__ . '/../../middlewares/auth.php';


$data = DashboardController::data();

?>
<?php require __DIR__ . '/../../partials/sidbar.php'; ?>
<div class="main-content">

  <h1 class="page-title">Dashboard</h1>

  <?php if ($_SESSION['role'] === 'admin'): ?>

  <div class="grid">
    <div class="card">
      <h2>Appointments by Status</h2>
      <table class="clinic-table">
        <tr>
          <th>Status</th>
          <th>Total</th>
        </tr>
        <?php foreach ($data['status'] as $row): ?>
        <tr>
          <td><?= htmlspecialchars($row['status']) ?></td>
          <td><?= $row['total'] ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>

    <div class="card">
      <h2>Appointments by Doctor</h2>
      <table class="clinic-table">
        <tr>
          <th>Doctor</th>
          <th>Total</th>
        </tr>
        <?php foreach ($data['doctors'] as $row): ?>
        <tr>
          <td><?= htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) ?></td>
          <td><?= $row['total'] ?></td>
        </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>

  <div class="card">
    <h2>Top Prescribed Medications</h2>
    <table class="clinic-table">
      <tr>
        <th>Medication</th>
        <th>Total</th>
      </tr>
      <?php foreach ($data['medications'] as $row): ?>
      <tr>
        <td><?= htmlspecialchars($row['name']) ?></td>
        <td><?= $row['total'] ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>

  <?php elseif ($_SESSION['role'] === 'doctor'): ?>

  <div class="card">
    <h2>Your Appointments Statistics</h2>
    <table class="clinic-table">
      <tr>
        <th>Status</th>
        <th>Total</th>
      </tr>
      <?php foreach ($data['status'] as $row): ?>
      <tr>
        <td><?= htmlspecialchars($row['status']) ?></td>
        <td><?= $row['total'] ?></td>
      </tr>
      <?php endforeach; ?>
    </table>
  </div>

  <?php else: ?>

  <div class="card welcome">
    <p>Welcome to Unity Care Clinic.</p>
  </div>

  <?php endif; ?>

</div>
