<?php
if(isset($_POST['add'])){
    $title = $_POST["titre"];
    $subject = $_POST["matiere"];
    $day = $_POST["date"];
    $time = $_POST["heure"];
    $url = $_POST["url"];
    $id = "ev" . $day . "-" . $time;
    
    // Create a new event entry
    $newEvent = array(
        "id" => $id,
        "title" => $title,
        "subject" => $subject,
        "day" => $day,
        "time" => $time,
        "url" => $url
    );
    
    // Load existing JSON data from file
    $filename = 'ev-added.json';
    $jsonData = file_get_contents($filename);
    $events = json_decode($jsonData, true);

    // Add the new event to the array
    $events[] = $newEvent;

    // Convert back to JSON format
    $updatedJsonData = json_encode($events, JSON_PRETTY_PRINT);

    // Write the updated JSON data back to the file
    file_put_contents($filename, $updatedJsonData);
    header("Location: index.html");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Events</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="plus.png" type="image/x-icon">
    
</head>
<body>
    <div class="contraire">
        <div class="code-ren">
            <h3>code</h3>
            <input type="password" name="pass-re" id="pass-re" required>
            <button id="code">Submit</button>
        </div>
        <div class="ajouter">
            <h1>Ajouet une reunion</h1>
            <form method="post">
                <div class="titres">
                    <label for="titre">Titre</label>
                    <input type="text" name="titre" id="name-reunion" required>
                </div>
                <div class="matier">
                    <label for="matiere">Matière</label>
                    <input type="text" name="matiere" id="matiere" required>
                </div>
                <div class="date">
                    <label for="date">Date</label>
                    <select name="date" id="date" required>
                        <option value="">Jour</option>
                        <option value="lundi">Lundi</option>
                        <option value="mardi">Mardi</option>
                        <option value="mercredi">Mercredi</option>
                        <option value="jeudi">Jeudi</option>
                        <option value="vendredi">Vendredi</option>
                        <option value="samedi">Samedi</option>
                        <option value="dimanche">Dimanche</option>
                    </select>
                    <label for="heure">Heure</label>
                    <select name="heure" id="heure" required>
                        <option value="">Heure</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="21">22</option>
                        <option value="23">23</option>
                    </select>
                </div>
                <div class="url-ren">
                    <label for="url">URL</label>
                    <input type="url" name="url" id="url" placeholder="www.example.com">
                </div>
                <input type="submit" value="ajouter" name="add">
            </form>
        </div>
    </div>
    <script src="ev.js"></script>
</body>
</html>