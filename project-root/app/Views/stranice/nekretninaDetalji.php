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


<div class="container-fluid">
    <?php
    if (isset($nek)) {
        ?>
        <div class="row" id="prviRed">
            <div class="col" id="nazivNek">
                <h2><?php echo $nek->getNaziv(); ?></h2>
            </div>
            <div class="col" id="lok">
                <p id="tekstLok"><?php echo $nek->getGradid()->getNaziv() . " - opstina " . $nek->getOpstina()->getNaziv() . " - " . $nek->getMikrolokacija()->getNaziv() . " - " .
                        $nek->getUlica()->getNaziv(); ?></p>
            </div>
            <hr>
        </div>


        <?php
        $dir_path = $nek->getSlike();
        //echo $dir_path;
        $slike = scandir($dir_path);
        $files = array_diff(scandir($dir_path), array('.', '..'));
        $dir_path = $nek->getSlike();
        $slike = scandir($dir_path);
        $files = array_diff(scandir($dir_path), array('.', '..'));

        ?>
        <div class="row" id="drugiRed">
            <div class="col-6 d-inline">
                <div class="row">
                    <div id="SlikeNekretnine" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" id="slajdovi">
                            <?php
                            $i = 0;
                            foreach ($files as $file) {
                                if ($i == 0) {

                                    $i += 1;
                                    ?>
                                    <div class="carousel-item active text-center">
                                        <img class="d-inline w-80" src="
                        <?php echo base_url() . "/" . $dir_path . "/" . $file; ?>"
                                             alt="First slide">

                                    </div>
                                    <?php
                                } else {

                                    ?>
                                    <div class="carousel-item">

                                        <img class="d-inline w-100" src="
                        <?php echo base_url() . "/" . $dir_path . "/" . $file; ?>"
                                             alt="Second slide">
                                    </div>
                                    <?php
                                    $i += 1;
                                }
                            }
                            ?>


                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#SlikeNekretnine"
                                data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#SlikeNekretnine"
                                data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="row" id="drugiRedKolonaDva">
                    <p><?php echo $nek->getCena();?> &euro;</p>
                </div>
                <div class="row">
                    <h5>Karakteristike:</h5>
                </div>
                <div class="row">
                    <?php
                    $kar = $nek->getKarakteristike();

                    ?>
                    <div class="col">
                        <?php if ($kar->getTerasa()=='da'){
                            ?>
                            <input type="checkbox" checked disabled>Terasa<br/>
                        <?php
                        }
                        else{
                            ?>
                            <input type="checkbox" disabled>Terasa<br/>
                        <?php
                        }
                        ?>
                        <?php if ($kar->getLodja()=='da'){
                            ?>
                            <input type="checkbox" checked disabled>Lodja<br/>
                            <?php
                        }
                        else{
                            ?>
                            <input type="checkbox" disabled>Lodja<br/>
                            <?php
                        }
                        ?>
                        <?php if ($kar->getFrancBalkon()=='da'){
                            ?>
                            <input type="checkbox" checked disabled>Franc. balkon<br/>
                            <?php
                        }
                        else{
                            ?>
                            <input type="checkbox" disabled>Franc. balkon<br/>
                            <?php
                        }
                        ?>
                        <?php if ($kar->getLift()=='da'){
                            ?>
                            <input type="checkbox" checked>Lift<br/>
                            <?php
                        }
                        else{
                            ?>
                            <input type="checkbox">Lift<br/>
                            <?php
                        }
                        ?>
                   </div>
                    <div class="col">
                        <?php if ($kar->getPodrum()=='da'){
                            ?>
                            <input type="checkbox" checked>Podrum<br/>
                            <?php
                        }
                        else{
                            ?>
                            <input type="checkbox">Podrum<br/>
                            <?php
                        }
                        ?>
                        <?php if ($kar->getGaraza()=='da'){
                            ?>
                            <input type="checkbox" checked>Garaza<br/>
                            <?php
                        }
                        else{
                            ?>
                            <input type="checkbox">Garaza<br/>
                            <?php
                        }
                        ?>
                        <?php if ($kar->getSaBastom()=='da'){
                            ?>
                            <input type="checkbox" checked>Sa bastom<br/>
                            <?php
                        }
                        else{
                            ?>
                            <input type="checkbox">Sa bastom<br/>
                            <?php
                        }
                        ?>
                        <?php if ($kar->getKlima()=='da'){
                            ?>
                            <input type="checkbox" checked>Klima<br/>
                            <?php
                        }
                        else{
                            ?>
                            <input type="checkbox">Klima<br/>
                            <?php
                        }
                        ?>

                    </div>
                    <div class="col">
                        <?php if ($kar->getInternet()=='da'){
                            ?>
                            <input type="checkbox" checked>Internet<br/>
                            <?php
                        }
                        else{
                            ?>
                            <input type="checkbox">Internet<br/>
                            <?php
                        }
                        ?>
                        <?php if ($kar->getTelefon()=='da'){
                            ?>
                            <input type="checkbox" checked>Telefon<br/>
                            <?php
                        }
                        else{
                            ?>
                            <input type="checkbox">Telefon<br/>
                            <?php
                        }
                        ?>

                    </div>
                </div>
            </div>

            <div class="col-6 d-inline">
                <div class="row">
                    <div class="col-2 offset-1">
                        Tip:<?php echo $nek->getTip()->getNazivTipa(); ?>
                    </div>
                    <div class="col-2 offset-1">
                        Kvadratura: <?php echo $nek->getKvadratura(); ?>m2
                    </div>
                    <div class="col-2 offset-1">
                        Soba: <?php echo $nek->getBrSoba(); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <p>Oglasivac: <?php echo $nek->getOglasivac()->getKorIme(); ?></p>
                        <p>Godina izgradnje: <?php echo date_format($nek->getGodinaIzgradnje(), 'Y'); ?></p>
                        <p>Stanje nekretnine: <?php echo $nek->getStanje(); ?></p>
                        <p>Tip grejanja:<?php echo $nek->getGrejanje(); ?></p>

                    </div>
                    <div class="col-6">
                        <p>Sprat: <?php echo $nek->getSprat(); ?></p>
                        <p>Ukupna spratnost: <?php echo $nek->getUkupnaSpratnost(); ?></p>
                        <p>Parking: <?php echo $nek->getKarakteristike()->getParking(); ?></p>

                    </div>
                </div>
                <div class="row">
                    <div class="col" id="kolonaOmiljena">
                        <form method='post' action=<?php echo site_url() . "korisnik/dodajUOmiljene" ?>>
                            <input type='hidden' value="<?php echo $nek->getIdn() ?>"
                                   name='idNek'>
                            <input type="submit" id="dugmeOmiljene" value="Dodaj u omiljene">
                        </form>
                    </div>

                </div>
                <div class="row">
                    <h5>Opis</h5>
                </div>
                <div class="row">
                    <p><?php echo $nek->getOpis();?></p>
                    <p>Prosecna cena na lokaciji:</p>
                </div>

            </div>
        </div>

        <?php

    }

    ?>

</div>
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
