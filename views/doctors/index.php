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

            /* زر إضافة */
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

<div class="container">
    <h2>Doctors</h2>
    <a class="add-btn" href="index.php?page=doctor-create">+ Add Doctor</a>

    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Specialization</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>

        <?php foreach($doctors as $d): ?>
        <tr>
            <td><?= $d['username'] ?></td>
            <td><?= $d['email'] ?></td>
            <td><?= $d['department'] ?></td>
            <td><?= $d['specialization'] ?></td>
            <td><?= $d['phone'] ?></td>
            <td>
                <a href="index.php?page=doctor-show&id=<?= $d['id'] ?>">Fiche</a> |
                <a class="delete-btn"
                   href="index.php?page=doctor-delete&id=<?= $d['id'] ?>"
                   onclick="return confirm('Delete this doctor ?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
