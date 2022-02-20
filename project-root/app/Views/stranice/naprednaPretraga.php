<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/osnova.css">
    <script src="<?php echo base_url(); ?>/js/proveraLozinke.js"></script>
</head>
<body>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div class="container-fluid sredina">
    <div class="row pt-4">
        <div class="text-center bg-light shadow w-100 justify-content-center border">
            <div class="col">
                <form method="get" action=<?php echo site_url() . "korisnik/izvrsiNapredno" ?>>
                    <div class="row pb-2">
                        <div class="col-1 text-end">
                            Tip:
                        </div>
                        <div class="col-1 text-start">
                            <select name="izabranTip" class="form-select" required>
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
                        <div class="col-1 text-end">
                            Kvadratura:
                        </div>
                        <div class="col-1 text-end">
                            <input type="text" class="form-control" placeholder="min" name="minK">
                        </div>
                        <div class="col-1 text-start">
                            <input type="text" class="form-control" placeholder="max" name="maxK"><br/>
                        </div>
                        <div class="col-1 text-end">
                            Sobe:
                        </div>
                        <div class="col-1 text-end">
                            <input type="text" class="form-control" placeholder="min" name="minS">
                        </div>
                        <div class="col-1 text-start">
                            <input type="text" placeholder="max" class="form-control" name="maxS"><br/>
                        </div>

                        <div class="col-1 text-end">
                            Cena:
                        </div>
                        <div class="col-1 text-end">
                            <input type="text" class="form-control" name="minC" placeholder="min">
                        </div>
                        <div class="col-1 text-start">
                            <input type="text" class="form-control" placeholder="max" name="maxC"><br/>
                        </div>
                    </div>

                    <div class="row pb-2">
                        <div class="col-2 text-center">
                            God. izgradnje:
                        </div>
                        <div class="col-2">
                            od:<input type="date" name="minG" value="1900-01-01"><br/>
                        </div>
                        <div class="col-2">
                            do:<input type="date" name="maxG" value="2030-01-01">
                        </div>
                        <div class="col-1">
                            Sprat:
                        </div>
                        <div class="col-1">
                            <input type="text" placeholder="min" class="form-control" name="minSprat">
                        </div>
                        <div class="col-1">
                            <input type="text" placeholder="min" class="form-control" name="maxSprat">
                        </div>
                    </div>
                    <div class="row pb-2">
                        <div class="col-4">
                            Stanje nekretnine:<input type="radio"  name="stanje" value="'izvorno'">Izvorno
                            <input type="radio" name="stanje" value="'renovirano'">Renovirano
                            <input type="radio" name="stanje" value="'lux'">LUX<br/>
                        </div>

                    </div>
                    <div class="row pb-4">
                        <div class="col-1 text-center">
                            Lokacija:
                        </div>
                        <div class="col-3">
                            <select name="Lokacija[]" class="form-select" multiple>
                                <option></option>
                                <?php
                                if (isset($lokacije)) {
                                    foreach ($lokacije as $l) {
                                        ?>
                                        <option><?php echo $l; ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                    <div class="row justify-content-center">
                        <div class="col text-center">
                            <input type="submit" id="naprednaP" value="Pretrazi">
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
