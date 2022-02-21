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

<div class="container-fluid sredina justify-content-center">
    <div class="row pt-4">
        <div class="text-center bg-light shadow w-50 justify-content-center border">
            <div class="col">
                <div class="row pt-4">
                    <div class="col justify-content-center text-center">
                        <h2>Azuriranje korisnika:</h2>
                    </div>


                    <form method='post' action=<?php echo site_url() . "administrator/azuriranjeSubmit" ?>>
                        <h2>Azuriranje korisnika</h2>
                        Ime: <input type="text" name="ime" onchange="f()" value="<?php echo $ka->getIme(); ?>"><br/>
                        Prezime: <input type="text" name="prez" onchange="f()" value="<?php echo $ka->getPrezime(); ?>"><br/>
                        Korisnicko ime: <input type="text" name="korime" onchange="f()"
                                               value="<?php echo $ka->getKorIme(); ?>"><br/>
                        Lozinka: <input type="password" name="loz" onchange="proveraLozinke()"
                                        value="<?php echo $ka->getLozinka(); ?>"><br/>
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
                        Datum rodjenja: <input type="date" name="rodjenje"
                                               max=<?php echo date("Y-m-d") ?> onchange="f()"
                                               value="<?php echo $ka->getDatumRodjenja()->format('Y-m-d'); ?>"><br/>
                        Kontakt telefon: <input type="text" name="tel" onchange="f()"
                                                value="<?php echo $ka->getTelefon(); ?>"><br/>
                        I-mejl: <input type="text" name="mejl" onchange="f()"
                                       value="<?php echo $ka->getEMail(); ?>"><br/>

                        Tip korisnika:
                        <?php
                        if (isset($tipkorisnika)) {
                            foreach ($tipkorisnika as $t) {
                                if ($t == ($ka->getTip())) {
                                    ?>

                                    <input type="radio" name="tip" id="<?php echo $t->getTipKorisnika() ?>"
                                           value="<?php echo $t->getTipKorisnika() ?>" onchange="f()"
                                           checked> <?php echo $t->getTipKorisnika() ?>
                                    <?php
                                } else {

                                    ?>
                                    <input type="radio" name="tip" id="<?php echo $t->getTipKorisnika() ?>"
                                           value="<?php echo $t->getTipKorisnika() ?>"
                                           onchange="f()"> <?php echo $t->getTipKorisnika() ?>
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

                            Broj licence agenta:<input type="text" name="brlicence"
                                                       value="<?php echo $ka->getBrLicence(); ?>"><br/>
                        </div>

                        <input type='submit' name='submit' disabled value='Registracija' id="regDugme">
                        <br/>

                        <span id="regGreske" style="color: red"><?php if (isset($poruka1)) echo $poruka1 ?></span>
                    </form>
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