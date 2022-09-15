<?php

session_start();

?>


<html>
    <head> 

    <title>review</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>


<body>
    Data Saved Successfully!.
    <br>
    Data Summary:
<br> <br>

    <?php
    if (isset($_SESSION["Priority"])) {
        echo "Priority:  ";
        echo $_SESSION["Priority"];
        echo "<br> <br>";
    }
    ?>

    <?php
    if (isset($_SESSION["High_Reason"]))
        if ($_SESSION["Priority"] == "High") {
            echo "Reason of High Priority:  ";
            echo $_SESSION["High_Reason"];
            echo "<br> <br>";
        }
    ?>

    <?php
    if (isset($_SESSION["RDescription"])) {
        echo "Request Description:  ";
        echo $_SESSION["RDescription"];
        echo "<br> <br>";
    }
    ?>

    <?php
    if (isset($_SESSION["RDetails"])) {
        echo "Request Details:  ";
        echo $_SESSION["RDetails"];
        echo "<br> <br>";
    }
    ?>

    <?php
    if (isset($_SESSION["unique_request_id"])) {
        echo "Request ID:  ";
        echo $_SESSION["unique_request_id"];
        echo "<br> <br>";
    }
    ?>
    <br>

    <?php
    if (isset($_SESSION["filescount"])) {
        echo "Number of uploaded files:  ";
        echo $_SESSION["filescount"];
        echo "<br> <br>";
    }
    ?>
    <br>

    <button onclick="location.href='index.php';" type="button">Edit</button>
    </form>

</body>

</html>