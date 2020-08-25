<html>
<head>
<meta charset="utf-8">
<title>Laporan PKL</title>
<style type="text/css">
<!--
.style1 {font-size: large}
-->
div.b 	{-webkit-text-decoration-line: underline; /* Safari */
   		text-decoration-line: underline; 
</style>
 </head>
  <title>Cetak KHS</title>
	<form>
	<table width="910" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr> 
      <td width="15%"><div align="left">
        <h2 align="center"><img src="<?php echo base_url(); ?>/assets/images/poltek.png" width="133" height="124"></h2>
      </div></td>
      <td width="85%"><div align="center" class="style1"><strong>KEMENTERIAN PENDIDIKAN DAN 			KEBUDAYAAN<br>
		  POLITEKNIK NEGERI JEMBER</strong><br>
		  Jl. Mastrip PO.BOX 164 Telp 333532 - 333534 Fax 333531 Jember 68101<br>
		  Website : http://www.polije.ac.id E-Mail : politeknik@polije.ac.id </div></td>
      </tr>
    <tr> 
      <td colspan="2"></td>
    </tr>
    <tr>
      <td colspan="2"><hr noshade></td>
    </tr>
    <tr>
      <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="2"><div align="center" class="style1"><strong>PROPOSAL</strong></div></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center" class="style1">PRAKTEK KERJA LAPANG</div></td>
		  </tr>
       <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="19%">1.Nama Perusahaan</td>
                    <?php  
                      foreach ($data_pengesahan->result_array() as $lokasi) :
                      $id_usulan=$lokasi['id_usulan'];  
                       $id=$lokasi['id_lokasi'];
                       $nama=$lokasi['nama_lokasi'];
                       $alamat=$lokasi['alamat'];
                       $telp=$lokasi['telp'];
                       $kota=$lokasi['kota'];
                       $status_usulan=$lokasi['stat_usulan'];
                       $status_verifikasi=$lokasi['stat_verifikasi'];

                    ?>
          <td width="81%">:<?php echo $nama; ?></td>
        </tr>
         <tr>
          <td width="19%">&ensp;&ensp;Alamat</td>
          <td width="81%">:<?php echo $alamat; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>

		<tr>
          <td width="19%">2.Pelaksanaan</td>
        </tr>
         <tr>
          <td width="19%">&ensp;&ensp;a.Lokasi PKL</td>
          <td width="81%">:<?php echo $kota; ?></td>
        </tr>
        <tr>
          <td width="19%">&ensp;&ensp;b.Alamat</td>
          <td width="81%">:<?php echo $alamat; ?></td>
        </tr>
        <tr>
          <td width="19%">&ensp;&ensp;c.Waktu</td>
          <td width="81%">:1 Maret 2018 s.d. 30 April 2018</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
		  </tr>
              </tr<?php endforeach;?>
		  <tr>
          <td colspan="2">        
										
            <table width="100%"  border="0" cellpadding="0" cellspacing="0">
              <tr>
                 <tr>
         		 <td width="19%">3.Nama Mahasiswa</td>
        		</tr>
                <td><table width="79%" border="1" cellspacing="0">
                    <tr bgcolor="#E4E9EF">
                      <td width="5%"><div align="center"><strong>No</strong></div></td>
                      <td width="70%"><div align="center"><strong>Nama Mahasiswa</strong></div></td>
                      <td width="30%"><div align="center"><strong>NIM</strong></div></td>
                    </tr>
                       <tr>
   						<td align="center">1</td>
              <?php  foreach ($data_mahasiswa_1 as $mahasiswa_1){ ?>
    					<td align="center"><?php echo $mahasiswa_1->nama_mhs;  ?></td>
 						<td align="center"><?php echo $mahasiswa_1->NIM; ?></td><?php } ?>
  					  </tr>
            		  <tr>
              <td align="center">2</td>
              <?php  foreach ($data_mahasiswa_2 as $mahasiswa_2){ ?>
              <td align="center"><?php echo $mahasiswa_2->nama_mhs;  ?></td>
            <td align="center"><?php echo $mahasiswa_2->NIM; ?></td><?php } ?>
  					  </tr>
             <tr>
              <td align="center">3</td>
              <?php  foreach ($data_mahasiswa_3 as $mahasiswa_3){ ?>
              <td align="center"><?php echo $mahasiswa_3->nama_mhs;  ?></td>
            <td align="center"><?php echo $mahasiswa_3->NIM; ?></td><?php } ?>
              </tr>
                  <tr>
              <td align="center">4</td>
              <?php  foreach ($data_mahasiswa_4 as $mahasiswa_4){ ?>
              <td align="center"><?php echo $mahasiswa_4->nama_mhs;  ?></td>
            <td align="center"><?php echo $mahasiswa_4->NIM; ?></td><?php } ?>
              </tr>
                  <tr>
              <td align="center">5</td>
              <?php  foreach ($data_mahasiswa_5 as $mahasiswa_5){ ?>
              <td align="center"><?php echo $mahasiswa_5->nama_mhs;  ?></td>
            <td align="center"><?php echo $mahasiswa_5->NIM; ?></td><?php } ?>
              </tr>
					</table>
                   <tr>
        		  <td>&nbsp;</td>
				  </tr>	   	        							
                    <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
        			<td width="40%">4.Mata Kuliah Terkait</td>
        			</tr>
                      <?php
                      $no=1;
                       foreach($data_matkul as $matkul){ ?>
                    <tr>

         			<td width="40%">&ensp;&ensp;- <?php echo $matkul->nama_matkul;?>. </td>
            <?php } ?>
        			</tr>
              <!--      <tr>
         			<td width="40%">&ensp;&ensp;b.</td>
        			</tr>
        			<tr>
         			<td width="40%">&ensp;&ensp;c.</td>
        			</tr>
        			<tr>
         			<td width="40%">&ensp;&ensp;d.</td>
        			</tr>
        			<tr>
         			<td width="40%">&ensp;&ensp;e.</td>
        			</tr>
        			<tr>
         			<td width="40%">&ensp;&ensp;f.</td>
        			</tr>
        			<tr>
         			<td width="40%">&ensp;&ensp;g.</td>
        			</tr>
        			<tr>
         			<td width="40%">&ensp;&ensp;h.</td>
        			</tr>-->
                    </table>
                  <tr>
        		  <td>&nbsp;</td>
				  </tr>
                	<tr>
        		  <td>&nbsp;</td>
				  </tr>	
                 <table width="910" border="0" align="center" cellpadding="0" cellspacing="0">
    		<tr>
    		<tr>
          <td width="400" align="center">Menyetujui</td>
          <td width="400" align="center">Jember, <?php echo date('d/m/Y');?></td>
        	</tr>
        	 <tr>
          <td width="400" align="center">Koordinator PKL</td>
          <td width="400" align="center">Ketua Kelompok</td>
        	</tr>
        	<tr>
        	<td>&nbsp;</td>
			</tr>
			<tr>
        	<td>&nbsp;</td>
			</tr>
			<tr>
        	<td>&nbsp;</td>
			</tr>
			<tr>
                    <?php  foreach ($data_ttd->result() as $ttd){ ?>
		  <td width="350" align="center"><strong><u><?php echo $ttd->korbidpkl ?> , <?php echo $ttd->gelardepankorbidpkl ?>. <?php echo $ttd->gelarbelakangkorbidpkl ?></u></strong></td><?php } ?>
                    <?php  foreach ($data_mahasiswa_1 as $mahasiswa_1){ ?>
          <td width="350" align="center"><strong><u><?php echo $mahasiswa_1->nama_mhs; ?></u></strong></td><?php } ?>
        	</tr>
        	<tr>
                  <?php  foreach ($data_ttd->result() as $nip){ ?>
          <td width="350" align="center">NIP <?php echo $nip->nipkorbidpkl ?></td><?php } ?>

          <?php  foreach ($data_mahasiswa_1 as $mahasiswa_1){ ?>
          <td width="350" align="center">NIM <?php echo $mahasiswa_1->NIM; ?></td> <?php } ?>
        	</tr>
        	<tr>
        	<td>&nbsp;</td>
			</tr>
    		<tr>
        	<td>&nbsp;</td>
			</tr>
     		<td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="2"><div align="center">Mengetahui</div></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">Ketua Jurusan</div></td>
        </tr>
      <!--  <tr>
          <td colspan="2"><div align="center">Akademik</div></td>
        </tr>-->
        <tr>
        <td>&nbsp;</td>
		</tr>
    	<tr>
        <td>&nbsp;</td>
		</tr>
     	<tr>
        <td>&nbsp;</td>
		</tr>
    	 <tr>
                            <?php  foreach ($data_ttd->result() as $ttd){ ?>
          <td colspan="2"><div align="center"><strong><u><?php echo $ttd->kajur ?></u></strong></div></td><?php } ?>
        </tr>
        <tr>
                            <?php  foreach ($data_ttd->result() as $nip){ ?>
          <td colspan="2"><div align="center">NIP <?php echo $nip->nipkajur ?></div></td><?php } ?>
        </tr>	
      		</tr>
						</table>
                  </td>
              </tr>
          </table></td>
        </tr>
      </table>
   <center><button id="cetak" onclick="Cetakan()">Cetak Lembar Pengesahan</button></center> 
    <tr bgcolor="#FFFFFF"> 
      <td colspan="3">&nbsp;</td>
    </tr>
  </table>
</form>


<script>
function Cetakan()
{
  var x = document.getElementById("cetak");
      x.style.visibility = "hidden";
  window.print();
  alert("Jangan di tekan tombol OK sebelum dokumen selesai tercetak!");
      x.style.visibility = "visible";
}

</script>
