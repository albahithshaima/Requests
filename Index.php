<?php

session_start();

if (isset($_SESSION["Priority"]))
  $Priority = $_SESSION["Priority"]; // high, mid , low 
else
  $Priority = "";

if (isset($_SESSION["High_Reason"]))
  $High_Reason = $_SESSION["High_Reason"];
else
  $High_Reason = "";

if (isset($_SESSION["RDescription"]))
  $RDescription = $_SESSION["RDescription"];
else
  $RDescription = "";

if (isset($_SESSION["RDetails"]))
  $RDetails = $_SESSION["RDetails"];
else
  $RDetails = "";

?>



<html lang="en">

<head>

  <title>Requests</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">

  <!----- Custom Style ----->
  <!-- <link rel="stylesheet" href="./css/Style.css"> -->
  <!--x-- Custom Style --x-->

</head>

<body>

  <!-- custom javascript file-->
  <script src="./js/main.js"></script>

  <h1>Requests</h1>

  <form action="process-requests.php" method="post" enctype="multipart/form-data" id ="myorm">

    <!--------------------- priority menue ----------------------->

    <label for="priority">Priority<select class="form-control" name="Priority" id="Priority" value="" onchange="showHide(this.value)" style="width:540px">

        <option value="Medium" id="Medium" name="Medium" <?php if ($Priority == "Medium") echo 'selected="selected"'; ?>>Medium</option>
        <option value="Low" id="Low" name="Low" <?php if ($Priority == "Low") echo 'selected="selected"'; ?>>Low</option>
        <option value="High" id="High" name="High" <?php if ($Priority == "High") echo 'selected="selected"'; ?>>High</option>

        <!-- input field that will be apear to the user after they 
        choosen high priority so they can write the reason of the priority high -->
        <div class="form-group">
          <label for="High_Reason"></label>
          <textarea class="form-control" name="High_Reason" id="High_Reason" rows="5" placeholder="please explain the reason why priority is high" style="width:540px;display:none;resize: none"><?php echo $High_Reason; ?></textarea>
        </div><br><br>

        <!-----------x--------- priority menue ----------x------------>


        <!--------------------- Request Description / Details ----------------------->

        <label for="Request Description"></label>
        <input style="width: 521px" maxlength="100" name="RDescription" placeholder="Request Description" value="<?php echo $RDescription; ?>"></input>
        <br>
        <label for="Request Details"></label>
        <textarea style="width: 540px;resize: none" maxlength="1000" name="RDetails" placeholder="Request Details" rows="10" cols="60"><?php echo $RDetails; ?></textarea> <!-- multi lines 1000 char-->
        <br><br>
        <!-------------x------- Request Description / Details ---------x------------->


        <!--------------------- insert file ----------------------->

        <label for="files">Select files:</label>
        <input type="file" id="files" name="files[]" multiple></input><br><br>

        <!---------x----------- insert file ----------x------------>

        <!-- <p><a href="html_images.asp">HTML Images</a></p> -->
        <button title="Title" aria-label="Send" type="submit" id="Send">Save</button>
        <!-- <input type="submit" value="Submit">  -->
  </form>

</body>
<script>
  window.addEventListener('load', function() {
    var e = document.getElementById("Priority");
    var text = e.options[e.selectedIndex].text;
    if (text == "High") {
      document.getElementById('High_Reason').style.display = "block";
    }
  })

  document.getElementById("myForm").onkeypress = function(e) {
    var key = e.charCode || e.keyCode || 0;     
    if (key == 13) {
      e.preventDefault();
    }
  }
</script>

</html>