<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tugas API WhastApp</title>
	<link rel="stylesheet" href="<?php echo base_url('css/style.css');?>">
</head>
  <body>
	<div class="">
		<div class="latar">
				<div class="">
  				<h1>KIRIM PESAN</h1>
    				<form method="post">
      				<b>No Tujuan</b><br>
      				<i>*Tambahkan Kode Negara Pada Nomber Tujuan*</i><br>
      				<input type="text" name="notujuan" placeholder="62123456789012" required maxlength="14">
      				<br>
      				<b>Pesan</b><br>
       				<input type="text" name="message" placeholder="Tuliskan Pesan Anda disini" required maxlength="160">
      				<br><br>
      				<input type="submit" value="Kirim">
    				</form>
				</div>
						<hr>
						<div class="">
							<table class="pesan">
								<tr>
									<th>Isi Pesan</th>
									<th>No. Tujuan</th>
									<th>Deskripsi</th>
									<th>Status</th>
								</tr>
								<?php
								defined('BASEPATH') OR exit('No direct script access allowed');
								$my_apikey = "7W45AV3JLR5FEU6A7XE3";
								$destination = $_POST["notujuan"];
								$message = $_POST["message"];
								$api_url = "http://panel.rapiwha.com/send_message.php";
								$api_url .= "?apikey=". urlencode ($my_apikey);
								$api_url .= "&number=". urlencode ($destination);
								$api_url .= "&text=". urlencode ($message);
								$my_result_object = json_decode(file_get_contents($api_url, false));
								$success_temp = $my_result_object->success;
								$description_temp = $my_result_object->description;
								$result_temp= $my_result_object->result_code;
								echo "<h1>Terakhir Mengirim Pesan</h1>";
									echo "<tr>";
									echo "<td>$message</td>";
									echo "<td>$destination</td>";
									echo "<td>$description_temp</td>";
									if ($result_temp>-1) {
										echo "<td>Diproses</td>";
									} else {
										echo "<td>Tidak Diproses</td>";
									};
									echo"</tr>";
    						?>
							</table>
						</div>
					</div>
				</body>
</html>
