<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRiesgosRequest;
use App\Http\Requests\UpdateRiesgosRequest;
use App\Repositories\RiesgosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use DB;
use App\Models\ConcernedParties;
use App\Models\Foda;

use Response;

class RiesgosController extends AppBaseController
{
    /** @var RiesgosRepository $riesgosRepository*/
    private $riesgosRepository;

    public function __construct(RiesgosRepository $riesgosRepo)
    {
        $this->riesgosRepository = $riesgosRepo;
        $this->middleware('permission:user-list|Riesgos', ['only' => ['index']]);
        $this->middleware('permission:Riesgos', ['only' => ['show','create','edit','store','destroy']]);
    }

    /**
     * Display a listing of the Riesgos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $riesgos = $this->riesgosRepository->all();

        $user = DB::table('foda_users')
                    ->where('id', 2)
                    ->select('foda_users.id','foda_users.name','foda_users.date')
                    ->get();

        $users = DB::table('users')
                    ->select('users.id','users.name')
                    ->get();

        $filledArray;
        foreach($users as $key => $value) {
            $filledArray[$value->name] = $value->name;
        }

        //return view('riesgos.index')->with('riesgos', $riesgos)->with('user', $user);
        return view('riesgos.index', compact('riesgos', 'user','users'));

    }

    /**
     * Show the form for creating a new Riesgos.
     *
     * @return Response
     */
    public function create()
    {
        $concernedParties = ConcernedParties::get();

        $filledArray[0] = "";
        if(count($concernedParties)>0){

            foreach($concernedParties as $key => $value) {
                $filledArray[$value->concerned_parties] = $value->concerned_parties;
            }
        } 

        $weaknesses = Foda::select('foda.name', 'foda_details.description','foda_details.id')
                    ->join('foda_details', 'foda.id', '=', 'foda_details.foda_id')
                    ->where('foda.name', '=', "weaknesses")
                    ->get();

        $strengths = Foda::select('foda.name', 'foda_details.description','foda_details.id')
                    ->join('foda_details', 'foda.id', '=', 'foda_details.foda_id')
                    ->where('foda.name', '=', "strengths")
                    ->get();

        $opportunities = Foda::select('foda.name', 'foda_details.description','foda_details.id')
                        ->join('foda_details', 'foda.id', '=', 'foda_details.foda_id')
                        ->where('foda.name', '=', "opportunities")
                        ->get();

        $threats = Foda::select('foda.name', 'foda_details.description','foda_details.id')
                    ->join('foda_details', 'foda.id', '=', 'foda_details.foda_id')
                    ->where('foda.name', '=', "threats")
                    ->get();
        $allFoda;

        $allFoda["weaknesses"] = $weaknesses;
        $allFoda["strengths"] = $strengths;
        $allFoda["opportunities"] = $opportunities;
        $allFoda["threats"] = $threats;

        $largest = 0;
        foreach ($allFoda as $key => $value) {

            if (sizeof($allFoda[$key]) > $largest) {
                $largest = sizeof($allFoda[$key]);
            }
        }

        //dd($largest);

        $foda_reference = [];
        $foda_reference = json_encode($foda_reference);
        $risk_chance_radio = [];
        $is_effective = [];
        $execution_time = "";
        $interested_part = "";
        $responsible = "";
        $responsible_for_monitoring = "";

        $users = DB::table('users')
        ->select('users.id','users.name')
        ->get();

                            /*DB::table('riesgos')
                        ->join('risks_opportunities_foda', 'risks_opportunities_foda.risks_opportunities_id', '=', 'riesgos.id')
                        ->join('foda_details', 'foda_details.id', '=', 'risks_opportunities_foda.foda_details_id')
                        ->where('risks_opportunities_foda.id', '=', 0)
                        ->select('risks_opportunities_foda.foda_details_id as id')
                        ->get();
                            */

        return view('riesgos.create', compact('filledArray', 'allFoda','largest','foda_reference','risk_chance_radio','is_effective','execution_time','interested_part','responsible','users','responsible_for_monitoring'));
    }

    /**
     * Store a newly created Riesgos in storage.
     *
     * @param CreateRiesgosRequest $request
     *
     * @return Response
     */
    public function store(CreateRiesgosRequest $request)
    {
        $input = $request->all();

        $input["foda_reference"] = (($request->has('foda_reference')? serialize(array_keys($input["foda_reference"])) : $riesgos["foda_reference"] = "")); //;
        $input["interested_part"] = (($request->has('interested_part')? serialize($input["interested_part"]) : $riesgos["interested_part"] = "")); //;
        $input["responsible"] = (($request->has('responsible')? serialize($input["responsible"]) : $riesgos["responsible"] = "")); //;
        $input["responsible_for_monitoring"] = (($request->has('responsible_for_monitoring')? serialize($input["responsible_for_monitoring"]) : $riesgos["responsible_for_monitoring"] = "")); //;

        $riesgos = $this->riesgosRepository->create($input);

        Flash::success('registro guardado con éxito.');

        return redirect(route('riesgos.index'));
    }

    public function saveUserRisksChance(Request $request){

        $value = $request->all();

        DB::table('foda_users')
        ->where('id',$value["id"])
        ->update([
            'name'=> $value["user"],
            'date'=> $value["date"]
        ]);
        return redirect(route('riesgos.index'));

    }


    /**
     * Display the specified Riesgos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $riesgos = $this->riesgosRepository->find($id);

        if (empty($riesgos)) {
            Flash::error('Riesgos not found');

            return redirect(route('riesgos.index'));
        }

        return view('riesgos.show')->with('riesgos', $riesgos);
    }

    /**
     * Show the form for editing the specified Riesgos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $riesgos = $this->riesgosRepository->find($id);
        $foda_reference =  json_encode(unserialize($riesgos->foda_reference));
        $interested_part =  json_encode(unserialize($riesgos->interested_part));
        $responsible =  json_encode(unserialize($riesgos->responsible));
        $responsible_for_monitoring =  json_encode(unserialize($riesgos->responsible_for_monitoring));


        $concernedParties = ConcernedParties::get();
        $filledArray[0] = "";
        if(count($concernedParties)>0){

            foreach($concernedParties as $key => $value) {
                $filledArray[$value->concerned_parties] = $value->concerned_parties;
            }
        } 

        $weaknesses = Foda::select('foda.name', 'foda_details.description','foda_details.id')
                    ->join('foda_details', 'foda.id', '=', 'foda_details.foda_id')
                    ->where('foda.name', '=', "weaknesses")
                    ->get();

        $strengths = Foda::select('foda.name', 'foda_details.description','foda_details.id')
                    ->join('foda_details', 'foda.id', '=', 'foda_details.foda_id')
                    ->where('foda.name', '=', "strengths")
                    ->get();

        $opportunities = Foda::select('foda.name', 'foda_details.description','foda_details.id')
                        ->join('foda_details', 'foda.id', '=', 'foda_details.foda_id')
                        ->where('foda.name', '=', "opportunities")
                        ->get();

        $threats = Foda::select('foda.name', 'foda_details.description','foda_details.id')
                    ->join('foda_details', 'foda.id', '=', 'foda_details.foda_id')
                    ->where('foda.name', '=', "threats")
                    ->get();
        $allFoda;

        $allFoda["weaknesses"] = $weaknesses;
        $allFoda["strengths"] = $strengths;
        $allFoda["opportunities"] = $opportunities;
        $allFoda["threats"] = $threats;

        $largest = 0;
        foreach ($allFoda as $key => $value) {

            if (sizeof($allFoda[$key]) > $largest) {
                $largest = sizeof($allFoda[$key]);
            }
        }



        if (empty($riesgos)) {
            Flash::error('Riesgos not found');

            return redirect(route('riesgos.index'));
        }


        $risk_chance_radio = $riesgos->risk_chance_radio;
        $is_effective = $riesgos->is_effective;
        $execution_time = $riesgos->execution_time;

        $users = DB::table('users')
                    ->select('users.id','users.name')
                    ->get();

        //dd($riesgos->risk_chance_radio);
        return view('riesgos.edit', compact('filledArray', 'allFoda','largest','foda_reference','riesgos','risk_chance_radio','is_effective','execution_time','users','interested_part','responsible','responsible_for_monitoring'));

    }

    /**
     * Update the specified Riesgos in storage.
     *
     * @param int $id
     * @param UpdateRiesgosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRiesgosRequest $request)
    {
        $riesgos = $this->riesgosRepository->find($id);

        $input = $request->all();
        $input["foda_reference"] = (($request->has('foda_reference')? serialize(array_keys($input["foda_reference"])) : $riesgos->foda_reference = "")); //;
        $input["interested_part"] = (($request->has('interested_part')? serialize($input["interested_part"]) : $riesgos->interested_part = "")); //;
        $input["responsible"] = (($request->has('responsible')? serialize($input["responsible"]) : $riesgos->responsible = "")); //;
        $input["responsible_for_monitoring"] = (($request->has('responsible_for_monitoring')? serialize($input["responsible_for_monitoring"]) : $riesgos->responsible_for_monitoring = "")); //;


        if (empty($riesgos)) {
            Flash::error('Riesgos not found');

            return redirect(route('riesgos.index'));
        }

        $riesgos = $this->riesgosRepository->update($input, $id);

        Flash::success('registro actualizado con éxito.');

        return redirect(route('riesgos.index'));
    }

    /**
     * Remove the specified Riesgos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $riesgos = $this->riesgosRepository->find($id);

        if (empty($riesgos)) {
            Flash::error('Riesgos not found');

            return redirect(route('riesgos.index'));
        }

        $this->riesgosRepository->delete($id);

        Flash::success('registro eliminado con exito.');

        return redirect(route('riesgos.index'));
    }


    public function createPDF() {

       
       
        $riesgos = $this->riesgosRepository->all();

        $user = DB::table('foda_users')
                    ->where('id', 2)
                    ->select('foda_users.id','foda_users.name','foda_users.date')
                    ->get();

        $users = DB::table('users')
                    ->select('users.id','users.name')
                    ->get();

        $filledArray;
        foreach($users as $key => $value) {
            $filledArray[$value->name] = $value->name;
        }





        $weaknesses = Foda::select('foda.name', 'foda_details.description','foda_details.id')
                    ->join('foda_details', 'foda.id', '=', 'foda_details.foda_id')
                    ->where('foda.name', '=', "weaknesses")
                    ->get();

        $strengths = Foda::select('foda.name', 'foda_details.description','foda_details.id')
                    ->join('foda_details', 'foda.id', '=', 'foda_details.foda_id')
                    ->where('foda.name', '=', "strengths")
                    ->get();

        $opportunities = Foda::select('foda.name', 'foda_details.description','foda_details.id')
                        ->join('foda_details', 'foda.id', '=', 'foda_details.foda_id')
                        ->where('foda.name', '=', "opportunities")
                        ->get();

        $threats = Foda::select('foda.name', 'foda_details.description','foda_details.id')
                    ->join('foda_details', 'foda.id', '=', 'foda_details.foda_id')
                    ->where('foda.name', '=', "threats")
                    ->get();
        $allFoda;

        $allFoda["weaknesses"] = $weaknesses;
        $allFoda["strengths"] = $strengths;
        $allFoda["opportunities"] = $opportunities;
        $allFoda["threats"] = $threats;

        $largest = 0;
        foreach ($allFoda as $key => $value) {

            if (sizeof($allFoda[$key]) > $largest) {
                $largest = sizeof($allFoda[$key]);
            }
        }



        //return view('riesgos.edit', compact('filledArray', 'allFoda','largest','foda_reference','riesgos','risk_chance_radio','is_effective','execution_time','users','interested_part','responsible','responsible_for_monitoring'));

        $pdf = \PDF::loadView('riesgos.pdf.pdf',compact('riesgos', 'user','users','filledArray', 'allFoda','largest'));
        $pdf->setOptions([
            'header-html'=> view('riesgos.pdf.header')
        ]);
        return $pdf->stream('pdf_file.pdf');



    }

}
