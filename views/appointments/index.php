<style>
                body {
                font-family: "Segoe UI", Tahoma, sans-serif;
                background: #f4f6f9;
            }

            /* Container */
            .container {
                width: 95%;
                margin: 30px auto;
                background: #ffffff;
                padding: 20px 25px;
                border-radius: 12px;
                box-shadow: 0 6px 20px rgba(0,0,0,0.12);
            }

            /* Title */
            .container h2 {
                color: #0d6efd;
                margin-bottom: 15px;
                font-weight: 600;
            }

            /* Add button */
            .add-btn {
                display: inline-block;
                background: linear-gradient(135deg, #20c997, #198754);
                color: white;
                padding: 8px 16px;
                border-radius: 6px;
                text-decoration: none;
                margin-bottom: 15px;
                transition: 0.3s;
                font-size: 14px;
            }

            .add-btn:hover {
                opacity: 0.9;
                transform: translateY(-1px);
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
                font-size: 14px;
            }

            table td {
                padding: 10px;
                border-bottom: 1px solid #e0e0e0;
                font-size: 13.5px;
            }

            table tr:nth-child(even) {
                background: #f8f9fa;
            }

            table tr:hover {
                background: #e9f2ff;
            }

            /* Status badge */
            td:nth-child(5) {
                font-weight: bold;
            }

            td:nth-child(5)::first-letter {
                text-transform: uppercase;
            }

            /* Links */
            table a {
                color: #0d6efd;
                text-decoration: none;
                font-weight: 600;
            }

            table a:hover {
                text-decoration: underline;
            }

            /* Done link */
            table a[href*="appointment-done"] {
                color: #20c997;
            }

            /* Delete button */
            .delete-btn {
                background: #dc3545;
                color: white !important;
                padding: 5px 10px;
                border-radius: 6px;
                font-size: 12px;
                transition: 0.3s;
            }

            .delete-btn:hover {
                background: #bb2d3b;
            }

</style>
<div class="container">
    <h2>Appointments</h2>
    <a class="add-btn" href="index.php?page=appointment-create">+ Add Appointment</a>

    <table>
        <tr>
            <th>Doctor</th>
            <th>Patient</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php foreach($appointments as $a): ?>
        <tr>
            <td><?= $a['doctor_name'] ?></td>
            <td><?= $a['patient_name'] ?></td>
            <td><?= $a['appointment_date'] ?></td>
            <td><?= $a['appointment_time'] ?></td>
            <td><?= $a['status'] ?></td>
            <td>
                <?php if($a['status'] != 'done'): ?>
                    <a href="index.php?page=appointment-done&id=<?= $a['id'] ?>">Done</a> |
                <?php endif; ?>

                <a class="delete-btn"
                   href="index.php?page=appointment-delete&id=<?= $a['id'] ?>"
                   onclick="return confirm('Delete this appointment ?')">
                   Delete
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
