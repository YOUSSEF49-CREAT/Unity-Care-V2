<style>
                body {
                font-family: Arial, sans-serif;
                background: #f4f6f9;
            }

            .container {
                width: 95%;
                margin: 30px auto;
                background: #ffffff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            }

            .container h2 {
                color: #0d6efd;
                margin-bottom: 15px;
            }

            /* Add Button */
            .add-btn {
                display: inline-block;
                background: #20c997;
                color: white;
                padding: 8px 15px;
                border-radius: 6px;
                text-decoration: none;
                margin-bottom: 15px;
                transition: 0.3s;
            }

            .add-btn:hover {
                background: #198754;
            }

            /* Table */
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
            }

            table th {
                background: #0d6efd;
                color: white;
                padding: 12px;
                text-align: left;
            }

            table td {
                padding: 10px;
                border-bottom: 1px solid #ddd;
            }

            table tr:nth-child(even) {
                background: #f8f9fa;
            }

            table tr:hover {
                background: #e9f2ff;
            }

            /* Links */
            table a {
                text-decoration: none;
                color: #0d6efd;
                font-weight: bold;
            }

            table a:hover {
                text-decoration: underline;
            }

            /* Delete button */
            .delete-btn {
                background: #dc3545;
                color: white !important;
                padding: 5px 10px;
                border-radius: 5px;
                margin-left: 5px;
                transition: 0.3s;
            }

            .delete-btn:hover {
                background: #bb2d3b;
            }

</style>

<link rel="stylesheet" href="public/css/patients.css">

<div class="container">
    <h2>Patients</h2>
    <a class="add-btn" href="index.php?page=patient-create">+ Add Patient</a>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Doctor</th>
            <th>Date of birth</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>

        <?php foreach ($patients as $p): ?>
        <tr>
            <td><?= $p['username'] ?></td>
            <td><?= $p['email'] ?></td>
            <td><?= $p['doctor_name'] ?? 'Not assigned' ?></td>
            <td><?= $p['date_of_birth'] ?></td>
            <td><?= $p['phone'] ?></td>
            <td>
                <a href="index.php?page=patient-show&id=<?= $p['id'] ?>">Fiche</a> |
                <a class="delete-btn"
                   href="index.php?page=patient-delete&id=<?= $p['id'] ?>"
                   onclick="return confirm('Delete this patient ?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
