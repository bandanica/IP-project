<html>
<head>
    <script src="<?php echo base_url(); ?>/js/login.js"></script>
</head>
<body>
<form method='post' action=<?php echo site_url() . "oglasivac/promenaSubmit" ?>>
    <h2>Vasi podaci:</h2>
    <?php if (isset($podaci)) {
        ?>
            <input type="hidden" name="idKor" value="<?php echo $podaci->getIdK();?>">
        Ime: <?php echo $podaci->getIme(); ?><br/>
        Prezime: <?php echo $podaci->getPrezime(); ?><br/>
        Korisnicko ime: <?php echo $podaci->getKorIme(); ?><br/>

        Grad: <?php echo $podaci->getIdgrada()->getNaziv(); ?>
        <br/>
        Datum rodjenja: <?php echo $podaci->getDatumRodjenja()->format('Y-m-d');?><br/>

        Kontakt telefon: <input type="text" name="tel" value=<?php echo $podaci->getTelefon(); ?>><br/>
        I-mejl: <input type="text" name="mejl" value=<?php echo $podaci->getEMail(); ?>><br/>

        Tip korisnika:
        <?php
        if (isset($tipkorisnika)) {
            foreach ($tipkorisnika as $t) {
                if ($t == $podaci->getTip()) {
                    ?>
                    <input type="radio" name="tip" id="<?php echo $t->getTipKorisnika() ?>"
                           value="<?php echo $t->getTipKorisnika() ?>" checked onclick="promenaTipa()"> <?php echo $t->getTipKorisnika() ?>
                    <?php
                } else {
                    ?>
                    <input type="radio" name="tip" onclick="promenaTipa()" id="<?php echo $t->getTipKorisnika() ?>"
                           value="<?php echo $t->getTipKorisnika() ?>" > <?php echo $t->getTipKorisnika() ?>
                    <?php
                }
            }
        }
        ?>
        <br/>

        <div id="agencija">
            Agencija:
            <select name="agencije1" id="ListaAgencija"  disabled>
                <option></option>

                <?php
                if (isset($agencije)) {
                    foreach ($agencije as $a) {
                        if (($podaci->getTip()->getTipKorisnika() == 'agent') && ($podaci->getIdagencije() == $a)) {
                            ?>
                            <option selected> <?php echo $a->getNaziv() ?></option>
                            <?php
                        } else {
                            ?>
                            <option><?php echo $a->getNaziv() ?> </option>
                            <?php
                        }
                    }
                }
                ?>
            </select>
            <br/>

            Broj licence agenta:<input type="text" id="brlicence" name="brlicence1" disabled value="<?php
            if ($podaci->getTip()->getTipKorisnika() == 'agent') {
                echo $podaci->getBrLicence();
            } else {
                echo "";
            } ?>" onloadstart = "promenaTipa()"  ><br/>
        </div>
        <input type='submit' name='submit' value='Sacuvaj izmene' id="dugmeIzmena">
        <br/>


        <?php
    }
    ?>
</form>

<form method='post' action=<?php echo site_url() . "login/logout" ?>>
    <input type="submit" name="logout" value="Odjavi se">

</form>
</body>
</html>