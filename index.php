<?php
session_start();
if (isset($_POST['submit'])) {
    $_SESSION['officer_name'] = $_POST['officer_name'];
    $_SESSION['location'] = $_POST['location'];
    header('Location: survey.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Petugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/happy-face.png">
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Login Petugas Loket KBS</h2>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="officer_name" class="form-label">Nama Petugas</label>
                                <input type="text" class="form-control" id="officer_name" name="officer_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Lokasi Loket</label>
                                <input type="text" class="form-control" id="location" name="location" required>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary w-100">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="text-center mt-4 text-muted">
            Made with <span style="color: red;">&#10084;&#65039;</span> by Information Technology PDTSKBS
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>