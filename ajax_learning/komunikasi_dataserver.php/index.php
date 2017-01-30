<?php include "core/database.php"; ?>

<!DOCTYPE html>
<html>
  <head>
    <title>AJAX EXAMPLE 1</title>
    <style>
      .container{
        margin:0 auto;
        width:940px;
        height:auto;
        border:0px solid black;
        padding:10px;
      }
      .form-group{

        padding:10px;
      }

      .form-group select{
        width:200px;
        padding:10px
      }
      .clear {
        clear:both;
      }
      .form-group textarea{
        width:500px;
        height:200px;
      }

      .form-group label{
        border:0px solid black;
        float:left;

      }
    </style>
    <script type="text/javascript">
    var ajaxku;
    var nip;
    function buatajax(){
      if(window.XMLHttpRequest){
        return new XMLHttpRequest();
      }

      if(window.ActiveXObject){
        return new ActiveXObject("Microsoft.XMLHTTP");
      }

      return null;
    }

    function ambildata(nip){
      var ajaxku = buatajax();
      var url="core/database.php?nip="+nip;

      ajaxku.onreadystatechange = function(){
        if(this.readyState == 4 && this.status==200){
          document.getElementById("alamat").value= this.responseText;
        }
      };
      ajaxku.open("GET","core/database.php?nip="+nip,true);
      ajaxku.send();

      console.log(nip);
    }
    
    </script>
  </head>
<body>
<div class="container">
  <form action="core/database.php" method="GET">
      <div class="form-group">
        <label>Nama : </label>

        <select name="nip" onchange="ambildata(this.value)" id="select">
          <option selected>--Pilih Karyawan--</option>
          <?php getdata(); ?>
        </select>
      </div>
      <div class="form-group">
          <label>Alamat :</label>
          <textarea name="alamat" id="alamat"></textarea>
      </div>
      <input type="submit" value="simpan">
      <div class="clear"></div>
  </form>

  <p>Pada contoh ini berikut anda akan memilih nama dan mengambil data alamat database
    berdasarkan nama tersebut dan menampilkannya di halaman ini tanpa harus me-reloded keseluruhan halaman
  </p>

  </div>
</div>


</body>
</html>
