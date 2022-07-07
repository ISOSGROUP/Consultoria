<!-- Education Field -->
<div class="form-group col-sm-6">
    {!! Form::label('education', 'Educación:') !!}
    {!! Form::text('education', null, ['class' => 'form-control','style'=>'display:none']) !!} 


    <div class="form-group custom-table">
        <table class="table table-striped" id="dataTable" >

            <tr class="item">
                <td>
                    <label class="label-table"> Superior o universitario
                        <input type="checkbox" 
                        name="values[universitario]"
                        class='rrr checkbox'
                        
                        {{ ($education["universitario"] == true) 
                                                    ? 'checked'
                                                    : '' }}>
                    </label>
                </td>
                <td>
                    <label class="label-table"> Doctorado
                        <input type="checkbox" 
                        name="values[Doctorado]"
                        class='rrr checkbox' 
                        {{ ($education["Doctorado"] == true) 
                                                    ? 'checked'
                                                    : '' }}>
                    </label>
                </td>
            </tr>

            <tr class="item">
                <td>
                    <label class="label-table"> Tecnico
                        <input type="checkbox" 
                        name="values[Tecnico]"
                        class='rrr checkbox'
                        {{ ($education["Tecnico"] == true) 
                                                    ? 'checked'
                                                    : '' }}>
                    </label>
                </td>
                <td>
                    <label class="label-table"> Maestria
                        <input type="checkbox" 
                        name="values[Maestria]"
                        class='rrr checkbox'
                        {{ ($education["Maestria"] == true) 
                                                    ? 'checked'
                                                    : '' }}>
                    </label>
                </td>
            </tr>

            <tr class="item">
                <td>
                    <label class="label-table"> Secundaria
                        <input type="checkbox" 
                        name="values[Secundaria]"
                        class='rrr checkbox'
                        {{ ($education["Secundaria"] == true) 
                                                    ? 'checked'
                                                    : '' }}>
                    </label>
                </td>
                <td>
                    <label class="label-table"> Diplomado
                        <input type="checkbox" 
                        name="values[Diplomado]"
                        class='rrr checkbox'
                        {{ ($education["Diplomado"] == true) 
                                                    ? 'checked'
                                                    : '' }}>
                    </label>
                </td>
            </tr>

            <tr class="item">
                <td>
                    <label class="label-table"> N/A
                        <input type="checkbox" 
                        name="values[N/A]"
                        class='rrr checkbox'
                        {{ ($education["N/A"] == true) 
                                                    ? 'checked'
                                                    : '' }}>
                    </label>
                </td>
            </tr>

        </table>

    </div>



</div>

<!-- Training Field -->
<div class="form-group col-sm-6">
    {!! Form::label('training', 'Formación:') !!}
    {!! Form::text('training', null, ['class' => 'form-control']) !!}
</div>






<div>
<!-- <div id="www" ></div> -->

<div style="display:none;">
    <table id="sample_table">
        <tr id="" class="custom-row" style="height:2px;">
            <td  style="max-width:1px;padding:5px;"><span class="sn"></span>.</td>
            <td class="actividades" style="max-width:30px;padding:5px;" contenteditable>test</td>
            <td class="recursos" style="max-width:30px;padding:5px;" contenteditable>test</td>
            <td class="responsable volunteer " style="max-width:20px;padding:5px;" >
            [""]
            <td class="plazo" style="max-width:30px;padding:5px;"><input type="date" class="datepick" /></td>
        </td>
        
        </tr>
    </table>


</div>

<table class="table table-striped " id="tbl_posts" style="min-width:1100px;" >

    <thead>
        <th style="min-width:1px;">#</th>
        <th class="actividades"   style="min-width:30px;overflow-y: auto;height:40px;">w</th>
        <th class="recursos"   style="min-width:30px;">ww</th>
        <th class="responsable"   style="width:25px;">ww</th>
        
    </thead>

    <tbody id="tbl_posts_body">
    </tbody>

</table>


</div>








<!-- Work Experience Field -->
<div class="form-group col-sm-6">
    {!! Form::label('work_experience', 'Experiencia de trabajo:') !!}
    {!! Form::text('work_experience', null, ['class' => 'form-control']) !!}
</div>

<!-- Certificates Field -->
<div class="form-group col">
    {!! Form::label('certificates', 'Constancias de educacion, formación y experiencia:') !!}
    <!-- {!! Form::text('certificates', null, ['class' => 'form-control']) !!} -->

    <div class="row" id="dni_file">
        <div class="custom-file col-6 ml-2" id="rrr1">
                {!! Form::label('Dni', "Select file",array('class' => 'custom-file-label ','for'=>'image','id'=>'file_input_label_dni')) !!}
                <input type="file" accept="image/*" class="custom-file-input" name="dni" id="certificates" oninput="input_filename(event);" tofill="" onclick="check_progress_bar(event)">
                <input type="text" class="d-none" id="hide_dni"   >
        </div>

        <div class="col-5 d-none" id="show_progress_certificates">
            <button class="btn btn-primary" id="loading_btn_dni" type="button" disabled >
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Cargando...
                <span id="load_percentage_certificates"></span>
            </button>
            <button type="button" id="cancel_btn_dni" class="btn btn-secondary "> Cancelar Carga </button>
        </div>

        <div class="col-5 d-none" id="alert_wrapper_certificates">
        </div>


    </div>

</div>

<!-- Dni Frontal Posterior Field -->
<div class="form-group col">
     {!! Form::label('dni_frontal_posterior', 'Dni frontal y reverso:') !!} 
     <!-- {!! Form::text('dni_frontal_posterior', null, ['class' => 'form-control']) !!} -->

    <div class="row" id="dni_frontal_posteriorw">
        <div class="custom-file col-6 ml-2" id="rrr2">
                {!! Form::label('Dni', "Select file",array('class' => 'custom-file-label ','for'=>'image','id'=>'file_input_label_dni_frontal_posterior')) !!}
                <input type="file" accept="image/*" class="custom-file-input" name="dni" id="dni_frontal_posterior" oninput="input_filename(event);" tofill="" onclick="check_progress_bar(event)">
                <input type="text" class="d-none" id="hide_dni"   v >
        </div>

        <div class="col-5 d-none" id="show_progress_dni_frontal_posterior">
            <button class="btn btn-primary" id="loading_btn_dni_frontal_posterior" type="button" disabled >
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Cargando...
                <span id="load_percentage_certificates"></span>
            </button>
            <button type="button" id="cancel_btn_dni_frontal_posterior" class="btn btn-secondary "> Cancelar Carga </button>
        </div>

        <div class="col-5 d-none" id="alert_wrapper_dni_frontal_posterior">
        </div>

    </div>


</div>

<!-- Antecedentes Field -->
<div class="form-group col">
    {!! Form::label('antecedentes', 'Antecedentes, policial y judicial:') !!}
    <!-- {!! Form::text('antecedentes', null, ['class' => 'form-control']) !!} -->

    <div class="row" id="antecedentes_file">
        <div class="custom-file col-6 ml-2" id="rrr3">
                {!! Form::label('Dni', "Select file",array('class' => 'custom-file-label ','for'=>'image','id'=>'file_input_label_antecedentes')) !!}
                <input type="file" accept="image/*" class="custom-file-input" name="dni" id="antecedentes" oninput="input_filename(event);" tofill="" onclick="check_progress_bar(event)">
                <input type="text" class="d-none" id="hide_dni"   v >
        </div>

        <div class="col-5 d-none" id="show_progress_antecedentes">
            <button class="btn btn-primary" id="loading_btn_antecedentes" type="button" disabled >
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Cargando...
                <span id="load_percentage_antecedentes"></span>
            </button>
            <button type="button" id="cancel_btn_antecedentes" class="btn btn-secondary "> Cancelar Carga </button>
        </div>

        <div class="col-5 d-none" id="alert_wrapper_antecedentes">
        </div>


    </div>
    
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('curricula.index') }}" class="btn btn-secondary">Cancelar</a>
</div>
<script  src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> 

<script>



    function check_progress_bar(e){

        input_w = document.getElementById(e.target.id);
        input_parentNode_w = document.getElementById(input_w.parentNode.id);
        input_grandpa_w = document.getElementById(input_parentNode_w.parentNode.id);
        var alert_wrapper_w = document.getElementById(input_grandpa_w.children[2].id);

        if(can_upload_file){
            //ok you can upload files
        }else{
            e.preventDefault();
            alert_wrapper_w.classList.remove("d-none");
            show_alert(`hay un archivo en cola`, "primary",alert_wrapper_w);
        }

    }

    function show_alert(message, alert,alert_wrapper) {

        alert_wrapper.innerHTML = `
        <div id="alert" class="alert-${alert} alert-dismissible fade show" >
        <div class="row">
                <div class="col-10 mt-2">
                    <span >${message}</span>
                </div>
                <div class="col-2">
                    <button  id =${alert_wrapper.id} type="button" class="close" data-dismiss="alert" aria-label="Close" code = ${alert_wrapper.id}>
                        <span aria-hidden="true">&times;</span>
                    </button>                
                </div>
        </div>
        </div>
        `
    }

    function upload(alert_wrapper,show_progress_bar) {

        var data = new FormData();
        var request = new XMLHttpRequest();
        request.responseType = "json";
        alert_wrapper.innerHTML = "";
        input.disabled = true;
        alert_wrapper.classList.remove("d-none");
        show_progress_bar.classList.remove("d-none");

        var file = input.files[0];
        var filename = file.name;
        var filesize = file.size;
        document.cookie = `filesize=${filesize}`;
        data.append(input.id, file);

        request.upload.addEventListener("progress", function (e) {
            var loaded = e.loaded;
            var total = e.total
            var percent_complete = (loaded / total) * 100;
            load_percentage.innerHTML = Math.floor(percent_complete) + "%";
        })

        request.addEventListener("load", function (e) {

            if (request.status == 200) {
                hide_file.value = request.response.file_name;
                show_alert(`${request.response.message}`, "success",alert_wrapper);
            }
            else {
                show_alert(`Error al cargar el archivo`+request.status, "danger",alert_wrapper);
            }
                reset();
        });

        request.addEventListener("error", function (e) {
            reset();
            show_alert(`Error al cargar el archivo`, "warning",alert_wrapper);
        });

        request.addEventListener("abort", function (e) {
            reset();
            show_alert(`Carga cancelado`, "primary",alert_wrapper);
        });


        const XSRF_TOKEN = getCookie('XSRF-TOKEN');

        request.open('post', '{{ route('upload_file')}}');
        //request.open('post', window.location.origin+"/"+"upload-file");
        //request.setRequestHeader('x-csrf-token',$('#csrftoken').val());
        request.setRequestHeader('x-csrf-token','{{csrf_token() }}');
        request.send(data);

        cancel_btn.addEventListener("click", function () {
            request.abort();
            reset();
            show_alert(`Carga cancelado`, "primary",alert_wrapper);

        })

        function getCookie(name) {
            let cookieValue = null;
            if (document.cookie && document.cookie !== '') {
                const cookies = document.cookie.split(';');
                for (let i = 0; i < cookies.length; i++) {
                    const cookie = cookies[i].trim();
                    if (cookie.substring(0, name.length + 1) === (name + '=')) {
                        cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                        break;
                    }
                }
            }
            return cookieValue;
        }



    }

    function input_filename(e) {

        input = document.getElementById(e.target.id);
        input_parentNode = document.getElementById(input.parentNode.id);
        input_grandpa = document.getElementById(input_parentNode.parentNode.id);

        file_input_label_s = document.getElementById(input_grandpa.children[0].id);
        file_input_label = document.getElementById(file_input_label_s.children[0].id);
        file_input_label.innerText = input.files[0].name;

        hide_file = document.getElementById(file_input_label_s.children[2].id);


        show_progress_bar = document.getElementById(input_grandpa.children[1].id);
        loading_btn = document.getElementById(show_progress_bar.children[0].id);
        load_percentage = document.getElementById(loading_btn.children[1].id);

        alert_wrapper = document.getElementById(input_grandpa.children[2].id);
        cancel_btn = document.getElementById(show_progress_bar.children[1].id)

        can_upload_file = false; //a file begins to upload and with which no more processes will be allowed
        upload(alert_wrapper,show_progress_bar);
    }


    function reset() {

        input.value = null;
        input.disabled = false;
        show_progress_bar.classList.add("d-none");
        file_input_label.innerText = "Select file";
        can_upload_file = true;
    }

    /*
    $(".save-client").on('click',function(){

        var dni = document.getElementById("dni");
        var dni_r = document.getElementById("dni_r");
        var profile_picture = document.getElementById("profile_picture");

        dni.removeAttribute("required");
        dni_r.removeAttribute("required");
        profile_picture.removeAttribute("required");

        dni.setCustomValidity("");
        dni_r.setCustomValidity("");
        profile_picture.setCustomValidity("");

        dni.setAttribute(((document.getElementById("hide_dni").value == "") ? "required" : "tofill" ), "");
        dni_r.setAttribute(((document.getElementById("hide_dni_r").value == "") ? "required" : "tofill" ), "");
        profile_picture.setAttribute(((document.getElementById("hide_profile_picture").value == "") ? "required" : "tofill" ), "");

        if(!can_upload_file){
            input.disabled = false;
            input.setCustomValidity("este campo aún no ha sido completado");
        }
    }).on('mouseup',function(){
        input.disabled = true;
    });

    $("#save-socio-main").click(function() {

        var dni = document.getElementById("dni");
        var dni_r = document.getElementById("dni_r");
        var profile_picture = document.getElementById("profile_picture");

        dni.removeAttribute("required");
        dni_r.removeAttribute("required");
        profile_picture.removeAttribute("required");

        dni.setCustomValidity("");
        dni_r.setCustomValidity("");
        profile_picture.setCustomValidity("");

        dni.setAttribute(((document.getElementById("hide_dni").value == "") ? "required" : "tofill" ), "");
        dni_r.setAttribute(((document.getElementById("hide_dni_r").value == "") ? "required" : "tofill" ), "");
        profile_picture.setAttribute(((document.getElementById("hide_profile_picture").value == "") ? "required" : "tofill" ), "");

        if(!can_upload_file){
            input.disabled = false;
            input.setCustomValidity("este campo aún no ha sido completado");
        }

        var dni2 = document.getElementById("dni2");
        var dni2_r = document.getElementById("dni2_r");
        var profile_picture2 = document.getElementById("profile_picture2");

        var dni3 = document.getElementById("dni3");
        var dni3_r = document.getElementById("dni3_r");
        var profile_picture3 = document.getElementById("profile_picture3");

        dni2.setCustomValidity("");
        dni2_r.setCustomValidity("");
        profile_picture2.setCustomValidity("");

        dni3.setCustomValidity("");
        dni3_r.setCustomValidity("");
        profile_picture3.setCustomValidity("");

        dni2.removeAttribute("required");
        dni2_r.removeAttribute("required");
        profile_picture2.removeAttribute("required");

        dni3.removeAttribute("required");
        dni3_r.removeAttribute("required");
        profile_picture3.removeAttribute("required");

    });

     
*/

</script>