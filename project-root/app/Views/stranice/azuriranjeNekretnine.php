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

<div class="container-fluid">
    <?php

    if (isset($nek)) {
        ?>
        <form method="post" action=<?php echo site_url() . "oglasivac/zavrsiAzuriranje" ?>>
            <input type="hidden" name="idN" value="<?php echo $nek->getIdn(); ?>">
            Naziv nekretnine:<input type="text" name="nazivN" value=<?php echo $nek->getNaziv(); ?>><br/>

            <br/>
            Kvadratura:<input type="text" name="kvadratura" value=<?php echo $nek->getKvadratura(); ?>>
            Broj soba:<select name="brsoba">
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

            Godina izgradnje:<input type="date" name="dizgradnje"
                                    value=<?php echo $nek->getGodinaIzgradnje()->format('Y-m-d') ?>><br/>
            Stanje nekretnine:<input type="radio" name="stanje" value="izvorno"
                                     checked="<?php $nek->getStanje() == "izvorno"; ?>">Izvorno
            <input type="radio" name="stanje" value="renovirano" checked="<?php $nek->getStanje() == "renovirano"; ?>">Renovirano
            <input type="radio" name="stanje" value="lux" checked="<?php $nek->getStanje() == "lux"; ?>">LUX<br/>
            Sprat:<input type="text" name="sprat" value=<?php echo $nek->getSprat(); ?>>
            Ukupna spratnost:<input type="text" name="ukspratnost" value=<?php echo $nek->getUkupnaSpratnost(); ?>>
            Kratak opis:<input type="text" name="opisNek" value=<?php echo $nek->getOpis(); ?>><br/>
            Mesecni troskovi:<input type="text" name="mesTroskovi" value=<?php echo $nek->getMesecniTroskovi(); ?>>
            Cena:<input type="text" name="cenaNekretnine" value=<?php echo $nek->getCena(); ?>><br/>
            <h3>Karakteristike:</h3>
            <?php $k = $nek->getKarakteristike(); ?>
            Grejanje:<select id="grej" name="grej">
                <option selected><?php echo $nek->getGrejanje(); ?></option>
                <option value="ne">Ne</option>
                <option value="nastruju">Na struju</option>
                <option value="centralno">Centralno</option>
                <option value="podno">Podno</option>
            </select>
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

            <br/>
            <input type="submit" name="dodaj" value="Zavrsi">
        </form>
        <?php
    }
    ?>

<!--    <a href="--><?php //echo site_url() . "oglasivac" ?><!--">Nazad</a>-->

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
