<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="shortcut icon" href="remove.png" type="image/x-icon">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #999999;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .event-box {
            border: 1px solid #ccc;
            padding: 15px;
            margin: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .event-box h3 {
            margin-top: 0;
        }

        .code {
            margin-bottom: 20px;
            
        }

        .code input[type="password"],
        .code input[type="submit"] {
            padding: 10px;
            font-size: 16px;
            border: 1px solid;
            background-color: #f5f5f5;
            
        }

        .events {
            display: none;
        }

        .events.show {
            display: block;
        }

        .remove-link {
            color: #e74c3c;
            text-decoration: none;
            font-weight: bold;
            margin-left: 10px;
        }

        .remove-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="events" id="eventsBox">
            <?php
            if (isset($_GET['remove'])) {
                $indexToRemove = intval($_GET['remove']);

                $eventsJson = file_get_contents('ev-added.json');
                $events = json_decode($eventsJson, true);

                if ($indexToRemove >= 0 && $indexToRemove < count($events)) {
                    array_splice($events, $indexToRemove, 1);

                    file_put_contents('ev-added.json', json_encode($events));
                    echo '<script>alert("Event removed successfully.")</script>';
                } else {
                    echo '<script>alert("Invalid event index. return home page")</script>';
                }
            }

            $eventsJson = file_get_contents('ev-added.json');
            $events = json_decode($eventsJson, true);

            foreach ($events as $index => $event) {
                echo '
                    <div class="event-box">
                        <div>
                            <h3>' . $event['title'] . '</h3>
                            <p>Matière: ' . $event['subject'] . '</p>
                            <p>Jour: ' . $event['day'] . '</p>
                            <p>date: ' . $event['time'] . '</p>
                        </div>
                        <a class="remove-link" href="?remove=' . $index . '">Remove</a>
                    </div>
                ';
            }
            ?>
        </div>
        <div class="code" id="codeBox">
            <input type="password" name="pass" id="pass" placeholder="Enter password">
            <input type="submit" value="Submit" onclick="checkPassword()">
        </div>
    </div>
    
    <script>
        function checkPassword() {
            var password = document.getElementById('pass').value;
            
            // Replace 'yourpassword' with the actual password
            if (password === '2545') {
                document.getElementById('codeBox').style.display = 'none';
                document.getElementById('eventsBox').classList.add('show');
            }
            else {
                alert("Incorrect code. Please try again.");
            }
        }
    </script>
</body>
</html>
