<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/kupacStil.css">
    <script src="<?php echo base_url(); ?>/js/proveraLozinke.js"></script>
</head>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container-fluid sredina">
    <div class="row text-center">
        <div class="col">
            <div class="row pt-4">
                <div class="col text-center">
                    <h2>Promena lozinke</h2>
                </div>
            </div>
            <div class="row pt-4">
                <div class="col">
                    <form method='post' action=<?php echo site_url() . "korisnik/zameniLozinku" ?>>
                        <div class="row pb-2">
                            <div class="col-2 offset-4 text-center">
                                Stara lozinka:
                            </div>
                            <div class="col-6 text-start">
                                <input type="password" name="staraL">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-2 offset-4 text-center">
                                Nova lozinka:
                            </div>
                            <div class="col-6 text-start">
                                <input type="password" name="novaL" onchange="proveraL()">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col-2 offset-4 text-center">
                                Potvrda lozinke:
                            </div>
                            <div class="col-6 text-start">
                                <input type="password" name="potvrdaL" onchange="jednakostL()">
                            </div>
                        </div>
                        <div class="row pb-2">
                            <div class="col text-center">
                                <input type="submit" disabled id="dugmeLoz" value="Sacuvaj izmene">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col text-center">
                                <span id="novaLGreske"
                                      style="color: red"><?php if (isset($poruka2)) echo $poruka2 ?></span>
                            </div>
                        </div>

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