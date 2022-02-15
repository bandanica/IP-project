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

<div class="container-fluid">
    <form method="post" action=<?php echo site_url() . "korisnik/izvrsiNapredno" ?>>
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
        </select><br/>
        Cena od:<input type="text" name="minC">
        do:<input type="text" name="maxC"><br/>
        Kvadratura od:<input type="text" name="minK">
        do:<input type="text" name="maxK"><br/>
        Broj soba od:<input type="text" name="minS">
        do:<input type="text" name="maxS"><br/>
        Godina izgradnje od:<input type="date" name="minG">
        do:<input type="date" name="maxG"><br/>
        Stanje nekretnine:<input type="radio" name="stanje" value="izvorno">Izvorno
        <input type="radio" name="stanje" value="renovirano">Renovirano
        <input type="radio" name="stanje" value="lux">LUX<br/>
        Sprat od:<input type="text" name="minSprat">
        do:<input type="text" name="maxSprat"><br/>
        <input type="submit" id="naprednaP" value="Pretrazi">
    </form>
    <form method='post' action=<?php echo site_url() . "login/logout" ?>>
        <input type="submit" name="logout" value="Odjavi se">

    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>
