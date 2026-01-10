<style>
                body {
                font-family: Arial, sans-serif;
                background: #f4f6f9;
                margin: 0;
                padding: 0;
            }

            .container {
                width: 90%;
                margin: 30px auto;
                background: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            }

            h2 {
                color: #0d6efd;
                margin-bottom: 20px;
            }

            a.add-btn {
                display: inline-block;
                background: #20c997;
                color: white;
                padding: 8px 15px;
                text-decoration: none;
                border-radius: 5px;
                margin-bottom: 15px;
            }

            a.add-btn:hover {
                background: #198754;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            table th {
                background: #0d6efd;
                color: white;
                padding: 10px;
            }

            table td {
                padding: 10px;
                border-bottom: 1px solid #ddd;
            }

            table tr:hover {
                background: #f1f1f1;
            }

            .delete-btn {
                background: #dc3545;
                color: white;
                padding: 5px 10px;
                text-decoration: none;
                border-radius: 4px;
            }

            .delete-btn:hover {
                background: #bb2d3b;
            }

            /* Form */

            .form-group {
                margin-bottom: 15px;
            }

            input, textarea {
                width: 100%;
                padding: 8px;
                border-radius: 5px;
                border: 1px solid #ccc;
            }

            button {
                background: #0d6efd;
                color: white;
                padding: 8px 20px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            button:hover {
                background: #0b5ed7;
            }

            .back-link {
                display: inline-block;
                margin-top: 10px;
                color: #0d6efd;
                text-decoration: none;
            }

</style>

<div class="container">
    <h2>Departments</h2>

    <a class="add-btn" href="index.php?page=department-create">+ Add Department</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
        </tr>

        <?php foreach($departments as $d): ?>
        <tr>
            <td><?= $d['id'] ?></td>
            <td><?= $d['name'] ?></td>
            <td><?= $d['description'] ?></td>
            <td>
                <a class="delete-btn"
                   href="index.php?page=department-delete&id=<?= $d['id'] ?>"
                   onclick="return confirm('Delete this department ?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

