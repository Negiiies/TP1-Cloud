<?php
$servername = "db"; // Nom du service défini dans docker-compose.yml
$username = "user";
$password = "password";
$dbname = "my_database";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Traitement du formulaire d'insertion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = $_POST['data'];
    $sql = "INSERT INTO my_table (data_column) VALUES ('$data')";
    if ($conn->query($sql) === TRUE) {
        echo "Nouvelle entrée ajoutée avec succès";
    } else {
        echo "Erreur: " . $sql . "<br>" . $conn->error;
    }
}

// Lire les données de la base de données
$sql = "SELECT * FROM my_table";
$result = $conn->query($sql);
$conn->close(); // Fermer la connexion
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrées dans la base de données</title>
</head>
<body>
    <h2>Entrées dans la base de données :</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Donnée</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Afficher chaque entrée dans un tableau
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["data_column"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>Aucune donnée trouvée</td></tr>";
        }
        ?>
    </table>

    <a href="index.html">Retour à l'ajout</a>
</body>
</html>
