<!DOCTYPE html>
<html lang="">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"
        integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous">
    </script>
    <title>Data Transaksi</title>
</head>

<body>
    <div class="text-center card-header">
        <h3>SISTEM INFORMASI BARANG</h3>
        <h4>Struk Transaksi</h4>
    </div>

    <table class="table table-bordered">
        <tr>
            <th scope="">Id Transaksi</th>
            <th scope="">Barang</th>
            <th scope="">Pegawai</th>
            <th scope="">Kurir</th>
            <th scope="">Jumlah</th>
            <th scope="">Total Bayar</th>
            <th scope="">Tanggal</th>
        </tr>
        @foreach ($transaksis as $Transaksi)
        <tr>
            <td>{{ $Transaksi->id }}</td>
            <td>{{ $Transaksi->barang->Nama_Barang }}</td>
            <td>{{ $Transaksi->pegawai->Nama_Pegawai }}</td>
            <td>{{ $Transaksi->kurir->Nama_Kurir }}</td>
            <td>{{ $Transaksi->jmlh}}</td>
            <td>{{ $Transaksi->total_bayar}}</td>
            <td>{{ $Transaksi->tgl }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
