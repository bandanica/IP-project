<html>
<head>
    <script src="<?php echo base_url(); ?>/js/novaNek.js"></script>
</head>
<body>
<form method="post" action=<?php echo site_url() . "oglasivac/zavrsiDodavanjeNekretnine" ?>>
    Naziv nekretnine:<input type="text" name="nazivN"><br/>
    Grad:<select name="gr" onchange="promenaGrad()">
        <option></option>
        <?php
        if (isset($gradovi)) {
            foreach ($gradovi as $g) {
                ?>
                <option value= <?php echo $g->getIdg() ?>><?php echo $g->getNaziv(); ?></option>
                <?php
            }
        }
        ?>

    </select>

    Opstina:<select id="opst" name="opst" onchange="promenaOpstina()">
        <option></option>
    </select>


    Mikrolokacija:<select id="lok" name="lok" onchange="promenaLokacije()">
        <option></option>
    </select>

    Ulica:<select id="ul" name="ul">
        <option></option>
    </select>
    <br/>
    Kvadratura:<input type="text" name="kvadratura">
    Broj soba:<select name="brsoba">
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
    Godina izgradnje:<input type="date" name="dizgradnje"><br/>
    Stanje nekretnine:<input type="radio" name="stanje" value="izvorno">Izvorno
    <input type="radio" name="stanje" value="renovirano">Renovirano
    <input type="radio" name="stanje" value="lux">LUX<br/>
    Sprat:<input type="text" name="sprat">
    Ukupna spratnost:<input type="text" name="ukspratnost">
    Kratak opis:<input type="text" name="opisNek"><br/>
    Mesecni troskovi:<input type="text" name="mesTroskovi">
    Cena:<input type="text" name="cenaNekretnine"><br/>
    <h3>Karakteristike:</h3>
    Grejanje:<select id="grej">
        <option></option>
        <option value="ne">Ne</option>
        <option value="nastruju">Na struju</option>
        <option value="centralno">Centralno</option>
        <option value="podno">Podno</option>
    </select>
    <input type="checkbox" id="par" name="parking">
    <label for="parking">Parking</label>
    <input type="checkbox" id="ter" name="terasa">
    <label for="terasa">Terasa</label>
    <input type="checkbox" id="gar" name="garaza">
    <label for="garaza">Garaza</label>
    <input type="checkbox" id="lodja" name="lodja">
    <label for="lodja">Lodja</label>
    <input type="checkbox" id="lift" name="lift">
    <label for="lift">Lift</label>
    <input type="checkbox" id="franbalkon" name="balkon">
    <label for="balkon">Francuski balkon</label>
    <input type="checkbox" id="pod" name="podrum">
    <label for="podrum">Podrum</label>
    <input type="checkbox" id="basta" name="basta">
    <label for="basta">Basta</label>
    <input type="checkbox" id="klima" name="klima">
    <label for="klima">Klima</label>
    <input type="checkbox" id="internet" name="internet">
    <label for="internet">Internet</label>
    <input type="checkbox" id="telefon" name="telefon">
    <label for="telefon">Telefon</label>
    <br/>
    <input type="submit" name="dodaj" value="Zavrsi">
</form>

<form method='post' action=<?php echo site_url() . "login/logout" ?>>
    <input type="submit" name="logout" value="Odjavi se">

</form>
</body>
</html>
