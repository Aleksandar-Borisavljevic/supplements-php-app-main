<?php
    include 'config/connection.php';

    $url_id = $_GET['id'];
    $url_orders = $_GET['orders'];
    $url_supplementId = $_GET['supplement'];

    $conn = OpenCon();
    $query1 = "UPDATE suplementi
              SET broj_dostupnih_artikala = broj_dostupnih_artikala + $url_orders
              WHERE id = $url_supplementId;";
    $query2 = "DELETE FROM porudzbine WHERE id='$url_id'";
    
    // echo "<p>". $query1 ."</p>";
    // echo "<p>". $query2 ."</p>";

    mysqli_query($conn, $query1);
    mysqli_query($conn, $query2);
    mysqli_close($conn);
    header("Location: profile.php");
    
?>