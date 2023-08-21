<?php 
require_once('includes/header.php');
include 'config/connection.php';

$url_id = $_GET['id'];

$conn = OpenCon();
$sql = "SELECT * FROM suplementi WHERE id='$url_id'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)) :
?>

<div class="container destination">
    <div class="d-flex flex-wrap mt-5">
        <div class="d-flex flex-column justify-content-center col-lg-6 pe-lg-5">
            <?php if (session_status() == PHP_SESSION_ACTIVE) {
                    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){ ?>
                <div class="d-flex">
                    <a href="edit-supplement.php?id=<?php echo $url_id ?>" class="btn me-2">Izmeni suplement</a>
                    <a href="delete-supplement.php?id=<?php echo $url_id ?>" class="btn">Obriši suplement</a>
                </div>
            <?php }} ?>

            <h1><?php echo $row['naziv_suplementa']; ?></h1>
            <div class="d-flex ">
                <?php echo $row['opis']; ?>
            </div>

            <?php ?>
                <h4 class="mt-3 mb-3">Cena artikla: <strong><?php echo $row['cena']; ?> RSD</strong></h4>
            <?php ?>

            <?php if($row['broj_dostupnih_artikala'] == 0) { ?>
                <h4 class="mt-3 mb-3">Trenutno nije na stanju!</h4>
            <?php } else { ?>
                <h4 class="mt-3 mb-3">Broj dostupnih artikala: <strong><?php echo $row['broj_dostupnih_artikala']; ?></strong></h4>
            <?php } ?>
            
            <?php 
                if(isset($_SESSION['email']) && $row['broj_dostupnih_artikala'] > 0){ 
            ?>
                <a href="order.php?id=<?php echo $url_id?>" class="btn slide-btn">Naručite suplemente</a>
            <?php } else if(isset($_SESSION['email']) && $row['broj_dostupnih_artikala'] == 0) { ?>
                <div>
                    Žao nam je ali svi artikli su prodati. Na našem sajtu imate još suplemenata koje možete pogledati klikom na <a href="supplements.php">link</a>
                </div>
           
            <?php } else { ?>
                <div>
                    Ukoliko želite da naručite suplemente <a href="login.php">Ulogujte se</a>
                </div>
            <?php } ?>
        </div>

        <div class="col-lg-6 mt-3 mt-lg-0">
            <img src="./assets/img/uploads/<?php echo $row['slika']; ?>"
                 class="w-100 shadow-1-strong rounded mb-4"
                 alt="<?php echo $row['slika']; ?>"
            />
        </div>
    </div>
</div>

<?php endwhile; ?>
<?php require_once('includes/footer.php') ?>