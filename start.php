<!DOCTYPE html>
<html>
<head>
    <title>Formularz</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Menu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="start.php">Dodaj IP do listy</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="siec.php">Lista do skanowania</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ip_ok.php">Lista aktywnych IP</a>
                </li>
            </ul>
        </div>
    </nav>
<div class="container mt-5">
    <div class="form-container">
        <h1 class="text-center mb-4">Formularz</h1>

        <?php
        session_start();
        if (!isset($_SESSION['form_submitted'])) {
            echo '<form action="generuj_ip.php" method="post">
                <div class="form-group">
                    <label for="start_ip">Początkowy adres IP</label>
                    <input type="text" class="form-control" id="start_ip" name="start_ip" required>
                </div>
                <div class="form-group">
                    <label for="end_ip">Końcowy adres IP</label>
                    <input type="text" class="form-control" id="end_ip" name="end_ip" required>
                </div>
                <button type="submit" class="btn btn-primary">Generuj</button> 
            </form>';
        } else {
            echo "<p class='text-center mt-4'>Formularz został już wysłany. Aby wysłać ponownie, odśwież stronę.</p>";
            echo '<a href="index.php" class="btn btn-primary">Powrót do formularza</a>'; 
        }
        ?>
    </div>
</div>

</body>
</html>
