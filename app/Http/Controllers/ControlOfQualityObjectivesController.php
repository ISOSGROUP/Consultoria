<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateControlOfQualityObjectivesRequest;
use App\Http\Requests\UpdateControlOfQualityObjectivesRequest;
use App\Repositories\ControlOfQualityObjectivesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use DB;

class ControlOfQualityObjectivesController extends AppBaseController
{
    /** @var ControlOfQualityObjectivesRepository $controlOfQualityObjectivesRepository*/
    private $controlOfQualityObjectivesRepository;

    public function __construct(ControlOfQualityObjectivesRepository $controlOfQualityObjectivesRepo)
    {
        $this->controlOfQualityObjectivesRepository = $controlOfQualityObjectivesRepo;
    }

    /**
     * Display a listing of the ControlOfQualityObjectives.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $controlOfQualityObjectives = $this->controlOfQualityObjectivesRepository->all();

        return view('control_of_quality_objectives.index')
            ->with('controlOfQualityObjectives', $controlOfQualityObjectives);
    }

    /**
     * Show the form for creating a new ControlOfQualityObjectives.
     *
     * @return Response
     */
    public function create(){
        $users = DB::table('users')
        ->select('users.id','users.name')
        ->get();

        $responsible = "";
        $responsible_for_providing_data = "";

        //return view('control_of_quality_objectives.create');
        return view('control_of_quality_objectives.create', compact('users','responsible','responsible_for_providing_data'));

    }

    /**
     * Store a newly created ControlOfQualityObjectives in storage.
     *
     * @param CreateControlOfQualityObjectivesRequest $request
     *
     * @return Response
     */
    public function store(CreateControlOfQualityObjectivesRequest $request)
    {
        $input = $request->all();


        $input["responsible"] = (($request->has('responsible')? serialize($input["responsible"]) : $riesgos["responsible"] = "")); //;
        $input["responsible_for_providing_data"] = (($request->has('responsible_for_providing_data')? serialize($input["responsible_for_providing_data"]) : $riesgos["responsible_for_providing_data"] = "")); //;


        $controlOfQualityObjectives = $this->controlOfQualityObjectivesRepository->create($input);

        Flash::success('Control Of Quality Objectives saved successfully.');

        return redirect(route('controlOfQualityObjectives.index'));
    }

    /**
     * Display the specified ControlOfQualityObjectives.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $controlOfQualityObjectives = $this->controlOfQualityObjectivesRepository->find($id);

        if (empty($controlOfQualityObjectives)) {
            Flash::error('Control Of Quality Objectives not found');

            return redirect(route('controlOfQualityObjectives.index'));
        }

        return view('control_of_quality_objectives.show')->with('controlOfQualityObjectives', $controlOfQualityObjectives);
    }

    /**
     * Show the form for editing the specified ControlOfQualityObjectives.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $controlOfQualityObjectives = $this->controlOfQualityObjectivesRepository->find($id);
        $responsible =  json_encode(unserialize($controlOfQualityObjectives->responsible));
        $responsible_for_providing_data =  json_encode(unserialize($controlOfQualityObjectives->responsible_for_providing_data));

        if (empty($controlOfQualityObjectives)) {
            Flash::error('Control Of Quality Objectives not found');

            return redirect(route('controlOfQualityObjectives.index'));
        }

        $users = DB::table('users')
        ->select('users.id','users.name')
        ->get();

        //return view('control_of_quality_objectives.edit')->with('controlOfQualityObjectives', $controlOfQualityObjectives);

        return view('control_of_quality_objectives.edit', compact('users','controlOfQualityObjectives','responsible','responsible_for_providing_data'));

    }

    /**
     * Update the specified ControlOfQualityObjectives in storage.
     *
     * @param int $id
     * @param UpdateControlOfQualityObjectivesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateControlOfQualityObjectivesRequest $request)
    {
        $controlOfQualityObjectives = $this->controlOfQualityObjectivesRepository->find($id);

        $input = $request->all();

        $input["responsible"] = (($request->has('responsible')? serialize($input["responsible"]) : $controlOfQualityObjectives->responsible = "")); //;
        $input["responsible_for_providing_data"] = (($request->has('responsible_for_providing_data')? serialize($input["responsible_for_providing_data"]) : $controlOfQualityObjectives->responsible_for_providing_data = "")); //;

        if (empty($controlOfQualityObjectives)) {
            Flash::error('Control Of Quality Objectives not found');

            return redirect(route('controlOfQualityObjectives.index'));
        }

        $controlOfQualityObjectives = $this->controlOfQualityObjectivesRepository->update($input, $id);

        Flash::success('Control Of Quality Objectives updated successfully.');

        return redirect(route('controlOfQualityObjectives.index'));
    }

    /**
     * Remove the specified ControlOfQualityObjectives from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $controlOfQualityObjectives = $this->controlOfQualityObjectivesRepository->find($id);

        if (empty($controlOfQualityObjectives)) {
            Flash::error('Control Of Quality Objectives not found');

            return redirect(route('controlOfQualityObjectives.index'));
        }

        $this->controlOfQualityObjectivesRepository->delete($id);

        Flash::success('Control Of Quality Objectives deleted successfully.');

        return redirect(route('controlOfQualityObjectives.index'));
    }
}
