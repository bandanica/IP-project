<html>
<head>
    <script src="<?php echo base_url(); ?>/js/proveraLozinke.js"></script>
</head>
<body>
<form method='post' action=<?php echo site_url() . "korisnik/zameniLozinku" ?>>
    Stara lozinka:<input type="password" name="staraL"><br/>
    Nova lozinka:<input type="password" name="novaL" onchange="proveraL()"><br/>
    Potvrda lozinke:<input type="password" name="potvrdaL" onchange="jednakostL()"><br/>
    <input type="submit" disabled id="dugmeLoz" value="Sacuvaj">
    <span id="novaLGreske" style="color: red"><?php if (isset($poruka2)) echo $poruka2 ?></span>
</form>
</body>
</html>