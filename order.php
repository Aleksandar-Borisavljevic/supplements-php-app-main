<?php 
require_once('includes/header.php');
include 'config/connection.php';
$conn = OpenCon();

$url_id = $_GET['id'];

if(isset($_POST['numberOfOrders'])){
    $numberOfOrders = $_POST['numberOfOrders'];
    $userId = $_SESSION['id']; 
    $supplementId = $url_id;

    // $conn = OpenCon();
    if (empty($numberOfOrders)) {
        echo '<div class="alert alert-danger" role="alert">
                Sva polja su obavezna!
              </div>';
    } else {
        $conn = OpenCon();
        $query1 = "INSERT INTO porudzbine (korisnik_id, suplementi_id, broj_artikala) 
                  VALUES ('$userId', '$supplementId', '$numberOfOrders');";
        $query2 = "UPDATE suplementi
                  SET broj_dostupnih_artikala = broj_dostupnih_artikala - $numberOfOrders
                  WHERE id = $supplementId;";
                  
        mysqli_query($conn, $query1);
        mysqli_query($conn, $query2);
        mysqli_close($conn);
        header('Location: supplements.php?message=porudzbina');
        // echo $query;
    }
}

$sql = "SELECT * FROM suplementi WHERE id='$url_id'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) :
?>

    <div class="container form-page">
        <div class="form-container">
            <h3>Porudžbina za <?php echo $row['naziv_suplementa']; ?> </h3>
            <div class="mb-3">
                <form action="order.php?id=<?php echo $url_id?>" method="POST" name="order-form">
                    <div class="mb-3">
                        <select class="form-select" aria-label="numberOfOrders" id="numberOfOrders" name="numberOfOrders" required oninvalid="this.setCustomValidity(' ')" onchange="checkForm('order')">
                            <option value="">Izaberite kolicinu artikala</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>

                    <button type="submit" class="btn" id="orderBtn">Naručite</button>
                </form>
            </div>
        </div>
    </div>

<script>
    initiate("orderBtn", "form[name='order-form']");
</script>

<?php endwhile; ?>
<?php require_once('includes/footer.php') ?>
