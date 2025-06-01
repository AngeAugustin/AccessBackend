<?php

namespace App\Controller;

use App\Entity\Paiement;
use App\Entity\PaiementParent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PayerParentController extends AbstractController
{
    #[Route('/api/payer_parent', name: 'payer_parent', methods: ['POST'])]
    public function payerParent(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (!$data
            || !isset($data['Id_paiement'], $data['Paiement'], $data['NPI_payeur'], $data['Nom_payeur'], $data['Prenom_payeur'], $data['Role_payeur'], $data['Montant_paiement'])) {
            return new JsonResponse(['message' => 'Données manquantes ou invalides'], 400);
        }

        $Id_paiement = $data['Id_paiement'];
        $Paiement = $data['Paiement'];
        $NPI_payeur = $data['NPI_payeur'];
        $Nom_payeur = $data['Nom_payeur'];
        $Prenom_payeur = $data['Prenom_payeur'];
        $Role_payeur = $data['Role_payeur'];
        $Montant_paiement = $data['Montant_paiement'];

        // Recherche du Paiement
        $paiement = $entityManager->getRepository(Paiement::class)->find($Id_paiement);

        if (!$paiement) {
            return new JsonResponse(['message' => 'Paiement non trouvé'], 404);
        }

        $updated = false;
        $today = new \DateTime();

        // Trouver la correspondance Paiement1, Paiement2 ou Paiement3
        for ($i = 1; $i <= 3; $i++) {
            $getPaiement = 'getPaiement' . $i;
            $setStatut = 'setStatutPaiement' . $i;
            $setDate = 'setDatePaiement' . $i;

            if ($paiement->$getPaiement() === $Paiement) {
                $paiement->$setStatut('Provisoire');
                $paiement->$setDate($today);
                $updated = true;
                break;
            }
        }

        if (!$updated) {
            return new JsonResponse(['message' => 'Paiement envoyé ne correspond pas à un Paiement enregistré'], 404);
        }

        $entityManager->persist($paiement);

        // Création enregistrement PaiementParent
        $paiementParent = new PaiementParent();
        $paiementParent->setIdPaiement($Paiement);
        $paiementParent->setNPIPayeur($NPI_payeur);
        $paiementParent->setNomPayeur($Nom_payeur);
        $paiementParent->setPrenomPayeur($Prenom_payeur);
        $paiementParent->setRolePayeur($Role_payeur);
        $paiementParent->setStatutPaiement('Effectué');
        $paiementParent->setDatePaiement($today->format('Y-m-d'));
        $paiementParent->setMontantPaiement($Montant_paiement);

        $entityManager->persist($paiementParent);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Paiement parent enregistré avec succès']);
    }
}
