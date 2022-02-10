<form method="post" action=<?php echo site_url() . "korisnik/izvrsiNapredno" ?>>
    Tip:<select name="izabranTip" required>
        <?php
        if (isset($tipoviN)){
            foreach ($tipoviN as $n){
                ?>
                <option><?php echo $n->getNazivTipa();?></option>
                <?php
            }
        }
        ?>
    </select>

    Lokacija:<select name="Lokacija[]" multiple>
        <option></option>
        <?php
        if (isset($lokacije)){
            foreach($lokacije as $l){
                ?>
                <option><?php echo $l;?></option>
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