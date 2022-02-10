<html>
<head>
    <script src="<?php echo base_url(); ?>/js/login.js"></script>
</head>
<body>
<form method='post' action=<?php echo site_url() . "administrator/azuriranjeSubmit" ?>>
    <h2>Azuriranje korisnika</h2>
    Ime: <input type="text" name="ime" onchange="f()" value="<?php echo $ka->getIme();?>"><br/>
    Prezime: <input type="text" name="prez" onchange="f()" value="<?php echo $ka->getPrezime();?>"><br/>
    Korisnicko ime: <input type="text" name="korime" onchange="f()" value="<?php echo $ka->getKorIme();?>"><br/>
    Lozinka: <input type="password" name="loz" onchange="proveraLozinke()" value="<?php echo $ka->getLozinka();?>"><br/>
    Grad: <select name="gradici" onchange="f()">
        <?php
        if (isset($gradovi)) {
            foreach ($gradovi as $g) {
                ?>
                <option><?php echo $g->getNaziv() ?> </option>
                <?php
            }
        }
        ?>

    </select>
    <br/>
    Datum rodjenja: <input type="date" name="rodjenje" max=<?php echo date("Y-m-d") ?> onchange="f()" value="<?php echo $ka->getDatumRodjenja()->format('Y-m-d');?>"><br/>
    Kontakt telefon: <input type="text" name="tel" onchange="f()" value="<?php echo $ka->getTelefon();?>"><br/>
    I-mejl: <input type="text" name="mejl" onchange="f()" value="<?php echo $ka->getEMail();?>"><br/>

    Tip korisnika:
    <?php
    if (isset($tipkorisnika)) {
        foreach ($tipkorisnika as $t) {
            if ($t==($ka->getTip())){
                ?>

                <input type="radio" name="tip" id="<?php echo $t->getTipKorisnika() ?>"
                   value="<?php echo $t->getTipKorisnika() ?>" onchange="f()" checked> <?php echo $t->getTipKorisnika() ?>
                <?php
            }
            else{

            ?>
            <input type="radio" name="tip" id="<?php echo $t->getTipKorisnika() ?>"
                   value="<?php echo $t->getTipKorisnika() ?>" onchange="f()"> <?php echo $t->getTipKorisnika() ?>
            <?php
            }
        }
    }
    ?>
    <br/>

    <div id="agencija">
        Agencija:
        <select name="agencije1" id="ListaAgencija" onchange="f()">

            <?php
            if (isset($agencije)) {
                foreach ($agencije as $a) {
                    ?>
                    <option><?php echo $a->getNaziv() ?> </option>
                    <?php
                }
            }
            ?>
        </select>
        <br/>

        Broj licence agenta:<input type="text" name="brlicence" value="<?php echo $ka->getBrLicence();?>"><br/>
    </div>

    <input type='submit' name='submit' disabled value='Registracija' id="regDugme">
    <br/>

    <span id="regGreske" style="color: red"><?php if (isset($poruka1)) echo $poruka1 ?></span>
</form>
</body>
</html>