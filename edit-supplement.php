<?php 
    require_once('includes/header.php');  
    include 'config/connection.php';

    $url_id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $editSupplementName = $_POST['editSupplementName'];
        $editSupplementBrand = $_POST['editSupplementBrand'];
        $editSupplementType = $_POST['editSupplementType'];
        $editSupplementPrice = $_POST['editSupplementPrice'];
        $editAvailableArticles = $_POST['editAvailableArticles'];
        $editSupplementDescription = $_POST['editSupplementDescription'];


        if (empty($editSupplementName) || empty($editSupplementBrand) || empty($editSupplementType) || empty($editSupplementPrice) || empty($editAvailableArticles) || empty($editSupplementDescription)) {
            echo '<div class="alert alert-danger" role="alert">
                    Sva polja su obavezna!
                  </div>';
        } else {
            $conn = OpenCon();
            $query = "UPDATE suplementi 
                      SET naziv_suplementa = '$editSupplementName', brend = '$editSupplementBrand', tip = '$editSupplementType', broj_dostupnih_artikala = '$editAvailableArticles', opis = '$editSupplementDescription', cena = $editSupplementPrice
                      WHERE id = '$url_id';";
            mysqli_query($conn, $query);
            mysqli_close($conn);
            header("Location: supplements.php?message=edit");
        }
    }
?>

<div class="container registration-form-page">
    <div class="form-container">
        <h1>Promenite unete podatke</h1>
        <div class="mb-3">
            <form action="edit-supplement.php?id=<?php echo $url_id;?>" method="POST" name="editSupplementForm">
                <?php
                    $id = $_SESSION['id'];
                    $conn = OpenCon();
                    $sql = "SELECT * FROM suplementi WHERE id='$url_id '";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) :
                ?>
                

                <div class="mb-3">
                    <label for="editSupplementName" class="form-label">Naziv suplementa</label>
                    <input type="text" 
                           class="form-control" 
                           id="editSupplementName"  
                           name="editSupplementName"  
                           required 
                           minlength="2" 
                           maxlength="20" 
                           oninvalid="this.setCustomValidity(' ')" 
                           onchange="checkForm('editSupplement')"
                           value="<?php echo $row['naziv_suplementa'] ?>"
                    />
                </div>

                <div class="mb-3">
                    <label for="editSupplementBrand" class="form-label">Brend</label>
                    <input type="text" 
                           class="form-control" 
                           id="editSupplementBrand"
                           name="editSupplementBrand"
                           required 
                           minlength="2" 
                           maxlength="20" 
                           oninvalid="this.setCustomValidity(' ')" 
                           onchange="checkForm('editSupplement')"
                           value="<?php echo $row['brend'] ?>"
                    />
                </div>

                <div class="mb-3">
                    <label for="editSupplementType" class="form-label">Tip</label>
                    <input type="text" 
                           class="form-control" 
                           id="editSupplementType"
                           name="editSupplementType"
                           required 
                           minlength="2" 
                           maxlength="20" 
                           oninvalid="this.setCustomValidity(' ')" 
                           onchange="checkForm('editSupplement')"
                           value="<?php echo $row['tip'] ?>"
                    />
                </div>

                <div class="mb-3">
                        <label for="editSupplementPrice" class="form-label">Cena</label>
                        <input type="number" 
                               class="form-control" 
                               id="editSupplementPrice"
                               name="editSupplementPrice"
                               autocomplete="off"
                               required 
                               min="0"
                               oninvalid="this.setCustomValidity(' ')" 
                               onchange="checkForm('editSupplement')"
                               value="<?php echo $row['cena'] ?>"
                        />
                    </div>

                <div class="mb-3">
                    <label for="editAvailableArticles" class="form-label">Broj dostupnih artikala</label>
                    <input type="number" 
                           class="form-control" 
                           id="editAvailableArticles" 
                           name="editAvailableArticles"  
                           required 
                           min="1" 
                           max="50" 
                           oninvalid="this.setCustomValidity(' ')" 
                           onchange="checkForm('editSupplement')"
                           value="<?php echo $row['broj_dostupnih_artikala'] ?>"
                    />
                </div>


                <div class="mb-3">
                    <label for="supplementDescription">Opis</label>
                        <textarea class="form-control" 
                                  id="editSupplementDescription"
                                  name="editSupplementDescription"
                                  autocomplete="off"
                                  required 
                                  oninvalid="this.setCustomValidity(' ')" 
                                  onchange="checkForm('editSupplement')"
                                  rows="3"
                        ><?php echo $row['opis'] ?></textarea>
                </div>
                <?php endwhile; ?>

                <button type="submit" class="btn" id="editSupplementBtn" disabled>Izvrši izmenu</button>
            </form>
        </div>
    </div>
</div>

<script>
    initiate("editSupplementBtn", "form[name='editSupplementForm']");
</script>

<?php require_once('includes/footer.php') ?>
