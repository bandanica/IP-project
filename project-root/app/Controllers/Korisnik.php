<?php


namespace App\Controllers;


class Korisnik extends BaseController
{
    public function index()
    {
        echo $this->session->get("korisnik")->getIme();
        $poruka = $this->session->get("poruka2");
        $this->session->set("poruka2", '');
        return $this->prikaz('kupac',['poruka2'=>$poruka]);
    }
    protected function prikaz($page, $data)
    {
        $data['controller'] = 'Korisnik';
        return view("stranice/$page", $data);
    }
    public function promenaLozinke(){
        return $this->prikaz('promenaSifre',[]);
    }
    public function zameniLozinku(){
        $this->session->set("poruka2", '');
        $stara = $this->request->getVar('staraL');
        $kor = $this->session->get('korisnik');
        $kor = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->findOneBy(['idK'=>$kor->getIdK()]);
        $loz = $kor->getLozinka();
        echo $loz;
        echo "<br/>";
        echo $stara;

        //$dobraStara = $this->doctrine->em->getRepository(\App\Models\Entities\Korisnik::class)->findOneBy(['kor'=>])
        if ($loz===$stara){
            $nova = $this->request->getVar('novaL');
            $kor->setLozinka($nova);
            $this->doctrine->em->flush();
            $this->session->remove('korisnik');
            $this->session->set('porukaLozinka','Uspesno promenjena lozinka');
            echo "Promenjeno";
            return redirect()->to(site_url());
        }
        else{
            $this->session->set("poruka2", 'Niste uneli dobru staru lozinku');
            return redirect()->to(site_url('korisnik'));
        }
    }
}
