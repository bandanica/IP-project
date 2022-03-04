<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

/*
 * klasa KorisnikFilter se poziva prilikom svakog pristupa Korisnik
 * kontroleru, ukoliko je korisnik oglasivac ili administrator
 * preusmeravaju se na njihove podrazumevane stranice
 */
class KorisnikFilter implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        $path = $_SERVER['REQUEST_URI'];
        $method = explode("/", $path);
        if (!isset($_SESSION['vrstaKor']) && sizeof($method) > 2) {
            $method = $method[2];
            $method =explode("?",$method)[0];
            if (!($method == "pogledaj")) {
                 return redirect()->to(site_url());
            }
            return;
        }

        if ($session->has("vrstaKor")) {
            $tip = $session->get('vrstaKor');
            //$idTipKor = $tip->getIdt();

            switch ($tip) {
                case 4:
                    return redirect()->to(site_url("administrator"));
                case 3:
                    return redirect()->to(site_url("oglasivac"));
                case 2:
                    return redirect()->to(site_url("oglasivac"));
            }
        } else {
            return redirect()->to(site_url(""));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }

}