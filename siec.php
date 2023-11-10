<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lista IP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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
    <table class="table table-striped">
    <h1 class="text-center mb-4">Lista do skanowania IP</h1>
        <thead>
            <tr>
                <th>#</th>
                <th>Adres IP</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $lines = file('ip_list.txt');
                foreach ($lines as $index => $line) {
                    echo "<tr><td>".($index+1)."</td><td>".trim($line)."</td></tr>";
                }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
