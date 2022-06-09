<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FodaRepository;
use DB;
use App\Models\Foda;

class FodaController extends Controller
{

    private $fodaRepository;

    public function __construct(FodaRepository $fodaRepo){

        $this->fodaRepository = $fodaRepo;

    }

    public function index(Request $request){

        $foda = $this->fodaRepository->all();


        $users = DB::table('users')
                    ->select('users.id','users.name')
                    ->get();

        return view('foda.index')->with('foda', $foda)->with('users', $users);
       // return view('layouts.test')->with('foda', $foda);

    }

    public function getFieldFodaStrategy(Request $request , $id_1 , $id_2){

        $foda = $this->fodaRepository->all();

        return view('foda.index')->with('foda', $foda);
    }

    public function insertFodaStrategiesDetails($value_1,$value_2){

        foreach($value_2 as $v) {

            DB::table('foda_strategies_details')->insert(
                [
                    'foda_strategies_id'=> $value_1,
                    'foda_details_id' => $v
                ]);

        }


    }
    public function getFodaUser(Request $request){

        $fodaUser = DB::table('foda_users')
                    ->where('id', 1)
                    ->select('foda_users.id','foda_users.name','foda_users.date')
                    ->get();
        return $fodaUser;
    }

    public function saveFodaUser(Request $request){

        $value = $request->all();

        DB::table('foda_users')
        ->where('id',$value["id"])
        ->update([
            'name'=> $value["user"],
            'date'=> $value["date"]
        ]);
        return redirect(route('foda.index'));

    }

    public function savefodaStrategies(Request $request){


        $json = $request->all();

        //$obj = explode(',', $obj);

        /*$foda = DB::table('foda_strategies')
                    ->where('foda_detail_1',$obj[0])
                    ->where('foda_detail_2',$obj[1])
                    ->select('foda_strategies.id','foda_strategies.strategy','foda_strategies.responsible','foda_strategies.budget','foda_strategies.status','foda_strategies.description')
                    ->get();
                    */
        //$obj[0] = Foda::where("name",$json[0])->pluck("id")->all();
        //$obj[1] = Foda::where("name",$obj[1])->pluck("id")->all();

        //return $json;

        $json["value"][0] = Foda::where("name",$json["value"][0])->pluck("id")->all();
        $json["value"][1] = Foda::where("name",$json["value"][1])->pluck("id")->all();





        DB::table('foda_strategies_details')->where('foda_strategies_id', '=', $json["value"][8])->delete();

        $foda = DB::table('foda_strategies')
                ->where('id', $json["value"][8])
                ->select('foda_strategies.id','foda_strategies.strategy','foda_strategies.responsible','foda_strategies.budget','foda_strategies.status','foda_strategies.description')
                ->get();


        if(count($foda) > 0) {

           
            DB::table('foda_strategies')
                ->where('id',$json["value"][8])
                ->update([
                    'strategy'=> $json["value"][2],
                    'responsible'=> $json["value"][3],
                    'budget'=> $json["value"][4],
                    'status'=> $json["value"][5],
                    'description'=> $json["value"][6],
                    'linked_strategy'=> $json["value"][7]
                ]);

            $value = ((count($json["value"]) > 9)? $json["value"][9]: []);
            $this->insertFodaStrategiesDetails($json["value"][8],$value);

            return  "update";


        } else {

            $id = DB::table('foda_strategies')->insertGetId(
                [
                    'foda_id_1' => $json["value"][0][0],
                    'foda_id_2' => $json["value"][1][0],
                    'strategy' => $json["value"][2],
                    'responsible' => $json["value"][3],
                    'budget' => $json["value"][4],
                    'status'=> $json["value"][5],
                    'description' => $json["value"][6],
                    'linked_strategy'=> $json["value"][7]

                ]);

                $value = ((count($json["value"]) > 9)? $json["value"][9]: []);

                $this->insertFodaStrategiesDetails($id, $value);

                return "insert";
        }

 
    }

    public function getFodaStrategies(Request $request,$value_1,$value_2,$id){


        if($id != "w"){

            $result = DB::table('foda_strategies')
                    ->where('foda_strategies.id', '=', $id)
                    ->select('foda_strategies.id','foda_strategies.strategy','foda_strategies.responsible','foda_strategies.budget','foda_strategies.status','foda_strategies.description','foda_strategies.linked_strategy')
                    ->get();
            

           


        }else{


            $value_1 = DB::table('foda')->where('foda.name', '=', $value_1)->pluck('foda.id')->all();
            $value_2 = DB::table('foda')->where('foda.name', '=', $value_2)->pluck('foda.id')->all();

            $r1 = (count($value_1) > 0) ? $value_1[0] : "";
            $r2 = (count($value_2) > 0) ? $value_2[0] : "";

            $result = DB::table('foda_strategies')
                    ->where('foda_strategies.foda_id_1', '=',$r1)
                    ->where('foda_strategies.foda_id_2', '=', $r2)
                    ->select('foda_strategies.id','foda_strategies.strategy','foda_strategies.responsible','foda_strategies.budget','foda_strategies.status','foda_strategies.description','foda_strategies.linked_strategy')
                    ->get();

             
            
        }

        if(count($result) > 0) {

            $allData;
            foreach($result as $key => $value) {

                $allData[$key][0] = $value;
                $allData[$key][1] = DB::table('foda_strategies_details')
                                        ->where('foda_strategies_details.foda_strategies_id', '=', $value->id)
                                        ->pluck('foda_strategies_details.foda_details_id')
                                        ->all();
            }

            return $allData;


        } else {

            return "false";
        }

    }

    public function deleteFodaDetail(Request $request, $name, $id){

        DB::table('foda_details')->where('id', '=', $id)->delete();
        return true;
    }

    public function deletefodaStrategiesDetails(Request $request, $id){

        DB::table('foda_strategies_details')->where('foda_strategies_id', '=', $id)->delete();
        DB::table('foda_strategies')->where('id', '=', $id)->delete();

        return true;
    }
    public function getFoda(Request $request){

        $allFoda;
        $weaknesses = DB::table('foda')
                        ->join('foda_details', 'foda_details.foda_id', '=', 'foda.id')
                        ->where('foda.name', '=', "weaknesses")
                        ->select('foda_details.id as foda_details_id','foda_details.description','foda.name','foda.id as foda_id')
                        ->get();

        $strengths = DB::table('foda')
                        ->join('foda_details', 'foda_details.foda_id', '=', 'foda.id')
                        ->where('foda.name', '=', "strengths")
                        ->select('foda_details.id as foda_details_id','foda_details.description','foda.name','foda.id as foda_id')
                        ->get();

        $opportunities = DB::table('foda')
                        ->join('foda_details', 'foda_details.foda_id', '=', 'foda.id')
                        ->where('foda.name', '=', "opportunities")
                        ->select('foda_details.id as foda_details_id','foda_details.description','foda.name','foda.id as foda_id')
                        ->get();

        $threats = DB::table('foda')
                        ->join('foda_details', 'foda_details.foda_id', '=', 'foda.id')
                        ->where('foda.name', '=', "threats")
                        ->select('foda_details.id as foda_details_id','foda_details.description','foda.name','foda.id as foda_id')
                        ->get();


        $allFoda["weaknesses"] = $weaknesses;
        $allFoda["strengths"] = $strengths;
        $allFoda["opportunities"] = $opportunities;
        $allFoda["threats"] = $threats;

        return $allFoda;

    }

    public function save(Request $request, $name, $id ,$input){


        try{

            $foda = DB::table('foda')->where('name', $name)->get("foda.id");

             
            $result = DB::table('foda_details')
                    ->where('foda_id', $foda[0]->id)
                    ->where('id', $id)->get("foda_details.id");



            if(count($result) > 0) {
                
                DB::table('foda_details')
                    ->where('foda_id',$foda[0]->id)
                    ->where('id',$result[0]->id)
                    ->update(['description'=> $input]);

                return $result[0]->id;

            } else {

                $foda_id = DB::table('foda_details')->insertGetId(['foda_id'=> $foda[0]->id,'description'=> $input]); 

                return $foda_id;

            }
            

        }catch(\Exception $e){
            
            return $e->getMessage();
        }
        
    }

}
