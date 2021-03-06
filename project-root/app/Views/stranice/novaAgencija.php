<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url(); ?>/css/osnova.css">
    </head>
    <body>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <div class="container-fluid sredina text-center">
            <div class="row pt-4">
                <div class="text-center bg-light shadow w-50 justify-content-center border">
                    <div class="col">
                        <div class="row pt-4">
                            <div class="col justify-content-center text-center">
                                <h2>Dodavanje nove agencije:</h2>
                            </div>

                        </div>
                        <div class="row pt-4">
                            <div class="col">
                                <form method='post' action=<?php echo site_url() . "administrator/kreirajAgenciju" ?>>
                                    <div class="row pb-3">
                                        <div class="col-4 offset-2 text-center">
                                            Naziv:
                                        </div>
                                        <div class="col text-start">
                                            <input type="text" class="form-control" name="imeAg">
                                        </div>
                                        <div class="col-2"></div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 offset-2 text-center">
                                            PIB:
                                        </div>
                                        <div class="col text-start">
                                            <input type="text" class="form-control" name="pib">
                                        </div>
                                        <div class="col-2"></div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 offset-2 text-center">
                                            Kontakt telefon:
                                        </div>
                                        <div class="col text-start">
                                            <input type="text" class="form-control" name="telAg">
                                        </div>
                                        <div class="col-2"></div>
                                    </div>
                                    <div class="row pb-3">
                                        <div class="col-4 offset-2 text-center">
                                            Adresa:
                                        </div>
                                        <div class="col text-start">
                                            <input type="text" class="form-control" name="adrAg">
                                        </div>
                                        <div class="col-2"></div>
                                    </div>
                                    <div class="row pb-4">
                                        <div class="col-4 offset-2 text-center">
                                            Grad:
                                        </div>
                                        <div class="col text-start">
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
                                        <div class="col-2"></div>
                                    </div>
                                    <div class="row pb-2">
                                        <div class="col text-center">
                                            <input type="submit" id="dugmeID" value="Zavrsi">
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
