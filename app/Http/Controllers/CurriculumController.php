<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCurriculumRequest;
use App\Http\Requests\UpdateCurriculumRequest;
use App\Repositories\CurriculumRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;
use App\Models\Curriculum;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class CurriculumController extends AppBaseController
{
    /** @var CurriculumRepository $curriculumRepository*/
    private $curriculumRepository;

    public function __construct(CurriculumRepository $curriculumRepo)
    {
        $this->curriculumRepository = $curriculumRepo;
    }

    /**
     * Display a listing of the Curriculum.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $curricula = $this->curriculumRepository->all();

        return view('curricula.index')
            ->with('curricula', $curricula);
    }

    /**
     * Show the form for creating a new Curriculum.
     *
     * @return Response
     */
    public function create()
    {

        $education["universitario"] = 0;
        $education["Doctorado"] = 0;
        $education["Tecnico"] = 0;
        $education["Maestria"] = 0;
        $education["Secundaria"] = 0;
        $education["Diplomado"] = 0;
        $education["N/A"] = 0;


        return view('curricula.create',compact('education'));
    }

    /**
     * Store a newly created Curriculum in storage.
     *
     * @param CreateCurriculumRequest $request
     *
     * @return Response
     */
    public function store(CreateCurriculumRequest $request)
    {
        $input = $request->all();

        $curriculum = $this->curriculumRepository->create($input);

        Flash::success('Curriculum saved successfully.');

        return redirect(route('curricula.index'));
    }

    /**
     * Display the specified Curriculum.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $curriculum = $this->curriculumRepository->find($id);

        if (empty($curriculum)) {
            Flash::error('Curriculum not found');

            return redirect(route('curricula.index'));
        }

        return view('curricula.show')->with('curriculum', $curriculum);
    }

    /**
     * Show the form for editing the specified Curriculum.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $curriculum = $this->curriculumRepository->find($id);
        $education =  unserialize($curriculum->education);

        if (empty($curriculum)) {
            Flash::error('Curriculum not found');

            return redirect(route('curricula.index'));
        }

        return view('curricula.edit',compact('curriculum','education'));

    }

    /**
     * Update the specified Curriculum in storage.
     *
     * @param int $id
     * @param UpdateCurriculumRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCurriculumRequest $request)
    {
        $curriculum = $this->curriculumRepository->find($id);

        $checkboxList["universitario"] = 0;
        $checkboxList["Doctorado"] = 0;
        $checkboxList["Tecnico"] = 0;
        $checkboxList["Maestria"] = 0;
        $checkboxList["Secundaria"] = 0;
        $checkboxList["Diplomado"] = 0;
        $checkboxList["N/A"] = 0;

        $input = $request->all();

        if($request->has('values')){

            foreach ($input["values"] as $key => $value) {

                $checkboxList[$key] = 1;
            }
        }
        $input["education"] = (($request->has('values') ? serialize($checkboxList) : "")); //;

        //dd($input);

        if (empty($curriculum)) {
            Flash::error('Curriculum not found');

            return redirect(route('curricula.index'));
        }

        $curriculum = $this->curriculumRepository->update($input, $id);

        Flash::success('Curriculum updated successfully.');

        return redirect(route('curricula.index'));
    }

    /**
     * Remove the specified Curriculum from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $curriculum = $this->curriculumRepository->find($id);

        if (empty($curriculum)) {
            Flash::error('Curriculum not found');

            return redirect(route('curricula.index'));
        }

        $this->curriculumRepository->delete($id);

        Flash::success('Curriculum deleted successfully.');

        return redirect(route('curricula.index'));
    }


    public function upload_file(Request $request){

        $curriculum = Curriculum::where("user_id", Auth::user()->id)->first();

        $file_fields;
        $file_fields[0] = "certificates";
        $file_fields[1] = "dni_frontal_posterior"; 
        $file_fields[2] = "antecedentes"; 

        $path;
        $name;

        for ( $i = 0; $i < sizeof($file_fields); $i++)
        {
            if ($request->hasFile($file_fields[$i])) {
                $filePath = 'curriculum/';

                if (!file_exists(storage_path($filePath))) {
                    Storage::makeDirectory('public/'.$filePath, 0777, true);
                }
                $name = uniqid().'.'.$request->file($file_fields[$i])->getClientOriginalExtension();
                $path = $filePath.$name;

                if (is_file(storage_path('/app/public/'.$curriculum[$file_fields[$i]]))){   
                   unlink(storage_path('/app/public/'.$curriculum[$file_fields[$i]]));
                }
                $request->file($file_fields[$i])->storeAs('public/'.$filePath, $name);
                $curriculum->update([$file_fields[$i] => $path]);
            }
        }

        return response()->json(
        [
            'url'=> url('/storage/'.$path),
            'message'=> $name.' subido',
            'file_name'=> $name
        ], 200);
    }


}
