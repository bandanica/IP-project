<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/osnova.css">
    <script src="<?php echo base_url(); ?>/js/novaNek.js"></script>
</head>
<body>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container-fluid sredina">
    <div class="row">
        <div class="col oglas">


            <div class="row pt-4">
                <div class="text-center bg-light shadow w-50 justify-content-center border">
                    <div class="col">
                        <div class="row pt-4">
                            <h2>Azuriranje nekretnine</h2>
                        </div>
                        <?php

                        if (isset($nek)) {
                            ?>
                            <div class="row pt-4">
                                <div class="col">
                                    <form method="post" action=<?php echo site_url() . "oglasivac/zavrsiAzuriranje" ?>>
                                        <input type="hidden" name="idN" value="<?php echo $nek->getIdn(); ?>">
                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                Naziv nekretnine:
                                            </div>
                                            <div class="col text-start">
                                                <input type="text" name="nazivN" class="form-control"
                                                       value=<?php echo $nek->getNaziv(); ?>>
                                            </div>
                                            <div class="col-2">

                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                Kvadratura:
                                            </div>
                                            <div class="col text-start">
                                                <input type="text" name="kvadratura" class="form-control"
                                                       value=<?php echo $nek->getKvadratura(); ?>>
                                            </div>
                                            <div class="col-2">

                                            </div>
                                        </div>

                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                Broj soba:
                                            </div>
                                            <div class="col text-start">
                                                <select name="brsoba" class="form-select">
                                                    <option selected><?php echo $nek->getBrSoba(); ?></option>
                                                    <option>1</option>
                                                    <option>1.5</option>
                                                    <option>2</option>
                                                    <option>2.5</option>
                                                    <option>3</option>
                                                    <option>3.5</option>
                                                    <option>4</option>
                                                    <option>4.5</option>
                                                    <option>5</option>
                                                    <option>5+</option>
                                                </select>
                                            </div>
                                            <div class="col-2">

                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                Godina izgradnje:
                                            </div>
                                            <div class="col text-start">
                                                <input type="date" name="dizgradnje"
                                                       value=<?php echo $nek->getGodinaIzgradnje()->format('Y-m-d') ?>>
                                            </div>
                                            <div class="col-2">

                                            </div>
                                        </div>
                                        <div class="row pb-2">
                                            <div class="col-4 offset-2 text-center">
                                                Stanje:
                                            </div>
                                            <div class="col text-start">
                                                <input type="radio" name="stanje" value="izvorno"
                                                       checked="<?php $nek->getStanje() == "izvorno"; ?>">Izvorno
                                            </div>
                                            <div class="col text-start">
                                                <input type="radio" name="stanje" value="renovirano"
                                                       checked="<?php $nek->getStanje() == "renovirano"; ?>">Renovirano
                                            </div>
                                            <div class="col text-start">
                                                <input type="radio" name="stanje" value="lux"
                                                       checked="<?php $nek->getStanje() == "lux"; ?>">LUX
                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                Sprat:
                                            </div>
                                            <div class="col text-start">
                                                <input type="text" class="form-control" name="sprat"
                                                       value=<?php echo $nek->getSprat(); ?>>
                                            </div>
                                            <div class="col-2">

                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                Ukupna spratnost:
                                            </div>
                                            <div class="col text-start">
                                                <input type="text" name="ukspratnost" class="form-control"
                                                       value=<?php echo $nek->getUkupnaSpratnost(); ?>>
                                            </div>
                                            <div class="col-2">

                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                Kratak opis:
                                            </div>
                                            <div class="col text-start">
                                                <input type="text" name="opisNek" class="form-control"
                                                       value=<?php echo $nek->getOpis(); ?>>
                                            </div>
                                            <div class="col-2">

                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                Mesecni troskovi:
                                            </div>
                                            <div class="col text-start">
                                                <input type="text" name="mesTroskovi" class="form-control"
                                                       value=<?php echo $nek->getMesecniTroskovi(); ?>>
                                            </div>
                                            <div class="col-2">

                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                Cena:
                                            </div>
                                            <div class="col text-start">
                                                <input type="text" class="form-control" name="cenaNekretnine"
                                                       value=<?php echo $nek->getCena(); ?>>
                                            </div>
                                            <div class="col-2">

                                            </div>
                                        </div>
                                        <div class="row pb-2">
                                            <div class="col-4 text-center">
                                                Karakteristike:
                                            </div>
                                        </div>
                                        <div class="row pb-2">
                                            <div class="col">
                                                <?php $k = $nek->getKarakteristike(); ?>
                                                <?php
                                                if ($k->getTerasa() == 'da') {
                                                    ?>

                                                    <input type="checkbox" id="ter" name="terasa" checked>
                                                    <label for="terasa">Terasa</label>

                                                    <?php
                                                } else {
                                                    ?>

                                                    <input type="checkbox" id="ter" name="terasa">
                                                    <label for="terasa">Terasa</label>

                                                    <?php
                                                }
                                                if ($k->getLodja() == 'da') {
                                                    ?>
                                                    <input type="checkbox" id="lodja" name="lodja" checked>
                                                    <label for="lodja">Lodja</label>

                                                    <?php
                                                } else {
                                                    ?>
                                                    <input type="checkbox" id="lodja" name="lodja">
                                                    <label for="lodja">Lodja</label>
                                                    <?php
                                                }

                                                if ($k->getLift() == 'da') {
                                                    ?>
                                                    <input type="checkbox" id="lift" name="lift" checked>
                                                    <label for="lift">Lift</label>

                                                    <?php
                                                } else {
                                                    ?>
                                                    <input type="checkbox" id="lift" name="lift">
                                                    <label for="lift">Lift</label>
                                                    <?php
                                                }
                                                if ($k->getFrancBalkon() == 'da') {
                                                    ?>
                                                    <input type="checkbox" id="franbalkon" name="balkon" checked>
                                                    <label for="balkon">Francuski balkon</label>

                                                    <?php
                                                } else {
                                                    ?>
                                                    <input type="checkbox" id="franbalkon" name="balkon">
                                                    <label for="balkon">Francuski balkon</label>
                                                    <?php
                                                }
                                                if ($k->getPodrum() == 'da') {
                                                    ?>
                                                    <input type="checkbox" id="pod" name="podrum" checked>
                                                    <label for="podrum">Podrum</label>

                                                    <?php
                                                } else {
                                                    ?>
                                                    <input type="checkbox" id="pod" name="podrum">
                                                    <label for="podrum">Podrum</label>
                                                    <?php
                                                }
                                                if ($k->getGaraza() == 'da') {
                                                    ?>
                                                    <input type="checkbox" id="gar" name="garaza" checked>
                                                    <label for="garaza">Garaza</label>

                                                    <?php
                                                } else {
                                                    ?>
                                                    <input type="checkbox" id="gar" name="garaza">
                                                    <label for="garaza">Garaza</label>
                                                    <?php
                                                }
                                                if ($k->getSaBastom() == 'da') {
                                                    ?>
                                                    <input type="checkbox" id="basta" name="basta" checked>
                                                    <label for="basta">Basta</label>

                                                    <?php
                                                } else {
                                                    ?>
                                                    <input type="checkbox" id="basta" name="basta">
                                                    <label for="basta">Basta</label>
                                                    <?php
                                                }
                                                if ($k->getKlima() == 'da') {
                                                    ?>
                                                    <input type="checkbox" id="klima" name="klima" checked>
                                                    <label for="klima">Klima</label>

                                                    <?php
                                                } else {
                                                    ?>
                                                    <input type="checkbox" id="klima" name="klima">
                                                    <label for="klima">Klima</label>
                                                    <?php
                                                }
                                                if ($k->getInternet() == 'da') {
                                                    ?>
                                                    <input type="checkbox" id="internet" name="internet" checked>
                                                    <label for="internet">Internet</label>

                                                    <?php
                                                } else {
                                                    ?>
                                                    <input type="checkbox" id="internet" name="internet">
                                                    <label for="internet">Internet</label>
                                                    <?php
                                                }
                                                if ($k->getInterfon() == 'da') {
                                                    ?>
                                                    <input type="checkbox" id="interfon" name="interfon" checked>
                                                    <label for="interfon">Interfon</label>

                                                    <?php
                                                } else {
                                                    ?>
                                                    <input type="checkbox" id="interfon" name="interfon">
                                                    <label for="interfon">Interfon</label>
                                                    <?php
                                                }
                                                if ($k->getTelefon() == 'da') {
                                                    ?>
                                                    <input type="checkbox" id="telefon" name="telefon" checked>
                                                    <label for="telefon">Telefon</label>

                                                    <?php
                                                } else {
                                                    ?>
                                                    <input type="checkbox" id="telefon" name="telefon">
                                                    <label for="telefon">Telefon</label>
                                                    <?php
                                                }
                                                if ($k->getParking() == 'da') {
                                                    ?>
                                                    <input type="checkbox" id="par" name="parking" checked>
                                                    <label for="parking">Parking</label>

                                                    <?php
                                                } else {
                                                    ?>
                                                    <input type="checkbox" id="par" name="parking">
                                                    <label for="parking">Parking</label>
                                                    <?php
                                                } ?>
                                            </div>
                                        </div>

                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                Grejanje:
                                            </div>
                                            <div class="col text-start">
                                                <select id="grej" class="form-select" name="grej">
                                                    <option selected><?php echo $nek->getGrejanje(); ?></option>
                                                    <option value="ne">Ne</option>
                                                    <option value="nastruju">Na struju</option>
                                                    <option value="centralno">Centralno</option>
                                                    <option value="podno">Podno</option>
                                                </select>
                                            </div>
                                            <div class="col-2">

                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                Linije prevoza:
                                            </div>
                                            <div class="col-6 text-start">
                                                <select multiple name="prevozG[]" style="width: 20%">
                                                    <option></option>
                                                    <?php if (($nek->getLinijeprevoza() != null) && ($nek->getLinijeprevoza() != "")) {
                                                        $sveL = $nek->getLinijeprevoza();

                                                        $linije = explode(",", $sveL);
                                                        $brojac = 0;
                                                        //$sveLinije=[7,9,14,17,18,23,26,27,29,33,45,50,65,74,77,83,95];
                                                        $sveLinije = $nek->getGradid()->getGradskiPrevoz();

                                                        $sveLinije = explode(",", $sveLinije);
                                                        $x = count($linije);
                                                        foreach ($sveLinije as $linija) {
                                                            $linija = (int)$linija;
                                                            if ($brojac <= (count($linije) - 1) && $linija == ((int)$linije[$brojac])) {
                                                                $brojac += 1;
                                                                ?>
                                                                <option selected><?php echo $linija ?></option>
                                                                <?php
                                                            } else {
                                                                ?>
                                                                <option><?php echo $linija; ?></option>
                                                                <?php
                                                            }

                                                            ?>

                                                            <?php
                                                        }

                                                    } else{
                                                        $sveLinije = $nek->getGradid()->getGradskiPrevoz();
                                                        $sveLinije = explode(",", $sveLinije);
                                                        foreach ($sveLinije as $linija){
                                                            ?>
                                                            <option><?php echo $linija; ?></option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>

                                                </select>
                                            </div>
                                            <div class="col-2">

                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col text-center">
                                                <input type="submit" name="dodaj" value="Zavrsi">
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>

                            <?php
                        }
                        ?>

                        <!--    <a href="--><?php //echo site_url() . "oglasivac" ?><!--">Nazad</a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
