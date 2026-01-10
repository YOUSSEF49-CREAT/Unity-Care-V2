<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
                        .dashboard {
                    display: flex;
                    height: 100vh;
                    background: #f5f7fa;
                }

                /* SIDEBAR */
                .sidebar {
                    width: 240px;
                    background: #0d6efd;
                    color: white;
                    padding: 20px;
                }

                .sidebar h2 {
                    text-align: center;
                    margin-bottom: 30px;
                    font-size: 20px;
                }

                .sidebar ul {
                    list-style: none;
                }

                .sidebar ul li {
                    margin: 15px 0;
                }

                .sidebar ul li a {
                    color: white;
                    text-decoration: none;
                    display: block;
                    padding: 10px;
                    border-radius: 5px;
                    transition: 0.3s;
                }

                .sidebar ul li a:hover {
                    background: #20c997;
                }

                /* CONTENT */
                .content {
                    flex: 1;
                    padding: 20px;
                }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<div class="dashboard">

    
    <div class="sidebar">
        <h2><i class="fa-solid fa-hospital"></i> Hospital</h2>
        <ul>
            <li><a href="#"><i class="fa-solid fa-user-doctor"></i> Doctors</a></li>
            <li><a href="#"><i class="fa-solid fa-user-injured"></i> Patients</a></li>
            <li><a href="index.php?page=departments"><i class="fa-solid fa-building"></i> Departments</a></li>
            <li><a href="#"><i class="fa-solid fa-calendar-check"></i> Appointments</a></li>
            <li><a href="#"><i class="fa-solid fa-file-prescription"></i> Prescriptions</a></li>
            <li><a href="#"><i class="fa-solid fa-pills"></i> Medications</a></li>
            <li><a href="index.php?page=logout" style="background:#dc3545;">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </a></li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <h1>Welcome to Hospital Dashboard</h1>
        <p>Choose a section from the sidebar.</p>
    </div>

</div>

</body>
</html>

