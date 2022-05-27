<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FodaRepository;
use DB;

class FodaController extends Controller
{

    private $fodaRepository;

    public function __construct(FodaRepository $fodaRepo){

        $this->fodaRepository = $fodaRepo;

    }

    public function index(Request $request){

        $foda = $this->fodaRepository->all();

        return view('foda.index')->with('foda', $foda);
    }

    public function getFieldFodaStrategy(Request $request , $id_1 , $id_2){

        $foda = $this->fodaRepository->all();

        return view('foda.index')->with('foda', $foda);
    }


    public function savefodaStrategies(Request $request,$obj){


        $obj = explode(',', $obj);

        $foda = DB::table('foda_strategies')
                    ->where('foda_detail_1',$obj[0])
                    ->where('foda_detail_2',$obj[1])
                    ->select('foda_strategies.id','foda_strategies.strategy','foda_strategies.responsible','foda_strategies.budget','foda_strategies.status','foda_strategies.description')
                    ->get();

        if(count($foda) > 0) {

            DB::table('foda_strategies')
            ->where('foda_detail_1',$obj[0])
            ->where('foda_detail_2',$obj[1])
            ->update([
                'strategy'=> $obj[2],
                'responsible'=> $obj[3],
                'budget'=> $obj[4],
                'status'=> $obj[5],
                'description'=> $obj[6]]);

                
            return $obj = "update";

        } else {

            DB::table('foda_strategies')->insert(
                [
                'foda_detail_1' => $obj[0],
                'foda_detail_2' => $obj[1],
                'strategy' => $obj[2],
                'responsible' => $obj[3],
                'budget' => $obj[4],
                'status'=> $obj[5],
                'description' => $obj[6]]);
                

                return $obj = "insert";
        }

 
    }

    public function getFodaStrategies(Request $request,$detail_id_1,$detail_id_2){

        $foda = DB::table('foda_strategies')
                    ->where('foda_strategies.foda_detail_1', '=', $detail_id_1)
                    ->where('foda_strategies.foda_detail_2', '=', $detail_id_2)
                    ->select('foda_strategies.id','foda_strategies.strategy','foda_strategies.responsible','foda_strategies.budget','foda_strategies.status','foda_strategies.description')
                    ->get();

        if(count($foda) > 0) {
            return $foda;

        } else {

            return null;
        }
    }

    public function delete(Request $request, $name, $id){

        DB::table('foda_details')->where('id', '=', $id)->delete();
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

        //$foda = $this->fodaRepository->all();

        try{

            $foda = DB::table('foda')->where('name', $name)->get("foda.id");

             
            $result = DB::table('foda_details')
                    ->where('foda_id', $foda[0]->id)
                    //->where('description', $input)->get("foda_details.id");
                    ->where('id', $id)->get("foda_details.id");



            if(count($result) > 0) {
                
                DB::table('foda_details')
                ->where('foda_id',$foda[0]->id)
                ->where('id',$result[0]->id)
                ->update(['description'=> $input]);

                return $result[0]->id;

            } else {

               // $folder_id = DB::table('folders')->insertGetId(
                  //  ['name'=>"Archivos_Compartidos"]
                //);

                $foda_id = DB::table('foda_details')->insertGetId(['foda_id'=> $foda[0]->id,'description'=> $input]); 

                return $foda_id;

            }
            

        }catch(\Exception $e){
            
            return $e->getMessage();
        }
        
    }

}
