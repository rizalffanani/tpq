<!DOCTYPE html>
<?php 
  $infoweb=$this->db->get_where('info', array('id_info' => '1'))->row();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to CodeIgniter</title>
    <style>
    	.body{

    	}
		table {
			width: 100%;
		  border-collapse: collapse;
		}

		table, td, th {
			padding: 5px;
			font-weight: bold;
		 	text-align: center;
		  	border: 2px solid black;
		}

		#wath {
			padding: 5px;
			font-weight: bold;
		 	text-align: left;
		  border: none;
		}

		#io{
		  	border: none;
		}
		#io td {
			padding: 5px;
			font-family: ARIAL;
			font-weight: 200;
		 	text-align: left;
		  	border: none;
		}
	</style>
</head>
<body>
	<div id="container">
		<div id="body">	    
			<h3><center><b>Target Pencapaian Materi Pembelajaran</b> <i>(TPMP)</i></center></h3>    
			<h3><center><b><?= $infoweb->nama_web?></b> </center></h3>    
			<table id="wath">
				<tr id="wath">
					<td id="wath">Madin</td>
					<td id="wath">: <?= $row->nama_ustadz?></td>
					<td id="wath">Kelas</td>
					<td id="wath">: <?= $row->nama_kelas?></td>
				</tr>
				<tr>
					<td id="wath">Nomor Induk</td>
					<td id="wath">: <?= $dtl->nomor_induk?></td>
					<td id="wath">Semester</td>
					<td id="wath">: <?= $row->semester?> </td>
				</tr>
				<tr>
					<td id="wath">Nama</td>
					<td id="wath">: <?= $dtl->nama_lengkap?></td>
					<td id="wath">Tahun Ajaran</td>
					<td id="wath">: <?= $row->nama_ajaran?></td>
				</tr>
			</table>  
			<br>
			<table dir="ltr" border="1" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<th rowspan="2" style="width: 5%">No</th>
						<th rowspan="2">Mata Pelajaran</th>
						<th colspan="2">Nilai Prestasi</th>
						<th>Rata-Rata Kelas</th>
					</tr>
					<tr>
						<th>Angka</th>
						<th>Huruf</th>
						<th>Angka</th>
					</tr>
					<?php $no=1; $ttl=0;foreach (@$siswa as $key => $vals) {$ttl=$vals->nilai+$ttl;?>
						<tr>
								<td><?= $no?>.</td>
								<td style="text-align: left;"><?= $vals->nama_mapel?></td>
								<td><?= $vals->nilai?></td>
								<td style="text-transform: capitalize;"><?= terbilang($vals->nilai)?></td>
								<?php foreach (@$rata as $key => $vals2) {if($vals->id_mapel==$vals2->id_mapel){?>
								<td><?= $vals2->rata?></td>
								<?php }}?>
						</tr>
					<?php $no++;}?>
					<tr>
						<td colspan="2">Jumlah</td>
						<td><?= $ttl?></td>
						<td></td>
						<td></td>
					</tr>
					<tr>
						<td colspan="5" >
							Peringkat ke 
							<?php foreach (@$rank as $key => $val) {if($val->id_kelas_siswa==$idm){ 
									echo $val->ranking;
							}}?>
							Dari <?= count(@$rank)?> Murid
						</td>
					</tr>
				</tbody>
			</table>     
			<br>
			<table dir="ltr" border="1" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<th>Pembiasaan</th>
						<th colspan="2">Uraian</th>
						<th>Nilai</th>
					</tr>
					<tr>
						<td rowspan="3">Kepribadian</td>
						<td>1.</td>
						<td style="text-align: left;">Kelakuan</td>
						<td><?php echo($catat->kelakuan)?></td>
					</tr>
					<tr>
						<td>2.</td>
						<td style="text-align: left;">Kerajinan</td>
						<td><?php echo($catat->kerajinan)?></td>
					</tr>
					<tr>
						<td>3.</td>
						<td style="text-align: left;">Kebersihan</td>
						<td><?php echo($catat->kebersihan)?></td>
					</tr>
					<tr>
						<td rowspan="3">Ketidakhadiran</td>
						<td>1.</td>
						<td style="text-align: left;">Izin</td>
						<td><?php echo($catat->izin)?> hari</td>
					</tr>
					<tr>
						<td>2.</td>
						<td style="text-align: left;">Sakit</td>
						<td><?php echo($catat->sakit)?> hari</td>
					</tr>
					<tr>
						<td>3.</td>
						<td style="text-align: left;">Alpa</td>
						<td><?php echo($catat->alpa)?> hari</td>
					</tr>
				</tbody>
			</table>  
			<br>
			<table dir="ltr" border="1" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td style="text-align:left;">
							Catatan untuk diperhatikan orang tua:<br><br>
							<p><?php echo($catat->catatan)?> </p>
						</td>
					</tr>
				</tbody>
			</table>  
			<br>
			<table dir="ltr" style="border:none;" cellspacing="0" cellpadding="0">
				<tbody style="border:none;">
					<tr style="border:none;">
						<td style="border:none;text-align:left;width: 20%;">Diberikan di</td>
						<td style="border:none;text-align:left;width: 30%;">:__________________</td>
						<td style="border:none;text-align:left;width: 50%;">Keputusan:</td>
					</tr>
					<tr>
						<td style="border:none;text-align:left;vertical-align: text-top;width: 20%;">Tanggal</td>
						<td style="border:none;text-align:left;vertical-align: text-top;width: 30%;">:__________________</td>
						<td style="border:none;text-align:left;width: 50%;">Dengan melihat hasil pada semester ganjil dan genap yang dicapai, maka peserta didik tersebut ditetapkan naik/tidak naik ke kelas .....................</td>
					</tr>
				</tbody>
			</table>  
			<br>
			<table dir="ltr" style="border:none;" cellspacing="0" cellpadding="0">
				<tbody style="border:none;">
					<tr style="border:none;">
						<td style="border:none;width: 33%;">Orang Tua / Wali Santri</td>
						<td style="border:none;width: 33%;">Wali Kelas</td>
						<td style="border:none;width: 33%;">Kepala MDT</td>
					</tr>
					<tr style="border:none;">
						<td style="height: 50px;border:none;"></td>
						<td style="height: 50px;border:none;"></td>
						<td style="height: 50px;border:none;"></td>
					</tr>
					<tr style="border:none;">
						<td style="border:none;">.................</td>
						<td style="border:none;">.................</td>
						<td style="border:none;">.................</td>
					</tr>
				</tbody>
			</table>  
			<!-- <p><strong>Catatan:</strong> Dalam Pelaksanaannya dilapangan, semua materi pelajaran diatur dalam <strong>Jadwal Pelajaran</strong> yang ditentukan, dikondisikan dengan <strong>Panduan Rencana</strong> (Pelaksanaan) <strong>Pembelajaran </strong>dan <strong>Panduan materi pembelajaran.</strong></p> -->
			<pagebreak/>
	    </div> 
	</div> 
</body>
</html>