<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Entity\Inscription;
use App\Entity\Module;
use App\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{
    #[Route('/test/creation-donnee', name: 'inscription')]
    public function testCreationDOnnee(): response
    {
        $instructeur1 = new Utilisateur();
        $instructeur1->setRoles("ROLE_INSTRUCTEUR")
            ->setEmail("instructeur@gmail.com")
            ->setNomAffichage("instructeur")
            ->setDateInscription(new \DateTime("now"))
            ->setEstActif(true)
            ->setPassword("lkdjhicz23!jxhz");

        $apprenant1 = new Utilisateur();
        $apprenant1->setRoles("ROLE_APPRENANT")
            ->setEmail("apprenant@gmail.com")
            ->setNomAffichage("apprenant")
            ->setDateInscription(new \DateTime("now"))
            ->setEstActif(true)
            ->setPassword("dudcidcu671ù^sh");

        $module1 = new Module();
        $module2 = new Module();
        $formation1 = new Formation();
            $formation1->addModule($module1,$module2);
        $inscription1 = new Inscription();
        $inscription1->setApprenant($apprenant1)
                     ->setFormation($formation1);
        $formation1->addInscription($inscription1)
                    ->addUtilisateur($instructeur1);

            return $this->render('test/creation-donnee.html.twig', []);

    }
}
