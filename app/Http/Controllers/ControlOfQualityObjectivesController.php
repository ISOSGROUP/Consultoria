<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateControlOfQualityObjectivesRequest;
use App\Http\Requests\UpdateControlOfQualityObjectivesRequest;
use App\Repositories\ControlOfQualityObjectivesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

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
    public function create()
    {
        return view('control_of_quality_objectives.create');
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

        if (empty($controlOfQualityObjectives)) {
            Flash::error('Control Of Quality Objectives not found');

            return redirect(route('controlOfQualityObjectives.index'));
        }

        return view('control_of_quality_objectives.edit')->with('controlOfQualityObjectives', $controlOfQualityObjectives);
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

        if (empty($controlOfQualityObjectives)) {
            Flash::error('Control Of Quality Objectives not found');

            return redirect(route('controlOfQualityObjectives.index'));
        }

        $controlOfQualityObjectives = $this->controlOfQualityObjectivesRepository->update($request->all(), $id);

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
