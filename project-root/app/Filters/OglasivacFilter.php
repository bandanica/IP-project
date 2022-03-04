<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

/*
 * klasa OglasivacFilter poziva se prilikom svakog pristupa Oglasivac
 * kontroleru, i korisnike koji nisu tipa samostalni oglasivac ili
 * agent, preusmerava na njihove podrazumevane stranice.
 */

class OglasivacFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        if ($session->has("vrstaKor")){
            $idTip = $session->get('vrstaKor');
            switch ($idTip){
                case 4: return redirect()->to(site_url("administrator"));
                case 1: return redirect()->to(site_url("korisnik"));
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