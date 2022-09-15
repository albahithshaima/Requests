<?php

if (!$_POST) {
    header('Location: ' . 'index.php');
}

?>

<?php include("connectdb.php"); ?>


<!-- php code for generating a unique request number -->
<?php

session_start(); // session , cookies , jwt

$newrow = true;
$unique_request_id = 1;

if (isset($_SESSION["unique_request_id"])) {


    $query = "SELECT * FROM " . $requests_table_name . " WHERE id = " . $_SESSION["unique_request_id"] . ";";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        $newrow = false;
        $unique_request_id = $_SESSION["unique_request_id"];
    }
} else {
    $query = "SELECT * FROM " . $requests_table_name . " ORDER BY id DESC LIMIT 0, 1";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $unique_request_id = $row["id"] + 1;
        // echo $unique_request_id;
    }
}
?>



<?php

// print_r($_POST);

// creat variables for each value we need to be saved in db :
$Priority = $_POST["Priority"]; 
if ($Priority == "High")
    $High_Reason = $_POST["High_Reason"];
else
    $High_Reason = "";
$RDescription = $_POST["RDescription"];
$RDetails = $_POST["RDetails"];
$countfiles = count(array_filter($_FILES['files']['name']));

if (isset($_FILES)) {
    // echo $countfiles;
    for ($i = 0; $i < $countfiles; $i++) {
        $filename = $unique_request_id . "_" . $i + 1;
        move_uploaded_file($_FILES['files']['tmp_name'][$i], 'uploaded_files/' . $filename);
    }
}

if ($_SESSION["filescount"]) {
    if ($countfiles < $_SESSION["filescount"])
        $countfiles = $_SESSION["filescount"];
}

if ($newrow) {
    $sql = "INSERT INTO " . $requests_table_name . " (Priority, High_Reason, RDescription, RDetails, files_count)
        VALUES (?, ?, ?, ?, ?); ";

    // echo "Saving.";
} else {
    $sql = "UPDATE " . $requests_table_name . " SET Priority = ?, High_Reason = ?, RDescription = ?, RDetails = ?, files_count = ?
    WHERE id = " . $unique_request_id . "; ";
    // echo "Updating.";

}
$stmt = mysqli_stmt_init($conn);
///////////////
if (!mysqli_stmt_prepare($stmt, $sql)) {

    die(mysqli_error($conn));
}
mysqli_stmt_bind_param(
    $stmt,
    "ssssd",
    $Priority,
    $High_Reason,
    $RDescription,
    $RDetails,
    $countfiles
);

mysqli_stmt_execute($stmt);



$_SESSION["Priority"] = $Priority;
$_SESSION["High_Reason"] = $High_Reason;
$_SESSION["RDescription"] = $RDescription;
$_SESSION["RDetails"] = $RDetails;
$_SESSION["unique_request_id"] = $unique_request_id;
$_SESSION["filescount"] = $countfiles;
header('Location: ' . 'review.php');

?>