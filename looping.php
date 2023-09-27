<?php

for ($i = 0; $i <= 5; $i++) {
    echo $i;
}

echo "<br>";

$i = 0;
while ($i < 5) {
    echo $i;
    $i++;
}

echo "<br>";

$i = 0;
do {
    echo "Selamat Datang Ardi" . "<br>";
    $i++;
} while ($i <= 5);

echo "<br>";

$datas = [
    'nama' => 'ardi',
    'alamat' => 'lebak'
];

foreach ($datas as $data) {
    var_dump($data);
}
