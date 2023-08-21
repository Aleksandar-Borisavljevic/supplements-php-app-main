<?php
    include 'config/connection.php';

    $url_id = $_GET['id'];

    $conn = OpenCon();
    $query = "DELETE FROM korisnik WHERE id='$url_id'";
    mysqli_query($conn, $query);
    mysqli_close($conn);
    header("Location: profile.php");
?>