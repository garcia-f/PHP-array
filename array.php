<?php 

// Funcion para cargar estudiantes
function cargarEstudiantes() {
    return [
        ["dni" => "12345678", "nombre" => "Mainor Villalba"],
        ["dni" => "63748193", "nombre" => "Big Dani"],
        ["dni" => "32645890", "nombre" => "Costadoni Fabricio"],
        ["dni" => "12642673", "nombre" => "Eric Mercado"],
        ["dni" => "09873426", "nombre" => "Juliana Farias"],
        ["dni" => "09521347", "nombre" => "Carla Gonzalez"],
        ["dni" => "25345734", "nombre" => "Maria Mendez"],
        ["dni" => "35734178", "nombre" => "Franco Runchisky"],
        ["dni" => "41873452", "nombre" => "Ale Junior"],
        ["dni" => "29674823", "nombre" => "Ale San"]
    ];
}



// Funcion para cargar las notas de 2 parciales y las asitencias 
function cargarNotasyAsistencias( $estudiantes ) {
    foreach($estudiantes as &$estudiante) {
       
        // cargar las notas a cada alumnos del primer y segundo parcial
        $estudiante["parcial-1"] = rand(4, 10);
        $estudiante["parcial-2"] = rand(2, 10);

        // cargar las asistencias de los alumnos
        $estudiante["asistencias"] = rand(20, 40);
       
    }
    return $estudiantes;
}

// Calcular el porcentaje de asistencias.
function calcularPorcentajeAsistencias($asistencias, $totalClases = 40) {
    return ($asistencias / $totalClases) * 100;
}

// Evaluar a los estudiantes según las condiciones especificadas.
function evaluarEstudiantes($estudiantes) {
    foreach ($estudiantes as &$estudiante) {
        $alumno = $estudiante["nombre"];
        $dni = $estudiante["dni"];
        $parcial1 = $estudiante["parcial-1"];
        $parcial2 = $estudiante["parcial-2"];
        $porcentajeAsistencias = calcularPorcentajeAsistencias($estudiante["asistencias"]);

        switch (true) {
            case ($parcial1 >= 8 && $parcial2 >= 8 && $porcentajeAsistencias >= 80):
                echo "Alumno regular - DNI: $dni - Alumno: $alumno<br>";
                break;
        
            case ($parcial1 >= 8 && $parcial2 >= 8 && $porcentajeAsistencias < 80):
                echo "Debe realizar clases de apoyo - DNI: $dni - Alumno: $alumno<br>";
                break;
        
            case (($parcial1 < 8 || $parcial2 < 8) && $porcentajeAsistencias >= 80):
                echo "Debe recuperar un parcial - DNI: $dni - Alumno: $alumno<br>";
                break;
        
            default:
                echo "Alumno libre - DNI: $dni - Alumno: $alumno<br>";
                break;
        }
    }     

}



$estudiantes = cargarEstudiantes();
foreach ($estudiantes as $estudiante) {
    var_dump($estudiante);
    echo "<br>";
}

echo "<br>";
echo "<br>";

$asistencias_notas = cargarNotasyAsistencias($estudiantes);
foreach ($asistencias_notas as $asistencia_nota) {
    var_dump($asistencia_nota);
    echo "<br>";
}

echo "<br>";
echo "<br>";

echo "Resultado de los alumnos <br>";
evaluarEstudiantes($asistencias_notas);

?> 