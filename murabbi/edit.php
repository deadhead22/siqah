<?php
include "../koneksi.php";
include "akses.php";
$nama_pengguna = $_SESSION['nama_pengguna'];
$id_mutarabbi = $_GET['id'];

//Dapatkan data lengkap mutarabbi
$select = $koneksi->prepare("SELECT nama_mutarabbi, prodi, angkatan, nama_murabbi, jenjang, no_hp, alamat, nama_kelompok FROM mutarabbi WHERE id_mutarabbi='$id_mutarabbi';");
$select->execute();
$select->store_result();
$select->bind_result($nama_mutarabbi_lama, $prodi, $angkatan, $nama_murabbi, $jenjang, $no_hp, $alamat, $nama_kelompok);
$select->fetch();

$nama_mutarabbi_lama = mysqli_real_escape_string($koneksi, $nama_mutarabbi_lama);

//Dapatkan id_halaqah
$select = $koneksi->prepare("SELECT id_halaqah FROM halaqah WHERE id_mutarabbi='$id_mutarabbi';");
$select->execute();
$select->store_result();
$select->bind_result($id_halaqah);
$select->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
	<meta http-equiv=”Content-Type” content=”text/html; charset=utf-8″ />
	<title>Edit Data Mutarabbi</title>

	<!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.css"  media="screen,projection"/>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Favicon Properties -->
    <link rel="apple-touch-icon" sizes="57x57" href="../favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="../favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

        <!--Back To Top-->
    <script type="text/javascript">
        $(document).ready(function(){
    $(window).scroll(function(){
        if ($(window).scrollTop() > 100) {
            $('#tombolScrollTop').fadeIn();
        } else {
            $('#tombolScrollTop').fadeOut();
        }
    });
});

function scrolltotop()
{
    $('html, body').animate({scrollTop : 0},500);
}
    </script>
    <!--END Back to Top-->
</head>
<body>
<header>
    <!-- Navbar goes here -->
    <nav>
        <div class="nav-wrapper teal darken-4 z-depth-3">
        <a href="index.php" class="brand-logo center hide-on-med-and-down">
        <img src="../favicon/icon-header2.png" class="responsive-img" style="height: 55px; margin-top: 5px;"></a>
        <a href="index.php" class="brand-logo center hide-on-large-only">
        <img src="../favicon/icon-header2.png" class="responsive-img" style="height: 45px; margin-top: 5px;"></a>
        <a href="#" data-activates="mobile-mode" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="left hide-on-med-and-down">
            <li class="active"><a href="lihat_mutarabbi.php">Data Kelompok</a></li>
            <li><a href="laporan_halaqah.php">Laporan Halaqah</a></li>
            <li><a href="rekap_presensi.php">Rekapitulasi Presensi</a></li>
            <li><a href="pusat_madah.php">Pusat Madah</a></li>
        </ul>
        <ul class="right hide-on-med-and-down">
            <li><a href="#"><strong><?=$nama_murabbi;?></strong></a></li>
            <li><a href="keluar.php">Keluar</a></li>
        </ul>
        <ul class="right hide-on-large-only">
            <li><a href="index.php"><i class="material-icons">arrow_back</i></a></li>
        </ul>
        
        <ul class="side-nav" id="mobile-mode">
            <li class="active"><a href="lihat_mutarabbi.php">Data Kelompok</a></li>
            <li><a href="laporan_halaqah.php">Laporan Halaqah</a></li>
            <li><a href="rekap_presensi.php">Rekapitulasi Presensi</a></li>
            <li><a href="pusat_madah.php">Pusat Madah</a></li>
            <div class="divider"></div>
            <li><a href="#"><strong><?=$nama_murabbi;?></strong></a></li>
            <div class="divider"></div>
            <li><a href="keluar.php">Keluar</a></li>
        </ul>
        </div>
    </nav>
</header>

<!-- Headline -->
    <div class="section teal lighten-5 z-depth-1">
        <div class="container">
            <p class="flow-text">Dashboard Murabbi</p>
        </div>
    </div>

    <!-- Breacrumb Navigation -->
    <nav class="hide-on-med-and-down">
      <div class="nav-wrapper teal darken-3">
      <div class="container">
          <div class="col s12">
            <a href="index.php" class="breadcrumb"><i class="material-icons">home</i></a>
            <a href="lihat_mutarabbi.php" class="breadcrumb">Data Kelompok</a>
            <a href="data_mutarabbi.php?nama=<?=$nama_kelompok;?>" class="breadcrumb">Data Mutarabbi</a>
            <a href="edit.php?id=<?=$id_halaqah;?>" class="breadcrumb">Edit <?= stripslashes($nama_mutarabbi_lama);?></a>
          </div>
        </div>
      </div>
    </nav>      

<div class="container">
<h2>Edit Data Mutarabbi</h2>

<form method="post" action="proses_edit.php" onsubmit="return confirm('Yakin Ingin Mengedit Mutarabbi?');">
	<input type="hidden" name="id_mutarabbi" value="<?=$id_mutarabbi;?>">
	<input type="hidden" name="id_halaqah" value="<?=$id_halaqah;?>">
	<div class="row">
        <div class="input-field col s12">
        	<input type="hidden" name="nama_mutarabbi_lama" value="<?= stripslashes($nama_mutarabbi_lama);?>">
            <input type="text" name="nama_mutarabbi_baru" value="<?= stripslashes($nama_mutarabbi_lama);?>" required></br>
        	<label for="nama_mutarabbi_baru">Nama Mutarabbi</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s8">
        	<select id="prodi" class="form-control" name="prodi">
			<?php
			$select = $koneksi->prepare("SELECT prodi FROM prodi ORDER BY id_prodi ASC;");
						$select->execute();
						$select->store_result();
						$select->bind_result($prodi_db);
						while($select->fetch())
						{
						?>
				<option value="<?=$prodi_db;?>"><?=$prodi_db;?></option>
				<?php
				}?>
			</select>
        	<label>Prodi</label>
        </div>
        <div class="input-field col s4">
        	<input type="text" name="angkatan" value="<?=$angkatan;?>" required></br>
			<input type="hidden" name="nama_murabbi" value="<?=$nama_murabbi;?>">
        	<label>Angkatan</label>
        </div>
    </div>	    
    <div class="row">
    	<div class="input-field col s12">
    		<input type="text" name="no_hp" value="<?=$no_hp;?>">
			<label>No. HP</label>
		</div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <input type="text" name="alamat" value="<?=$alamat;?>">
            <label>Alamat</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
            <input type="text" name="jenjang" value="<?=$jenjang;?>" disabled>
            <input type="hidden" name="jenjang" value="<?=$jenjang;?>">
            <label>Kelas</label>
        </div>
    </div>  

	<div class="row">
		<div class="input-field col s12">
			<input type="text" name="nama_kelompok" value="<?=$nama_kelompok;?>" disabled>
			<input type="hidden" name="nama_kelompok" value="<?=$nama_kelompok;?>">
			<label>Nama Kelompok</label>
		</div>
	</div>	
	<button type="submit" class="waves-effect waves-light btn z-depth-3" name="edit">Edit</button>	
</form>
</div>
<br>

<button id="tombolScrollTop" class="btn-floating waves-effect waves-light" onclick="scrolltotop()" style="float: right; margin: 0 20px 20px 0;"><i class="material-icons">arrow_upward</i></button>

<footer class="page-footer teal darken-4">
          <div class="footer-copyright">
            <div class="container">
                © 2017 Copyright LTT FT
            <div class="right">
            <a class="grey-text text-lighten-4" href="tutorial.php">Tutorial Penggunaan</a> | 
            <a class="grey-text text-lighten-4" href="tentang_kami.php">Tentang Kami</a>
            </div>
            </div>
          </div>
    </footer>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

    <!-- Custom Javasciprt -->
    <script>
        $( document ).ready(function(){
            $(".button-collapse").sideNav();
        })

        $(document).ready(function() {
    		$('select').material_select();
  		});

        $('#prodi option[value="<?=$prodi;?>"]').attr('selected','selected');
        $('#jenjang option[value="<?=$jenjang;?>"]').attr('selected','selected');
    </script>
</body>
</html>