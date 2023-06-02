<?php
// membuat instance
$dataspp=NEW Spp;
// aksi tampil data
if($_GET['aksi']=='tampil'){
// aksi untuk tampil data
$html = null;
$html .='<h3>Daftar Spp</h3>';
$html .='<p>Berikut ini data Pembayaran SPP</p>';
$html .='<table border="1" width="100%">
<thead>
<th>No.</th>
<th>Id SPP</th>
<th>Nis</th>
<th>Nama Siswa</th>
<th>Kelas</th>
<th>Tempat Lahir</th>
<th>Tanggal Lahir</th>
<th>Jenis Kelamin</th>
<th>Nominal</th>
<th>Program Keahlian</th>
<th>Aksi</th>
</thead>
<tbody>';
// variabel $data menyimpan hasil return
$data = $dataspp->tampil();
$no=null;
if(isset($data)){
foreach($data as $barisSpp){
$no++;
$html .='<tr>
<td>'.$no.'</td>
<td>'.$barisSpp->id_spp.'</td>
<td>'.$barisSpp->nis.'</td>
<td>'.$barisSpp->nama_siswa.'</td>
<td>'.$barisSpp->kelas.'</td>
<td>'.$barisSpp->tempat_lahir.'</td>
<td>'.$barisSpp->tgl_lahir.'</td>
<td>'.$barisSpp->jenis_kelamin.'</td>
<td>'.$barisSpp->nominal.'</td>
<td>'.$barisSpp->perogram_keahlian.'</td>
<td>
<a href="index.php?file=spp&aksi=edit&id_spp='.$barisSpp->id_spp.'">Edit</a>
<a href="index.php?file=spp&aksi=hapus&id_spp='.$barisSpp->id_spp.'">Hapus</a>
</td>
</tr>';
}
}
$html .='</tbody>
</table>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='tambah') {
$html =null;
$html .='<h3>Form Tambah</h3>';
$html .='<p>Silahkan masukan form </p>';
$html .='<form method="POST"action="index.php?file=spp&aksi=simpan">';
$html .='<p>Id Spp<br/>';
$html .='<input type="text" name="txtId"placeholder="Masukan Id Spp" autofocus/></p>';
$html .='<p>NIS<br/>';
$html .='<input type="text" name="txtNis"placeholder="Masukan Nis" size="30" required/></p>';
$html .='<p>Nama Siswa<br/>';
$html .='<input type="text" name="txtNama"placeholder="Masukan Nama " size="30" required/></p>';
$html .='<p>Kelas<br/>';
$html .='<input type="text" name="txtKelas" placeholder="Masukkan Kelas" size="30" required/></p>';
$html .='<p>Tempat, Tanggal Lahir<br/>';
$html .='<input type="text" name="txtTempatLahir"placeholder="Masukan Tempat Lahir" size="30" required/>,';
$html .='<input type="date" name="txtTglLahir"required/></p>';
$html .='<p>Jenis Kelamin<br/>';
$html .='<input type="radio" name="txtJenisKelamin"value="L"> Laki-laki';
$html .='<input type="radio" name="txtJenisKelamin"value="P"> Perempuan</p>';
$html .='<p>Nominal<br/>';
$html .='<input type="text" name="txtNominal"placeholder="Masukan Nominal " size="30" required/></p>';
$html .='<p>Program Keahlian<br/>';
$html .='<input type="text" name="txtProgram"placeholder="Masukan Program Keahlian " size="30" required/></p>';
$html .='<p><input type="submit" name="tombolSimpan"value="Simpan"/></p>';
$html .='</form>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='simpan') {
$data=array(
'id_spp'=>$_POST['txtId'],
'nis'=>$_POST['txtNis'],
'nama_siswa'=>$_POST['txtNama'],
'kelas'=>$_POST['txtKelas'],
'tempat_lahir'=>$_POST['txtTempatLahir'],
'tgl_lahir'=>$_POST['txtTglLahir'],
'jenis_kelamin'=>$_POST['txtJenisKelamin'],
'nominal'=>$_POST['txtNominal'],
'perogram_keahlian'=>$_POST['txtProgram']
);
$dataspp->simpan($data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=spp&aksi=tampil">';
}
else if ($_GET['aksi']=='edit') {
$spp=$dataspp->detail($_GET['id_spp']);
if($spp->jenis_kelamin =='L') { $pilihL='checked';
$pilihP =null; }
else {
$pilihP='checked'; $pilihL =null; }
$html =null;
$html .='<h3>Form Tambah</h3>';
$html .='<p>Silahkan masukan form </p>';
$html .='<form method="POST"action="index.php?file=spp&aksi=update">';
$html .='<p>Id Spp<br/>';
$html .='<input type="text" name="txtId"value="'.$spp->id_spp.'" placeholder="Masukan Id SPP"readonly/></p>';
$html .='<p>NIS<br/>';
$html .='<input type="text" name="txtNis"value="'.$spp->nis.'" placeholder="Masukan No. Induk "size="30" required autofocus/></p>';
$html .='<p>Nama Siswa<br/>';
$html .='<input type="text" name="txtNama"value="'.$spp->nama_siswa.'" placeholder="Masukan Nama  "size="30" required autofocus/></p>';
$html .='<p>Kelas<br/>';
$html .='<input type="text" name="txtKelas" placeholder="Masukkan Kelas" size="30" required/></p>';
$html .='<p>Tempat, Tanggal Lahir<br/>';
$html .='<input type="text" name="txtTempatLahir"value="'.$spp->tempat_lahir .'" placeholder="Masukan TempatLahir" size="30" required/>,';
$html .='<input type="date" name="txtTglLahir"value="'.$spp->tgl_lahir.'" required/></p>';
$html .='<p>Jenis Kelamin<br/>';
$html .='<input type="radio" name="txtJenisKelamin"value="L" '.$pilihL.'> Laki-laki';
$html .='<input type="radio" name="txtJenisKelamin"value="P" '.$pilihP.'> Perempuan</p>';
$html .='<p>Nominal<br/>';
$html .='<input type="text" name="txtNominal"value="'.$spp->nominal.'" placeholder="Masukan Nominal "size="30" required autofocus/></p>';
$html .='<p>Program Keahlian<br/>';
$html .='<input type="text" name="txtProgram"value="'.$spp->perogram_keahlian.'" placeholder="Masukan Program Keahlian  "size="30" required autofocus/></p>';
$html .='<p><input type="submit" name="tombolSimpan"value="Simpan"/></p>';
$html .='</form>';
echo $html;
}
// aksi tambah data
else if ($_GET['aksi']=='update') {
$data=array(
'nis'=>$_POST['txtNis'],
'nama_siswa'=>$_POST['txtNama'],
'kelas'=>$_POST['txtKelas'],
'tempat_lahir'=>$_POST['txtTempatLahir'],
'tgl_lahir'=>$_POST['txtTglLahir'],
'jenis_kelamin'=>$_POST['txtJenisKelamin'],
'nominal'=>$_POST['txtNominal'],
'perogram_keahlian'=>$_POST['txtProgram']
);
$dataspp->update($_POST['txtId'],$data);
echo '<meta http-equiv="refresh" content="0;
url=index.php?file=spp&aksi=tampil">';
}
// aksi tambah data
else if ($_GET['aksi']=='hapus') {
$dataspp->hapus($_GET['id_spp']);
echo '<meta http-equiv="refresh" content="0;url=index.php?file=spp&aksi=tampil">';
}
// aksi tidak terdaftar
else {
echo '<p>Error 404 : Halaman tidak ditemukan !</p>';
}
?>
