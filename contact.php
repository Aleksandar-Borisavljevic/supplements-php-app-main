<?php 
    require_once('includes/header.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nameContact = $_POST['nameContact'];
        $emailContact = $_POST['emailContact'];
        $messageContact = $_POST['messageContact'];

        $to = "napstericious@gmail.com";
        $subject = "Contact form submission from $nameContact";
        $body = "Name: $nameContact\nEmail: $emailContact\nMessage: $messageContact";
        // mail($to, $subject, $body);

         echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Uspešno ste poslali poruku!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
?>

<div class="container form-page">
    <div class="form-container">
        <h1>Kontakt</h1>
        <div>
            <form action="contact.php" method="POST" name="contact-form">
                <div class="mb-3">
                    <label for="nameContact" class="form-label">Ime</label>
                    <input type="text" class="form-control" id="nameContact"  name="nameContact"
                           minlength="2" maxlength="20"
                           required oninvalid="this.setCustomValidity(' ')" onchange="checkForm('contact')">
                </div>
                <div class="mb-3">
                    <label for="emailContact" class="form-label">Email adresa</label>
                    <input type="email" class="form-control" id="emailContact"  name="emailContact"
                           minlength="5" maxlength="40" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                           required oninvalid="this.setCustomValidity(' ')" onchange="checkForm('contact')">
                </div>
                <div class="mb-3">
                    <label for="messageContact" class="form-label">Poruka</label>
                    <textarea class="form-control" id="messageContact" name="messageContact" rows="3" required oninvalid="this.setCustomValidity(' ')" onchange="checkForm('contact')" minlength="10" maxlength="100"></textarea>
                </div>
                <button type="submit" class="btn" id="contactBtn" disabled>Pošalji poruku</button>
            </form>
        </div>
    </div>
</div>

    <script>
        initiate("contactBtn", "form[name='contact-form']");
    </script>

<?php require_once('includes/footer.php') ?>