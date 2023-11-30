<?php
function generatePassword($length)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+[]{}|;:,.<>?';
    $password = '';

    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, strlen($characters) - 1);
        $password .= $characters[$randomIndex];
    }
    return $password;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP Strong Password Generator</title>
</head>
<body>
    <h1 class="text-center text-secondary">Strong Password Generator</h1>
    <h2 class="text-center text-white">Genera una password sicura</h2>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class=" container alert alert-success ">
                    <?php if (isset($_GET['passwordLength'])) {
                        $passwordLength = $_GET['passwordLength'];
                        if (is_numeric($passwordLength) && $passwordLength > 0) {
                            $generatedPassword = generatePassword($passwordLength);
                            echo '<p>Password generata: ' . $generatedPassword . '</p>';
                        } else {
                            echo '<p>Nessun parametro valido inserito</p>';
                        }
                    } ?>
                </div>
                <div class="bg-body p-5">
                    <form action="index.php" method="GET">
                        <label for="passwordLength">Lunghezza password:</label>
                        <input type="number" name="passwordLength" id="passwordLength" required>
                        <button class="btn btn-primary" type="submit">Invia</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>