<?php 
    require_once('includes/header.php');
    include 'config/connection.php';

    $url_id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $editName = $_POST['editName'];
        $editLastName = $_POST['editLastName'];
        $editContact = $_POST['editContact'];
        $editRole = $_POST['editRole'];

        if (empty($editName) || empty($editLastName) || empty($editContact)) {
            echo '<div class="alert alert-danger" role="alert">
                    Sva polja su obavezna!
                  </div>';
        } else {
            $conn = OpenCon();
            $query = "UPDATE korisnik 
                      SET ime = '$editName', prezime = '$editLastName', email = '$editContact', rola = '$editRole'
                      WHERE id = '$url_id';";
            mysqli_query($conn, $query);
            mysqli_close($conn);
            header("Location: profile.php");
        }
    }
?>

    <div class="container form-page">
        <div class="form-container">
            <h1>Promenite unete podatke</h1>
            <div class="mb-3">
            <?php
                $conn = OpenCon();
                $sql = "SELECT * FROM korisnik WHERE id='$url_id'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) :
                ?>
                    <form action="edit-user.php?id=<?php echo $url_id;?>" method="POST" name="editUserForm">
                        <div class="mb-3">
                            <label for="editName" class="form-label">Ime</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="editName"
                                   name="editName"
                                   autocomplete="off" 
                                   required 
                                   minlength="2"
                                   maxlength="20" 
                                   oninvalid="this.setCustomValidity(' ')" 
                                   onchange="checkForm('editUser')" 
                                   value="<?php echo $row['ime']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="editLastName" class="form-label">Prezime</label>
                            <input type="text" 
                                   class="form-control" 
                                   id="editLastName" 
                                   name="editLastName" 
                                   autocomplete="off" 
                                   required 
                                   minlength="2"
                                   maxlength="20" 
                                   oninvalid="this.setCustomValidity(' ')" 
                                   onchange="checkForm('editUser')"
                                   value="<?php echo $row['prezime']; ?>">
                        </div>

                        <div class="mb-3">
                            <label for="editContact" class="form-label">Email adresa</label>
                            <input type="email" 
                                   class="form-control" 
                                   id="editContact" 
                                   name="editContact" 
                                   autocomplete="off" 
                                   required
                                   minlength="5" 
                                   maxlength="40" 
                                   pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                                   oninvalid="this.setCustomValidity(' ')" 
                                   onchange="checkForm('editUser')"
                                   value="<?php echo $row['email']; ?>">
                        </div>

                        <?php if($_SESSION['role'] == 'admin'){ ?>
                        <div class="mb-3">
                            <label for="editRole" class="form-label">Rola</label>
                            <select class="form-control" 
                                   id="editRole" 
                                   name="editRole"
                                   onchange="checkForm('editUser')">
                                   <option value="korisnik" <?php if($row['rola'] =="korisnik") echo 'selected="selected"'; ?> >Korisnik</option>
                                   <option value="admin" <?php if($row['rola'] =="admin") echo 'selected="selected"'; ?> >Admin</option>
                            </select>
                        </div>
                        <?php } ?>

                        <button type="submit" class="btn" id="editUserBtn" disabled>Izvrši izmenu</button>
                    </form>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <script>
        initiate("editUserBtn", "form[name='editUserForm']");
    </script>

<?php require_once('includes/footer.php') ?><?php
