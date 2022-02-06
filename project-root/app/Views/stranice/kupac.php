<form action=<?php echo site_url() . "korisnik/promenaLozinke" ?>>
    <input type="submit" id="dugmeLozinka" value="Promena lozinke">

</form>
<form method='post' action=<?php echo site_url() . "login/logout" ?>>
    <input type="submit" name="logout" value="Odjavi se">

</form>
<?php if (isset($poruka2)){
    echo $poruka2;

}?>