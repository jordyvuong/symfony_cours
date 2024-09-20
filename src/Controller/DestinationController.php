<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DestinationController extends AbstractController
{
    #[Route('/destination', name: 'destination_detail')]
    public function index(): Response
    {
        // Informations pour Bali (ou une autre destination par défaut)
        $destination = [
            'name' => 'Bali',
            'description' => 'Bali est une île indonésienne réputée pour ses plages paradisiaques, ses temples anciens, ses rizières en terrasses et ses volcans majestueux. C\'est une destination prisée pour la détente, le surf, et l\'exploration culturelle.',
            'activities' => [
                'Faire du surf sur les magnifiques plages',
                'Explorer des temples comme Uluwatu et Tanah Lot',
                'Randonnée sur le mont Batur pour voir le lever du soleil',
                'Visiter la forêt sacrée des singes à Ubud',
            ],
            'points_of_interest' => [
                'Forêt des singes d\'Ubud',
                'Temple de Tanah Lot',
                'Rizières en terrasses de Tegallalang',
                'Plage de Kuta',
            ],
            'gallery' => [
                'bali1.jpg',
                'bali4.jpg',
                'bali5.jpg',
            ],
            'map_embed_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d505145.9472515536!2d114.74189356867772!3d-8.455278911582923!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd22f7520fca7d3%3A0x2872b62cc456cd84!2sBali!5e0!3m2!1sfr!2sfr!4v1726770930487!5m2!1sfr!2sfr" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade', // URL pour la carte Google Maps
        ];

        // Rendu de la vue en passant la destination
        return $this->render('destination/index.html.twig', [
            'destination' => $destination,
        ]);
    }
}
