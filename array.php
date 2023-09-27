<?php
//array mampu menyimpan element dengan tipe data yang berbeda
//array berpasangan antara key yang dimulai dari 0, dan value

//cara lama
$hari = array("senin", "selasa", "rabu");

//cara baru
$bulan = ["januari", "februari", "maret"];
$mahasiswa = [
    ["ardi", "208026", "ardi@gmail.com"],
    ["putra", "208025", "putra@gmail.com"]
];

//menampilkan array ke layar
var_dump($hari);
echo "<br>";
print_r($bulan);
echo "<br>";

//menampilkan satu value ke layar
echo $hari[2]; //akan memunculkan hari "rabu"

//menambah value baru ke aray yang sudah di bentuk
$hari[] = "kamis";
echo "<br>";
var_dump($hari);
echo "<br>";
//untuk menampilkan data dengan looping
foreach ($mahasiswa as $mhs) {
    echo $mhs[0];
    echo "<br>";
    echo $mhs[1];
    echo "<br>";
    echo $mhs[2];
    echo "<br>";
}
