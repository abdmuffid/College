<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style_php.css">
    <title>Data Calibration</title>
</head>
<body>

<div class="container">
    <h2>Calibration Statistic of Dissolved Oxygen (DO)</h2>

    <?php
    $Station = $_POST["station"]; 
    $len = strlen($Station);
    $inFile = "DataCalib.csv"; 
    $in = fopen($inFile, "r") or die("Can't open file");
    $found = 0;

    while ((!feof($in)) && ($found == 0)) {
        list($Station_dat, $SimulatedMean, $Simulated5tile, $Simulated95tile, $MeasuredMean,
            $Measured5tile, $Measured95tile,
            $DifferenceMean, $Difference5tile, $Difference95tile, $R2) = fgetcsv($in, 0, ',');

        if (strncasecmp($Station_dat, $Station, $len) == 0)
            $found = 1;
    }

    fclose($in);

    echo "<p> <table border='2' class='styled-table'><tr><th>Quantity</th><th>Value</th></tr>";
    echo "<tr><td>Station ID</td><td>$Station_dat</td></tr>";
    echo "<tr bgcolor='silver'><td colspan='2'> Simulated</td></tr>";
    echo "<tr><td>Mean</td><td>$SimulatedMean</td></tr>";
    echo "<tr><td>5% tile</td><td>$Simulated5tile</td></tr>";
    echo "<tr><td>95% tile</td><td>$Simulated95tile</td></tr>";
    echo "<tr bgcolor='silver'><td colspan='2'> Measured</td></tr>";
    echo "<tr><td>Mean</td><td>$MeasuredMean</td></tr>";
    echo "<tr><td>5% tile</td><td>$Measured5tile</td></tr>";
    echo "<tr><td>95% tile</td><td>$Measured95tile</td></tr>";
    echo "<tr bgcolor='silver'><td colspan='2'> Difference</td></tr>";
    echo "<tr><td>Mean</td><td>$DifferenceMean</td></tr>";
    echo "<tr><td>5% tile</td><td>$Difference5tile</td></tr>";
    echo "<tr><td>95% tile</td><td>$Difference95tile</td></tr>";
    echo "<tr bgcolor='silver'><td colspan='2'> R<sup>2</sup></td></tr>";
    echo "<tr><td>R<sup>2</sup></td><td>$R2</td></tr>";
    echo "</table>";

    if (!$found) {
        echo "<p class='error-message'>Couldn't find calibration statistic for this station ID.</p>";
    }
    ?>
</div>

</body>
</html>