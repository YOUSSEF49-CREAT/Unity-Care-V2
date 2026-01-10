<style>
                body {
                font-family: Arial, sans-serif;
                background: #f4f6f9;
            }

            /* Card */
            .form-container {
                width: 450px;
                margin: 60px auto;
                background: #ffffff;
                padding: 25px 30px;
                border-radius: 12px;
                box-shadow: 0 6px 20px rgba(0,0,0,0.12);
            }

            /* Title */
            .form-container h2 {
                text-align: center;
                color: #0d6efd;
                margin-bottom: 25px;
            }

            /* Patient info rows */
            .form-container p {
                font-size: 14px;
                padding: 10px 5px;
                border-bottom: 1px solid #e5e5e5;
                margin: 0;
            }

            .form-container p:last-of-type {
                border-bottom: none;
            }

            /* Label */
            .form-container p b {
                color: #20c997;
                display: inline-block;
                width: 130px;
            }

            /* Back button */
            .back-btn {
                display: block;
                margin-top: 20px;
                text-align: center;
                background: #0d6efd;
                color: white;
                padding: 10px;
                border-radius: 6px;
                text-decoration: none;
                transition: 0.3s;
            }

            .back-btn:hover {
                background: #0b5ed7;
            }

</style>
<link rel="stylesheet" href="public/css/patient-fiche.css">

<div class="form-container">
    <h2>Patient Fiche</h2>

    <p><b>Name:</b> <?= $patient['username'] ?></p>
    <p><b>Email:</b> <?= $patient['email'] ?></p>
    <p><b>Doctor:</b> <?= $patient['doctor_name'] ?? 'Not assigned' ?></p>
    <p><b>Date of birth:</b> <?= $patient['date_of_birth'] ?></p>
    <p><b>Phone:</b> <?= $patient['phone'] ?></p>
    <p><b>Address:</b> <?= $patient['address'] ?></p>
    <p><b>Medical history:</b> <?= $patient['medical_history'] ?></p>

    <a class="back-btn" href="index.php?page=patients">← Back</a>
</div>
