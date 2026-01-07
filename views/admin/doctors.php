<style>
    body {
    font-family: 'Segoe UI', Tahoma, sans-serif;
    background-color: #f4f8fb;
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    color: #0d6efd;
    margin-top: 30px;
}

/* ===== FORM ===== */
form {
    background: #ffffff;
    max-width: 700px;
    margin: 30px auto;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

form input {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #dce3ec;
    border-radius: 6px;
    font-size: 15px;
}

form input:focus {
    outline: none;
    border-color: #0d6efd;
    box-shadow: 0 0 0 2px rgba(13,110,253,0.15);
}

form button {
    width: 100%;
    padding: 12px;
    background-color: #0d6efd;
    border: none;
    border-radius: 6px;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
}

form button:hover {
    background-color: #0b5ed7;
}

/* ===== TABLE ===== */
table {
    width: 90%;
    margin: 40px auto;
    border-collapse: collapse;
    background: #ffffff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

th {
    background-color: #0d6efd;
    color: #ffffff;
    text-align: left;
    padding: 15px;
}

td {
    padding: 14px;
    border-bottom: 1px solid #eef2f7;
}

tr:hover {
    background-color: #f1f6ff;
}

/* ===== BUTTONS ===== */
.btn {
    padding: 6px 12px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
}

.btn-primary {
    background-color: #0d6efd;
    color: #ffffff;
}

.btn-danger {
    background-color: #dc3545;
    color: #ffffff;
}

.btn-danger:hover {
    background-color: #bb2d3b;
}

</style>
<?php

$doctors = DoctorController::index();
?>


<h1>Doctors</h1>

<form method="post" action="index.php?page=doctor-store">
  <input type="email" name="email" placeholder="Email" required>
  <input type="password" name="password" placeholder="Password" required>
  <input type="text" name="first_name" placeholder="First name" required>
  <input type="text" name="last_name" placeholder="Last name" required>
  <input type="text" name="specialization" placeholder="Specialization">
  <button class="btn btn-primary">Add Doctor</button>
</form>

<table>
<tr>
  <th>Name</th>
  <th>Email</th>
  <th>Specialization</th>
  <th>Actions</th>
</tr>

<?php foreach ($doctors as $d): ?>
<tr>
  <td><?= htmlspecialchars($d->getFullName()) ?></td>
  <td><?= htmlspecialchars($d->getEmail()) ?></td>
  <td><?= htmlspecialchars($d->getSpecialization()) ?></td>
  <td>
    <a href="index.php?page=doctor-delete&id=<?= $d->getId() ?>"
       onclick="return confirm('Delete doctor?')"
       class="btn btn-danger">
       Delete
    </a>
  </td>
</tr>
<?php endforeach; ?>
</table>
