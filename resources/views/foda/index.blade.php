@extends('layouts.app')

@section('content')
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#">foda</a>
      </li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')

             
             <div class="box">

                <div class="form-group test" >
                    <label for="strengths" class="col-xs-2 control-label"> foda
                    </label>
                </div>

                <div class="form-group strengths" >
                    <label for="strengths" class="col-xs-2 control-label label-strengths"> Fortalezas
                        <a class="pull-right" style="padding-left:20px"> <i class="fa fa-plus-square fa-lg CreateTextbox" test="strengths"  > </i></a>
                    </label>
                        <div class="form" id="strengths">
                        </div>
                </div>

                <div class="form-group weaknesses" >
                    <label for="weaknesses" class="col-xs-2 control-label"> debilidades
                        <a class="pull-right" style="padding-left:20px"> <i class="fa fa-plus-square fa-lg CreateTextbox"  test="weaknesses" > </i></a>
                    </label>
                        <div class="form weaktest" id="weaknesses">
                        </div>
                </div>

                <div class="form-group opportunities" >
                    <label for="opportunities" class="col-xs-2 control-label"> oportunidades
                        <a class="pull-right" style="padding-left:20px"> <i class="fa fa-plus-square fa-lg CreateTextbox" test="opportunities"  > </i></a>
                    </label>
                        <div class="form" id="opportunities">
                        <!--
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder=""/>
                            </div>
                            
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder=""/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder=""/>
                            </div>
                -->
                        </div>
                </div>



                <div class="form-group oppor_strength_strategies" >
                    <label for="oppor_strength_strategies" class="col-xs-2 control-label"> strategias
                    </label>
                        <div class="form" id="oppor_strength_strategies">
                        </div>
                </div>

                <div class="form-group oppor_weak_strategies" >
                    <label for="oppor_weak_strategies" class="col-xs-2 control-label"> strategias
                    </label>
                    <div class="form" id="oppor_weak_strategies">
                    </div>
                </div>

                <div class="form-group threats" >
                    <label for="opportunities" class="col-xs-2 control-label"> amenazas
                        <a class="pull-right" style="padding-left:20px"> <i class="fa fa-plus-square fa-lg CreateTextbox" test="threats" > </i></a>
                    </label>
                        <div class="form" id="threats">
                        </div>
                </div>

                <div class="form-group threats_strength_strategies" >
                    <label for="threats_strength_strategies" class="col-xs-2 control-label"> strategias
                    </label>
                        <div class="form" id="threats_strength_strategies">
                        </div>
                </div>

                <div class="form-group threats_weak_strategies" >
                    <label for="threats_weak_strategies" class="col-xs-2 control-label"> strategias
                    </label>
                        <div class="form" id="threats_weak_strategies">
                        </div>
                </div>



            </div>


            <div class="modalcustom" id="modal1" data-animation="slideInOutLeft">
                <div class="modal-dialog">
                    <header class="modal-header">
                    Editar
                        <button class="close-modal" id="close_modelcustom" aria-label="close modal" data-close>
                            ✕  
                        </button>
                    </header>

                    <section class="modal-content">

                        
                        <div class="form-group">

                            <input type="text" id="data-1" style="display:none;" class="form-control" placeholder=""/>
                            <input type="text" id="data-2" style="display:none;" class="form-control" placeholder=""/>

                            <label for="strategy" class="col-xs-2 control-label"> strategia
                            </label>
                            <input type="text" id="strategy" class="form-control" placeholder=""/>

                            <label for="responsible" class="col-xs-2 control-label"> responsable
                            </label>
                            <input type="text" id="responsible" class="form-control" placeholder=""/>

                            <label for="budget" class="col-xs-2 control-label"> presupuesto
                            </label>
                            <input type="text" id="budget" class="form-control" placeholder=""/>

                            @php
                                $ss = ["without_starting"=>"sin iniciar","in_process"=>"en proceso","executed"=>"ejecutado","cancelled"=>"cancelado"];
                            @endphp

                            <label for="status" class="col-xs-2 control-label"> estado
                            </label>
                            <select name="status" id="status" class="form-control">
                                @foreach($ss as $key => $value)

                                    <option value="{{ $key }}">{{ $value }}</option>

                                @endforeach

                            </select>

                            <br>

                            <label for="description" class="col-xs-2 control-label"> descripcion
                            </label>
                            <textarea name="textarea"  class="form-control" id="description" rows="5" cols="50"></textarea>

                            <br>
                            <br>
                            <div class="btn-group">
                                <button type="button" id="save-foda-details" class="open-modal">
                                    Guardar
                                </button>
                            </div>


                        </div>
                         
                    </section>
                    
                </div>
            </div>

        </div>
    </div>
@endsection

 
<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 
 
<script type="text/javascript">  

$(document).ready(function() {



    
   function generateTexbox(data){

        var weaknesses_children = Array.prototype.slice.call(document.getElementById("weaknesses").children);
        var opportunities_children = Array.prototype.slice.call(document.getElementById("opportunities").children);
        weaknesses_children.map((element, index) => { 

            if (opportunities_children.length > index) {

                ( ((weaknesses_children[index].children[0].id != "w") && (opportunities_children[index].children[0].id != "w")) ? onloado_weak_strategies("oppor_weak_strategies",weaknesses_children[index].children[0].id,opportunities_children[index].children[0].id):"");       
            }

        })


        var strengths_children = Array.prototype.slice.call(document.getElementById("strengths").children);
        var opportunities_children = Array.prototype.slice.call(document.getElementById("opportunities").children);
        strengths_children.map((element, index) => { 

            if (opportunities_children.length > index) {
                ( ((strengths_children[index].children[0].id != "w") && (opportunities_children[index].children[0].id != "w")) ? onloado_weak_strategies("oppor_strength_strategies",strengths_children[index].children[0].id,opportunities_children[index].children[0].id):"");       
            }
        })





        var strengths_children = Array.prototype.slice.call(document.getElementById("strengths").children);
        var threats_children = Array.prototype.slice.call(document.getElementById("threats").children);
        threats_children.map((element, index) => { 

            if (strengths_children.length > index) {
                ( ((threats_children[index].children[0].id != "w") && (strengths_children[index].children[0].id != "w")) ? onloado_weak_strategies("threats_strength_strategies",threats_children[index].children[0].id,strengths_children[index].children[0].id):"");       

            }

        })

        var weaknesses_children = Array.prototype.slice.call(document.getElementById("weaknesses").children);
        var threats_children = Array.prototype.slice.call(document.getElementById("threats").children);
        threats_children.map((element, index) => { 
            if (weaknesses_children.length > index) {
                ( ((threats_children[index].children[0].id != "w") && (weaknesses_children[index].children[0].id != "w")) ? onloado_weak_strategies("threats_weak_strategies",threats_children[index].children[0].id,weaknesses_children[index].children[0].id):"");       

            }

        })
         
        

    }
    
   async function Generate(data,data_1,data_2){

                    var  length = data.length;
                    await data.forEach((value,i) => {

                        var div = $("<div class='input-group mb-3' />");
                        var isRemove = false;

                        if ( (i > data_1.length) || (i > data_1.length))  {
 
                            isRemove = true;
                            div.html(GenerateTextbox(value.name, value.description, value.foda_details_id,isRemove));  


                        }else{
                            

                            if( length == (i+1) ){

                                isRemove = true;
                                div.html(GenerateTextbox(value.name, value.description, value.foda_details_id,isRemove));  

                            }else{

                                div.html(GenerateTextbox(value.name, value.description, value.foda_details_id,""));  
                            }
                        }

                        $('#'+value.name).append(div); 
                    });
   }

    $.ajax({

        url: "/allFoda",
        type: 'GET',
        dataType: 'json',  
        success: function(res) {

            //for (const key of Object.keys(res)) {
                //console.log("key: "+key);  
                //console.log("value: "+res[key]); 

                //((key == "weaknesses")? Generate(res[key]) :"");
                //((key == "opportunities")? Generate(res[key]) :"");
                //((key == "threats")? Generate(res[key]) :"");
                //((key == "strengths")? Generate(res[key]) :"");

            //}

            Generate(res["weaknesses"],res["opportunities"],res["threats"]);
            Generate(res["strengths"],res["opportunities"],res["threats"]);
            Generate(res["opportunities"],res["strengths"],res["weaknesses"]);
            Generate(res["threats"],res["strengths"],res["weaknesses"]);

            generateTexbox()
        }
    });

    $(".CreateTextbox").bind("click", function () {  
        var attr = $(this).attr("test");
        var div = $("<div class='input-group mb-3' />");  
        div.html(GenerateTextbox(attr,"","w",false));  
        $('#'+attr).append(div);  
    });
      
     
    $("body").on("click", ".remove", function () {

        var foda_field = $(this).attr("value");
        var parentElm = $(this).parent().parent();
        var children = parentElm.children('input');

        $.ajax({

            url: "/delete_foda/"+foda_field+"/"+children.attr("id"),
            type: 'GET',
            dataType: 'json',  
            success: function(res) {
                //children.attr("id",res)
            }
        });

        $(this).closest("div").parent().remove(); 
        location.reload();
 
    });

    $("body").on("click", ".save", function () {  
        var foda_field = $(this).attr("value");
        //alert(foda_field);
        //var parentElm = $(this).parent().parent().attr('value');
        var parentElm = $(this).parent().parent();
        var children = parentElm.children('input');

        $.ajax({

            url: "/save_foda/"+foda_field+"/"+children.attr("id")+"/"+children.val(),
            type: 'GET',
            dataType: 'json',  
            success: function(res) {
                children.attr("id",res)
                location.reload();

            }
        });

    });
      
});

    function GenerateTextbox(foda_field,description,id,isRemove) {  

        if(isRemove){

            return  '<input type="text" style="border-radius:10px;"value="'+description+'" id="'+id+'" class="form-control" placeholder=""    >'+
                '<div class="input-group-prepend">'+
                    '<a class="pull-right save"  value='+foda_field+' style="padding-left:20px"> <i class="fa fa-save fa-lg"> </i></a>'+
                    '<a class="pull-right remove" value='+foda_field+' style="padding-left:20px"> <i class="fa fa fa-trash fa-lg"> </i></a>'+

                '</div>'

        }else{

            return  '<input type="text" style="border-radius:10px;"value="'+description+'" id="'+id+'" class="form-control" placeholder=""    >'+
                '<div class="input-group-prepend">'+
                    '<a class="pull-right save"  value='+foda_field+' style="padding-left:20px"> <i class="fa fa-save fa-lg"> </i></a>'+
                '</div>'

        }
        /*
        return  '<input type="text" style="border-radius:10px;"value="'+description+'" id="'+id+'" class="form-control" placeholder=""    >'+
                '<div class="input-group-prepend">'+
                    '<a class="pull-right save"  value='+foda_field+' style="padding-left:20px"> <i class="fa fa-save fa-lg"> </i></a>'+
                    '<a class="pull-right remove" value='+foda_field+' style="padding-left:20px"> <i class="fa fa fa-trash fa-lg"> </i></a>'+

                '</div>'
                */
        
    }
    

    function onloado_weak_strategies(id,weaknesses_id,opportunities_id){

        $.ajax({

            url: "/getFoda/"+opportunities_id+"/"+weaknesses_id,
            type: 'GET',
            dataType: 'json',  
            success: function(res) {

                console.log(res);

                if(res != null){
                    var data =  res[0].strategy;
                    console.log(data);

                    var div = $("<div class='input-group mb-3' />");  
                    div.html(GenerateTextbox2(weaknesses_id,opportunities_id,data));  
                    $('#'+id).append(div); 

                }else{

                    var div = $("<div class='input-group mb-3' />");  
                    div.html(GenerateTextbox2(weaknesses_id,opportunities_id,""));  
                    $('#'+id).append(div); 
                }
            }
        });



        //var div = $("<div class='input-group mb-3' />");  
        //div.html(GenerateTextbox2(weaknesses_id,opportunities_id));  
        //$('#'+id).append(div);  
    }

    function GenerateTextbox2(weaknesses_id,opportunities_id,data) {  


        return  '<input type="text" readonly="readonly" style="border-radius:10px;" value="'+data+'" class="form-control" placeholder=""    >'+
                '<div class="input-group-prepend">'+
                    '<a class="pull-right edit" data-id-1="'+opportunities_id+'" data-id-2="'+weaknesses_id+'"    style="padding-left:20px"> <i class="fa fa-edit fa-lg"> </i></a>'+
                '</div>'

    }   


    $(document).ready(function() {


        const isVisible = "is-visible";

        $("body").on("click", ".edit", function () {  

            document.getElementById("modal1").classList.add(isVisible);
            var data_id_1 = $(this).attr("data-id-1");
            var data_id_2 = $(this).attr("data-id-2");


            $.ajax({

                url: "/getFoda/"+data_id_1+"/"+data_id_2,
                type: 'GET',
                dataType: 'json',  
                success: function(res) {

                    if(res != null){

                        document.getElementById("strategy").value = res[0].strategy;
                        document.getElementById("responsible").value = res[0].responsible;
                        document.getElementById("budget").value = res[0].budget;
                        document.getElementById("status").value = res[0].status;
                        document.getElementById("description").value = res[0].description;
                        document.getElementById("data-1").value = data_id_1;
                        document.getElementById("data-2").value = data_id_2;
                        

                    } else{

                        document.getElementById("strategy").value = "";
                        document.getElementById("responsible").value = "";
                        document.getElementById("budget").value = "";
                        document.getElementById("status").value = "without_starting";
                        document.getElementById("description").value = "";

                        document.getElementById("data-1").value = data_id_1;
                        document.getElementById("data-2").value = data_id_2;
                    }
                   
                }


            });

        });


        var save = document.getElementById("save-foda-details");
        save.addEventListener("click", function() {

            var obj = [];


            obj[0] = document.getElementById("data-1").value;
            obj[1] = document.getElementById("data-2").value;
            obj[2] = document.getElementById("strategy").value;
            obj[3] = document.getElementById("responsible").value;
            obj[4] = document.getElementById("budget").value;
            obj[5] = document.getElementById("status").value;
            obj[6] = document.getElementById("description").value;

            $.ajax({

                url: "/savefodaStrategies/"+obj,
                type: 'GET',
                dataType: 'json',  
                success: function(res) {
                    console.log("res: "+res);                     
                },
                complete: function (data) {
                    //console.log("complete: "+data); 
                    location.reload();                    
                }
            });
            
        });

        var close_model = document.getElementById("close_modelcustom");

        close_model.addEventListener("click", function() {
            this.parentElement.parentElement.parentElement.classList.remove(isVisible);
            location.reload();
        });

        document.addEventListener("click", e => {
            if (e.target == document.querySelector(".modalcustom.is-visible")) {
                document.querySelector(".modalcustom.is-visible [data-close]").click();
            }
        });

        document.addEventListener("keyup", e => {
        // if we press the ESC
            if (e.key == "Escape" && document.querySelector(".modalcustom.is-visible")) {
                document.querySelector(".modalcustom.is-visible [data-close]").click();
            }
        });
    }
    );

    

</script>  

 <style>

    .box {

        display: flex;
        width:  1020px;
        height: 800px;
        /* border: 1px solid #c3c3c3; */
        flex-direction: row;
        flex-wrap: wrap;
        padding: 5px;  
    }
    .box > div {
        flex: 1 1 auto;
        text-align: center;
        margin: 5px; 
        border-radius:10px;

    
    }
    .test {
        width: 300px;
        height: 250px;
        border: 1px solid #c3c3c3;
        align-items: center;
        justify-content: center;
        display: flex;
    }

    .strengths {
        width: 300px;
        height: 250px;
        padding:10px;
        background-color:rgba(186, 186, 186, 0.74);
        color:rgba(7, 11, 19, 1);
        overflow-y: auto;
    }
    
    .weaknesses {
        width: 300px;
        height: 250px;
        padding:10px;
        background-color:rgba(186, 186, 186, 0.74);
        color:rgba(7, 11, 19, 1);
        overflow-y: auto;

    }

    .opportunities {
        width: 300px;
        height: 250px;
        padding:10px;
        background-color:rgba(186, 186, 186, 0.74);
        color:rgba(7, 11, 19, 1);
        overflow-y: auto;


    }

    .oppor_strength_strategies {
        width: 300px;
        height: 250px;
        padding:10px;
        background-color:rgba(186, 186, 186, 0.74);
        color:rgba(7, 11, 19, 1);
        overflow-y: auto;

    }

    .oppor_weak_strategies {
        width: 300px;
        height: 250px;
        padding:10px;
        background-color:rgba(186, 186, 186, 0.74);
        color:rgba(7, 11, 19, 1);
        overflow-y: auto;

    }

    .threats {
        width: 300px;
        height: 250px;
        padding:10px;
        background-color:rgba(186, 186, 186, 0.74);
        color:rgba(7, 11, 19, 1);
        overflow-y: auto;

    }

    .threats_strength_strategies {
        width: 300px;
        height: 250px;
        padding:10px;
        background-color:rgba(186, 186, 186, 0.74);
        color:rgba(7, 11, 19, 1);
        overflow-y: auto;

    }

    .threats_weak_strategies {
        width: 300px;
        height: 250px;
        padding:10px;
        background-color:rgba(186, 186, 186, 0.74);
        color:rgba(7, 11, 19, 1);
        overflow-y: auto;

    }

    
    

     
    

  

    :root {
        --lightgray: #efefef;
        --blue: steelblue;
        --white: #fff;
        --black: rgba(0, 0, 0, 0.8);
        --bounceEasing: cubic-bezier(0.51, 0.92, 0.24, 1.15);
    }

    

    

    button {
        cursor: pointer;
        background: transparent;
        border: none;
        outline: none;
        font-size: inherit;
    }

    

    
    .open-modal {
        font-weight: bold;
        background: var(--blue);
        color: var(--white);
        padding: 0.75rem 1.75rem;
        margin-bottom: 1rem;
        border-radius: 5px;
    }


    /* MODAL
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    .modalcustom {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        background: var(--black);
        cursor: pointer;
        visibility: hidden;
        opacity: 0;
        transition: all 0.35s ease-in;
    }

    .modalcustom.is-visible {
        visibility: visible;
        opacity: 1;
    }

    .modal-dialog {
        position: relative;
        max-width: 800px;
        max-height: 80vh;
        border-radius: 5px;
        background: var(--white);
        overflow: auto;
        cursor: default;
    }

    .modal-dialog > * {
        padding: 1rem;
    }

    .modal-header {
        background: var(--lightgray);
    }

    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .modal-header .close-modal {
        font-size: 1.5rem;
    }

    .modal p + p {
        margin-top: 1rem;
    }


    /* SLIDE LEFT ANIMATION
    –––––––––––––––––––––––––––––––––––––––––––––––––– */
    [data-animation="slideInOutLeft"] .modal-dialog {
    opacity: 0;
    transform: translateX(-100%);
    transition: all 0.5s var(--bounceEasing);
    }

    [data-animation="slideInOutLeft"].is-visible .modal-dialog {
    opacity: 1;
    transform: none;
    transition-delay: 0.2s;
    }


   
  


    

 



 </style>

