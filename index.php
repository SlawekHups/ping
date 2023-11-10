<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista plików HTML i PHP</title>
    <!-- Dodanie Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
        <h1 class="text-center mb-4">Lista plików HTML</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nazwa Pliku</th>
                    <th scope="col">Akcje</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sciezka_katalogu = './'; // Ścieżka do bieżącego katalogu
                $pliki = glob($sciezka_katalogu . '/*.{html}', GLOB_BRACE);

                foreach ($pliki as $index => $plik) {
                    $nazwa_pliku = basename($plik);
                    echo "<tr>
                            <th scope=\"row\">$index</th>
                            <td><a href=\"$nazwa_pliku\">$nazwa_pliku</a></td>
                            <td><a href=\"$nazwa_pliku\" class=\"btn btn-primary\">Otwórz</a></td>
                          </tr>";
                }

                if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['file'])) {
                    $file = $_GET['file'];
                    if (in_array($file, $pliki)) {
                        readfile($file);
                        exit();
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Dodanie Bootstrap JS (opcjonalne) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
