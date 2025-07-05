<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Requests\OfferRequest;
use App\Notifications\OfferCreated;

class AdminOffersController extends Controller
{
    public function index(Request $request)
    {
        $query = Offer::query();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $offers = $query->get();

        return view('admin.offers.index', compact('offers'));
    }


    public function store(OfferRequest $request)
    {
        $pdfPath = $request->file('pdf')->store('offers', 'public');

        $data = [
            'consultation_id' => $request->consultation_id,
            'pdf_path' => $pdfPath,
        ];

        $offer = Offer::create($data);

        // Notify the user
        $user = $offer->consultation->user;
        $user->notify(new OfferCreated($offer));

        return back()->with('success', 'Offre ajoutée avec succès et le client a été notifié.');
    }

    public function destroy(Offer $offer)
    {
        // $consultation = Consultation::findOrFail($id);
        $offer->delete();
        return back()->with('success','L\'offre a été supprimer avec succès !');

    }

}
