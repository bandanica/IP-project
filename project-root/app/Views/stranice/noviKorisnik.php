<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/osnova.css">
    <script src="<?php echo base_url(); ?>/js/login.js"></script>
</head>
<body>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container-fluid">
    <div class="row">


    <form method='post' action=<?php echo site_url() . "administrator/kreirajKorisnika" ?>>
        <h2>Kreiranje novog korisnika:</h2>
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

            Broj licence agenta:<input type="text" name="brlicence"><br/>
        </div>
        <input type='submit' name='submit' disabled value='Registracija' id="regDugme">
        <br/>

        <span id="regGreske" style="color: red"><?php if (isset($poruka1)) echo $poruka1 ?></span>
    </form>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>