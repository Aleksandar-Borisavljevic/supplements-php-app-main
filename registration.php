<?php
    require_once('includes/header.php');
    include 'config/connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $registrationName = $_POST['registrationName'];
        $registrationLastName = $_POST['registrationLastName'];
        $registrationContact = $_POST['registrationContact'];
        $registrationPassword = $_POST['registrationPassword'];
        $registrationConfirmPassword = $_POST['registrationConfirmPassword'];

        if (empty($registrationName) || empty($registrationLastName) || empty($registrationContact) || empty($registrationPassword) || empty($registrationConfirmPassword)) {
            echo '<div class="alert alert-danger" role="alert">
                    Sva polja su obavezna!
                  </div>';
        } else if ($registrationPassword != $registrationConfirmPassword) {
            echo '<div class="alert alert-danger" role="alert">
                    Šifre se ne poklapaju!
                  </div>';
        } else {
            $conn = OpenCon();
            $query = "INSERT INTO korisnik (ime, prezime, email, rola, passwordHash, datum_registracije)
                        VALUES ('$registrationName', '$registrationLastName', '$registrationContact', 'korisnik', '" . MD5($registrationPassword) . "', NOW())";
            mysqli_query($conn, $query);
            mysqli_close($conn);
            echo '<div class="alert alert-success" role="alert">
                      Hvala Vam što ste se registrovali. Sada možete da se <a href="login.php">ulogujete</a>
                  </div>';
        }
    }
?>
<?php  
     if(isset($_SESSION['email'])){
        header("Location: index.php");
     } else {

?>
    <div class="container registration-form-page">
        <div class="form-container">
            <h1>Registrujte se</h1>
            <div class="mb-3">
                <form action="registration.php" method="POST"
                      name="registration-form">
                    <div class="mb-3">
                        <label for="registrationName" class="form-label">Ime</label>
                        <input type="text"
                               class="form-control"
                               id="registrationName"
                               name="registrationName"
                               autocomplete="off"
                               required
                               minlength="2"
                               maxlength="20"
                               oninvalid="this.setCustomValidity(' ')"
                               onchange="checkForm('registration')"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="registrationLastName" class="form-label">Prezime</label>
                        <input type="text"
                               class="form-control"
                               id="registrationLastName"
                               name="registrationLastName"
                               autocomplete="off"
                               required
                               minlength="2"
                               maxlength="20"
                               oninvalid="this.setCustomValidity(' ')"
                               onchange="checkForm('registration')"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="registrationContact" class="form-label">Email adresa</label>
                        <input type="email"
                               class="form-control"
                               id="registrationContact"
                               name="registrationContact"
                               autocomplete="off"
                               required
                               minlength="5"
                               maxlength="40"
                               pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                               oninvalid="this.setCustomValidity(' ')"
                               onchange="checkForm('registration')"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="registrationPassword" class="form-label">Šifra</label>
                        <input type="password"
                               class="form-control"
                               id="registrationPassword"
                               name="registrationPassword"
                               autocomplete="off"
                               required
                               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                               oninvalid="this.setCustomValidity(' ')"
                               onchange="checkForm('registration')"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="registrationConfirmPassword" class="form-label">Potvrdi šifru</label>
                        <input type="password"
                               class="form-control"
                               id="registrationConfirmPassword"
                               name="registrationConfirmPassword"
                               autocomplete="off"
                               required
                               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                               oninvalid="this.setCustomValidity(' ')"
                               onchange="checkForm('registration')"
                        />
                    </div>

                    <button type="submit" class="btn" id="registerBtn" disabled>Registruj se</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        initiate("registerBtn", "form[name='registration-form']");
    </script>
    
<?php
}     
?>

<?php require_once('includes/footer.php') ?>