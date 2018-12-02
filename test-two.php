<html>
    <head>        
        <title>Test File</title>
        
    </head>
    <body>
<?php

# Enable Error Reporting and Display:
error_reporting(~0);
ini_set('display_errors', 1);

/* $adr = 'Sydney+NSW';
echo $adr; */
$url = "https://www.owlasylum.net/test07092018.json";
echo '<p>'.$url.'</p>';

$jsonData = file_get_contents($url);

print '<p>'. var_dump($jsonData) . '</p>';

# Output information about allow_url_fopen:
if (ini_get('allow_url_fopen') == 1) {
    echo '<p style="color: #0A0;">fopen is allowed on this host.</p>';
} else {
    echo '<p style="color: #A00;">fopen is not allowed on this host.</p>';
}


# Decide what to do based on return value:
if ($jsonData === FALSE) {
    echo "Failed to open the URL ", htmlspecialchars($url);
} elseif ($jsonData === NULL) {
    echo "Function is disabled.";
} else {
   echo $jsonData;
}

?>
    </body>
</html>