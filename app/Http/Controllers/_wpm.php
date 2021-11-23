<?php
$alternatif = array("Tangerang Selatan", "Kota Tangerang", "Kab Tangerang", "Kota Serang", "kota Cilegon", "Kab Lebak", "Kab Serang");
$kriteria = array(4, 5, 3);
$w_c = array();
$total_bobot_awal = 0;
$total_bobot_akhir = 0;

/* rasio bobot tiap kriteria */
foreach ($kriteria as $i => $value) {
    $total_bobot_awal += $kriteria[$i];
}

foreach ($kriteria as $i => $value) {
    $w_c[$i] =round($kriteria[$i]/$total_bobot_awal,2);
}

foreach ($w_c as $i => $value) {
    $total_bobot_akhir += $w_c[$i];
}

/* matrik keputusan ternormalisasi */
$c1 = array(20, 40, 15, 10, 25, 10, 20);
$c2 = array(10000, 25000, 5000, 30000, 35000, 15000, 35000);
$c3 = array(95, 75, 90, 80, 75, 70, 80);

$c1_min = min($c1);
$c2_max = max($c2);
$c3_min = min($c3);

$c1_R = array();
$c2_R = array();
$c3_R = array();

/*Matrik Normalisasi (R)*/
foreach ($c1 as $i => $value){
    $c1_R[$i] = round($c1_min/$c1[$i],2);
}

foreach ($c2 as $i => $value){
    $c2_R[$i] = round($c2[$i]/$c2_max,2);
}

foreach ($c3 as $i => $value){
    $c3_R[$i] = round($c3_min/$c3[$i],2);
}

/*Matriks normalisasi terbobot (v) */
$c1_V = array();
$c2_V = array();
$c3_V = array();

foreach ($c1_R as $i => $value){
    $c1_V[$i] = round(pow($c1_R[$i],$w_c[0]),2);
}

foreach ($c2_R as $i => $value){
    $c2_V[$i] = round(pow($c2_R[$i],$w_c[1]),2);
}

foreach ($c3_R as $i => $value){
    $c3_V[$i] = round(pow($c3_R[$i],$w_c[2]),2);
}

/* Hitung skor untuk setiap alternatif dengan menggalikan setiap atribut yang diperoleh (M) */
$Performance_score = array();
foreach ($alternatif as $i => $value){
    $Performance_score[$i] = round($c1_V[$i] * $c2_V[$i] * $c3_V[$i], 2);
}

$ordered_values = $Performance_score;
rsort($ordered_values);

foreach ($Performance_score as $key => $Performance_score){
	foreach($ordered_values as $ordered_key => $ordered_value) {
    	if($Performance_score === $ordered_value){
        	$key = $ordered_key;
            break;
    	}
    }
    echo $Performance_score . '- Rank: '. ((int) $key + 1) .'<br/>';
}
$ordered_values = $Performance_score;
rsort($ordered_values);

foreach ($Performance_score as $key => $Performance_score){
	foreach($ordered_values as $ordered_key => $ordered_value) {
    	if($Performance_score === $ordered_value){
        	$key = $ordered_key;
            break;
    	}
    }
    echo $Performance_score . '- Rank: '. ((int) $key + 1) .'<br/>';
}
?>