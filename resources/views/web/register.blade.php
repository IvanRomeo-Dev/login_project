@extends('layout_default')
@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-6 offset-md-3">
            <h2>Modulo di registrazione</h2>
            <div  id="message"></div>
            <hr>
            <form>
                <div class="form-group">
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="txtuser" autofocus="true" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="txtemail" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="txtpass" value="">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group row">
                        <label  class="col-sm-3 col-form-label">Conferma Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="txtpass_confirmation" value="">
                        </div>
                    </div>
                </div>

                <a  role="button" href="{{route('welcome')}}" class="btn btn-primary mb-2">Vai al login</a>
                <button  type="button" id="btnreg" class="btn btn-success mb-2 float-right active">Registrati</button>
            </form>
            <div class="alert hidden informasi" role="alert"  ></div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script type="text/javascript">

        is_logged();
        $(document).ready(function(){
            $("#btnreg").click(function(){
                var ajax = {
                    username : $("#txtuser").val(),
                    email : $("#txtemail").val(),
                    password : $("#txtpass").val(),
                    password_confirmation : $("#txtpass_confirmation").val(),
                }
                $.ajax({
                    url: "/api/register",
                    type: "POST",
                    data: ajax,
                    success: function(data)
                    {
                        $('#message').html("<h3 style='color: #24db24'>Registrazione effettuata correttamente</h3>");
                        $("#txtuser").val("");
                        $("#txtpass").val("");
                        $("#txtpass_confirmation").val("");
                        $("#txtemail").val("");

                    },
                    error: function (request, textStatus, errorThrown) {
                        $('#message').html("");
                        var data=$.parseJSON(request['responseText']);
                        $.each(data,function (key,item){
                            $('#message').append("<h4 style='color: #e92b2b'>"+JSON.stringify(item.valueOf())+"</h4>");
                        });

                    }
                });
            });
        });
    </script>
@endsection
