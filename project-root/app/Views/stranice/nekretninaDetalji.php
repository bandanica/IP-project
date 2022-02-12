<html>
<head>
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
    $dir_path = $nek->getSlike();
    $slike = scandir($dir_path);
    $files = array_diff(scandir($dir_path), array('.', '..'));

    ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            $i = 0;
            foreach ($files as $file) {
                if ($i == 0) {
                    $i += 1;
                    ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <?php
                } else {
                    ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>"></li>
                    <?php
                    $i += 1;
                }
                ?>

                <?php
            }
            ?>


        </ol>
        <div class="carousel-inner">
            <?php
            $i = 0;
            foreach ($files as $file) {
                if ($i == 0) {
                    $i += 1;
                    ?>
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?php echo base_url() . "/" . $dir_path . "/" . $file; ?>"
                             alt="First slide">
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo base_url() . "/" . $dir_path . "/" . $file; ?>"
                             alt="Second slide">
                    </div>
                    <?php
                }
            }
            ?>


        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


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
