<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"-->
    <!--          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/detaljiNekretnine.css">
    <script src="<?php echo base_url(); ?>/js/nekretninaDetalji.js"></script>
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
        <div class="col float-right" id="nazivNek">
            <h2><?php echo $nek->getNaziv(); ?></h2>
        </div>
        <div class="col float-center" id="lok">
            <p class="float-center"><?php echo $nek->getGradid()->getNaziv() . " - opstina " . $nek->getOpstina()->getNaziv() . " - " . $nek->getMikrolokacija()->getNaziv() . " - " .
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
    $max = count($files);
    $s1 = rand(0,$max);
    $s2 = $s1;
    while ($s1==$s2){
        $s2 = rand(0,$max);
    }
    $s3=$s2;
    while ($s1==$s3 || $s2==$s3){
        $s3 = rand(0,$max);
    }

    echo $s1;
    echo $s2;
    echo $s3;
    ?>
    <div class="row" id="drugiRed">
        <div class="col-6 d-inline">
            <div id="SlikeNekretnine" class="carousel carousel-dark slide" data-bs-ride="carousel">
                <div class="carousel-inner" id="slajdovi">
                    <?php
                    $i = -1;
                    $j=0;
                    foreach ($files as $file) {
                        $i+=1;
                        if ($i==$s1 || $i==$s2 || $i==$s3){
                            if ($i == $s1) {

                                ?>
                                <div class="carousel-item active text-center">
                                    <img class="d-inline w-80" src="
                        <?php echo base_url() . "/" . $dir_path . "/" . $file; ?>"
                                         alt="First slide" style="height: 100%">

                                </div>
                                <?php
                            } else {

                                ?>
                                <div class="carousel-item text-center">

                                    <img class="d-inline w-80" src="
                        <?php echo base_url() . "/" . $dir_path . "/" . $file; ?>"
                                         alt="Second slide" style="height: 100%">
                                </div>
                                <?php

                            }
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
        <div class="col-6 d-inline">
            <div class="row">
                <div class="col text-center" id="tip1">
                    Tip:<?php echo $nek->getTip()->getNazivTipa(); ?>
                </div>
                <div class="col text-center" id="tip1">
                    Kvadratura: <?php echo $nek->getKvadratura(); ?>m2
                </div>
                <div class="col text-center" id="tip1">
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
        </div>

    </div>
    <div class="row" id="treciRed">
        <div class="col-6" id="desnoTekst">
            <p class="cenaNekretnine"><?php echo $nek->getCena(); ?> &euro;</p>
        </div>
        <div class="col-6" id="desnoTekst">
            <form method='post' action=<?php echo site_url() . "korisnik/dodajUOmiljene" ?>>
                <input type='hidden' value="<?php echo $nek->getIdn() ?>"
                       name='idNek'>
                <!--                    <br/>-->
                <!--                    <br/>-->
                <input type="submit" id="dugmeOmiljene" value="Dodaj u omiljene">
            </form>
        </div>
    </div>
    <div class="row" id="cetvrtiRed">
        <div class="col">
            <div class="card text-dark bg-light">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="true">Karakteristike:</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="row">
                        <?php
                        $kar = $nek->getKarakteristike();

                        ?>
                        <div class="col">
                            <?php if ($kar->getTerasa() == 'da') {
                                ?>
                                <input type="checkbox" checked onclick="return false">Terasa<br/>
                                <?php
                            } else {
                                ?>
                                <input type="checkbox" onclick="return false">Terasa<br/>
                                <?php
                            }
                            ?>
                            <?php if ($kar->getLodja() == 'da') {
                                ?>
                                <input type="checkbox" checked onclick="return false">Lodja<br/>
                                <?php
                            } else {
                                ?>
                                <input type="checkbox" onclick="return false">Lodja<br/>
                                <?php
                            }
                            ?>
                            <?php if ($kar->getFrancBalkon() == 'da') {
                                ?>
                                <input type="checkbox" checked onclick="return false">Franc. balkon<br/>
                                <?php
                            } else {
                                ?>
                                <input type="checkbox" onclick="return false">Franc. balkon<br/>
                                <?php
                            }
                            ?>
                            <?php if ($kar->getLift() == 'da') {
                                ?>
                                <input type="checkbox" checked onclick="return false">Lift<br/>
                                <?php
                            } else {
                                ?>
                                <input type="checkbox" onclick="return false">Lift<br/>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="col">
                            <?php if ($kar->getPodrum() == 'da') {
                                ?>
                                <input type="checkbox" checked onclick="return false">Podrum<br/>
                                <?php
                            } else {
                                ?>
                                <input type="checkbox" onclick="return false">Podrum<br/>
                                <?php
                            }
                            ?>
                            <?php if ($kar->getGaraza() == 'da') {
                                ?>
                                <input type="checkbox" checked onclick="return false">Garaza<br/>
                                <?php
                            } else {
                                ?>
                                <input type="checkbox" onclick="return false">Garaza<br/>
                                <?php
                            }
                            ?>
                            <?php if ($kar->getSaBastom() == 'da') {
                                ?>
                                <input type="checkbox" checked onclick="return false">Sa bastom<br/>
                                <?php
                            } else {
                                ?>
                                <input type="checkbox" onclick="return false">Sa bastom<br/>
                                <?php
                            }
                            ?>
                            <?php if ($kar->getKlima() == 'da') {
                                ?>
                                <input type="checkbox" checked onclick="return false">Klima<br/>
                                <?php
                            } else {
                                ?>
                                <input type="checkbox" onclick="return false">Klima<br/>
                                <?php
                            }
                            ?>

                        </div>
                        <div class="col">
                            <?php if ($kar->getInternet() == 'da') {
                                ?>
                                <input type="checkbox" checked onclick="return false">Internet<br/>
                                <?php
                            } else {
                                ?>
                                <input type="checkbox" onclick="return false">Internet<br/>
                                <?php
                            }
                            ?>
                            <?php if ($kar->getInterfon() == 'da') {
                                ?>
                                <input type="checkbox" checked onclick="return false">Interfon<br/>
                                <?php
                            } else {
                                ?>
                                <input type="checkbox" onclick="return false">Interfon<br/>
                                <?php
                            }
                            ?>
                            <?php if ($kar->getTelefon() == 'da') {
                                ?>
                                <input type="checkbox" checked onclick="return false">Telefon<br/>
                                <?php
                            } else {
                                ?>
                                <input type="checkbox" onclick="return false">Telefon<br/>
                                <?php
                            }
                            ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-dark bg-light">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="true">Opis</a>
                        </li>

                    </ul>
                </div>
                <div class="card-body">
                    <p><?php echo $nek->getOpis(); ?></p>
                    <p>Prosecna cena na lokaciji:</p>
                </div>
            </div>
        </div>
        <div class="row">


            <?php
            if ($nek->getOglasivac()->getTip()->getTipKorisnika() == 'agent') {
                ?>
                <div class="col-2">
                    <h4>Agencija:</h4>
                </div>
                <div class="col-2">
                    <?php $agencija = $nek->getAgencija()->getNaziv();
                    $grad = $nek->getAgencija()->getIdgrada()->getNaziv();
                    $pib = $nek->getAgencija()->getPib();?>
                    <p><?php echo $agencija; ?></p>
                </div>
                <div class="col-2">
                    <p><?php echo "Grad: ". "$grad";?></p>
                </div>
                <div class="col-2">
                    <p><?php echo "PIB: ". "$pib";?></p>
                </div>
                <div class="col-2">
                    <?php
                    $ime = $nek->getOglasivac()->getIme();
                    $prezime = $nek->getOglasivac()->getPrezime(); ?>
                    <p><?php echo "$ime" . " $prezime"; ?></p>

                </div>
                <div class="col-2">
                    <?php $brlic = $nek->getOglasivac()->getBrLicence(); ?>
                    <p><?php echo "Broj licence: " . "$brlic"; ?></p>
                </div>
                <div class="col-2">
                    <input type="button" name="pokaziTel" onclick="prikazTelefona()" value="+">
                    <?php $telefon = $nek->getOglasivac()->getTelefon(); ?>
                    <p hidden id="brTel"><?php echo "Kontakt telefon: " . "$telefon"; ?></p>
                </div>
                <?php

            } else {
                ?>
                <div class="col-2">
                    <h4>Oglasivac:</h4>
                </div>
                <div class="col-2">
                    <?php $ime = $nek->getOglasivac()->getIme();
                    $prezime = $nek->getOglasivac()->getPrezime(); ?>
                    <p><?php echo "$ime" . " $prezime"; ?></p>
                </div>
                <div class="col-2">
                    <input type="button" name="pokaziTel" onclick="prikazTelefona()" value="+">
                    <?php $telefon = $nek->getOglasivac()->getTelefon(); ?>
                    <p hidden id="brTel"><?php echo "Kontakt telefon: " . "$telefon"; ?></p>
                </div>

                <?php

            }
            ?>

        </div>


        <?php

        }

        ?>

    </div>
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
