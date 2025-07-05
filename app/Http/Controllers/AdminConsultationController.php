<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ConsultationRequest;
use App\Notifications\ConsultationLinkSent;
use App\Notifications\ConsultationScheduled;


class AdminConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Consultation::with(['user', 'service','offer'])
        ->orderByRaw("FIELD(status, 'in_progress', 'pending', 'confirmed', 'finished', 'canceled')");

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }


        $consultations = $query->get();

        foreach ($consultations as $consultation) {
            // Mise à jour automatique des statuts en fonction de la date
            $start = Carbon::parse($consultation->proposed_datetime);
                $now = Carbon::now();
            if ($consultation->status === 'confirmed' && $consultation->proposed_datetime && $consultation->consultation_link) {
                $start = Carbon::parse($consultation->proposed_datetime);
                $now = Carbon::now();
                // dd($now);

                // ->addHours(2)
                if ($now->between($start, $start->copy()->addMinutes(1))) {
                    if ($consultation->status !== 'in_progress') {
                        $consultation->status = 'in_progress';
                        $consultation->save();
                    }
                }
                // ->addHours(2)
            }elseif ($now->greaterThan($start->copy()->addMinutes(1))) {
                    if ($consultation->status !== 'finished') {
                        $consultation->status = 'finished';
                        $consultation->save();
                    }
                }
        }


        return view('admin.consultation.index',compact('consultations'));
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
        // $data = $request->validated();

        // $data['user_id'] = Auth::user()->id;

        // // dd($data);

        // $consultation = Consultation::create($data);

        // return redirect()->back()->with('success', 'Consultation réservée avec succès.');
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

        $oldDate = $consultation->proposed_datetime ? Carbon::parse($consultation->proposed_datetime) : null;
        $oldLink = $consultation->consultation_link;

        $consultation->fill($data)->save();

        $newDate = $consultation->proposed_datetime ? Carbon::parse($consultation->proposed_datetime) : null;

        if (($oldDate === null || !$oldDate->equalTo($newDate)) && $newDate !== null) {
            info('Sending notification to user: ' . $consultation->user->email);
            $consultation->user->notify(new ConsultationScheduled($consultation));
        }

        if($oldLink !== $consultation->consultation_link && $consultation->consultation_link !== null){
              info('Sending consultation link notification to user: ' . $consultation->user->email);
                $consultation->user->notify(new ConsultationLinkSent($consultation));
        }

        return to_route('consultation.index')->with('success','La Consultation a été modifié avec succès !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consultation $consultation)
    {
        // $consultation = Consultation::findOrFail($id);
        $consultation->delete();
        return back()->with('success','La consultation a été supprimer avec succès !');

    }
}
