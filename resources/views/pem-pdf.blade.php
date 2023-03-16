<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>

</head>
<body>
	<style type="text/css">


.date {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 12px;
      color: #333;
	  float: bottom;
	  font-weight: bold;
    }

.header {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  height: 50px;
  background-color: #eee;
  border-bottom: 1px solid #ccc;
}

.header .date {
  float: right;
  margin-right: 10px;
  font-size: 14px;
  color: #333;
}

.content {
  padding-top: 60px;
}



		table tr td,
		table tr th{
			font-size: 9pt;
		}

		table{
			width:100%;
		}
		

.letterhead {
  background-color: #f1f1f1;
  font-family: Times,Helvetica,sans-serif;
  height: 140px;
  width: 100%;
  border-bottom: 1px solid #ccc;
  margin: 0 auto;
  text-align: center;
}

.logo-container {
  text-align: center;
}

.logo-container img {
  width: 200px;
  height: auto;
  
}

.signature {
  font-family: Arial, sans-serif;
  font-size: 14px;
  color: #333;
  width: 300px;
  border: 1px solid #ccc;
  padding: 10px;
  text-align: right;
}

.signature img {
  float: center;
  margin-right: 10px;
  width: 80px;
  height: 80px;
  text-align: right;
}

.signature p {
  margin: 0;
  padding: 0;
  line-height: 1.5;

  footer {
  position: relative;
  height: 100px; /* Set a height for the footer */
  font-size: 14px;
}

.signature {
  position: absolute;
  bottom:300;
  right: 0; /* Align the signature to the right */
  text-align: right; /* Align the text to the right */
}

p {
    text-align: center;
  }

}

	</style>

<div class="date" style="font-weight: bold;"><?php echo date('m/d/Y', time()); ?></div>


<div class="logo-container">
</div>

<div class="logo-container">
  <img src="assets/img/favicon/logo.jpg" alt="My Company Logo">
</div>

<div class="letterhead" style="text-align: center;">
  <h1>LAPORAN PEMBAYARAN</h1>
  <p>Jalan Raya Tajur Kp. Buntar Kel. Muarasari RT/ 16137 Bogor West Java</p>
  <p>Phone: +62 251 2752729 | Email: https://pjj.smkn4bogor.sch.id</p>
</div>







	<!-- <center>
		<h3>Laporan Pembayaran SPP</h2>
		
	</center>
  -->
	<table class='table table-bordered' border="2">
		<thead>
			<tr>
                <th>No</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Petugas</th>
                <th>Tahun Bayar</th>
                <th>Bulan Bayar</th>
                <th>Jumlah Bayar</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($data as $key => $p)
			<tr>
                <td>{{ $key +1 }}</td>
                <td>{{ $p->siswa->name }}</td>
                <td>{{ $p->siswa->nisn }}</td>
                <td>{{ $p->siswa->nis }}</td>
                <td>{{ $p->siswa->kelas->kelas }}</td>
                <td>{{ $p->petugas->name }}</td>
                <td>{{ $p->tahun_bayar  }}</td>
                <td>{{ $p->bulan_bayar }}</td>
                <td>Rp. {{ number_format($p->jumlah_bayar) }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
 
	<footer>
  <div class="signature">
    <img src="" alt="My Signature">
    <p style="text-align: center;">Petugas,</p>
    <p>(_________________)</p>
  </div>
</footer>

</body>
</html>