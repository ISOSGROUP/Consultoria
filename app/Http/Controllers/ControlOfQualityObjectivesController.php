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
use Carbon\Carbon;
use DateTime;
use Dompdf\Dompdf;
use Barryvdh\Snappy;
use PDF;


class ControlOfQualityObjectivesController extends AppBaseController
{
    /** @var ControlOfQualityObjectivesRepository $controlOfQualityObjectivesRepository*/
    private $controlOfQualityObjectivesRepository;


    public function __construct(ControlOfQualityObjectivesRepository $controlOfQualityObjectivesRepo)
    {
        $this->controlOfQualityObjectivesRepository = $controlOfQualityObjectivesRepo;
        $this->middleware('permission:user-list|Control de objetivos', ['only' => ['index']]);
        $this->middleware('permission:Control de objetivos', ['only' => ['show','create','edit','store','destroy']]);

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

        $user = DB::table('foda_users')
                    ->where('id', 3)
                    ->select('foda_users.id','foda_users.name','foda_users.date')
                    ->get();

        $users = DB::table('users')
                    ->select('users.id','users.name')
                    ->get();

        $filledArray;
        foreach($users as $key => $value) {
            $filledArray[$value->name] = $value->name;
        }
        //return view('control_of_quality_objectives.index', compact('controlOfQualityObjectives', 'user','users'));
        return view('control_of_quality_objectives.index', compact('controlOfQualityObjectives', 'user','users'));

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

        $month_list["Enero"] = [0,0,0];
        $month_list["Febrero"] = [0,0,0];
        $month_list["Marzo"] = [0,0,0];
        $month_list["Abril"] = [0,0,0];
        $month_list["Mayo"] = [0,0,0];
        $month_list["Junio"] = [0,0,0];
        $month_list["Julio"] = [0,0,0];
        $month_list["Agosto"] = [0,0,0];
        $month_list["Setiembre"] = [0,0,0];
        $month_list["Octubre"] = [0,0,0];
        $month_list["Noviembre"] = [0,0,0];
        $month_list["Diciembre"] = [0,0,0];

        $activities = "{}";
        $id_formula = "";


        $bueno = "";
        $regular_1 = "";
        $regular_2 = "";
        $malo = "";


        return view('control_of_quality_objectives.create', compact('users','responsible','responsible_for_providing_data','month_list','activities','id_formula','bueno','regular_1','regular_2','malo'));

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

        //dd($input);
        /*$monthList["Enero"] = [0,0,0];
        $monthList["Febrero"] = [0,0,0];
        $monthList["Marzo"] = [0,0,0];
        $monthList["Abril"] = [0,0,0];
        $monthList["Mayo"] = [0,0,0];
        $monthList["Junio"] = [0,0,0];
        $monthList["Julio"] = [0,0,0];
        $monthList["Agosto"] = [0,0,0];
        $monthList["Setiembre"] = [0,0,0];
        $monthList["Octubre"] = [0,0,0];
        $monthList["Noviembre"] = [0,0,0];
        $monthList["Diciembre"] = [0,0,0];

        if($request->has('values')){

            foreach ($input["values"] as $key => $value) {

                $item = explode(',', $key);

                if (array_key_exists($item[0], $monthList) && array_key_exists(1, $item)) {

                    $monthList[$item[0]][0] = 1;
                    (($item[1] == "data_1")? $monthList[$item[0]][1] = $value : "");
                    (($item[1] == "data_2")? $monthList[$item[0]][2] = $value  : "");

                }else{

                    $monthList[$item[0]] = [0,0,0];

                }

            }
        }
*/




        $monthList;

        if($request->has('values')){

            foreach ($input["values"] as $key => $value) {

                $item = explode(',', $key);

                if (array_key_exists(1, $item)) {

                    (($item[1] == "data_1")? $monthList[$item[0]][0] = $value : "");
                    (($item[1] == "data_2")? $monthList[$item[0]][1] = $value  : "");

                } 
            }
        }

        $input["month_list"] = (($request->has('values') ? serialize($monthList) : "")); //;
        $input["responsible"] = (($request->has('responsible')? serialize($input["responsible"]) : $riesgos["responsible"] = "")); //;
        $input["responsible_for_providing_data"] = (($request->has('responsible_for_providing_data')? serialize($input["responsible_for_providing_data"]) : $riesgos["responsible_for_providing_data"] = "")); //;


        $controlOfQualityObjectives = $this->controlOfQualityObjectivesRepository->create($input);

        Flash::success('Control Of Quality Objectives saved successfully.');

        return redirect(route('controlOfQualityObjectives.index'));
    }

    public function saveUserControlOfQualityObjectives(Request $request){

        $value = $request->all();

        DB::table('foda_users')
        ->where('id',$value["id"])
        ->update([
            'name'=> $value["user"],
            'date'=> $value["date"]
        ]);
        return redirect(route('controlOfQualityObjectives.index'));

    }

    /**
     * Display the specified ControlOfQualityObjectives.
     *
     * @param int $id
     *
     * @return Response
     */
    public function formula($id,$data_1,$data_2){

        $value2 = "";
        (($id == 1) ? (($data_1 != 0)? $value2 = round(($data_2 *100)/$data_1, 0): $value2 = 0): 0); 
        (($id == 2) ? (($data_1 != 0)? $value2 = round(($data_2 *100)/$data_1, 0): $value2 = 0): 0); 
        (($id == 3) ? (($data_1 != 0)? $value2 = $data_1: $value2 = 0): 0); 
        (($id == 4) ? (($data_1 != 0)? $value2 = $data_1: $value2 = 0): 0); 


        return $value2;
    }
    public function addMeses($list,$grouped_months,$i,$data_1,$data_2,$flat,$value){

        $list["meses"][$i] = ltrim($grouped_months, '-'); 
        $list["events"][$i] = $value;

        $i += 1;
        $grouped_months = "";
        $data_1 = 0;
        $data_2 = 0;
        $flat = 0;

        return $list;

    }
    public function show($id){
        
        $controlOfQualityObjectives = $this->controlOfQualityObjectivesRepository->find($id);
        $month_list =  unserialize($controlOfQualityObjectives->month_list);


       // $number_of_months_included = 0;

        //foreach ($month_list as $key => $value) {

          //  if($value[0] == 1){
            //    $number_of_months_included += 1;
            //}
        //}
        //dd($controlOfQualityObjectives->measurement_frequency);

       
        $flat = 0;
        $grouped_months = "";
        $data_1 = 0;
        $data_2 = 0;
        $list["meses"] = [];
        $list["events"] = [];
        $list["goal"] = [];
        $list["good"] = [];
        $list["regular_1"] = [];
        $list["regular_2"] = [];

        $list["bad"] = [];


        $i = 0;
        $flat2 = false;
        $previous_key = "";


        //dd($controlOfQualityObjectives->bueno);
        //$list["events"][$i] = $this->formula($controlOfQualityObjectives->formula,$value[0], (array_key_exists(1, $value) ? $value[1]: ""));

        foreach ($month_list as $key => $value) {

            $list["meses"][$i] = $key;
            //$list["events"][$i] = $this->formula($controlOfQualityObjectives->formula,$value[0],$value[1]);
            $list["events"][$i] = $this->formula($controlOfQualityObjectives->formula,$value[0], (array_key_exists(1, $value) ? $value[1]: ""));

            $list["goals"][$i] = $controlOfQualityObjectives->goals;
            $list["good"][$i] = $controlOfQualityObjectives->bueno;
            $list["regular_1"][$i] = $controlOfQualityObjectives->regular_1;
            $list["regular_2"][$i] = $controlOfQualityObjectives->regular_2;
            $list["bad"][$i] = $controlOfQualityObjectives->malo;
            $i += 1;
        }

        /*
        foreach ($month_list as $key => $value) {

            if($value[0] == 1){
                $flat += 1;
                $grouped_months = $grouped_months.'-'.substr($key , 0, 3);
                $data_1 += $value[1];
                $data_2 += $value[2];
                (($controlOfQualityObjectives->measurement_frequency == 1) ?$flat2 = true:$flat2 = false);
                //$previous_key = $key;

            }else{

                //$value = $this->formula($controlOfQualityObjectives->formula,$data_1,$data_2);

                //(($previous_key != $key && array_key_exists($previous_key, $month_list) ) ?  (($month_list[$previous_key][0] == 1)? $list = $this->addMeses($list,$grouped_months,$i,$data_1,$data_2,$flat,$value):"") :"");
                //if($previous_key != $key && array_key_exists($previous_key, $month_list)){

                    //if($month_list[$previous_key][0] == 1){

                        //$list["meses"][$i] = ltrim($grouped_months, '-'); 
                        //$list["events"][$i] = $value;
                        //$i += 1;
                        //$grouped_months = "";
                        //$data_1 = 0;
                        //$data_2 = 0;
                        //$flat = 0;

                //    }
                //}

                $list["meses"][$i] = $key;
                $list["events"][$i] = 0;
                $i += 1;
                $flat += 1;

                $flat2 = false;
                


            }
            if($flat == $controlOfQualityObjectives->measurement_frequency){

                $www = $this->formula($controlOfQualityObjectives->formula,$data_1,$data_2);

                if($flat2){


                    $list["meses"][$i] = ltrim($grouped_months, '-'); 
                    //$list["events"][$i] = (($data_1 != 0)? round(($data_2 *100)/$data_1, 0): 0);// round(($data_2 *100)/$data_1, 0);
                    $list["events"][$i] = $www;

                    $i += 1;
                    $grouped_months = "";
                    $data_1 = 0;
                    $data_2 = 0;

                
                }
                if($controlOfQualityObjectives->measurement_frequency > 1){

                    $list["meses"][$i] = ltrim($grouped_months, '-'); 
                    //$list["events"][$i] = (($data_1 != 0)? round(($data_2 *100)/$data_1, 0): 0);// round(($data_2 *100)/$data_1, 0);
                    $list["events"][$i] = $www;

                    $i += 1;
                    $grouped_months = "";
                    $data_1 = 0;
                    $data_2 = 0;

                
                }
                //$list["meses"][$i] = ltrim($grouped_months, '-'); 
                //$list["events"][$i] = (($data_1 != 0)? round(($data_2 *100)/$data_1, 0): 0);// round(($data_2 *100)/$data_1, 0);
                
                //$list["events"][$i][1] = $data_2;

                //$grouped_months = "";
                $flat = 0;
                //$data_1 = 0;
                //$data_2 = 0;
                //$i += 1;

            }
        }
        */
        //dd($controlOfQualityObjectives->formula);
        //dd($list);

        if (empty($controlOfQualityObjectives)) {
            Flash::error('Control Of Quality Objectives not found');

            return redirect(route('controlOfQualityObjectives.index'));
        }

        return view('control_of_quality_objectives.show')->with('controlOfQualityObjectives', $controlOfQualityObjectives)->with('list', $list);
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

        //dd($controlOfQualityObjectives);
        $month_list =  unserialize($controlOfQualityObjectives->month_list);

        $flat = 0;
        $grouped_months = "";
        $data_1 = 0;
        $data_2 = 0;
        $list["meses"] = [];
        $list["events"] = [];
        $i = 0;
        $flat2 = false;
        $previous_key = "";

        /*
        foreach ($month_list as $key => $value) {

            if($value[0] == 1){
                $flat += 1;
                $grouped_months = $grouped_months.'-'.substr($key , 0, 3);
                $data_1 += $value[1];
                $data_2 += $value[2];
                (($controlOfQualityObjectives->measurement_frequency == 1) ?$flat2 = true:$flat2 = false);

            }else{

                $list["meses"][$i] = $key;
                $list["events"][$i] = 0;
                $i += 1;
                $flat += 1;
                $flat2 = false;
            }
            if($flat == $controlOfQualityObjectives->measurement_frequency){

                $www = $this->formula($controlOfQualityObjectives->formula,$data_1,$data_2);

                if($flat2){

                    $list["meses"][$i] = ltrim($grouped_months, '-'); 
                    $list["events"][$i] = $www;
                    $i += 1;
                    $grouped_months = "";
                    $data_1 = 0;
                    $data_2 = 0;
                }
                if($controlOfQualityObjectives->measurement_frequency > 1){

                    $list["meses"][$i] = ltrim($grouped_months, '-'); 
                    $list["events"][$i] = $www;
                    $i += 1;
                    $grouped_months = "";
                    $data_1 = 0;
                    $data_2 = 0;

                
                }
                $flat = 0;
            }
        }
*/
        $monthList[1] = ["Ene"];
        $monthList[2] = ["Feb"];
        $monthList[3] = ["Mar"];
        $monthList[4] = ["Abr"];
        $monthList[5] = ["May"];
        $monthList[6] = ["Jun"];
        $monthList[7] = ["Jul"];
        $monthList[8] = ["Ago"];
        $monthList[9] = ["Set"];
        $monthList[10] = ["Oct"];
        $monthList[11] = ["Nov"];
        $monthList[12] = ["Dic"];

        $mytime = Carbon::now();

        $percent_complete = 0;
        foreach ($list["meses"] as $key => $value) {


            if (str_contains($value, $monthList[$mytime->toArray()["month"]][0] )) {

                $percent_complete = $list["events"][$key];

            }

        }
        

        $controlOfQualityObjectives->status_to_date = $percent_complete.'%';
        $activities = $controlOfQualityObjectives->activities;
        $id_formula = $controlOfQualityObjectives->formula;
        $bueno = $controlOfQualityObjectives->bueno;
        $regular_1 = $controlOfQualityObjectives->regular_1;
        $regular_2 = $controlOfQualityObjectives->regular_2;
        $malo = $controlOfQualityObjectives->malo;

        if (empty($controlOfQualityObjectives)) {
            Flash::error('Control Of Quality Objectives not found');

            return redirect(route('controlOfQualityObjectives.index'));
        }

        $users = DB::table('users')
        ->select('users.id','users.name')
        ->get();

        return view('control_of_quality_objectives.edit', compact('users','controlOfQualityObjectives','responsible','responsible_for_providing_data','month_list','activities','id_formula','bueno','regular_1','regular_2','malo'));

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
        //dd($input);
        /*
        $monthList["Enero"] = [0,0,0];
        $monthList["Febrero"] = [0,0,0];
        $monthList["Marzo"] = [0,0,0];
        $monthList["Abril"] = [0,0,0];
        $monthList["Mayo"] = [0,0,0];
        $monthList["Junio"] = [0,0,0];
        $monthList["Julio"] = [0,0,0];
        $monthList["Agosto"] = [0,0,0];
        $monthList["Setiembre"] = [0,0,0];
        $monthList["Octubre"] = [0,0,0];
        $monthList["Noviembre"] = [0,0,0];
        $monthList["Diciembre"] = [0,0,0];
*/
        $monthList;

        if($request->has('values')){

            foreach ($input["values"] as $key => $value) {

                $item = explode(',', $key);

                if (array_key_exists(1, $item)) {

                    (($item[1] == "data_1")? $monthList[$item[0]][0] = $value : "");
                    (($item[1] == "data_2")? $monthList[$item[0]][1] = $value  : "");

                } 
            }
        }



        /*
        if($request->has('values')){

            foreach ($input["values"] as $key => $value) {

                $item = explode(',', $key);

                if (array_key_exists($item[0], $monthList) && array_key_exists(1, $item)) {

                    $monthList[$item[0]][0] = 1;
                    (($item[1] == "data_1")? $monthList[$item[0]][1] = $value : "");
                    (($item[1] == "data_2")? $monthList[$item[0]][2] = $value  : "");

                }else{

                    $monthList[$item[0]] = [0,0,0];

                }

            }
        }
*/
        $input["month_list"] = (($request->has('values')? serialize($monthList) : $controlOfQualityObjectives->month_list = "")); //;

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

    public function createPDF() {

        $controlOfQualityObjectives = $this->controlOfQualityObjectivesRepository->all();
        $user = DB::table('foda_users')
        ->where('id', 3)
        ->select('foda_users.id','foda_users.name','foda_users.date')
        ->get();

        $users = DB::table('users')
        ->select('users.id','users.name')
        ->get();

        $filledArray;
            foreach($users as $key => $value) {
            $filledArray[$value->name] = $value->name;
        }
        //$pdf = PDF::setOptions(['isRemoteEnabled' => TRUE, 'enable_javascript' => TRUE]);
        //$pdf = PDF::loadView('control_of_quality_objectives.pdf', compact('controlOfQualityObjectives', 'user','users'))->setOptions(['defaultFont' => 'sans-serif']);
                                                                                                                                  // 'enable-javascript'=> true,
                                                                                                                                    //'javascript-delay'=> 5000]);
        //$pdf = PDF::loadView('control_of_quality_objectives.index', compact('controlOfQualityObjectives', 'user','users'))->setOptions(['defaultFont' => 'sans-serif']);
        
        //return $pdf->stream('result.pdf', array('Attachment'=>0));              
        //return $pdf->download('pdf_file.pdf');

       

 
        //$pdf = \PDF::loadView('control_of_quality_objectives.pdf', array('controlOfQualityObjectives' => $controlOfQualityObjectives,'user' => $user,'users' => $users));
        //$pdf = \PDF::loadView('control_of_quality_objectives.pdf', compact('controlOfQualityObjectives', 'user','users'));

        //$pdf->setOption('margin-top' , 50);



        //$html = view('control_of_quality_objectives.pdf', ['controlOfQualityObjectives' => $controlOfQualityObjectives, 'user' => $user, 'users' => $users])->render();
        //$pdf = \App::make('snappy.pdfr');
        //$pdf = \App::make('snappy.pdf.wrapper');
        //$pdf = $pdf->loadHTML($html);

        //$snappy = App::make('snappy.pdf');


        //$pdf = \PDF::loadHTML($html,'exmple2.pdf');
        //$pdf = PDF::loadView('control_of_quality_objectives.index', compact('controlOfQualityObjectives', 'user','users'));

        //return $pdf->stream("example2.pdf");

        //return $pdf->stream("example2.pdf");


        //PDF::setOptions(['enable_javascript' => TRUE]);
        //$dompdf = new Dompdf();
        //$html = view('control_of_quality_objectives.pdf', compact('controlOfQualityObjectives', 'user','users'))->render();
        //$dompdf->loadHtml($html);
        //$dompdf->render();

        //return $dompdf->download('card.pdf');

        //$html = \View::make('control_of_quality_objectives.test')->render();
        //$html = view('control_of_quality_objectives.test', compact('controlOfQualityObjectives'))->render();
        //$html = view('control_of_quality_objectives.test', compact(['controlOfQualityObjectives']));
        //$html = $this->render('control_of_quality_objectives.test');
        //$pdf = \PDF::loadView('control_of_quality_objectives.test',compact('controlOfQualityObjectives', 'user','users'))->setPaper('a4');
        //$pdf = \PDF::loadHTML($html,'UTF-8');
        
        //$pdf = \PDF::loadView('control_of_quality_objectives.test');
        //return \PDF::loadFile('http://127.0.0.1:8000/riesgos')->stream('github.pdf'); 
        //->inline('filename.pdf')
        //$pdf->setOption('enable-javascript', true);
        //$pdf->setOption('javascript-delay', 5000);
        //return $pdf->download('invoice.pdf');



        $pdf = \PDF::loadView('control_of_quality_objectives.pdf',compact('controlOfQualityObjectives', 'user','users'));
        //$html = view('control_of_quality_objectives.pdf', compact('controlOfQualityObjectives', 'user','users'))->render();
        //$pdf = \PDF::loadHTML($html,'UTF-8');
        $pdf->setOptions([
            'header-html'=> view('control_of_quality_objectives.pdf.header')
        ]);


        //$pdf->setOption('enable-javascript', true);
        //$pdf->setOption('javascript-delay', 5000);
        //$pdf->setOption('no-stop-slow-scripts', true);


        return $pdf->stream('pdf_file.pdf');



    }

}
