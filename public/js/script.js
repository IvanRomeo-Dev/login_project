if(localStorage.getItem('token')!=null){
    $.ajaxSetup({
        headers:{
            'Authorization': localStorage.getItem('token')
        }
    })
}
function is_logged(){
    $.ajax({
        type: 'post',
        url: '/api/is_logged',
        success:function (data){
            if (data==true) {
                alert('è presente una sessione di login sarai spostato nella pagina di profilo.');
                window.location.replace('/profile');
            }
        },
        error:function (){
            return false;
        },
        dataType:'json',
    });
}
