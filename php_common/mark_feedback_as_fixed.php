<?php
include("../config.php");
include("../session.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($position == "Manager" || $position == "Assistant Manager") {
        $id = mysqli_real_escape_string($db, $_POST['id']);

        $sql = "UPDATE `Feedback` SET `Complete`=1 WHERE `Feedback_ID`=$id";

        if (mysqli_query($db, $sql)) {
            echo "success";
        } else {
            echo "Error when processing SQL command.\n contact your server admin";
        }
    } else {
        echo "No permission ";
    }
}
mysqli_close($db);
