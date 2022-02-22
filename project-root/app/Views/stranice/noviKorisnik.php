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
                        <h2>Kreiranje novog korisnika:</h2>
                    </div>

                </div>
                <div class="row pt-4">
                    <div class="col">
                        <form method='post' action=<?php echo site_url() . "administrator/kreirajKorisnika" ?>>
                            <div class="row pb-3">
                                <div class="col-3 text-center">
                                    Ime:
                                </div>
                                <div class="col-3 text-start">
                                    <input type="text" class="form-control" name="ime" onchange="f()">
                                </div>
                                <div class="col-3 text-center">
                                    Prezime:
                                </div>
                                <div class="col-3 text-start">
                                    <input type="text" class="form-control" name="prez" onchange="f()">
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-3 text-center">
                                    Korisnicko ime:
                                </div>
                                <div class="col-3 text-start">
                                    <input type="text" class="form-control" name="korime" onchange="f()">
                                </div>
                                <div class="col-3 text-center">
                                    Lozinka:
                                </div>
                                <div class="col-3 text-start">
                                    <input type="password" class="form-control" name="loz" onchange="proveraLozinke()">
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-3 text-center">
                                    Grad:
                                </div>
                                <div class="col-3 text-start">
                                    <select name="gradici" class="form-select" onchange="f()">
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
                                <div class="col-3 text-center">
                                    Datum rodjenja:
                                </div>
                                <div class="col-3 text-start">
                                    <input type="date" name="rodjenje"
                                           max=<?php echo date("Y-m-d") ?> onchange="f()">
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-3 text-center">
                                    Kontakt telefon:
                                </div>
                                <div class="col-3 text-start">
                                    <input type="text" class="form-control" name="tel" onchange="f()">
                                </div>
                                <div class="col-3 text-center">
                                    I-mejl:
                                </div>
                                <div class="col-3 text-start">
                                    <input type="text" class="form-control" name="mejl" onchange="f()">
                                </div>
                            </div>
                            <div class="row pb-3">
                                <div class="col-3 text-center">
                                    Tip korisnika:
                                </div>


                                <?php
                                if (isset($tipkorisnika)) {
                                    foreach ($tipkorisnika as $t) {
                                        ?>
                                        <div class="col-2 text-center">


                                            <input type="radio" name="tip" id="<?php echo $t->getTipKorisnika() ?>"
                                                   value="<?php echo $t->getTipKorisnika() ?>"
                                                   onchange="f()"> <?php echo $t->getTipKorisnika() ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>


                            </div>

                            <div id="agencija" class="col text-center" hidden>
                                <div class="row pb-2">
                                    <div class="col-4 offset-2 text-center">
                                        Agencija:
                                    </div>
                                    <div class="col text-start">
                                        <select name="agencije1" class="form-select" id="ListaAgencija" onchange="f()">

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
                                        <input type="text" name="brlicence" class="form-control">
                                    </div>
                                    <div class="col-2">

                                    </div>

                                </div>
                            </div>
                            <div class="row pb-2">
                                <div class="col text-center">
                                    <input type='submit' name='submit' disabled value='Registracija' id="regDugme">
                                </div>
                            </div>
                            <div class="row pb-2">
                                <div class="col text-center">
                                    <span id="regGreske"
                                          style="color: red"><?php if (isset($poruka1)) echo $poruka1 ?></span>
                                </div>
                            </div>


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