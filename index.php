
<html>
<head>
	 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">
    
    <title>  ARITMATIKA</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="css/fileinput.min.css">
    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <!-- Admin Stye -->
    <link rel="stylesheet" href="css/style.css">


</head>

	<script type="text/javascript" src="https://code.responsivevoice.org/responsivevoice.js"></script> <script type="text/javascript">
  	
 	</script>
</head>
<div class="container">
<body>
	<?php 
	if(isset($_POST['hitung'])){
		$bil1 = $_POST['bil1'];
		$bil2 = $_POST['bil2'];
		$operasi = $_POST['operasi'];
		switch ($operasi) {
			case 'tambah':
				$hasil = $bil1+$bil2;
			break;
			case 'kurang':
				$hasil = $bil1-$bil2;
			break;
			case 'kali':
				$hasil = $bil1*$bil2;
			break;
			case 'bagi':
				$hasil = $bil1/$bil2;
			break;			
		}
	}
	?>
	<script type="text/javascript">
	function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

    return false;
    return true;
	}
	</script>
		<?php 
 
	// FUNGSI TERBILANG OLEH : MALASNGODING.COM
	// WEBSITE : WWW.MALASNGODING.COM
	// AUTHOR : https://www.malasngoding.com/author/admin
 
 
	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
 
 
	?>
	<br>
	  <div class="panel panel-default">
		<div class="panel-heading"> FUNGSI ARITMATIKA</div>
		<div class="panel-body">
		<a class="brand" href=""></a>
		<form method="post" action="index.php">			
			<input type="text" name="bil1" class="form-control" autocomplete="off" placeholder="Bilangan Pertama" onkeypress="return hanyaAngka(event)"><br>

			<input type="text" name="bil2" class="form-control" autocomplete="off" placeholder="Bilangan Kedua" onkeypress="return hanyaAngka(event)">
			<br>
			<select class="opt" name="operasi">
				<option value="tambah"> + </option>
				<option value="kurang"> _ </option>
				<option value="kali"> X </option>
				<option value="bagi"> / </option>
			</select> 
			<br>
			<br>

			<input type="submit" name="hitung" value="Hitung" class="btn btn-danger">										
		</form>
		<?php if(isset($_POST['hitung'])){ ?>
			<input type="text" value="<?php echo $hasil; ?>" class="bil">	
			<input type="text" value="<?php $angka = $hasil; echo terbilang($angka);?>" class="bil">
			<input type="submit" name="sound" value="Sound" class="btn btn-primary" onclick="play();">
			<script>
			function play (){
			   responsiveVoice.speak(

			    "<?php echo $hasil; ?>",
			    "Indonesian Female",
			    {
			     pitch: 1, 
			     rate: 1, 
			     volume: 1
			    }
			   );
			  }
			</script> 
		<?php }else{ ?>
			<input type="text" value="0" class="bil">
			<input type="text" value="Terbilang" class="bil">
			<input type="submit" name="sound" value="Sound" class="tombol" onclick="play();">

			<script>
			function play (){
			   responsiveVoice.speak(
			    "<?php echo $hasil; ?>",
			    "Indonesian Female",
			    {
			     pitch: 1, 
			     rate: 1, 
			     volume: 1
			    }
			   );
			  }
			</script>
		<?php } ?>			
	</div>
</div>
<!-- Loading Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/fileinput.js"></script>
    <script src="js/chartData.js"></script>
    <script src="js/main.js"></script>
</body>
</html>