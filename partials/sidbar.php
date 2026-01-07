<style>
    /* Top Navbar */
.topbar {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  height: 65px;
  background: linear-gradient(90deg, #0f4c75, #1b6ca8);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 30px;
  color: #fff;
  box-shadow: 0 4px 20px rgba(0,0,0,0.15);
  z-index: 1000;
}

/* Logo */
.topbar .logo {
  font-size: 22px;
  font-weight: 700;
  letter-spacing: 1px;
}

/* Menu */
.topbar-menu {
  list-style: none;
  display: flex;
  gap: 18px;
}

.topbar-menu li a {
  color: #eaf6ff;
  text-decoration: none;
  font-size: 14px;
  padding: 8px 12px;
  border-radius: 8px;
  transition: 0.3s;
}

.topbar-menu li a:hover {
  background: rgba(255,255,255,0.15);
}

/* Logout */
.topbar-right .logout {
  background: rgba(255,255,255,0.15);
  padding: 8px 14px;
  border-radius: 8px;
  color: #fff;
  text-decoration: none;
  transition: 0.3s;
}

.topbar-right .logout:hover {
  background: #e74c3c;
}

/* Page content */
.main-content {
  padding: 30px;
  margin-top: 80px; /* باش المحتوى ما يطلعش تحت navbar */
}

/* Responsive */
@media (max-width: 768px) {
  .topbar-menu {
    display: none; /* نقدروا نزيدو burger menu */
  }
}

</style>
<?php
$role = $_SESSION['role'] ?? null;
?>

<nav class="topbar">
  <div class="topbar-left">
    <span class="logo">Unity Care</span>
  </div>

  <ul class="topbar-menu">
    <li><a href="index.php?page=dashboard">Dashboard</a></li>

    <?php if ($role === 'admin'): ?>
      <li><a href="index.php?page=admin-doctors"> Doctors</a></li>
      <li><a href="index.php?page=admin-patients"> Patients</a></li>
      <li><a href="index.php?page=admin-medications"> Medications</a></li>
    <?php endif; ?>

    <?php if ($role === 'doctor'): ?>
      <li><a href="index.php?page=appointments"> Appointments</a></li>
    <?php endif; ?>

    <?php if ($role === 'patient'): ?>
      <li><a href="index.php?page=appointments"> My Appointments</a></li>
      <li><a href="index.php?page=patient-prescriptions"> Prescriptions</a></li>
    <?php endif; ?>
  </ul>

  <div class="topbar-right">
    <a class="logout" href="index.php?page=logout"> Logout</a>
  </div>
</nav>
