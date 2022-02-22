<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/osnova.css">
    <script src="<?php echo base_url(); ?>/js/login.js"></script>
    <script src="<?php echo base_url('/js/admin.js'); ?>"></script>
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
                </div>
                <form method='post' action=<?php echo site_url() . "administrator/azuriranjeSubmit" ?>>
                    <input type="text" hidden name="idKor" value="<?php echo $ka->getIdK(); ?>">
                    <div class="row pb-2">
                        <div class="col-4 offset-2 text-center">
                            Ime:
                        </div>
                        <div class="col text-start">
                            <input type="text" class="form-control" name="ime" onchange="klik()"
                                   value="<?php echo $ka->getIme(); ?>">
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-4 offset-2 text-center">
                            Prezime:
                        </div>
                        <div class="col text-start">
                            <input type="text" class="form-control" name="prez" onchange="klik()"
                                   value="<?php echo $ka->getPrezime(); ?>">
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-4 offset-2 text-center">
                            Korisnicko ime:
                        </div>
                        <div class="col text-start">
                            <input type="text" name="korime" class="form-control" onchange="klik()"
                                   value="<?php echo $ka->getKorIme(); ?>">
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-4 offset-2 text-center">
                            Grad:
                        </div>
                        <div class="col text-start">
                            <select name="gradici" class="form-select" onchange="klik()">
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
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-4 offset-2 text-center">
                            Datum rodjenja:
                        </div>
                        <div class="col text-start">
                            <input type="date" name="rodjenje"
                                   max=<?php echo date("Y-m-d") ?> onchange="klik()"
                                   value="<?php echo $ka->getDatumRodjenja()->format('Y-m-d'); ?>">
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-4 offset-2 text-center">
                            Kontakt telefon:
                        </div>
                        <div class="col text-start">
                            <input type="text" name="tel" onchange="klik()" class="form-control"
                                   value="<?php echo $ka->getTelefon(); ?>">
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-4 offset-2 text-center">
                            I-mejl:
                        </div>
                        <div class="col text-start">
                            <input type="text" name="mejl" onchange="klik()" class="form-control"
                                   value="<?php echo $ka->getEMail(); ?>">
                        </div>
                        <div class="col-2">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-4 offset-2 text-center">
                            Tip korisnika:
                        </div>
                        <div class="col text-start">
                            <?php
                            if (isset($tipkorisnika)) {
                                foreach ($tipkorisnika as $t) {
                                    if ($t == ($ka->getTip())) {
                                        ?>

                                        <input type="radio" name="tip" id="<?php echo $t->getTipKorisnika() ?>"
                                               value="<?php echo $t->getTipKorisnika() ?>" onchange="promenaTipa()"
                                               checked> <?php echo $t->getTipKorisnika() ?>
                                        <?php
                                    } else {

                                        ?>
                                        <input type="radio" name="tip" id="<?php echo $t->getTipKorisnika() ?>"
                                               value="<?php echo $t->getTipKorisnika() ?>"
                                               onchange="promenaTipa()"> <?php echo $t->getTipKorisnika() ?>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                        <div class="col-2">
                        </div>
                    </div>

                    <div id="agencija"<?php
                    $tip = $ka->getTip()->getIdt();
                    if ($tip != 3) {
                        echo "hidden";
                        echo " disabled";
                    }
                    ?>>
                        <div class="row pb-2">
                            <div class="col-4 offset-2 text-center">
                                Agencija:
                            </div>
                            <div class="col text-start">
                                <select class="form-select" name="agencije1" id="ListaAgencija" <?php
                                $tip = $ka->getTip()->getIdt();
                                if ($tip != 3) {
                                    echo "hidden";
                                    echo " disabled";
                                }
                                ?> onchange="klik()">

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
                            </div>
                            <div class="col-2">

                            </div>
                        </div>

                        <div class="row pb-2">
                            <div class="col-4 offset-2 text-center">
                                Broj licence agenta:
                            </div>
                            <div class="col text-start">
                                <input type="text" name="brlicence" id="idlicence" <?php
                                $tip = $ka->getTip()->getIdt();
                                if ($tip != 3) {
                                    echo "hidden";
                                    echo " disabled";
                                }
                                ?> value="<?php echo $ka->getBrLicence(); ?>">
                            </div>
                            <div class="col-2">
                            </div>
                        </div>

                    </div>
                    <div class="row pt-1 pb-2">
                        <div class="col text-center">
                            <input type='submit' name='submit' value='Azuriraj' id="regDugme">
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col text-center">
                            <span id="regGreske" style="color: red"><?php if (isset($poruka1)) echo $poruka1 ?></span>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>