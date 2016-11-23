function autorizar(usuario_id){
    // onclick eliminar abre el modal
    $("#myModal").modal("show");
    
    $("#btnDel").click(function () {

        rol = $("#rol").val();

        if(!rol){
            rol = null;
        }
        console.log(rol);
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "estado/" + usuario_id,
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            data: { _method: 'patch', rol: rol, estado: '1', autorizado: '1' },
            success: function(){
                // redirigimos al index y desde el controller enviamos un mensaje de éxito o error
                window.location.href = '/usuarios';
            }
        });
    });

    return false;

}

function activar(usuario_id, estado){
    // onclick eliminar abre el modal
    $("#myModal").modal("show");
    
    $("#btnDel").click(function () {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "/usuarios/estado/" + usuario_id,
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            data: { _method: 'patch', id: usuario_id, estado: estado },
            success: function(){
                // redirigimos al index y desde el controller enviamos un mensaje de éxito o error
                window.location.href = '/usuarios';
            }
        });
    });

    return false;

}

$(document).ready(function(){

    // si la tabla queda vacía, muestra un mensaje de que no hay registros
    $("table tbody").not(":has(td)").html("<tr><td class='text-center' colspan=60%>No se han cargado registros</td></tr>");

    $(function() {
        var dateSupported = (function() {
            var el = document.createElement('input'),
            invalidVal = 'foo'; // Any value that is not a date
            el.setAttribute('type','date');
            el.setAttribute('value', invalidVal);
            // A supported browser will modify this if it is a true date field
            return el.value !== invalidVal;
        }());
        if (!dateSupported) {

            $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd'}); 

        }
    });
});