<?php
    include 'config/connection.php';

    $url_id = $_GET['id'];

    $conn = OpenCon();
    $query = "DELETE FROM suplementi WHERE id='$url_id'";
    
    // echo "<p>". $query ."</p>";

    mysqli_query($conn, $query);
    mysqli_close($conn);
    header("Location: supplements.php?message=delete");
    
?>