<style>
                body {
                font-family: Arial, sans-serif;
                background: #f4f6f9;
            }

            /* Card */
            .form-container {
                width: 420px;
                margin: 50px auto;
                background: #ffffff;
                padding: 25px;
                border-radius: 12px;
                box-shadow: 0 6px 20px rgba(0,0,0,0.12);
            }

            /* Title */
            .form-container h2 {
                text-align: center;
                color: #0d6efd;
                margin-bottom: 25px;
            }

            /* Inputs */
            .input-group , select {
                margin-bottom: 15px;
            }

            .input-group input,
            .input-group select , select {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccd1d9;
                border-radius: 6px;
                font-size: 14px;
                transition: 0.3s;
            }

            select{
                width: 100%;
                padding: 10px;
                border: 1px solid #ccd1d9;
                border-radius: 6px;
                font-size: 14px;
                transition: 0.3s;
            }

            .input-group input:focus,
            .input-group select:focus , select{
                border-color: #0d6efd;
                outline: none;
                box-shadow: 0 0 0 2px rgba(13,110,253,0.2);
            }

            /* Save button */
            .btn-save {
                width: 100%;
                padding: 12px;
                background: #20c997;
                border: none;
                border-radius: 6px;
                color: white;
                font-size: 15px;
                cursor: pointer;
                transition: 0.3s;
                margin-top: 10px;
            }

            .btn-save:hover {
                background: #198754;
            }

            /* Back link */
            .back-btn {
                display: block;
                margin-top: 15px;
                text-align: center;
                color: #fd0d0d;
                text-decoration: none;
                font-size: 14px;
            }

            .back-btn:hover {
                text-decoration: underline;
            }

</style>

<div class="form-container">
    <h2>Add Doctor</h2>

    <form method="POST" action="index.php?page=doctor-store">
        <div class="input-group">
            <input type="text" name="username" placeholder="Username" required>
        </div>

        <div class="input-group">
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="input-group">
            <select name="department_id" required>
                <option value="">-- Choose Department --</option>
                <?php foreach($departments as $dep): ?>
                    <option value="<?= $dep['id'] ?>">
                        <?= $dep['name'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="input-group">
            <input type="text" name="specialization" placeholder="Specialization">
        </div>

        <div class="input-group">
            <input type="text" name="phone" placeholder="Phone">
        </div>

        <button class="btn-save" type="submit">Save</button>
    </form>

    <a class="back-btn" href="index.php?page=doctors">Back</a>
</div>
