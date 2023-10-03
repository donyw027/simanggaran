<!DOCTYPE html>
<html>
<head>
	<title>
		Nahelop Network Solusindo
	</title>
  <link rel="icon" href="<?= base_url('assets/logo2.jpg') ?>"> 


	<style media="print">
 @page {
  size: auto;
  margin: 0;
       }
</style>
	<title></title>
</head>
<body style="font-size:9pt;">

	<?php
	if (isset($_POST['print'])) {
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$metode = $_POST['metode'];
		$penerima = $_POST['penerima'];
		$bulan = $_POST['bulan'];
		$jumlah_bayar = $_POST['jumlah_bayar'];
		$kode_transaksi = strtotime('now');}
		?>



	<center><img src="<?php echo base_url() ?>assets/lomgo.jpg" width=100 height=100><br>

	<p style="font-size: 7pt">Jl. Kresno No.7, Polehan, Kec. Blimbing,<br> Kota Malang, Jawa Timur 65126<Br>
	Whatsapp : 0895-4128-12040</p> </center>
	<hr>
	
	<center> <font style="font-size: 8pt">
		<!-- Kode Transaksi : <?= $kode_transaksi ?> <br> -->
		<!-- <hr> -->
		Nama Cust : <?= $_POST['nama']; ?> <Br>
	Alamat : <?= $alamat ?><Br>
	Metode Bayar : <?= $metode ?><Br>
	Penerima :<?= $penerima ?></font><Br>
	<table border="1" width="150"  style="text-align: center;">
		<tr >
			<td><font size="1.5px">Pembayaran Bulan <B><?= $bulan ?></B>
				<br>
					<center>Total Bayar : <b>Rp.<?= number_format($jumlah_bayar,0,',','.');?></b></center>
			</font></td>
		</tr>
	<!-- 	<tr >
			<td><font size="2pt">Bulan <?= $bulan ?></font></td>
			<td style="color: red">diambil dari biaya x jumlah bulan</td>
		</tr> -->
	</table></center>
	
	
	<hr>
	<center><font style="font-size: 8pt"><b>Pembayaran Transfer Melalui <br>
		BRI : 312601039462533 <br>
		BCA : 0111685800<br>
		Mandiri : 1440018192408<br>
		A.n FERY HARIYONO<BR>
		<HR>
		KIRIM BUKTI BAYAR<BR>
		Whatsapp : 0895-4128-12040
	</center></B></font>
	<center><p style="font-size: 7pt">Terima kasih sudah menjadi customer <br>Nahelop Network Solusindo<Br>
	Kunjungi Website Kami di <br>www.nahelopnet.id</p></center><br>

		<!-- <p>Tanggal: <span id="tanggalwaktu"></span></p> -->
<script>
var dt = new Date();
document.getElementById("tanggalwaktu").innerHTML = dt.toLocaleDateString();
</script>

<!-- <p>Waktu: <span id="tanggawaktu"></span></p>
 --><script>
var dt = new Date();
document.getElementById("tanggawaktu").innerHTML = dt.toLocaleTimeString();
</script>

	</center>


	<script type="text/javascript">
		window.print();
        
	</script>

</body>
</html>