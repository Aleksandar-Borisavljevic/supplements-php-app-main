<?php
    require_once('includes/header.php');
    include 'config/connection.php';
    

    if(isset($_GET['message'])) {
        $message = $_GET['message'];
        
        if($message == 'porudzbina'){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Uspešno ste obavili porudžbinu
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }else if($message=='edit'){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Uspešno ste izmenili porudžbinu.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else if($message == 'delete'){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Uspešno ste obrisali porudžbinu.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    }
?>

    <div class="container destination">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center mb-3">
            <h1 class="mt-2 mb-3">Suplementi</h1>
            <?php 
                if (session_status() == PHP_SESSION_ACTIVE) {
                    if(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
                    echo '<a href="add-supplement.php" class="btn">Dodaj suplement</a>';
                    }
                }
            ?>
        </div>
 
        <div class="mb-3">
            <!-- <button class="btn mb-2" 
                    id="showFormBtn" 
                    type="button" 
                    data-toggle="collapse" 
                    data-target="#formContainer" 
                    aria-expanded="false" 
                    aria-controls="#formContainer">Prikaži formu </button> -->
            
            <button class="btn mb-2" 
                    id="showFormBtn" 
                    >Prikaži formu za pretragu</button>

            <div class="form-container d-none" id="formContainer">
                <form method="GET" name="searchForm" action="supplements.php">
                    <!-- <label for="search-input">Search</label>
                    <input type="text" id="search-input" name="search" placeholder="Enter search term" autocomplete="off"/> -->
                    <h4>Pretraga: </h4>
                    <div class="mb-3">
                        <label for="searchSupplement" class="form-label">Naziv suplementa</label>
                        <input type="text" 
                            class="form-control" 
                            id="searchSupplement"
                            name="searchSupplement"
                            autocomplete="off"
                            minlength="2"
                            maxlength="20"
                            onchange="checkForm('search')"
                            oninvalid="this.setCustomValidity(' ')"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="searchBrand" class="form-label">Brend</label>
                        <input type="text" 
                            class="form-control" 
                            id="searchBrand"
                            name="searchBrand"
                            autocomplete="off"
                            minlength="2" 
                            maxlength="20"
                            onchange="checkForm('search')"
                            oninvalid="this.setCustomValidity(' ')"
                        />
                    </div>

                    <div class="mb-3">
                        <label for="searchType" class="form-label">Tip</label>
                        <input type="text" 
                            class="form-control" 
                            id="searchType"
                            name="searchType"
                            autocomplete="off"
                            minlength="2" 
                            maxlength="20"
                            onchange="checkForm('search')"
                            oninvalid="this.setCustomValidity(' ')"
                        />
                    </div>

                    <button type="submit" class="btn" id="searchId" disabled>Pretraži</button>
                </form>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 supplement-row">
            <?php
            if(isset($_GET['searchSupplement']) || isset($_GET['searchBrand']) || isset($_GET['searchType'])) {
                $searchSupplement = $_GET['searchSupplement'];
                $searchBrand = $_GET['searchBrand'];
                $searchType = $_GET['searchType'];

                $conn = OpenCon();
                $sql = "SELECT * FROM suplementi WHERE 1=1";

                if(empty($_GET['searchSupplement']) && empty($_GET['searchBrand']) && empty($_GET['searchType'])){
                    $sql = "SELECT * FROM `suplementi` ORDER BY `suplementi`.`id` DESC";
                }
                if (!empty($_GET['searchSupplement'])) {
                    $sql .= " AND naziv_suplementa LIKE '%" . mysqli_real_escape_string($conn, $_GET['searchSupplement']) . "%'";
                }
                
                if (!empty($_GET['searchBrand'])) {
                    $sql .= " AND brend LIKE '%" . mysqli_real_escape_string($conn, $_GET['searchBrand']) . "%'";
                }
                
                if (!empty($_GET['searchType'])) {
                    $sql .= " AND tip LIKE '%" . mysqli_real_escape_string($conn, $_GET['searchType']) . "%'";
                }
                

                // Execute the query
                // echo $sql;
                $result = mysqli_query($conn, $sql);
            } else {
                $conn = OpenCon();
                $sql = "SELECT * FROM `suplementi` ORDER BY `suplementi`.`id` DESC";
                $result = mysqli_query($conn, $sql);
            }
            while ($row = mysqli_fetch_assoc($result)) :
                ?>
                <div class="col supplement-col">
                    <div class="card h-100">
                        <div class="d-flex align-items-center">
                            <img src="./assets/img/uploads/<?php echo $row['slika']; ?>" alt="suplement" height="200" width="200" class="w-100">
                        </div>  
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['naziv_suplementa']; ?></h5>
                            <p class="card-text"><?php echo $row['brend']; ?></p>
                            <p class="card-text"><?php echo $row['cena']; ?> RSD</p>
                            <p class="card-text"><?php echo "Na stanju: ".$row['broj_dostupnih_artikala']; ?></p>
                            <a href="single-supplement.php?id=<?php echo $row['id']; ?>">Pogledajte više</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

<script>
     initiate("searchId", "form[name='searchForm']");
    document.getElementById("showFormBtn").addEventListener("click", function() {
        document.getElementById("formContainer").classList.toggle("d-none");
        if(document.getElementById("formContainer").classList.contains("d-none")){
            document.getElementById("showFormBtn").innerHTML = "Prikaži formu za pretragu"
        } else {
            document.getElementById("showFormBtn").innerHTML = "Sakrij formu za pretragu"
        }
    });

</script>

<?php require_once('includes/footer.php') ?>