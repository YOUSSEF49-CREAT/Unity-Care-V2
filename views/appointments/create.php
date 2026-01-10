<style>
                    body {
                    font-family: "Segoe UI", Tahoma, sans-serif;
                    background: linear-gradient(135deg, #e3f2fd, #e8f5e9);
                }

                /* Card */
                .form-container {
                    width: 450px;
                    margin: 60px auto;
                    background: #ffffff;
                    padding: 30px;
                    border-radius: 14px;
                    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
                }

                /* Title */
                .form-container h2 {
                    text-align: center;
                    color: #0d6efd;
                    margin-bottom: 25px;
                    font-weight: 600;
                }

                /* Input groups */
                .input-group {
                    margin-bottom: 15px;
                }

                .input-group input,
                .input-group select,
                .input-group textarea {
                    width: 100%;
                    padding: 11px 12px;
                    border: 1px solid #ccd1d9;
                    border-radius: 8px;
                    font-size: 14px;
                    background: #f9fbfd;
                    transition: 0.3s;
                }

                /* Focus */
                .input-group input:focus,
                .input-group select:focus,
                .input-group textarea:focus {
                    border-color: #0d6efd;
                    outline: none;
                    box-shadow: 0 0 0 3px rgba(13,110,253,0.15);
                    background: #ffffff;
                }

                /* Textarea */
                .input-group textarea {
                    resize: none;
                    height: 80px;
                }

                /* Save button */
                .btn-save {
                    width: 100%;
                    padding: 12px;
                    background: linear-gradient(135deg, #20c997, #198754);
                    border: none;
                    border-radius: 8px;
                    color: white;
                    font-size: 15px;
                    cursor: pointer;
                    transition: 0.3s;
                    margin-top: 10px;
                }

                .btn-save:hover {
                    opacity: 0.9;
                    transform: translateY(-1px);
                }

                /* Back button */
                .back-btn {
                    display: block;
                    margin-top: 18px;
                    text-align: center;
                    color: #0d6efd;
                    text-decoration: none;
                    font-size: 14px;
                }

                .back-btn:hover {
                    text-decoration: underline;
                }

</style>
<div class="form-container">
    <h2>Add Appointment</h2>

    <form method="POST" action="index.php?page=appointment-store">

        <div class="input-group">
            <select name="doctor_id" required>
                <option value="">-- Choose Doctor --</option>
                <?php foreach($doctors as $d): ?>
                    <option value="<?= $d['id'] ?>">
                        <?= $d['username'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="input-group">
            <select name="patient_id" required>
                <option value="">-- Choose Patient --</option>
                <?php foreach($patients as $p): ?>
                    <option value="<?= $p['id'] ?>">
                        <?= $p['username'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="input-group">
            <input type="date" name="appointment_date" required>
        </div>

        <div class="input-group">
            <input type="time" name="appointment_time" required>
        </div>

        <div class="input-group">
            <textarea name="reason" placeholder="Reason"></textarea>
        </div>

        <button class="btn-save" type="submit">Save</button>
    </form>

    <a class="back-btn" href="index.php?page=appointments">← Back</a>
</div>
