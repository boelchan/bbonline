<?php  
session_start();  
ob_start();  
include_once("../koneksi.php"); //buat koneksi ke database  
$kode   = $_GET['kode']; //kode berita yang akan dikonvert  

?>  
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->  
<head>  
<title><?php echo $data['NIS']; ?></title>  
<link rel="stylesheet" type="text/css" href="report.css">
</head>  
<body>  

        <?php 
        $select = mysql_query("SELECT * FROM  tb_transaksi where ID_T ='$kode'");
        $datapem = mysql_fetch_array($select);
        $user=$datapem['USERNAME'];
        $selectuser = mysql_query("SELECT * FROM tb_user where USERNAME ='$user'");
        $datauser = mysql_fetch_array($selectuser); 
         ?>
        <table>
            <tr>
                <td colspan="5">
                    <img src="images/header.png" width="380" height="50">
                </td>
            </tr>
            <tr>
                <td width="200" colspan="4">
                    <?php  
                    echo "<b>No Nota</b> : ".$datapem['ID_T']."<br>";
                    echo "<b>Nama</b> : ".$datauser['NAMA']."<br>"; 
                    echo "<b>Alamat</b> : ".$datapem['lokasi']; 
                    ?>
                </td>
                <td colspan="1">
                    <label class="lunas"><?php echo $datapem['bayar'] ?></label>
                </td>
            </tr>
            <tr>
                <td border="0.5px"><b>No</b></td>  
                <td border="0.5px" width="180" align="center"><b>Nama Barang</b></td>  
                <td border="0.5px" width="50" align="center"><b>Harga</b></td>  
                <td border="0.5px" align="center"><b>Jml</b></td>  
                <td border="0.5px" width="80" align="center"><b>Total</b></td>  
            </tr>
        <?php 
        $query  = mysql_query("select * from tb_detail where ID_T=$kode"); 
        $no=1;
        while($data=mysql_fetch_array($query)){
            $id_pro=$data["ID_P"];
            $select_pro=mysql_query("select * from tb_produk where ID_P='$id_pro'");
            $data_pro=mysql_fetch_array($select_pro);
            ?>
            <tr>  
                <td border="0.5px"><?php echo $no;?></td>
                <td border="0.5px"><?php echo $data_pro['NAMA_P'];?></td>
                <td border="0.5px" align="right"><?php echo $data_pro['HARGA_P'];?></td>
                <td border="0.5px" align="right"><?php echo $data['JUMLAH'];?></td>
                <td border="0.5px" align="right"><?php echo $data['TOTAL_D'];?></td>  
            </tr>
            <?php
            $no++;
        }
        ?>  
        <tr>
            <td border="0.5px" colspan="4" align="center"><b>Total</b></td>
            <td border="0.5px" align="right"><b><?php echo $datapem['TOTAL_T']; ?></b></td>
        </tr>
        </table>
</body>  
</html><!-- Akhir halaman HTML yang akan di konvert -->  
<?php  
$filename="NOTA-".$kode.".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya  
//==========================================================================================================  
//Copy dan paste langsung script dibawah ini,untuk mengetahui lebih jelas tentang fungsinya silahkan baca-baca tutorial tentang HTML2PDF  
//==========================================================================================================  
$content = ob_get_clean();  
$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';  
require_once(dirname(__FILE__).'/html2pdf/html2pdf.class.php');  
try  
{  
    $html2pdf = new HTML2PDF('P','A6','en', false, 'ISO-8859-15',array(2, 0, 2, 0));  
    $html2pdf->setDefaultFont('Arial');  
    $html2pdf->writeHTML($content, isset($_GET['vuehtml']));  
    $html2pdf->Output($filename);  
}  
catch(HTML2PDF_exception $e) { echo $e; }  
?>  