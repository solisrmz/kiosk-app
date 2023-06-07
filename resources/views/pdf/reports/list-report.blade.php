<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body>
<table class="table table-bordered">
    <thead class="table-dark">
    <tr>
        <th scope="col">Plantel</th>
        <th scope="col">Idioma</th>
        <th scope="col">Profesor</th>
        <th scope="col">Acciones</th>
    </tr>
    </thead>
    @foreach($datos as $group)
        <tbody>
        <tr>
            <td>{{$group->relacionPlantel->plantel}}</td>
            <td>{{$group->relacionIdioma->idioma}}</td>
            @if(is_null($group->relacionEmpleado))
                <td>Sin asignar</td>
            @else
                <td>{{ $group->relacionEmpleado->nombre }}</td>
            @endif
            <td>
                <a href="" class="btn btn-danger">
                    <i class="fa fa-eye"></i>
                </a>
            </td>
        </tr>
        </tbody>
    @endforeach
</table>
</body>
</html>
