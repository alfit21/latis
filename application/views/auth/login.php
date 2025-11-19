<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">

    <div class="card shadow p-4" style="width: 350px;">
        <h4 class="text-center mb-3">Login Admin</h4>

        <?php if ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('error'); ?>
        </div>
        <?php endif; ?>

        <form action="<?= base_url('auth/check') ?>" method="POST">

            <div class="mb-3">
                <label>Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>

            <button class="btn btn-primary w-100">Login</button>
        </form>
    </div>

</body>

</html>