<html>

<head>
    <style>
        .form-container {
            width: 500px;
            margin: 0 auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>

<body>

    <?php if ($alert = $this->session->flashdata('success')) : ?>
        <div class="row-group">
            <div class="alert alert-dismissible alert-success">
                <?= $alert ?>
                <?php unset($_SESSION['success']); ?>
            </div>
        </div>
    <?php elseif ($alert = $this->session->flashdata('error')) : ?>
        <div class="row-group">
            <div class="alert alert-dismissible alert-danger">
                <?= $alert ?>
                <?php unset($_SESSION['error']); ?>
            </div>
        </div>
    <?php elseif ($alert = $this->session->flashdata('warning')) : ?>
        <div class="row-group">
            <div class="alert alert-dismissible alert-warning">
                <?= $alert ?>
                <?php unset($_SESSION['warning']); ?>
            </div>
        </div>
    <?php endif ?>

    <div class="form-container">
        <?= form_open('users/change_password') ?>
        <label>Current Password:</label>
        <input type="password" name="current-password">
        <label>New Password:</label>
        <input type="password" name="new-password">
        <label>Confirm New Password:</label>
        <input type="password" name="confirm-new-password">
        <input type="submit" value="Change Password">
        <?= form_close() ?>
    </div>
</body>

</html>