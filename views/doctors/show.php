<style>
                body {
                font-family: Arial, sans-serif;
                background: #f4f6f9;
            }

            .form-container {
                width: 400px;
                margin: 60px auto;
                background: #ffffff;
                padding: 25px;
                border-radius: 10px;
                box-shadow: 0 6px 20px rgba(0,0,0,0.12);
            }

            .form-container h2 {
                text-align: center;
                color: #0d6efd;
                margin-bottom: 20px;
            }

            .form-container p {
                font-size: 15px;
                padding: 8px 0;
                border-bottom: 1px solid #e5e5e5;
            }

            .form-container p b {
                color: #20c997;
                display: inline-block;
                width: 110px;
            }

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

<div class="form-container">
    <h2>Doctor Fiche</h2>

    <p><b>Name:</b> <?= $doctor['username'] ?></p>
    <p><b>Email:</b> <?= $doctor['email'] ?></p>
    <p><b>Department:</b> <?= $doctor['department'] ?></p>
    <p><b>Specialization:</b> <?= $doctor['specialization'] ?></p>
    <p><b>Phone:</b> <?= $doctor['phone'] ?></p>

    <a class="back-btn" href="index.php?page=doctors">← Back</a>
</div>
