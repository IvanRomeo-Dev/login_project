@extends('layout_default')
@section('content')
    <div class="row justify-content-center">
        <div class="col-10 col-md-8 col-lg-4" style="position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);">
            <div>
                <div class="card-header text-center h3 font-weight-light">{{ __('Effettua l\'accesso') }}</div>
                <div class="card-body">
                    <p style="padding-top: 5px"><input id="email" type="email" class="form-control " name="email"  required autocomplete="email" placeholder="Email" autofocus></p>
                    <p><input type="password" id="passwd" class="form-control" name="password" placeholder="Password" /></p>
                    <p class="text-center"><button name="login" id='btnlog' class="btn btn-success btn-lg btn-block">Login</button></p>
                    <p class="text-center p-4"><a href="{{route('register')}}" class="btn btn-info btn-lg btn-block">Registrati</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#btnlog").click(function(){
                var ajax = {
                    email : $("#email").val(),
                    password : $("#passwd").val(),
                }
                $.ajax({
                    url: "/api/login",
                    type: "POST",
                    data: ajax,
                    success: function(data)
                    {
                        var dataparsed=JSON.parse(data);
                        localStorage.setItem('token','bearer '+dataparsed['original']['access_token']);

                        $.ajaxSetup({
                            headers:{
                                'Authorization': localStorage.getItem('token')
                            }
                        });
                        window.location.replace('/profile');
                    },
                    error: function (request, textStatus, errorThrown) {
                        console.log(request.responseJSON.message);
                    }
                });
            });
        });
        is_logged();
    </script>
@endsection
