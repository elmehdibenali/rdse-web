<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class OffersController extends Controller
{
    public function index(){
        // $offers = Offer::where('user_id', Auth::id())->get();
        $offers = Offer::whereHas('consultation', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();
        return view('offer', compact('offers'));
    }

    public function download(Offer $offer): \Symfony\Component\HttpFoundation\StreamedResponse
    {
        // Charge les relations
        $offer->load('consultation.user');

        // Récupère juste le chemin depuis le champ (ex: offers/AQdh23adsaLOfQ2.pdf)
        $filePath = $offer->pdf_path;

        // Vérifie que le fichier existe sur le disque 'public'
        if (!Storage::disk('public')->exists($filePath)) {
            abort(404, 'Fichier introuvable.');
        }

        // Nom du client pour le nom du fichier final
        $clientName = Str::slug($offer->consultation->user->firstname . ' ' . $offer->consultation->user->lastname);

        $fileName = 'offre de' . $clientName . ' du service ' . $offer->consultation->service->name . '.pdf';

        // Téléchargement
        /** @var \Illuminate\Filesystem\FilesystemAdapter $disk */
        $disk = Storage::disk('public');
        return $disk->download($filePath, $fileName);


    }

    public function accept(Offer $offer)
    {
        $offer->status = 'acceptée';
        // dd($offer);
        $offer->save();

        return back()->with('success', 'Offre acceptée avec succès.');
    }

    public function refuse(Offer $offer)
    {
        $offer->status = 'refusée';
        $offer->save();

        return back()->with('success', 'Offre refusée avec succès.');
    }
}
