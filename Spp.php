<?php
class Spp extends Database {
public function tampil(){
$sql=$this->mysqli->query("SELECT * FROM tbl_spp") or die($this->CekError());
while($data=$sql->fetch_object()){
$datasppsiswa[]=$data;
}
if(isset($datasppsiswa)){
return $datasppsiswa;
}
$this->TutupKoneksi();
}
public function detail($id_spp){
$sql=$this->mysqli->query("SELECT * FROM tbl_spp WHERE id_spp='".$id_spp."'") or die ($this->CekError());
$datasppsiswa=$sql->fetch_object();
if(isset($datasppsiswa)){
return $datasppsiswa;
}
$this->TutupKoneksi();
}
function update($id_spp,$data){
$script_update_temp=null;
foreach($data as $field=>$value){
$script_update_temp .= $field."='".$value."',";
} 
$script_update=rtrim($script_update_temp,',');
$this->mysqli->query("UPDATE tbl_spp SET ".$script_update."WHERE id_spp='".$id_spp."'") or die ($this->CekError());
$this->TutupKoneksi();
}
function hapus($id_spp){
$this->mysqli->query("DELETE FROM tbl_spp WHERE id_spp='$id_spp'");
$this->TutupKoneksi();
}
function simpan($data){
$kolom_nya=null;
$nilai_nya=null;
foreach($data as $kolom=>$nilai){
$kolom_nya .= $kolom.",";
$nilai_nya .= "'".$nilai."',";
}
$kolom_nya_baru=rtrim($kolom_nya,',');
$nilai_nya_baru=rtrim($nilai_nya,',');
$sql_simpan="INSERT INTO tbl_spp (".$kolom_nya_baru.") VALUES (".$nilai_nya_baru.")";
$this->mysqli->query($sql_simpan) or die($this->CekError()); 
$this->TutupKoneksi();
}
}
