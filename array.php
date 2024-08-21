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
        $estudiante["parcial-1"] = rand(0, 10);
        $estudiante["parcial-2"] = rand(0, 10);

        // cargar las asistencias de los alumnos
        $estudiante["asistencias"] = rand(0, 40);
       
    }
    return $estudiantes;
}



$estudiantes = cargarEstudiantes();
foreach($estudiantes as $estudiante) {
    var_dump($estudiante);
    echo "<br>";
}

echo "<br>";
echo "<br>";

$asistencias_notas = cargarNotasyAsistencias($estudiantes);

foreach($asistencias_notas as $asistencia_nota) {
    var_dump($asistencia_nota);
    echo "<br>";
}



?> 