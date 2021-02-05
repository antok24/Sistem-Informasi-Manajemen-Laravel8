<!DOCTYPE html>
<html>
<head>
  <title>Lembar Disposisi</title>
        <style>
            @page {
                margin: 0cm 0cm;
            }
            div{
            	line-height: normal;
            }
            body {
                margin-top: 0.5cm;
                margin-left: 0cm;
                margin-right: 0cm;
                margin-bottom: 0cm;
    			color: #000;
    			font-family: "Times New Roman", Times, serif;
            }
            body {
                font-size: 12px;
            }
            div.content{
                margin-top: 3cm;
                margin-left: 2.5cm;
                margin-right: 2.5cm;
                margin-bottom: 0cm;
                color: #000;
                font-family: "Times New Roman", Times, serif;
                font-size: 17px;
            }
            h2 {
            font-size: 18px;
            }
			p {
  			font-size: 15px;
  			line-height: : 12px;
			}
            a {
            font-size: 20px;
            line-height: : 12px;
            }
            header {
                position: fixed;
                top: 0.5cm;
                left: 0.5cm;
                right: 0.5cm;
                height: 3cm;
            }
            div.footer {
                position: absolute; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 3cm;
                background-repeat: no-repeat;
            }
            #bg {
                position: absolute;
                z-index: -1; 
                top: 3.5cm; 
                left: 35%; 
                width: 100px; 
                height: 300px;
                color: invert;
            }
            #ttd{
                float: right;
            }
            tr td{
                text-align: justify;
                vertical-align: top;
            }
            tr td:first-child{
                width: 10mm;
                height: 8mm;
            }
            tr td:last-child{
                width: 43mm;
            }
        </style>
    </head>
    
<body>
    @foreach($result as $a)

<header width="95%" height="95%">
    {{-- <img src="assets/images/KOP SURAT.png" width="95%" height="95%"><hr /> --}}
</header> 
  <div class="footer" width="101%" height="100%">
    {{-- <img src="assets/images/footer.png" width="101%" height="100%" /> --}}
  </div>
   <div class="content">
    <br/>
    <br/>
    <center>
    <p style="line-height: 2px;">
    <h2><u>L E M B A R &nbsp; D I S P O S I S I </u></h2></p></center><br/>
    <table width="600px" rules="all" cellpadding="5" style="font-size: 15px; font-family:times new roman;">
        <tr>
            <td>Nomor Surat:{{$a->no_surat}}</td>
            <td>Nomor Agenda:<br/>{{$a->no_agenda}} </td>
        </tr>
        <tr>
            <td>Asal Surat: {{$a->asal_surat}}</td>
            <td>Diterima Tanggal: {{$a->tgl_agenda}}</td>
        </tr>
        <tr>
            <td>Tanggal Surat: {{$a->tgl_surat}}</td>
            <td>Tanggal Penyelesaian: .....................</td>
        </tr>
        <tr>
            <td colspan="2">Perihal: {{$a->perihal}}</td>
        </tr>
        <tr>
            <td colspan="2"><p align="center"> ISI DISPOSISI</p></td>
        </tr>
        <tr>
      <td> 
       <br>1. Mohon Pertimbangan
       <br>2. Mohon Pendapat
       <br>3. Mohon Keputusan
       <br>4. Mohon Petunjuk
       <br>5. Mohon Saran
       <br>6. Bicarakan
       <br>7. Teliti/ikuti perkembangan
       <br>8. Untuk perhatian
      </td>
      <td>
        <br>9. Siapkan konsep
        <br>10. Siapkan laporan
        <br>11. Untuk diproses
        <br>12. Selesaikan sesuai pembicaraan
        <br>13. Edarkan
        <br>16. Tik/Gandakan
        <br>15. Arsip
        <br>16. Lain-lain : ..........................
      </td>
    </tr>
     <tr>
       <td colspan="2">Diteruskan Kepada :
        <br>1. Manager Keuangan dan Umum
        <br>2. Manager BBLBA
        <br>3. Manager Registrasi dan Pengujian
       </td>
     </tr>
    </table>
    <br/>
    <br/>
    <div id="ttd" class="row">
        <div class="col-md-12">
            Bandung, {{$hariini}} <br/>
            UPBJJ-UT Bandung<br/>
            {{ $pejabat->nama_jabatan }} 
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            {{ $pejabat->nama }}<br>
            NIP. {{ $pejabat->nik }}
        </div>
    </div>
    
    @endforeach	
</body>
</html>