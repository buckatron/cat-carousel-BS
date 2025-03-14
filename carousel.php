<?php 
    include "src/functions.php";
    $breed_id = $_GET['breed_id'];
    global $api_key;

    //get all info and parse it
    $breed_response = getBreedInfo($breed_id, api_key);

    //get pics
    $image_response = getImages($breed_id, $api_key);

    //set vars for main info
    $breed_name = $breed_response['name'];
    $temperament = $breed_response['temperament'];
    $origin = $breed_response['origin'];
    $description = $breed_response['description'];

    //set vars for ratings 
    $affection = $breed_response['affection_level'] ?? 3;
    $energy = $breed_response['energy_level'] ?? 3;
    $dog_friendly = $breed_response['dog_friendly'] ?? 3;
    $health_issues = $breed_response['health_issues'] ?? 3;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cat Carousel</title>

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php">Cat Carousel</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                </div>
            </div>
        </nav>
        <!-- Page content -->
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="carousel-wrapper">
                        <div id="catCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                <?php foreach ($image_response as $index => $image) : ?>
                                    <button type="button" data-bs-target="#catCarousel" data-bs-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>"></button>
                                <?php endforeach; ?>
                            </div>

                            <div class="carousel-inner">
                                <?php foreach ($image_response as $index => $image) : ?>
                                    <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                                        <img src="<?= $image['url'] ?>" class="d-block w-100" alt="Cat Image">
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#catCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#catCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>
                        </div>
                        <p class="mt-3"><a href="index.php">Select a different breed</a></p>
                    </div>
                </div>

                <div class="col-md-6">
                    <h2><?= $breed_name ?></h2>
                    <p><strong>Temperament:</strong> <?= $temperament ?></p>
                    <p><strong>Origin:</strong> <?= $origin ?></p>
                    <p><strong>Description:</strong> <?= $description ?></p>
                    
                    <p><strong>Affection:</strong> <?= generateStars($affection) ?></p>
                    <p><strong>Energy Level:</strong> <?= generateStars($energy) ?></p>
                    <p><strong>Dog Friendliness:</strong> <?= generateStars($dog_friendly) ?></p>
                    <p><strong>Health Issues:</strong> <?= generateStars($health_issues) ?></p>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>