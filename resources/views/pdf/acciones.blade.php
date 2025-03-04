<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Acciones</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Reporte de Acciones</h2>
    <@if(Auth::user()->hasRole('teacher','tutor'))
        @foreach($users as $user)
        @if(DB::table('pupils_teachers_tutors')->where('pupil_id', $user->id)->value('teacher_id') == Auth::user()->id || DB::table('pupils_teachers_tutors')->where('pupil_id', $user->id)->value('tutor_id') == Auth::user()->id)
        @php $count = 0 @endphp
        @foreach($actions as $action)   
                    @if($action->user->id == $user->id)
                        @php $count = $count + $action->interval @endphp
                    @endif
                @endforeach
        <h2>Tareas de: {{$user->name}} {{$user->surname1}}  Duracion total: {{$count}} h</h2>
        <table>
            <thead>
                <tr>
                    <th >Descripcion</th>
                    <th >Fecha</th>
                    <th >Duracion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($actions as $action)
                    @if($action->user->id == $user->id)
                    <tr>
                        <td >{{ $action->description }}</td>
                        <td >{{ $action->date }}</td>
                        <td >{{ $action->interval }}</td>
                    </tr>
                    @endif
                @endforeach
                @endif
                @endforeach
                @endif
            </tbody>
        </table>

</body>
</html>
