<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url('/css/osnova.css'); ?>">
    <script src="<?php echo base_url('/js/login.js'); ?>"></script>
</head>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="modalzaloginformu" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center w-100 font-weight-bold" id="naslovModalaLogin">Prijava</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="loginForma" method='post' action=<?php echo site_url() . "login/login" ?>>
                <div class="modal-body">
                    <div class="form-group text-center pb-2">
                        <input type="text" name="kor_ime" placeholder="Korisnicko ime" required="required">

                    </div>
                    <div class="form-group text-center pb-2">
                        <input type="password" name="lozinka" placeholder="Lozinka" required="required">

                    </div>

                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" id="LogSubmit" class="btn btn-primary text-center">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="modalzaloginformu" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title text-center w-100 font-weight-bold" id="regNaslov">Registracija</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="regForma" method='post' action=<?php echo site_url() . "login/registerSubmit" ?>>
                <div class="modal-body">
                    <div class="form-group text-center pb-1">
                        <input type="text" name="ime" placeholder="Ime" required="required" onchange="f()">

                    </div>
                    <div class="form-group text-center pb-1">
                        <input type="text" name="prez" placeholder="Prezime" required="required" onchange="f()">

                    </div>
                    <div class="form-group text-center pb-1">
                        <input type="text" name="korime" placeholder="Korisnicko ime" required="required"
                               onchange="f()">

                    </div>
                    <div class="form-group text-center pb-1">
                        <input type="password" name="loz" placeholder="Lozinka" required="required"
                               onchange="proveraLozinke()">

                    </div>
                    <div class="form-group text-center pb-1">
                        Grad:
                        <select name="gradici" onchange="f()">
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

                        <!--                    </div>-->
                        <!--                    <div class="form-group text-center pb-1">-->
                        Datum rodjenja:
                        <input type="date" name="rodjenje" onchange="f()" max=<?php echo date("Y-m-d") ?>><br/>

                    </div>
                    <div class="form-group text-center pb-1">
                        <input type="text" name="tel" placeholder="Telefon" required="required"
                               onchange="f()">
                    </div>
                    <div class="form-group text-center pb-1">
                        <input type="text" name="mejl" placeholder="Email" required="required"
                               onchange="f()">
                    </div>
                    <div class="form-group text-center pb-1">
                        Tip korisnika:
                        <?php
                        if (isset($tipkorisnika)) {
                            foreach ($tipkorisnika as $t) {

                                ?>

                                <input type="radio" name="tip" id="<?php echo $t->getTipKorisnika() ?>"
                                       value="<?php echo $t->getTipKorisnika() ?>"
                                       onchange="f()"> <?php echo $t->getTipKorisnika() ?>


                                <?php
                            }
                        }
                        ?>

                    </div>
                    <div class="form-group text-center pb-1">
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
                            <input type="text" name="brlicence" placeholder="Broj licence">
                        </div>
                    </div>


                </div>
                <div class="modal-footer justify-content-center">
                    <span id="regGreske" style="color: red"><?php if (isset($poruka1)) echo $poruka1 ?></span>

                    <button type="submit" class="btn btn-primary" disabled id="regDugme">
                        Registruj se
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="container-fluid sredina">
    <div class="row">
        <div class="col">
            <span id="regGreske" style="color: red">
            <?php if (isset($poruka1)) echo $poruka1 ?></span>
        </div>

    </div>
    <div class="row">
        <div class="col">
            <?php if (isset($porukaL)) echo "$porukaL";
            echo "<br/>"; ?>
            <span style="color: red"> <?php if (isset($poruka)) echo $poruka ?></span>
        </div>
    </div>


    <div class="row">
        <div class="col d-flex flex-wrap oglas justify-content-center">
            <!--        <h2>Poslednji oglasi:</h2>-->

            <?php
            if (isset($poslednjOgl) && !empty($poslednjOgl)) {
                foreach ($poslednjOgl as $n1) {
                    $dir_path = $n1->getSlike();
                    $slike = scandir($dir_path);
                    $files = array_diff(scandir($dir_path), array('.', '..'));
                    $max = count($files) - 1;
                    $s = rand(0, $max);
                    //$file = $files[0];
                    $i = -1;

                    foreach ($files as $file) {
                        $i += 1;
                        if ($i == $s) {
                            ?>
                            <div class="col-4 ml-4 mr-4 justify-content-center" id="Kartica">
                                <div class="card text-dark bg-light">
                                    <img src="<?php echo base_url() . "/" . $dir_path . "/" . $file; ?>"
                                         alt="Slika nekr" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $n1->getNaziv(); ?></h5>
                                        <p class="card-text"> <?php echo $n1->getCena(); ?> EUR</p>
                                        <p class="card-text"><small>Linije: <?php if ($n1->getLinijeprevoza() != "") {
                                                    echo $n1->getLinijeprevoza();
                                                } ?></small></p>
                                        <form method="get" action="<?php echo site_url() . "login/Pogledaj" ?>">
                                            <input type="hidden" value="<?php echo $n1->getIdn(); ?>" name="idNek">
                                            <button type="submit" value="Detaljnije..." class="link-button">
                                                Detaljnije...
                                            </button>
                                            <!--                                        <a href="-->
                                            <?php //echo site_url() . "login/Pogledaj/"
                                            ?><!--" class="card-link">Detaljnije...</a>-->
                                        </form>

                                    </div>

                                </div>
                            </div>

                            <?php
                            break;
                        }
                    }


                }
            }
            ?>

        </div>
    </div>
    <!--    <div class="row">-->
    <!--        <div class="col">-->
    <!--            <hr id="styleOne">-->
    <!--        </div>-->
    <!--    </div>-->

    <!--    <div class="row">-->
    <!--        <div class="col-4">-->
    <!--            <form id="loginForma" method='post' action=--><?php //echo site_url() . "login/login" ?><!--
                <h5>Prijava na sajt</h5>-->
    <!--                <div class="row">-->
    <!--                    <div class="col">-->
    <!--                        Korisnicko ime:-->
    <!--                    </div>-->
    <!--                    <div class="col">-->
    <!--                        <input type="text" name="kor_ime"><br/>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="row">-->
    <!--                    <div class="col">-->
    <!--                        Lozinka:-->
    <!--                    </div>-->
    <!--                    <div class="col">-->
    <!--                        <input type="password" name="lozinka"><br/>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!---->
    <!---->
    <!--                <input type='submit' name='submit' value='Prijava'><br/>-->

    <!--            </form>-->
    <!--        </div>-->
    <!--        <div class="col-4">-->
    <!--            <form id="regForma" method='post' action=--><?php //echo site_url() . "login/registerSubmit" ?><!--
                <h5>Registracija na sajt</h5>-->
    <!--                <div class="row">-->
    <!--                    <div class="col">-->
    <!--                        Ime:-->
    <!--                    </div>-->
    <!--                    <div class="col">-->
    <!--                        <input type="text" name="ime" onchange="f()"><br/>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="row">-->
    <!--                    <div class="col">-->
    <!--                        Prezime:-->
    <!--                    </div>-->
    <!--                    <div class="col">-->
    <!--                        <input type="text" name="prez" onchange="f()"><br/>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="row">-->
    <!--                    <div class="col">-->
    <!--                        Korisnicko ime:-->
    <!--                    </div>-->
    <!--                    <div class="col">-->
    <!--                        <input type="text" name="korime" onchange="f()"><br/>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="row">-->
    <!--                    <div class="col">-->
    <!--                        Lozinka:-->
    <!--                    </div>-->
    <!--                    <div class="col">-->
    <!--                        <input type="password" name="loz" onchange="proveraLozinke()"><br/>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="row">-->
    <!--                    <div class="col">-->
    <!--                        Grad:-->
    <!--                    </div>-->
    <!--                    <div class="col">-->
    <!--                        <select name="gradici" onchange="f()">-->
    <!--                            --><?php
    //                            if (isset($gradovi)) {
    //                                foreach ($gradovi as $g) {
    //                                    ?>
    <!--                                    <option>--><?php //echo $g->getNaziv() ?><!-- </option>-->
    <!--                                    --><?php
    //                                }
    //                            }
    //                            ?>
    <!---->
    <!--                        </select>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="row">-->
    <!--                    <div class="col">-->
    <!--                        Datum rodjenja:-->
    <!--                    </div>-->
    <!--                    <div class="col">-->
    <!--                        <input type="date" name="rodjenje" max=-->
    <?php //echo date("Y-m-d") ?><!-- onchange="f()"><br/>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="row">-->
    <!--                    <div class="col">-->
    <!--                        Kontakt telefon:-->
    <!--                    </div>-->
    <!--                    <div class="col">-->
    <!--                        <input type="text" name="tel" onchange="f()"><br/>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="row">-->
    <!--                    <div class="col">-->
    <!--                        I-mejl:-->
    <!--                    </div>-->
    <!--                    <div class="col">-->
    <!--                        <input type="text" name="mejl" onchange="f()"><br/>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--                <div class="row">-->
    <!--                    <div class="col-3">-->
    <!--                        Tip korisnika:-->
    <!--                    </div>-->
    <!--                    <div class="col-9">-->
    <!--                        --><?php
    //                        if (isset($tipkorisnika)) {
    //                            foreach ($tipkorisnika as $t) {
    //
    //                                ?>
    <!---->
    <!--                                <input type="radio" name="tip" id="-->
    <?php //echo $t->getTipKorisnika() ?><!--"-->
    <!--                                       value="--><?php //echo $t->getTipKorisnika() ?><!--"-->
    <!--                                       onchange="f()"> --><?php //echo $t->getTipKorisnika() ?>
    <!---->
    <!---->
    <!--                                --><?php
    //                            }
    //                        }
    //                        ?>
    <!--                    </div>-->
    <!--                </div>-->
    <!---->
    <!--                <div id="agencija" hidden>-->
    <!--                    <div class="row">-->
    <!--                        <div class="col">-->
    <!--                            Agencija:-->
    <!--                        </div>-->
    <!--                        <div class="col">-->
    <!--                            <select name="agencije1" id="ListaAgencija" onchange="f()">-->
    <!---->
    <!--                                --><?php
    //                                if (isset($agencije)) {
    //                                    foreach ($agencije as $a) {
    //                                        ?>
    <!--                                        <option>--><?php //echo $a->getNaziv() ?><!-- </option>-->
    <!--                                        --><?php
    //                                    }
    //                                }
    //                                ?>
    <!--                            </select>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                    <div class="row">-->
    <!--                        <div class="col">-->
    <!--                            Broj licence agenta:-->
    <!--                        </div>-->
    <!--                        <div class="col">-->
    <!--                            <input type="text" name="brlicence"><br/>-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!---->
    <!---->
    <!--                </div>-->
    <!--                <input type='submit' name='submit' disabled value='Registracija' id="regDugme">-->
    <!--                <br/>-->
    <!---->

    <!--            </form>-->
    <!---->
    <!--        </div>-->
    <!--    </div>-->


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>
