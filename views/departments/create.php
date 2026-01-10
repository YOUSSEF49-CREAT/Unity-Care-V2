<style>
                .form-container {
                width: 400px;
                margin: 60px auto;
                background: #ffffff;
                padding: 25px;
                border-radius: 10px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.15);
            }

            .form-container h2 {
                text-align: center;
                color: #0d6efd;
                margin-bottom: 20px;
            }

            .input-group {
                margin-bottom: 15px;
            }

            .input-group input,
            .input-group textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccd1d9;
                border-radius: 6px;
                font-size: 14px;
            }

            .input-group textarea {
                resize: none;
                height: 80px;
            }

            .input-group input:focus,
            .input-group textarea:focus {
                border-color: #0d6efd;
                outline: none;
            }

            .btn-save {
                width: 100%;
                padding: 10px;
                background: #20c997;
                border: none;
                border-radius: 6px;
                color: white;
                font-size: 15px;
                cursor: pointer;
                transition: 0.3s;
            }

            .btn-save:hover {
                background: #198754;
            }

            .back-btn {
                display: block;
                text-align: center;
                margin-top: 15px;
                color: #fd0d0d;
                text-decoration: none;
                font-size: 14px;
            }

            .back-btn:hover {
                text-decoration: underline;
            }

</style>

<div class="form-container">
    <h2>Add Department</h2>

    <form method="POST" action="index.php?page=department-store">
        <div class="input-group">
            <input type="text" name="name" placeholder="Department name" required>
        </div>

        <div class="input-group">
            <textarea name="description" placeholder="Description"></textarea>
        </div>

        <button type="submit" class="btn-save">Save</button>
    </form>

    <a href="index.php?page=departments" class="back-btn">Back</a>
</div>

