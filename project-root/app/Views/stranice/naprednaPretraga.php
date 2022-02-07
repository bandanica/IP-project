<form method="post" action=<?php echo site_url() . "korisnik/izvrsiNapredno" ?>>
    Cena od:<input type="text" name="minC">
    do:<input type="text" name="maxC"><br/>
    Kvadratura od:<input type="text" name="minK">
    do:<input type="text" name="maxK"><br/>
    Broj soba od:<input type="text" name="minS">
    do:<input type="text" name="maxS"><br/>
    Godina izgradnje od:<input type="text" name="minG"  pattern="[0-9]{4}" aria-label="year">
    do:<input type="text" name="maxG"  pattern="[0-9]d{4}" aria-label="year"><br/>
    Stanje nekretnine:<input type="radio" name="izv" value="izvorno">Izvorno
    <input type="radio" name="ren" value="renovirano">Renovirano
    <input type="radio" name="lux" value="lux">LUX<br/>
    Sprat od:<input type="text" name="minSprat">
    do:<input type="text" name="maxSprat"><br/>
    <input type="submit" id="naprednaP" value="Pretrazi">
</form>