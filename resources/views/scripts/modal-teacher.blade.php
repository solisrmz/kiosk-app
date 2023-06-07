<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let idTeacher;
    let idGroup;
    let idT;
    let idG;
    $(document).ready(function(){
        $(".mibtn").on('click', function(e){
            e.preventDefault();
            var path    = $(this).data('path');
            var token   = $(this).data('token');
            idGroup = $(this).data('id');
            var table   = $("#teachersTable tbody");
            var data    = {'_token' : token };
            var loading = '<p style="text-align: center" "><i class="fa fa-spinner fa-spin"></i> Cargando datos</p>';
            table.html(loading);
            $.post(path, data,
                function(data){
                    table.html("");
                    for(var i=0; i<data.length; i++){
                        var fila = "<tr>";
                        fila += "<td>" + data[i].nombre + "</td>";
                        fila += "<td>" + data[i].correo + "</td>";
                        fila +=  `<td><a data-id=${data[i].id_empleado} onclick='addTeacher(${data[i].id_empleado},idGroup)' class='btn btn-secondary'><i class='fa fa-plus'></i></a>`
                        fila += "</tr>";
                        table.append(fila);
                    }
                },
                'json'
            );
        });
    });
    function addTeacher(idTeacher, idGroup){
        var loading = '<p style="text-align: center" "><i class="fa fa-spinner fa-spin"></i>Asignando profesor</p>';
        var table   = $("#teachersTable tbody");
        console.log('El id del maestro es: ', idTeacher);
        table.html(loading);
        $.ajax({
            type: 'POST',
            url: '{{route('asignar-profesor')}}',
            data: {
                idTeach: idTeacher,
                idGr: idGroup
            },
            success: function(data){
                location.href = '/direccion-academica/grupos-registrados';
                alert('Se ha asignado el profesor');
            },
            error: function(xhr, textStatus, error){
                console.log(xhr.statusText);
                console.log(textStatus);
                console.log(error);
            }
        });
    }
</script>