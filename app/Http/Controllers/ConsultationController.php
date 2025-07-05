<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Consultation;
use App\Http\Requests\ConsultationRequest;
use Illuminate\Support\Facades\Auth;


class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $consultations = Consultation::with(['user', 'service'])
        ->where('user_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

        foreach ($consultations as $consultation) {
            $start = Carbon::parse($consultation->proposed_datetime);
            $now = Carbon::now();

            if ($consultation->status === 'confirmed' && $consultation->proposed_datetime && $consultation->consultation_link ) {
                $start = Carbon::parse($consultation->proposed_datetime);
                $now = Carbon::now();
                // dd($now);

                if ($now->between($start, $start->copy()->addHours(3))) {
                    if ($consultation->status !== 'in_progress') { // éviter de sauvegarder si déjà en_cours
                        $consultation->status = 'in_progress';
                        $consultation->save();
                    }
                }
            }elseif ($now->greaterThan($start->copy()->addHours(3))) {
                    if ($consultation->status !== 'finished') { // idem pour terminé
                        $consultation->status = 'finished';
                        $consultation->save();
                    }
                }

            if ($consultation->status === 'canceled') {
                $consultation->hasRetried = Consultation::where('retried_from_id', $consultation->id)->exists();
            } else {
                $consultation->hasRetried = false;
            }
        }

        return view('consultation', compact('consultations'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsultationRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = Auth::user()->id;

        // dd($data);

        $consultation = Consultation::create($data);

        return to_route('user.consultation.index')->with('success', 'Consultation réservée avec succès.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsultationRequest $request, Consultation $consultation)
    {
        $data = $request->validated();

        $consultation->fill($data)->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
