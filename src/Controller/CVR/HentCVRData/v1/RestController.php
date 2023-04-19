<?php

namespace App\Controller\CVR\HentCVRData\v1;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Yaml\Yaml;

#[Route('/CVR/HentCVRData/1/rest')]
class RestController extends AbstractController
{
    // https://confluence.sdfi.dk/pages/viewpage.action?pageId=17139087#REST(CVR)-Metode-hentVirksomhedMedCVRNummer
    #[Route('/hentVirksomhedMedCVRNummer')]
    public function hentVirksomhedMedCVRNummer(Request $request): Response
    {
        $data = Yaml::parseFile(__DIR__.'/data/hentVirksomhedMedCVRNummer.yaml');
        $status = Response::HTTP_OK;
        if (is_array($data) && $request->query->has('pCVRNummer')) {
            $cvr = $request->query->get('pCVRNummer');
            $matches = array_filter(
                $data,
                static fn ($item) => $cvr === ($item['virksomhed']['CVRNummer'] ?? null)
            );
            $data = reset($matches) ?: null;
            if (null === $data) {
                $status = Response::HTTP_NOT_FOUND;
                $data = ['message' => sprintf('Invalid pCVRNummer: %s', json_encode($cvr))];
            }
        }

        return new JsonResponse($data, $status);
    }
}
