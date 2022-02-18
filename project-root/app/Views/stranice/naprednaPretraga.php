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
    <form method="get" class="formaPretraga" action=<?php echo site_url() . "korisnik/izvrsiNapredno" ?>>
        <div class="row">
            <div class="col-1">
                Tip:<select name="izabranTip" required>
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
            <div class="col-3">

                Lokacija:<select name="Lokacija[]" multiple>
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
            <div class="col-1">
                Cena od:<input type="text" name="minC">
                do:<input type="text" name="maxC"><br/>
            </div>
            <div class="col-1">
                Kvadratura od:<input type="text" name="minK">

                do:<input type="text" name="maxK"><br/>
            </div>
            <div class="col-1">
                Broj soba od:<input type="text" name="minS">

                do:<input type="text" name="maxS"><br/>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                Godina izgradnje od:<input type="date" name="minG">

                do:<input type="date" name="maxG">
            </div>
            <div class="col-4">
                Stanje nekretnine:<input type="radio" name="stanje" value="izvorno">Izvorno
                <input type="radio" name="stanje" value="renovirano">Renovirano
                <input type="radio" name="stanje" value="lux">LUX<br/>
            </div>
            <div class="col-1">
                Sprat od:<input type="text" name="minSprat">

                do:<input type="text" name="maxSprat">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col text-center">
                <input type="submit" id="naprednaP" value="Pretrazi">
            </div>
        </div>
    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>
