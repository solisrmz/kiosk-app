<script>  
    
    $(document).ready(function () {

        var status ="{{ $selectedGroup->estado }}";
        if (status == 'C'){
            $('#calificaciones').prop('disabled', true);
            $('#createGroup').prop('disabled', true);
            $('#closeGroup').prop('disabled', true);
        }
        
        
        $('#createGroup').on('click', function(e) {
            e.preventDefault();
            $('#proyectar').show();
        });

        $('#cancel').on('click', function(e) {
            e.preventDefault();
            $('#proyectar').hide();
        });

        /*------------------------------------------
        Select Categoría
        --------------------------------------------*/
        $('#id_categoria').on('change', function () {
            var idCategoria = this.value;               
            $("#id_modulo").html('');
            $.ajax({
                url: "{{url('lista-modulos')}}",
                type: "POST",
                data: {
                    id_categoria: idCategoria,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (arrayModulos) {
                    $('#id_modulo').html('<option value="">-- Elija el módulo --</option>');
                    $.each(arrayModulos.modulos, function (key, value) {
                        $("#id_modulo").append('<option value="' + value.id_modulo + '">' + value.modulo + '</option>');
                    });
                    $('#id_nivel').html('<option value="">-- Elija el nivel --</option>');
                }
            });
        });

            /*------------------------------------------
            Select Módulo
            --------------------------------------------*/
            $('#id_modulo').on('change', function () {
                var idModulo = this.value;               
                $("#id_nivel").html('');
                $.ajax({
                    url: "{{url('lista-niveles')}}",
                    type: "POST",
                    data: {
                        id_modulo: idModulo,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (arrayNiveles) {
                        $('#id_nivel').html('<option value="">-- Elija el nivel --</option>');
                        $.each(arrayNiveles.niveles, function (key, value) {
                            $("#id_nivel").append('<option value="' + value.id_nivel + '">' + value.nivel + '</option>');
                        });
                    }
                });
            });

            $('#groupStudents').click(function (e) {
                e.preventDefault();
                var idGroup = $(this).attr('data-id');
                $.ajax({
                    url: "{{url('alumnos-grupo')}}",
                    type: "POST",
                    data: {
                        id_grupo: idGroup,
                        _token: '{{csrf_token()}}'
                    },
                    success:function (response) {
                        $('#tableStudents tbody').empty();
                        $('#tableStudents tbody').html(response);
                    }   
                });
                $('#modalStudents').modal('show');
            });

            $('#closeGroup').click(function (e) {
                e.preventDefault();
                $('#modalCloseGroup').modal('show');
            });

            $('#modalHide').click(function (e) {
                e.preventDefault();
                $('#modalCloseGroup').modal('hide');
            });

    });    
</script>