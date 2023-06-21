<?php
setlocale(LC_ALL, 'id_ID.UTF8', 'id_ID.UTF-8', 'id_ID.8859-1', 'id_ID', 'IND.UTF8', 'IND.UTF-8', 'IND.8859-1', 'IND', 'Indonesian.UTF8', 'Indonesian.UTF-8', 'Indonesian.8859-1', 'Indonesian', 'Indonesia', 'id', 'ID', 'en_US.UTF8', 'en_US.UTF-8', 'en_US.8859-1', 'en_US', 'American', 'ENG', 'English');
$tgl = strftime( "%d %B %Y", time());
?>

<!DOCTYPE html>
<html>
<head>
	<title>SKL</title>
	<style type="text/css">
		table {
			border-style: double;
			border-width: 3px;
			border-color: white;
		}
		table tr .text2 {
			text-align: right;
			font-size: 13px;
		}
		table tr .text {
			text-align: center;
			font-size: 13px;
		}
		table tr td {
			font-size: 13px;
		}

	</style>
</head>
<body>
	<center>
		<table width='100%'>
			<tr>
				<td><img src="{{ public_path('assets/img/logo.png') }}" width="90" height="90"></td>
				<td>
                    <center>
                        <font size="4">DINAS PENDIDIKAN PROVINSI JAWA TENGAH</font><br>
                        <font size="5"><b>SMKN 01 KUVUKILAND KUDUS</b></font><br>
                        <font size="2">Bidang Keahlian : Bisnis dan Menejemen - Teknologi informasi dan Komunikasi</font><br>
                        <font size="2"><i>Jln Cut Nya'Dien No. 05 Kode Pos : 681233 Telp./Fax (0321)757505 Tempurejo Kudus Jawa Tengah</i></font>
                    </center>
				</td>
			</tr>
			<tr>
				<td colspan="2"><hr style="height:2px;border:none;color:black;background-color:black;"></td>
			</tr>
		</table>
		<table align="center">
            <tr>
                <td>
                    <center>
                    <font size="3"><b><u>SURAT KETERANGAN LULUS</u></b></font>
                    </center>
                </td>
            </tr>
            <tr>
                <td>
                    <font size="2"><b>Nomor : 019/SKL-SMKN1KVKL/2023</b></font>
                </td>
            </tr>
		</table>
		<br>
		<table>
			<tr>
		       <td>
			       <font size="2">Yang bertanda tangan di bawah ini, adalah Kepala SMKN 01 Kuvukiland Kudus menjelaskan bahwa :</font>
		       </td>
		    </tr>
		</table>
		<br>
		</table>
		<table>
			<tr class="text2">
				<td width='150px'>Nama</td>
				<td> : {{ $data->name }}</td>
			</tr>
			<tr>
				<td>Tempat, Tanggal Lahir</td>
				<td> : {{ $data->ttl }}</td>
			</tr>
			<tr>
				<td>NISN</td>
				<td>: {{ $data->nisn }}</td>
			</tr>
			<tr>
				<td>Kompetensi Keahlian</td>
				<td>: {{ $jurusan }}</td>
			</tr>
		</table>
		<br>
		<table>
			<tr>
		       <td>
			       <font size="2">Siswa yang bersangkutan sudah mengikuti Ujian Nasional (UN), Ujian Sekolah Berstandar Nasional (USBN) dan juga Ujian Nasional Berbasis Komputer (UNBK). berdasarkan hasil ujian dinyatakan :</font>
		       </td>
		    </tr>
		</table>
		<table align="center">
            <tr>
                <td>
                    <h1>{{ strtoupper($data->status) }}</h1>
                </td>
		    </tr>
		</table>
        <table>
            <tr>
               <td>
                   <font size="2">
                    Lulus dari SMKN 01 Kuvukiland Kudus pada tanggal {{ $tgl }} Tahun Pelajaran {{ date('Y')-1 }}/{{ date('Y') }}.
                    <br>Surat Keterangan Lulus ini dibuat untuk dapat dipergunakan sebagaimana mestinya, dan berlaku sampai dengan <b>Ijasah Asli</b> yang bersangkutan diterbitkan.</font>
               </td>
            </tr>
        </table>
		<br>
		<table align="right">
			<tr>
				<td align="left">Kudus, {{ $tgl }}<br>Kepala SMKN 01 Kuvukiland,<br><img src="{{ public_path('assets/img/ttd.png') }}" width="90" height="90"><br><b>Anthony Martial<b></td>
			</tr>
	     </table>
	</center>
</body>
</html>