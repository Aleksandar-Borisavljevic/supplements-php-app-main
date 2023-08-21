<?php require_once('includes/header.php'); 
      include 'config/connection.php';
 ?>

    <div>
        <!-- Slajder -->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            <!-- Paginacija -->
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./assets/img/supplements.jpg" class="d-block w-100 cover" alt="slide-1">
                    <div class="carousel-caption d-block">
                        <a href="supplements.php?message=" class="btn slide-btn">Suplementi</a>
                    </div>
                </div> 
                <div class="carousel-item">
                    <img src="./assets/img/fitness-supplements.jpg" class="d-block w-100 cover" alt="slide-2">
                    <div class="carousel-caption d-block">
                        <a href="gallery.php" class="btn slide-btn">Galerija</a>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="./assets/img/arnold.jpg" class="d-block w-100 cover" alt="slide-3">
                    <div class="carousel-caption d-block">
                        <a href="about-us.php" class="btn slide-btn">O nama</a>
                    </div>
                </div>
            </div>
            <!-- Dugme za promenu slajdova -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Sadrzaj -->
        <div class="container">
            <div class="mt-5 text-center">
                <p>Trenirajte sa nama i budite uvek:</p>
                <h1>Na samom vrhu!</h1>
            </div>

            <!-- Destinacije -->
            <div class="mt-5">
                <h2>Najnoviji suplementi</h2>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 supplement-row">
                    <?php
                    $conn = OpenCon();
                    $sql = "SELECT * FROM `suplementi` ORDER BY `suplementi`.`id` DESC LIMIT 4";
                    $result = mysqli_query($conn, $sql);
            
                    while ($row = mysqli_fetch_assoc($result)) :
                        ?>
                        <div class="col supplement-col">
                            <div class="card h-100">
                                <div class="d-flex align-items-center">
                                    <img src="./assets/img/uploads/<?php echo $row['slika']; ?>" alt="suplement" height="200" width="200" class="w-100">
                                </div>  
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['naziv_suplementa']; ?></h5>
                                    <p class="card-text"><?php echo $row['tip']; ?></p>
                                    <p class="card-text"><?php echo $row['cena']; ?> RSD</p>
                                    <p class="card-text"><?php echo $row['broj_dostupnih_artikala']; ?></p>
                                    <a href="single-supplement.php?id=<?php echo $row['id']; ?>">Pogledajte više</a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>

<?php require_once('includes/footer.php') ?>