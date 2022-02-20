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

        <div class="container-fluid sredina">
            <div class="row pt-4">
                <div class="text-center bg-light shadow w-50 justify-content-center border">
                    <div class="col">

                        <div class="row pt-4">
                            <div class="col text-center">
                                <h2>Podaci o korisniku</h2>
                            </div>

                        </div>
                        <div class="row pt-4">
                            <div class="col">
                                <form method='post' action=<?php echo site_url() . "oglasivac/promenaSubmit" ?>>

                                    <?php if (isset($podaci)) {
                                        ?>
                                        <input type="hidden" name="idKor" value="<?php echo $podaci->getIdK(); ?>">
                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                Ime:
                                            </div>
                                            <div class="col-6 text-start">
                                                <?php echo $podaci->getIme(); ?>
                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                Prezime:
                                            </div>
                                            <div class="col-6 text-start">
                                                <?php echo $podaci->getPrezime(); ?>
                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                Korisnicko ime:
                                            </div>
                                            <div class="col-6 text-start">
                                                <?php echo $podaci->getKorIme(); ?>
                                            </div>
                                        </div>

                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                Grad:
                                            </div>
                                            <div class="col-6 text-start">
                                                <?php echo $podaci->getIdgrada()->getNaziv(); ?>
                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                Datum rodjenja:
                                            </div>
                                            <div class="col-6 text-start">
                                                <?php echo $podaci->getDatumRodjenja()->format('Y-m-d'); ?>
                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                Kontakt telefon:
                                            </div>
                                            <div class="col text-start">
                                                <input class="form-control" type="text" name="tel" value=<?php echo $podaci->getTelefon(); ?>>
                                            </div>
                                            <div class="col-2">
                                                
                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                I-mejl:
                                            </div>
                                            <div class="col text-start">
                                                <input class="form-control" type="text" name="mejl" value=<?php echo $podaci->getEMail(); ?>>
                                            </div>
                                            <div class="col-2">
                                                
                                            </div>
                                        </div>
                                        <div class="row pb-3">
                                            <div class="col-4 offset-2 text-center">
                                                Tip korisnika:
                                            </div>
                                            <div class="col text-start">
                                                <?php
                                                if (isset($tipkorisnika)) {
                                                    foreach ($tipkorisnika as $t) {
                                                        if ($t == $podaci->getTip()) {
                                                            ?>
                                                            <input type="radio" name="tip" id="<?php echo $t->getTipKorisnika() ?>"
                                                                   value="<?php echo $t->getTipKorisnika() ?>" checked
                                                                   onclick="promenaTipa()"> <?php echo $t->getTipKorisnika() ?>
                                                                   <?php
                                                               } else {
                                                                   ?>
                                                            <input type="radio" name="tip" onclick="promenaTipa()"
                                                                   id="<?php echo $t->getTipKorisnika() ?>"
                                                                   value="<?php echo $t->getTipKorisnika() ?>"> <?php echo $t->getTipKorisnika() ?>
                                                                   <?php
                                                               }
                                                           }
                                                       }
                                                       ?>
                                            </div>
                                        </div>


                                        <div id="agencija" class="text-center">
                                            <div class="row pb-3">
                                                <div class="col-4 offset-2 text-center">
                                                    Agencija:
                                                </div>
                                                <div class="col text-start">
                                                    <select class="form-select" name="agencije1" id="ListaAgencija" disabled>
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
                                                </div>
                                                <div class="col-2">
                                                    
                                                </div>
                                            </div>
                                            <div class="row pb-3">
                                                <div class="col-4 offset-2 text-center">
                                                    Broj licence agenta:
                                                </div>
                                                <div class="col text-start">
                                                    <input type="text" class="form-control" id="brlicence" name="brlicence1" disabled value="<?php
                                                    if ($podaci->getTip()->getTipKorisnika() == 'agent') {
                                                        echo $podaci->getBrLicence();
                                                    } else {
                                                        echo "";
                                                    }
                                                    ?>" onloadstart="promenaTipa()">
                                                </div>
                                                <div class="col-2">
                                                    
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row pb-2">
                                            <div class="col text-center">
                                                <input type='submit' name='submit' value='Sacuvaj izmene' id="dugmeIzmena">
                                            </div>
                                        </div>


                                        <?php
                                    }
                                    ?>
                                </form>
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