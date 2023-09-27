<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WDCP Y</title>
</head>

<body>
    <h3>Monitoring WDCP Y</h3>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Tanggal</th>
            <th>IP</th>
            <th>Kode Toko</th>
            <th>Nama Toko</th>
            <th>Nama Interface</th>
            <th>WDCP Y</th>
        </tr>
        <script>
            // (async function() {
            //     const tanggal = new Date().toLocaleString();
            //     const datatoko = await fetchDataFromDatabase('SELECT * FROM simulasi');
            //     const table = document.createElement('table');
            //     const header = table.createTHead();
            //     const headerRow = header.insertRow();
            //     headerRow.insertCell().textContent = 'Waktu';
            //     headerRow.insertCell().textContent = 'Kode Toko';
            //     headerRow.insertCell().textContent = 'Nama Toko';
            //     headerRow.insertCell().textContent = 'Nama Interface';
            //     headerRow.insertCell().textContent = 'WDCP Y';

            //     for (const dto of datatoko) {
            //         const row = table.insertRow();
            //         row.insertCell().textContent = tanggal;
            //         row.insertCell().textContent = dto.kode_toko;
            //         row.insertCell().textContent = dto.nama_toko;

            //         try {
            //             const api = new RouterosAPI();
            //             api.debug = false;
            //             if (await api.connect(dto.ip_wdcp, 'wdcp', 'xlybzk')) {
            //                 const result = await api.comm('/interface/wireless/print');
            //                 for (const interface of result) {
            //                     const interfaceCell = row.insertCell();
            //                     interfaceCell.textContent = interface.name;
            //                     const defaultAuthCell = row.insertCell();
            //                     defaultAuthCell.textContent = interface['default-authentication'];
            //                 }
            //                 api.disconnect();
            //             } else {
            //                 row.insertCell().textContent = 'gagal';
            //                 row.insertCell().textContent = 'gagal';
            //             }
            //         } catch (error) {
            //             row.insertCell().textContent = 'gagal';
            //             row.insertCell().textContent = 'gagal';
            //         }
            //     }
            //     document.body.appendChild(table);
            // })();

            // function fetchDataFromDatabase(query) {
            //     return new Promise((resolve, reject) => {
            //         const xhr = new XMLHttpRequest();
            //         xhr.onreadystatechange = function() {
            //             if (this.readyState === 4 && this.status === 200) {
            //                 resolve(JSON.parse(this.responseText));
            //             } else if (this.readyState === 4) {
            //                 reject(this.status);
            //             }
            //         };
            //         xhr.open('GET', `api.php?query=${query}`, true);
            //         xhr.send();
            //     });
            // }
        </script>
        <?php
        $tanggal = date('d-m-Y H:i:s');
        require_once 'api.php';
        require_once 'koneksi.php';
        $datatoko = query("SELECT * FROM simulasi");
        foreach ($datatoko as $dto) {
            $api = new RouterosAPI();
            echo "<tr>";
            echo "<td>" . $tanggal . "</td>";
            echo "<td>" . $dto['ip_wdcp'] . "</td>";
            echo "<td>" . $dto['kode_toko'] . "</td>";
            echo "<td>" . $dto['nama_toko'] . "</td>";
            if ($api->connect($dto['ip_wdcp'], 'wdcp', 'xlybzk')) {
                $result = $api->comm("/interface/wireless/print", array(
                    '?default-authentication' => 'true'
                ));
                foreach ($result as $interface) {
                    echo "<td>" . $interface['name'] . "</td>";
                    echo "<td>" . $interface['default-authentication'] . "</td>";
                    echo "</tr>";
                }
                $api->disconnect();
            } else {
                echo "<td>gagal</td>";
                echo "<td>gagal</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>

</html>