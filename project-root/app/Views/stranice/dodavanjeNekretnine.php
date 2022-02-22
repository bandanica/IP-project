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
        <div class="col oglas">


            <div class="row pt-4">
                <div class="text-center bg-light shadow w-50 justify-content-center border">
                    <div class="col">
                        <div class="row pt-4">
                            <div class="col text-center">
                                <h2>Nova nekretnina</h2>
                            </div>
                        </div>
                        <div class="row pt-4">
                            <!--<div class="col oglas">-->
                            <form method="post"
                                  action="<?php echo site_url() . "oglasivac/zavrsiDodavanjeNekretnine" ?>"
                                  enctype="multipart/form-data">
                                <div class="row pb-3">
                                    <div class="col-4 offset-2 text-center">
                                        Tip:
                                    </div><!-- comment -->
                                    <div class="col text-start">
                                        <select class="form-select" name="izabranTip" required>
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
                                    <div class="col-2">

                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-4 offset-2 text-center">
                                        Naziv nekretnine:
                                    </div>
                                    <div class="col text-start">
                                        <input type="text" class="form-control" name="nazivN">
                                    </div>
                                    <div class="col-2">

                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-4 offset-2 text-center">
                                        Grad:
                                    </div>
                                    <div class="col text-start">
                                        <select name="gr" class="form-select" onclick="promenaGrad()">
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

                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-4 offset-2 text-center">
                                        Opstina:
                                    </div>
                                    <div class="col text-start">
                                        <select id="opst" class="form-select" name="opst" onclick="promenaOpstina()"
                                                onload="promenaOpstina()">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="col-2">

                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-4 offset-2 text-center">
                                        Mikrolokacija:
                                    </div>
                                    <div class="col text-start">
                                        <select id="lok" name="lok" class="form-select" onclick="promenaLokacije()">
                                            <option></option>
                                        </select>

                                    </div>
                                    <div class="col-2">
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-4 offset-2 text-center">
                                        Ulica:
                                    </div>
                                    <div class="col text-start">
                                        <select class="form-select" id="ul" name="ul">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="col-2">

                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-4 offset-2 text-center">
                                        Kvadratura:
                                    </div>
                                    <div class="col text-start">
                                        <input type="text" class="form-control" name="kvadratura">
                                    </div>
                                    <div class="col-2">

                                    </div>
                                </div>

                                <div class="row pb-3">
                                    <div class="col-4 offset-2 text-center">
                                        Broj soba:
                                    </div>
                                    <div class="col text-start">
                                        <select class="form-select" name="brsoba">
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
                                    <div class="col-2"></div>
                                </div>

                                <div class="row pb-3">
                                    <div class="col-4 offset-2 text-center">
                                        Godina izgradnje:
                                    </div>
                                    <div class="col text-start">
                                        <input type="date" name="dizgradnje">
                                    </div>
                                    <div class="col-2"></div>
                                </div>

                                <div class="row pb-3">
                                    <div class="col-4 offset-2 text-center">
                                        Stanje nekretnine:
                                    </div>
                                    <div class="col-6 text-start">

                                        <input type="radio" name="stanje" value="izvorno">Izvorno
                                        <input type="radio" name="stanje" value="renovirano">Renovirano
                                        <input type="radio" name="stanje" value="lux">LUX
                                    </div>

                                </div>

                                <div class="row pb-3">
                                    <div class="col-4 offset-2 text-center">
                                        Sprat:
                                    </div>
                                    <div class="col text-start">
                                        <input type="text" class="form-control" name="sprat">
                                    </div>
                                    <div class="col-2"></div>
                                </div>

                                <div class="row pb-3">
                                    <div class="col-4 offset-2 text-center">
                                        Ukupna spratnost:
                                    </div>
                                    <div class="col text-start">
                                        <input type="text" class="form-control" name="ukspratnost">
                                    </div>
                                    <div class="col-2"></div>
                                </div>

                                <div class="row pb-3">
                                    <div class="col-4 offset-2 text-center">
                                        Kratak opis:
                                    </div>
                                    <div class="col text-start">
                                    <textarea rows="5" class="form-control" cols="30" name="opisNek"
                                              onchange="proveraOpisa()"></textarea>
                                    </div>
                                    <div class="col-2"></div>
                                </div>

                                <div class="row pb-3">
                                    <div class="col-4 offset-2 text-center">
                                        Mesecni troskovi:
                                    </div>
                                    <div class="col text-start">
                                        <input type="text" class="form-control" name="mesTroskovi">
                                    </div>
                                    <div class="col-2"></div>
                                </div>

                                <div class="row pb-3">
                                    <div class="col-4 offset-2 text-center">
                                        Cena:
                                    </div>
                                    <div class="col text-start">
                                        <input type="text" class="form-control" name="cenaNekretnine">
                                    </div>
                                    <div class="col-2">

                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-4 offset-2 text-center">
                                        Grejanje:
                                    </div>
                                    <div class="col text-start">
                                        <select id="grej" class="form-select" name="grej">
                                            <option></option>
                                            <option value="ne">Ne</option>
                                            <option value="nastruju">Na struju</option>
                                            <option value="centralno">Centralno</option>
                                            <option value="podno">Podno</option>
                                        </select>
                                    </div>
                                    <div class="col-2">

                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-4 offset-2 text-end">
                                        <h5>Karakteristike:</h5>
                                    </div>
                                    <div class="col text-start">
                                        <input type="checkbox" id="par" name="parking">
                                        <label for="parking">Parking</label>
                                        <input type="checkbox" id="ter" name="terasa">
                                        <label for="terasa">Terasa</label>
                                        <input type="checkbox" id="gar" name="garaza">
                                        <label for="garaza">Garaza</label>
                                        <input type="checkbox" id="lodja" name="lodja">
                                        <label for="lodja">Lodja</label>
                                        <input type="checkbox" id="lift" name="lift">
                                        <label for="lift">Lift</label><br/>
                                        <input type="checkbox" id="franbalkon" name="balkon">
                                        <label for="balkon">Francuski balkon</label>
                                        <input type="checkbox" id="pod" name="podrum">
                                        <label for="podrum">Podrum</label>
                                        <input type="checkbox" id="basta" name="basta">
                                        <label for="basta">Basta</label><br/>
                                        <input type="checkbox" id="klima" name="klima">
                                        <label for="klima">Klima</label>
                                        <input type="checkbox" id="internet" name="internet">
                                        <label for="internet">Internet</label>
                                        <input type="checkbox" id="internet" name="interfon">
                                        <label for="interfon">Interfon</label>
                                        <input type="checkbox" id="telefon" name="telefon">
                                        <label for="telefon">Telefon</label>
                                    </div>
                                </div>
                                <div class="row pb-3">
                                    <div class="col-6 text-center">
                                        Ucitajte slike neretnine (3-6):
                                    </div>
                                    <div class="col text-start">
                                        <input type="file" class="form-control" id="slike" name="izaberiSliku[]" multiple onchange="brojslika()">
                                    </div>

                                </div>

                                <div class="row pb-3">
                                    <div class="col-4 offset-2 text-center">
                                        Linije prevoza:
                                    </div>
                                    <div class="col-6 text-start">
                                        <select multiple name="prevozi[]" id="Glinije" style="width: 20%">
                                            <option selected></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col text-center">
                                        <input type="submit" name="dodaj" id="zavDugme" value="Zavrsi">
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!--</div>-->
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
