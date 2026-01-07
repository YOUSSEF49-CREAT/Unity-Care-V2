
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
