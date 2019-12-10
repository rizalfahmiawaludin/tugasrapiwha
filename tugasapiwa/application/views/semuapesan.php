<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tugas API WhastApp</title>
<link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">
</head>
<body>
	<div class="">
<div class="latar">
	<button onclick="myFunction()">Reload page</button>
			<script>
			function myFunction() {
				location.reload();
			}
			</script>
	<h1>Pesan Masuk Dan Keluar</h1>
	<div class="body">
		<h4>Page ini menampilkan data Pesan masuk dan Keluar</h4>
		<table class="pesan">
			<tr>
				<th>No</th>
				<th>Pengirim</th>
				<th>Penerima</th>
				<th>Type Pesan</th>
				<th>Isi Pesan</th>
				<th>Status</th>
			</tr>
			<?php
			defined('BASEPATH') OR exit('No direct script access allowed');
			$my_apikey = "7W45AV3JLR5FEU6A7XE3";
			$number = "6281232330054";
			$type = "";
			$failed_date = "";
			$markaspulled = "0";
			$getnotpulledonly = "0";
			$api_url  = "http://panel.rapiwha.com/get_messages.php";
			$api_url .= "?apikey=". urlencode ($my_apikey);
			$api_url .=	"&number=". urlencode ($number);
			$api_url .= "&type=". urlencode ($type);
			$api_url .= "&markaspulled=". urlencode ($markaspulled);
			$api_url .= "&getnotpulledonly=". urlencode ($getnotpulledonly);
			$my_json_result = file_get_contents($api_url, false);
			$my_php_arr = json_decode($my_json_result);
			rsort($my_php_arr);
			$i=1;

			foreach ($my_php_arr as $item)
			  {
			    $from_temp = $item->from;
			    $to_temp = $item->to;
			    $text_temp = $item->text;
			    $type_temp = $item->type;
			    $status_temp =$item->failed_date;
			          echo "<tr>";
			                  echo "<td>$i</td>
			                  <td>$from_temp</td>
			                  <td>$to_temp</td>
			                  <td>$type_temp</td>
			                  <td>$text_temp</td>";
			                if ($status_temp) {
			                    echo "<td>GAGAL</td>";
			                  } else {
			                    echo "<td>SUKSES</td>";
			                  };
			              echo "</tr>";
			              $i++;
			      }
			    ?>
		</table>

	</div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. By : Rizal Fahmi Awaludin</p>
 </div>
</div>
</body>
