<?php

function connect(){

  $coon = mysqli_connect('localhost','root','','ajax_example') or die(mysql_error($conn));
  return $coon;
}

function getdata(){
  $data_karyawan = array();
  $query = mysqli_query(connect(),"SELECT * FROM tableDatakaryawan");
  while($data=mysqli_fetch_assoc($query)){
    echo '<option value='.$data['nip'].'>'.$data['nama'].'</option>';
  }
}


  $id = (isset($_GET['nip']))?$_GET['nip']:'';
  $query=mysqli_fetch_assoc(mysqli_query(connect(),"SELECT alamat FROM tableDatakaryawan WHERE nip='$id'"));
  echo $query['alamat'];



?>
