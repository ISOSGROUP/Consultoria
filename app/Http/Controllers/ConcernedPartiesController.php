<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateConcernedPartiesRequest;
use App\Http\Requests\UpdateConcernedPartiesRequest;
use App\Repositories\ConcernedPartiesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ConcernedPartiesController extends AppBaseController
{
    /** @var ConcernedPartiesRepository $concernedPartiesRepository*/
    private $concernedPartiesRepository;

    public function __construct(ConcernedPartiesRepository $concernedPartiesRepo)
    {
        $this->concernedPartiesRepository = $concernedPartiesRepo;
    }

    /**
     * Display a listing of the ConcernedParties.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $concernedParties = $this->concernedPartiesRepository->all();

        return view('concerned_parties.index')
            ->with('concernedParties', $concernedParties);
    }

    /**
     * Show the form for creating a new ConcernedParties.
     *
     * @return Response
     */
    public function create()
    {
        return view('concerned_parties.create');
    }

    /**
     * Store a newly created ConcernedParties in storage.
     *
     * @param CreateConcernedPartiesRequest $request
     *
     * @return Response
     */
    public function store(CreateConcernedPartiesRequest $request)
    {
        $input = $request->all();

        $concernedParties = $this->concernedPartiesRepository->create($input);

        Flash::success('registro guardado con éxito.');

        return redirect(route('ConcernedParties.index'));
    }

    /**
     * Display the specified ConcernedParties.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $concernedParties = $this->concernedPartiesRepository->find($id);

        if (empty($concernedParties)) {
            Flash::error('Concerned Parties not found');

            return redirect(route('concernedParties.index'));
        }

        return view('concerned_parties.show')->with('concernedParties', $concernedParties);
    }

    /**
     * Show the form for editing the specified ConcernedParties.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $concernedParties = $this->concernedPartiesRepository->find($id);

        if (empty($concernedParties)) {
            Flash::error('Concerned Parties not found');

            return redirect(route('concernedParties.index'));
        }

        return view('concerned_parties.edit')->with('concernedParties', $concernedParties);
    }

    /**
     * Update the specified ConcernedParties in storage.
     *
     * @param int $id
     * @param UpdateConcernedPartiesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConcernedPartiesRequest $request)
    {
        $concernedParties = $this->concernedPartiesRepository->find($id);

        if (empty($concernedParties)) {
            Flash::error('Concerned Parties not found');

            return redirect(route('concernedParties.index'));
        }

        $concernedParties = $this->concernedPartiesRepository->update($request->all(), $id);

        Flash::success('registro actualizado con éxito.');

        return redirect(route('ConcernedParties.index'));
    }

    /**
     * Remove the specified ConcernedParties from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $concernedParties = $this->concernedPartiesRepository->find($id);

        if (empty($concernedParties)) {
            Flash::error('Concerned Parties not found');

            return redirect(route('ConcernedParties.index'));
        }

        $this->concernedPartiesRepository->delete($id);

        Flash::success('registro eliminado con exito.');

        return redirect(route('ConcernedParties.index'));
    }
}
