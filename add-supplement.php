<?php 
    require_once('includes/header.php');
    include 'config/connection.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $supplementName = $_POST['supplementName'];
        $supplementBrand = $_POST['supplementBrand'];
        $supplementType = $_POST['supplementType'];
        $supplementPrice = $_POST['supplementPrice'];
        $availableArticles = $_POST['availableArticles'];
        $file = $_FILES['supplementImg'];
        $supplementDescription = $_POST['supplementDescription'];


        $fileName = $file['name'];
        $fileType = $file['type'];
        $fileTempName = $file['tmp_name'];
        $fileError = $file['error'];
        $fileSize = $file['size'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($fileActualExt, $allowed)) {
            if($fileError === 0) {
            if($fileSize < 1000000) {
                $before_period = strstr($fileName, '.', true);
                $fileNameNew = uniqid('', true).$before_period.".".$fileActualExt;
                $fileDestination = './assets/img/uploads/'.$fileNameNew;
                move_uploaded_file($fileTempName, $fileDestination);
            } else {
                echo '<div class="alert alert-danger" role="alert">
                        Fajl je prevelik!
                      </div>';
            }
            } else {
            echo '<div class="alert alert-danger" role="alert">
                    Nešto nije uredu
                  </div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">
                    Tip fajla nije podržan!
                  </div>';
        }
        

        if (empty($supplementName) || empty($supplementBrand) || empty($supplementType) || empty($supplementPrice) || empty($availableArticles) || empty($file) || empty($supplementDescription)) {
            echo '<div class="alert alert-danger" role="alert">
                    Sva polja su obavezna!
                  </div>';
        }  else {
            $conn = OpenCon();
            $query = "INSERT INTO suplementi (naziv_suplementa, brend, tip, cena, broj_dostupnih_artikala, slika, opis) 
                      VALUES ('$supplementName', '$supplementBrand', '$supplementType', '$supplementPrice', '$availableArticles',  '$fileNameNew', '$supplementDescription');";
            mysqli_query($conn, $query);
            mysqli_close($conn);   
        }
    }
?>

<?php 
    if(isset( $_SESSION['role'])=='admin'){
?>

    <div class="container registration-form-page">
        <div class="form-container">
            <h1>Dodajte suplement</h1>
            <div class="mb-3">
                <form action="add-supplement.php" method="POST" enctype="multipart/form-data" name="addSupplementForm" >
                    <div class="mb-3">
                        <label for="supplementName" class="form-label">Naziv suplementa</label>
                        <input type="text" 
                               class="form-control" 
                               id="supplementName"
                               name="supplementName"
                               autocomplete="off"
                               required 
                               minlength="2" 
                               maxlength="20" 
                               oninvalid="this.setCustomValidity(' ')" 
                               onchange="checkForm('addSupplement')"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="supplementBrand" class="form-label">Brend</label>
                        <input type="text" 
                               class="form-control" 
                               id="supplementBrand"
                               name="supplementBrand"
                               autocomplete="off"
                               required 
                               minlength="2" 
                               maxlength="20" 
                               oninvalid="this.setCustomValidity(' ')" 
                               onchange="checkForm('addSupplement')"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="supplementType" class="form-label">Tip</label>
                        <input type="text" 
                               class="form-control" 
                               id="supplementType"
                               name="supplementType"
                               autocomplete="off"
                               required 
                               minlength="2" 
                               maxlength="20" 
                               oninvalid="this.setCustomValidity(' ')" 
                               onchange="checkForm('addSupplement')"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="supplementPrice" class="form-label">Cena</label>
                        <input type="number" 
                               class="form-control" 
                               id="supplementPrice"
                               name="supplementPrice"
                               autocomplete="off"
                               required 
                               min="0"
                               oninvalid="this.setCustomValidity(' ')" 
                               onchange="checkForm('addSupplement')"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="availableArticles" class="form-label">Broj dostupnih artikala</label>
                        <input type="number" 
                               class="form-control" 
                               id="availableArticles"
                               name="availableArticles"
                               autocomplete="off"
                               required 
                               min="1" 
                               max="50"  
                               oninvalid="this.setCustomValidity(' ')" 
                               onchange="checkForm('addSupplement')"
                        />
                    </div>

                    
                    </div>

                    <div class="mb-3">
                        <label for="supplementImg">Slika</label>
                        <input type="file" 
                               class="form-control" 
                               id="supplementImg"
                               name="supplementImg"
                               required
                               accept="image/png, image/jpeg"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="supplementDescription">Opis</label>
                        <textarea class="form-control" 
                                  id="supplementDescription"
                                  name="supplementDescription"
                                  autocomplete="off"
                                  required 
                                  oninvalid="this.setCustomValidity(' ')" 
                                  onchange="checkForm('addSupplement')"
                                  rows="3"
                        /></textarea>
                    </div>

                    <button type="submit" class="btn" id="addSupplementId" disabled>Dodajte suplement</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        initiate("addSupplementId", "form[name='addSupplementForm']");
    </script>

<?php 

}else{
    header("Location: login.php?message=Niste+ulogovani+kao+admin.");
}
            
?>

<?php require_once('includes/footer.php') ?>
