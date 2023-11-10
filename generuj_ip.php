<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Twój Tytuł</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_SESSION['form_submitted'])) {
            $_SESSION['form_submitted'] = true;

            $start_ip = $_POST["start_ip"];
            $end_ip = $_POST["end_ip"];

            // Walidacja wprowadzonych adresów IP
            if (!filter_var($start_ip, FILTER_VALIDATE_IP) || !filter_var($end_ip, FILTER_VALIDATE_IP)) {
                echo '<div class="alert alert-danger" role="alert">Błędny format adresu IP. Spróbuj ponownie.</div>';
            } else {
                $file = fopen("ip_list.txt", "w");

                list($start_ip_1, $start_ip_2, $start_ip_3, $start_ip_4) = explode(".", $start_ip);
                list($end_ip_1, $end_ip_2, $end_ip_3, $end_ip_4) = explode(".", $end_ip);

                for ($i = $start_ip_3; $i <= $end_ip_3; $i++) {
                    for ($j = $start_ip_4; $j <= $end_ip_4; $j++) {
                        $ip = "$start_ip_1.$start_ip_2.$i.$j";
                        $entry = "$ip:IP_$i_$j\n";
                        fwrite($file, $entry);
                    }
                }

                fclose($file);

                echo '<div tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Sukces</h5>
                                    <button type="button btn-primary" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Adresy IP zostały wygenerowane i zapisane do pliku ip_list.txt.
                                </div>
                                <div class="modal-footer">
                                    <a href="start.php" class="btn btn-primary">Powrót do formularza</a>
                                    <a href="index.php" class="btn btn-primary">Home</a>
                                </div>
                            </div>
                        </div>
                    </div>';
            }

            session_destroy(); // Zniszcz aktualną sesję
            session_start();  // Rozpocznij nową sesję
        } else {
            echo '<div class="alert alert-warning" role="alert">Formularz został już wysłany. Aby wysłać ponownie, odśwież stronę.</div>';
            echo '<a href="index.php" class="btn btn-primary">Home</a>'; 
        }
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
