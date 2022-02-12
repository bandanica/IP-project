<html>
<head>
    <title></title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/detaljiNekretnine.css">
</head>
<body>


<?php
if (isset($nek)) {
    ?>
    <h2><?php echo $nek->getNaziv(); ?></h2>
    <p><?php echo $nek->getGradid()->getNaziv() . " - " . $nek->getOpstina()->getNaziv() . " - " . $nek->getMikrolokacija()->getNaziv() . " - " .
            $nek->getUlica()->getNaziv(); ?></p>
    <?php
    $dir_path = $nek->getSlike();
    //echo $dir_path;
    $slike = scandir($dir_path);
    $files = array_diff(scandir($dir_path), array('.', '..'));
    ?>

<!--    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">-->
<!--        <ol class="carousel-indicators">-->
<!--            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>-->
<!--            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>-->
<!--            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>-->
<!--        </ol>-->
<!--        <div class="carousel-inner">-->
<!--            <div class="carousel-item active">-->
<!--                <img class="d-block w-100" src="..." alt="First slide">-->
<!--            </div>-->
<!--            <div class="carousel-item">-->
<!--                <img class="d-block w-100" src="..." alt="Second slide">-->
<!--            </div>-->
<!--            <div class="carousel-item">-->
<!--                <img class="d-block w-100" src="..." alt="Third slide">-->
<!--            </div>-->
<!--        </div>-->
<!--        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">-->
<!--            <span class="carousel-control-prev-icon" aria-hidden="true"></span>-->
<!--            <span class="sr-only">Previous</span>-->
<!--        </a>-->
<!--        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">-->
<!--            <span class="carousel-control-next-icon" aria-hidden="true"></span>-->
<!--            <span class="sr-only">Next</span>-->
<!--        </a>-->
<!--    </div>-->
    <?php
    $dir_path = $nek->getSlike();
//echo $dir_path;
    $slike = scandir($dir_path);
    $files = array_diff(scandir($dir_path), array('.', '..'));
    foreach ($files as $file) {
        ?>
        <img src="<?php echo base_url() . "/" . $dir_path . "/" . $file; ?>" alt="slika nekretnine" width="100"
             height="100">
        <?php
//echo $file;
        break;
    }
    ?>

    Tip:<?php echo $nek->getTip()->getNazivTipa(); ?>
    Kvadratura: <?php echo $nek->getKvadratura(); ?>m2
    Soba: <?php echo $nek->getBrSoba(); ?>
    <form method='post' action=<?php echo site_url() . "korisnik/dodajUOmiljene" ?>>
        <input type='hidden' value="<?php echo $nek->getIdn() ?>"
               name='idNek'>
        <input type="submit" id="dugmeOmiljene" value="Dodaj u omiljene">
    </form>
    <?php

}

?>
</body>
</html>
