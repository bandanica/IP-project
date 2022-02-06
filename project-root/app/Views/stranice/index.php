<html>
<head>
    <script src="<?php echo base_url(); ?>/js/login.js"></script>
</head>
<body>
<?php //if (isset($poruka)) echo "<font color='red'>$poruka</font><br>"; ?>
<span style="color: red"> <?php if (isset($poruka)) echo $poruka ?></span>
<form method='post' action=<?php echo site_url() . "login/login" ?>>
    <h2>Prijava na sajt</h2>
    Korisnicko ime: <input type="text" name="kor_ime"><br/>
    Lozinka: <input type="password" name="lozinka"><br/>

    <input type='submit' name='submit' value='Prijava'><br/>
</form>

<form method='post' action=<?php echo site_url() . "login/registerSubmit" ?>>
    <h2>Registracija na sajt</h2>
    Ime: <input type="text" name="ime" onchange="f()"><br/>
    Prezime: <input type="text" name="prez" onchange="f()"><br/>
    Korisnicko ime: <input type="text" name="korime" onchange="f()"><br/>
    Lozinka: <input type="password" name="loz" onchange="proveraLozinke()"><br/>
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
    Datum rodjenja: <input type="date" name="rodjenje" max=<?php echo date("Y-m-d") ?> onchange="f()"><br/>
    Kontakt telefon: <input type="text" name="tel" onchange="f()"><br/>
    I-mejl: <input type="text" name="mejl" onchange="f()"><br/>

    Tip korisnika:
    <?php
    if (isset($tipkorisnika)) {
        foreach ($tipkorisnika as $t) {

            ?>
            <input type="radio" name="tip" id="<?php echo $t->getTipKorisnika() ?>"
                   value="<?php echo $t->getTipKorisnika() ?>" onchange="f()"> <?php echo $t->getTipKorisnika() ?>
            <?php
        }
    }
    ?>
    <br/>

    <div id="agencija" hidden>
        Agencija:
        <select name="agencije" id="ListaAgencija" onchange="f()">

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

        Broj licence agenta:<input type="text" name="brlicence"><br/>
    </div>
    <input type='submit' name='submit' disabled value='Registracija' id="regDugme">
    <br/>

    <span id="regGreske" style="color: red"><?php if (isset($poruka1)) echo $poruka1 ?></span>
</form>


</body>
</html>
