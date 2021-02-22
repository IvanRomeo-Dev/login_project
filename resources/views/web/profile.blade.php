@extends('layout_default')
@section('content')
    <div class="container">
        <div class="text-center">
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <h2>Pagina protetta</h2>
                    <h3>Informazione utenti</h3>
                    <p><strong>Username: </strong><span id="textusername"></span></p>
                    <p><strong>Email: </strong><span id="textemail"></span></p>

                    <button type="button" class="btn btn-info" id="btnlogout">Logout</button>
                </div>
                <div class="col"></div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript">

    $.ajax({
        type: 'post',
        url: '/api/get_info',
        success:function (data){
            $('#textusername').text(data['username']);
            $('#textemail').text(data['email']);
        },
        error:function (){

            //window.location.replace('/');
        },
        dataType:'json',
    });
    $('#btnlogout').on('click',function (){
        $.ajax({
            type: 'post',
            url: '/api/logout',
            success:function (data){
                alert('logout effettuato correttamente.');
                window.location.replace('/');

            },
            error:function (){
                window.location.replace('/');
            },
            dataType:'json',
        });
    })
</script>
@endsection
