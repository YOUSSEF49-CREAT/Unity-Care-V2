<style>
            body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
        }

        /* Card */
        .form-container {
            width: 450px;
            margin: 50px auto;
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

        /* Inputs group */
        .input-group {
            margin-bottom: 15px;
        }

        .input-group input,
        .input-group textarea , select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccd1d9;
            border-radius: 6px;
            font-size: 14px;
            transition: 0.3s;
        }

        /* Textarea specific */
        .input-group textarea {
            resize: none;
            height: 70px;
        }

        /* Focus effect */
        .input-group input:focus,
        .input-group textarea:focus {
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
            color: #0d6efd;
            text-decoration: none;
            font-size: 14px;
        }

        .back-btn:hover {
            text-decoration: underline;
        }

</style>
<link rel="stylesheet" href="public/css/patient-form.css">

<div class="form-container">
    <h2>Add Patient</h2>

    <form method="POST" action="index.php?page=patient-store">

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
            <select name="doctor_id" required>
                <option value="">-- Choose Doctor --</option>
                <?php foreach ($doctors as $doc): ?>
                    <option value="<?= $doc['id'] ?>">
                        <?= $doc['username'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="input-group">
            <input type="date" name="date_of_birth" required>
        </div>

        <div class="input-group">
            <input type="text" name="phone" placeholder="Phone">
        </div>

        <div class="input-group">
            <textarea name="address" placeholder="Address"></textarea>
        </div>

        <div class="input-group">
            <textarea name="medical_history" placeholder="Medical history"></textarea>
        </div>

        <button class="btn-save" type="submit">Save</button>
    </form>

    <a class="back-btn" href="index.php?page=patients">← Back</a>
</div>
