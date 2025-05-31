<?php
session_start();
if (!isset($_SESSION['officer_name']) || !isset($_SESSION['location'])) {
    header('Location: index.php');
    exit;
}
$officer_name = $_SESSION['officer_name'];
$location = $_SESSION['location'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kepuasan Pengunjung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/happy-face.png">
    <style>
        .rating-img { width: 100%; max-width: 150px; cursor: pointer; }
        #clock { font-size: 1.5rem; font-weight: bold; }
        .attribution { font-size: 0.8rem; color: #6c757d; }
        
    </style>
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="min-height: 100vh;">
    <div class="container text-center">
        <h1 class="mb-4">Kepuasan Pengunjung Kebun Binatang Surabaya</h1>
        <p>Nama Petugas: <strong><?php echo htmlspecialchars($officer_name); ?></strong></p>
        <p>Lokasi: <strong><?php echo htmlspecialchars($location); ?></strong></p>
        <p id="clock" class="mb-5"></p>
        <div class="row justify-content-center">
            <div class="col-6 col-md-4">
                <a href="process.php?rating=Sad">
                    <img src="images/sad-face.png" alt="Sad" class="rating-img img-fluid">
                </a>
            </div>
            <div class="col-6 col-md-4">
                <a href="process.php?rating=Happy">
                    <img src="images/happy-face.png" alt="Happy" class="rating-img img-fluid">
                </a>
            </div>
        </div>
        <?php if (isset($_GET['message'])): ?>
            <div class="alert alert-success alert-dismissible fade show mt-4" role="alert" id="alertBox">
                Terima kasih atas penilaian anda
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
        <p class="attribution mt-4">
            Icons made by <a href="https://www.flaticon.com/authors/najmunnahar" title="NajmunNahar">NajmunNahar</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>
        </p>
        <footer class="text-center mt-4 text-muted">
            Made with <span style="color: red;">&#10084;&#65039;</span> by Information Technology PDTSKBS
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateClock() {
            const now = new Date();
            const options = { 
                timeZone: 'Asia/Jakarta', 
                hour12: false, 
                weekday: 'long', 
                hour: '2-digit', 
                minute: '2-digit', 
                second: '2-digit' 
            };
            document.getElementById('clock').textContent = now.toLocaleString('id-ID', options);
        }
        updateClock();
        setInterval(updateClock, 1000);
        <?php if (isset($_GET['message'])): ?>
            setTimeout(() => {
                const alertBox = document.getElementById('alertBox');
                if (alertBox) alertBox.classList.remove('show');
                window.history.replaceState(null, null, 'survey.php');
            }, 2000);
        <?php endif; ?>
    </script>
</body>
</html>