<?php
function concurso_files_sort($a, $b) {
    $format = 'U';
    $date1 = DateTime::createFromFormat($format, $a['date']);
    $date2 = DateTime::createFromFormat($format, $b['date']);

    if ($date1 == $date2) {
        return 0;
    }
    return ($date1 > $date2) ? -1 : 1;
}
