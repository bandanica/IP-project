<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url(); ?>/css/osnova.css">
    <script src="<?php echo base_url(); ?>/js/novaNek.js"></script>
</head>
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<div class="container-fluid sredina">
    <div class="row">
        <div class="col oglas d-flex flex-wrap">
            <form method="post" action="<?php echo site_url() . "oglasivac/zavrsiDodavanjeNekretnine" ?>"
                  enctype="multipart/form-data">
                <div class="col d-block">
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
                <div class="col d-block">
                    Naziv nekretnine:<input type="text" name="nazivN"><br/>
                </div>
                <div class="col">
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
                </div>
                <div class="col">
                    Opstina:<select id="opst" name="opst" onchange="promenaOpstina()">
                        <option></option>
                    </select>
                </div>
                <div class="col">
                    Mikrolokacija:<select id="lok" name="lok" onchange="promenaLokacije()">
                        <option></option>
                    </select>
                </div>
                <div class="col">

                    Ulica:<select id="ul" name="ul">
                        <option></option>
                    </select>
                </div>
                <div class="col">
                    Kvadratura:<input type="text" name="kvadratura">
                </div>
                <div class="col">
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
                </div>
                <div class="col">
                    Godina izgradnje:<input type="date" name="dizgradnje"><br/>
                </div>
                <div class="col">
                    Stanje nekretnine:<input type="radio" name="stanje" value="izvorno">Izvorno
                    <input type="radio" name="stanje" value="renovirano">Renovirano
                    <input type="radio" name="stanje" value="lux">LUX
                </div>
                <div class="col">
                    Sprat:<input type="text" name="sprat">
                </div>
                <div class="col">
                    Ukupna spratnost:<input type="text" name="ukspratnost">
                </div>
                <div class="col">
                    Kratak opis:<textarea rows="5" cols="30" name="opisNek" onchange="proveraOpisa()"></textarea>
                </div>
                <div class="col">
                    Mesecni troskovi:<input type="text" name="mesTroskovi">
                </div>
                <div class="col">
                    Cena:<input type="text" name="cenaNekretnine">
                </div>
                <div class="col">
                    <h3>Karakteristike:</h3>
                    Grejanje:<select id="grej" name="grej">
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
                </div>
                <div class="col">
                    Ucitajte slike neretnine (minimum 3):<br/>
                    <input type="file" name="izaberiSliku[]" multiple>

                </div>
                <div class="col">
                    Linije prevoza:
                    <select multiple name="prevozi[]">
                        <option selected></option>
                        <option>7</option>
                        <option>9</option>
                        <option >14</option>
                        <option>17</option>
                        <option>18</option>
                        <option >23</option>
                        <option>26</option>
                        <option>27</option>
                        <option>29</option>
                        <option>33</option>
                        <option >45</option>
                        <option>50</option>
                        <option>65</option>
                        <option>74</option>
                        <option >77</option>
                        <option>83</option>
                        <option>95</option>
                    </select>
                </div>
                <div class="col">
                    <input type="submit" name="dodaj" id="zavDugme" value="Zavrsi">
                </div>
            </form>
        </div>
    </div>


</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

</body>
</html>
