<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"-->
    <!--          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/detaljiNekretnine.css">
    <title></title>
</head>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


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

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
<!--        <ol class="carousel-indicators">-->
<!--            --><?php
//            $i = 0;
//            foreach ($files as $file) {
//                if ($i == 0) {
//                    $i += 1;
//                    ?>
<!--                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>-->
<!--                    --><?php
//                } else {
//                    ?>
<!--                    <li data-target="#carouselExampleIndicators" data-slide-to="--><?php //echo "$i"; ?><!--"></li>-->
<!--                    --><?php
//                    $i += 1;
//                }
//                ?>
<!---->
<!--                --><?php
//            }
//            ?>
<!---->
<!---->
<!--        </ol>-->
        <div class="carousel-inner">

            <?php
            $i = 0;
            foreach ($files as $file) {
                if ($i == 0) {

                    $i += 1;
                    ?>
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="
                        <?php echo base_url() . "/" . $dir_path . "/" . $file; ?>"
                             alt="First slide">

                    </div>
                    <?php
                } else {

                    ?>
                    <div class="carousel-item">

                        <img class="d-block w-100" src="
                        <?php echo base_url() . "/" . $dir_path . "/" . $file; ?>"
                             alt="Second slide">
                    </div>
                    <?php
                    $i += 1;
                }
            }
            ?>


        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
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


<!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"-->
<!--        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"-->
<!--        crossorigin="anonymous"></script>-->
<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"-->
<!--        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"-->
<!--        crossorigin="anonymous"></script>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>
