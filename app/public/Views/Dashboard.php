<?php

// $d = DishRepository::getDishById(2);
// var_dump($d);

// echo $d->getId();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <title>Dashboard</title>
</head>

<body class="p-2">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">RU</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="/">Dashboard</a>

                <?php if (!empty($_SESSION['logged-in']) && $_SESSION['logged-in']) : ?>
                    <form method="POST" action="/login">
                        <input type="hidden" name="logout" value="true">
                        <button class="btn btn-link" type="submit">Logout</button>
                    </form>
                <?php endif; ?>

                <?php if (!(!empty($_SESSION['logged-in']) && $_SESSION['logged-in'])) : ?>
                    <a class="nav-item nav-link" href="/dish">Login</a>
                <?php endif; ?>


                <?php if (!empty($_SESSION['logged-in']) && $_SESSION['logged-in']) : ?>
                    <a class="nav-item nav-link" href="/dish">Dishes</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>




    <h1 class="mb-2">Bem vindo, João</h1>
    <h4>Com fome de RU ?</h4>


    <div class="card" style="width: auto;">
        <img src="<?= DishRepository::getDishById(1)->getUrl() ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= DishRepository::getDishById(1)->getName() ?></h5>
            <p class="card-text"><?= DishRepository::getDishById(1)->getDescription() ?></p>
        </div>
    </div>



    <div class="container-fluid mt-3">
        <div class="row flex-row flex-nowrap overflow-auto">
            <?php foreach (DishRepository::getDishes() as $index => $dish) : ?>
                <div class="col-8">
                    <div class="card card-block">
                        <img src="<?= $dish->getUrl() ?>" class="card-img-top" style="height: 200px;">
                        <div class="card-body" style="height: 80px;">
                            <h5 class="card-title" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                <?= $dish->getName() ?></h5>
                            <p class="card-text" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                <?= $dish->getDescription() ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- 
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <?php foreach (DishRepository::getDishes() as $dish) : ?>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= $dish->getUrl() ?>" class="d-block w-100" alt="...">
                </div>
            </div>
        <?php endforeach; ?>

        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div> -->







    <style>
        .navbar-nav .btn-link {
            padding: 0;
            color: rgba(0, 0, 0, .5)
        }
    </style>

</body>

</html>