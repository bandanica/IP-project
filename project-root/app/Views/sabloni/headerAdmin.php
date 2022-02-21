<div id= "header" class="container-fluid">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-2 ">
        <a href="<?php echo site_url() . "administrator"?>" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <svg id = "hlogo" xmlns="http://www.w3.org/2000/svg" width="50" height="42" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
            </svg>
            <!--            <svg class="bi bi-house-fill" width="40" height="32" role="img" aria-label="Bootstrap">-->
            <!--                <use xlink:href="#index"/>-->
            <!--            </svg>-->
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
<!--            <li><a href="--><?php //echo site_url() . "administrator"?><!--" id="pocL" class="nav-link px-2">Pocetna</a></li>-->
            <li><a href="<?php echo site_url() . "administrator/noviKorisnikAdmin"?>" id="pocL" class="nav-link px-2">Novi korisnik</a></li>
            <li><a href="<?php echo site_url() . "administrator/novaAgencijaAdmin"?>" id="pocL" class="nav-link px-2">Nova agencija</a></li>
            <li><a href="<?php echo site_url() . "administrator/novaLokacijaAdmin"?>" id="pocL" class="nav-link px-2">Nova lokacija</a></li>
            <li><a href="<?php echo site_url() . "administrator/novaUlicaAdmin"?>" id="pocL" class="nav-link px-2">Nova ulica</a></li>

            <li><a href="<?php echo site_url() . "administrator/promenaLozinke"?>" id="pocL3" class="nav-link px-2">Promena lozinke</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <form method='post' action=<?php echo site_url() . "login/logout" ?>>
                <button type="submit" id="dugmeLog" class="btn btn-primary">Odjavi se</button>
                <!--            <button type="button" id="dugmeReg" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal">Registruj se</button>-->
            </form>
        </div>
    </header>
    <!--    <nav id="header" class="navbar navbar-expand-md navbar-light">-->
    <!--        <a href="#" class="navbar-brand">-->
    <!--            <img src="/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-top"/>-->
    <!--            Moje nekretnine</a>-->
    <!--
       </nav>-->
</div>