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
    <form method='post' action=<?php echo site_url() . "korisnik/zameniLozinku" ?>>
        Stara lozinka:<input type="password" name="staraL"><br/>
        Nova lozinka:<input type="password" name="novaL" onchange="proveraL()"><br/>
        Potvrda lozinke:<input type="password" name="potvrdaL" onchange="jednakostL()"><br/>
        <input type="submit" disabled id="dugmeLoz" value="Sacuvaj">
        <span id="novaLGreske" style="color: red"><?php if (isset($poruka2)) echo $poruka2 ?></span>
    </form>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>