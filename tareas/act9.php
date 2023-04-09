<?php
// Array con los datos de las notas de los alumnos
$notas = array(
    "alumno1" => array("primera_evaluacion" => 7, "segunda_evaluacion" => 8),
    "alumno2" => array("primera_evaluacion" => 6, "segunda_evaluacion" => 5),
    "alumno3" => array("primera_evaluacion" => 8, "segunda_evaluacion" => 7),
    // Agrega más alumnos y sus notas aquí
);

// Función para calcular la nota media de un alumno
// Función para calcular la nota media de un alumno y mostrar las notas de las evaluaciones
function calcularNotaMedia($nota1, $nota2)
{
    $notaMedia = ($nota1 + $nota2) / 2;
    $resultado = "Nota 1ª Evaluación: " . $nota1 . "<br>";
    $resultado .= "Nota 2ª Evaluación: " . $nota2 . "<br>";
    $resultado .= "Nota Media: " . $notaMedia;
    return $resultado;
}

// Función para obtener la asignatura con mayor número de aprobados
function asignaturaMayorAprobados($notas)
{
    $aprobados = array();
    foreach ($notas as $alumno => $notasAlumno) {
        $media = calcularNotaMedia($notasAlumno["primera_evaluacion"], $notasAlumno["segunda_evaluacion"]);
        if ($media >= 5) {
            $aprobados[] = $alumno;
        }
    }
    $asignaturas = array();
    foreach ($aprobados as $alumno) {
        foreach ($notas[$alumno] as $asignatura => $nota) {
            if (!isset($asignaturas[$asignatura])) {
                $asignaturas[$asignatura] = 1;
            } else {
                $asignaturas[$asignatura]++;
            }
        }
    }
    return array_search(max($asignaturas), $asignaturas);
}

// Función para obtener la asignatura con mayor número de suspensos
function asignaturaMayorSuspensos($notas)
{
    $suspensos = array();
    foreach ($notas as $alumno => $notasAlumno) {
        $media = calcularNotaMedia($notasAlumno["primera_evaluacion"], $notasAlumno["segunda_evaluacion"]);
        if ($media < 5) {
            $suspensos[] = $alumno;
        }
    }
    $asignaturas = array();
    foreach ($suspensos as $alumno) {
        foreach ($notas[$alumno] as $asignatura => $nota) {
            if (!isset($asignaturas[$asignatura])) {
                $asignaturas[$asignatura] = 1;
            } else {
                $asignaturas[$asignatura]++;
            }
        }
    }
    return array_search(max($asignaturas), $asignaturas);
}

// Función para obtener el número de aprobados en cada asignatura
function numeroAprobadosPorAsignatura($notas)
{
    $aprobados = array();
    foreach ($notas as $alumno => $notasAlumno) {
        $media = calcularNotaMedia($notasAlumno["primera_evaluacion"], $notasAlumno["segunda_evaluacion"]);
        if ($media >= 5) {
            foreach ($notasAlumno as $asignatura => $nota) {
                if (!isset($aprobados[$asignatura])) {
                    $aprobados[$asignatura] = 1;
                } else {
                    $aprobados[$asignatura]++;
                }
            }
        }
    }

   
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Menu con los datos</title>
</head>
<body>
    <h1>Menu con los datos</h1>
    <nav>
        <ul>
            <li>
                <?php
                    foreach ($notas as $alumno => $notasAlumno) {
                        echo "<p>Alumno: " . $alumno . "</p>";
                        echo "<p>" . calcularNotaMedia($notasAlumno["primera_evaluacion"], $notasAlumno["segunda_evaluacion"]) . "</p>";
                    }
                ?>
            </li>
            <li>
                <p> La asignatura con mayor número de aprobados es: <?php echo asignaturaMayorAprobados($notas); ?></p>
            </li>
            <li>
                <p> La asignatura con mayor número de suspensos es: <?php echo asignaturaMayorSuspensos($notas); ?></p>
            </li>
            <li>
                <p> El número de aprobados por asignatura es: <?php print_r(numeroAprobadosPorAsignatura($notas)); ?></p>
            </li>
            
        </ul>
    </nav>
</body>
</html>