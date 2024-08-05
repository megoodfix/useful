<?php
// Specify the log file path
$logFile = 'errorexamplePHP.log';

// Enable error logging
ini_set('log_errors', 1);
ini_set('error_log', $logFile);

// Log IP address and date-time
$ipAddress = $_SERVER['REMOTE_ADDR'];
$dateTime = date('Y-m-d H:i:s');
$logMessage = "IP: $ipAddress - Date/Time: $dateTime\n";
error_log($logMessage, 3, $logFile);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example PHP File</title>
    <style>
        .menu-item, .button, .image {
            margin: 10px;
            padding: 10px;
            cursor: pointer;
        }
        .popup-menu {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            z-index: 1000;
        }
        .popup-menu-item {
            padding: 8px;
            cursor: pointer;
        }
        .popup-menu-item:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <div>
        <button class="button" onclick="buttonClick(1)">Button 1</button>
        <button class="button" onclick="buttonClick(2)">Button 2</button>
        <button class="button" onclick="buttonClick(3)">Button 3</button>
    </div>
    <div>
        <img src="image1.jpg" class="image" onclick="imageClick(1)" alt="Image 1">
        <img src="image2.jpg" class="image" onclick="imageClick(2)" alt="Image 2">
        <img src="image3.jpg" class="image" onclick="imageClick(3)" alt="Image 3">
    </div>
    <div class="menu">
        <div class="menu-item" onclick="menuItemClick(1)">Menu Item 1</div>
        <div class="menu-item" onclick="menuItemClick(2)">Menu Item 2</div>
        <div class="menu-item" onclick="menuItemClick(3)">Menu Item 3</div>
    </div>

    <div id="popup-menu" class="popup-menu">
        <div class="popup-menu-item" onclick="popupMenuItemClick(1)">Popup Menu Item 1</div>
        <div class="popup-menu-item" onclick="popupMenuItemClick(2)">Popup Menu Item 2</div>
        <div class="popup-menu-item" onclick="popupMenuItemClick(3)">Popup Menu Item 3</div>
    </div>

    <script>
        function logAction(action) {
            fetch('log_action.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ action: action }),
            });
        }

        function buttonClick(buttonNumber) {
            alert('Button ' + buttonNumber + ' clicked');
            logAction('Button ' + buttonNumber + ' clicked');
        }

        function imageClick(imageNumber) {
            alert('Image ' + imageNumber + ' clicked');
            logAction('Image ' + imageNumber + ' clicked');
        }

        function menuItemClick(menuItemNumber) {
            alert('Menu Item ' + menuItemNumber + ' clicked');
            logAction('Menu Item ' + menuItemNumber + ' clicked');
        }

        function popupMenuItemClick(popupMenuItemNumber) {
            alert('Popup Menu Item ' + popupMenuItemNumber + ' clicked');
            logAction('Popup Menu Item ' + popupMenuItemNumber + ' clicked');
        }

        // Display popup menu on right-click
        document.addEventListener('contextmenu', function (e) {
            e.preventDefault();
            const popupMenu = document.getElementById('popup-menu');
            popupMenu.style.display = 'block';
            popupMenu.style.left = `${e.pageX}px`;
            popupMenu.style.top = `${e.pageY}px`;
        });

        // Hide popup menu when clicking elsewhere
        document.addEventListener('click', function () {
            document.getElementById('popup-menu').style.display = 'none';
        });
    </script>
</body>
</html>