<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/osnova.css">
    <script src="<?php echo base_url(); ?>/js/kupac.js"></script>
</head>

<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container-fluid sredina">
    <div class="row pt-4">
        <div class="text-center bg-light shadow w-100 justify-content-center border">
            <div class="col">
                <div class="row pt-4">
                    <div class="col">
                        <h3>Pretraga nekretnina:</h3>
                    </div>
                </div>
                <div class="row pt-2">
                    <!--        <form name="Forma za pretragu" method="post" action=--><?php //echo site_url() . "korisnik/pretragaNekretnine"    ?>
                    <div class="col-2">
                        <div class="row">
                            <div class="col text-center">
                                Tip:
                            </div>
                        </div>
                        <div class="col text-center">
                            <select id="izabranTip" class="form-select" required>
                                <?php
                                if (isset($tipoviN)) {
                                    foreach ($tipoviN as $n) {
                                        ?>
                                        <option><?php echo $n->getNazivTipa(); ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="row">
                            <div class="col text-center">
                                Cena DO (&euro;):
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <input type="text" class="form-control" id="cenaDO">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <div class="col text-center">
                                Kvadratura OD (m2):
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <input type="text" class="form-control" id="kvadrOD">
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="row">
                            <div class="col text-center">
                                Minimalan broj soba:
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <select id="brs" class="form-select">
                                    <option></option>
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
                            </div>
                        </div>
                    </div>

                    <div class="col-3">

                        Lokacija:<select multiple id="Lokacija" class="form-select">
                            <option></option>
                            <?php
                            if (isset($lokacije)) {
                                $j = 0;
                                foreach ($lokacije as $l) {
                                    $j += 1;
                                    ?>
                                    <option><?php echo $l; ?></option>
                                    <script>
                                        save("<?php echo $l ?>");
                                    </script>
                                    <?php
                                }
                            }
                            ?>

                        </select>
                    </div>

                    <!--    <section class="main">-->
                    <!--        Lokacija:-->
                    <!--        <div class="search" autocomplete="off" method="post" action="">-->
                    <!--            <input autocomplete="false" name="hidden" type="text" style="display:none;">-->
                    <!--            <input type="text" name="q" placeholder="Unesite lokaciju..." id="searchBox"/>-->
                    <!--            <ul class="results" id="suggestionsList">-->
                    <!---->
                    <!--            </ul>-->
                    <!--        </div>-->
                    <!--    </section>-->


                    <!--            <input type="text" name="lok" aria-autocomplete="list" aria-haspopup="true" placeholder="Upisi lokaciju...">-->


                    <div class="col-1">
                        <div class="row">
                            <div class="col"></div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <input type="submit" id="pret" name="dP" value="Pretrazi" onclick="NadjiNekretnine()">
                            </div>
                        </div>

                    </div>
                    <!--        </form>-->

                </div>
            </div>
        </div>
    </div>
    <div class="row pt-2">
        <div class="listaNek oglas" id="prikazN">
            <!--            <span>Ovde idu oglasi</span>-->
            <!--            <br>-->
        </div>
    </div>


    <?php
    if (isset($poruka2)) {
        echo $poruka2;
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
