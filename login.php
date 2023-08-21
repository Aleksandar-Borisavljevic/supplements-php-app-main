<?php
require_once('includes/header.php');
include 'config/connection.php';

if(isset($_POST['loginContact']) && isset($_POST['loginPassword'])){
    $loginEmail = $_POST['loginContact'];
    $loginPassword = $_POST['loginPassword'];

    $conn = OpenCon();
    $sql = "SELECT * FROM korisnik WHERE email='$loginEmail' AND passwordHash=MD5('$loginPassword')";
    $result=mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)===1){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['id']=$row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['role'] = $row['rola'];
        header('Location: index.php?message=Ulogovali+ste+se');
        exit();
    } else{
        header('Location: login.php?message=Nešto+nije+uredu');
        exit();
    }
}
?>
<?php
    if(isset($_GET['message'])){
        $message = urldecode($_GET['message']);
        echo '<div class="alert alert-danger" role="alert">' . $message . '</div>';
    }
?>
<?php  
     if(isset($_SESSION['email'])){
        header("Location: index.php");
     } else {
?>
<div class="container form-page">
    <div class="form-container">
        <h1>Prijavite se</h1>

        <div class="mb-3">
            <form action="login.php" method="POST" name="login-form">
                <div class="mb-3">
                    <label for="loginContact" class="form-label">Email adresa</label>
                    <input type="email"
                           class="form-control"
                           id="loginContact"
                           name="loginContact"
                           autocomplete="off"
                           required
                           minlength="5"
                           maxlength="40"
                           pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                           oninvalid="this.setCustomValidity(' ')"
                           onchange="checkForm('login')"
                    />
                </div>

                <div class=" mb-3">
                    <label for="loginPassword" class="form-label">Šifra</label>
                    <input type="password"
                           class="form-control"
                           id="loginPassword"
                           name="loginPassword"
                           autocomplete="off"
                           required
                           pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                           oninvalid="this.setCustomValidity(' ')"
                           onchange="checkForm('login')"
                    />
                </div>

                <button type="submit" class="btn" id="logIn" name="logIn" disabled>Prijavite se</button>
            </form>
        </div>
        <div>
            <span>Nemate nalog?</span>
            <a href="registration.php">Registrujete se</a>
        </div>
    </div>
</div>

<script>
    initiate("logIn", "form[name='login-form']");
</script>

<?php
}     
?>

<?php require_once('includes/footer.php'); ?>