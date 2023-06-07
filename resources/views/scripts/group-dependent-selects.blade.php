<script>
        $(document).ready(function () {
  
            /*------------------------------------------
            Select de Idioma
            --------------------------------------------*/
            $('#id_idioma').on('change', function () {
                var idIdioma = this.value;
                $("#id_categoria").html('');
                $.ajax({
                    url: "{{url('lista-categorias')}}",
                    type: "POST",
                    data: {
                        id_idioma: idIdioma,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (arrayCategorias) {
                        $('#id_categoria').html('<option value="">-- Elija la categoría --</option>');
                        $.each(arrayCategorias.categorias, function (key, value) {
                            $("#id_categoria").append('<option value="' + value.id_categoria + '">' + value.categoria + '</option>');
                        });
                        $('#id_modulo').html('<option value="">-- Elija el módulo --</option>');
                        $('#id_nivel').html('<option value="">-- Elija el nivel --</option>');
                    }
                });
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
  
        });
    </script>