<?php
session_start();
include("connection2.php");
?>

	<?php
	$sql_log		= "SELECT * FROM tb_log_index";
	$db_query_log	= mysqli_query($db, $sql_log);
	$result_log  	= mysqli_fetch_array($db_query_log);

	$in_id		= $result_log['in_id'];
	$date_log	= $result_log['date_log'];
	$time_log	= $result_log['time_log'];
	$status_in	= $result_log['status_in'];

	$time		= "$date_log $time_log";
	?>
	<script type="text/javascript">
		function countDown() {
			var timeA = new Date(); // วันเวลาปัจจุบัน
			var timeB = new Date("<?= $time; ?>"); // วันเวลาสิ้นสุด รูปแบบ เดือน/วัน/ปี ชั่วโมง:นาที:วินาที
			// วันเวลาสิ้นสุด รูปแบบ ปี,เดือน;วันที่,ชั่วโมง,นาที,วินาที,,มิลลิวินาที    เลขสองหลักไม่ต้องมี 0 นำหน้า
			// เดือนต้องลบด้วย 1 เดือนมกราคมคือเลข 0
			var timeDifference = timeB.getTime() - timeA.getTime(); //วันที่เลือก ลบ วันปัจจุบัน
			if (timeDifference >= 0) {
				timeDifference = timeDifference / 1000;
				timeDifference = Math.floor(timeDifference);
				var wan = Math.floor(timeDifference / 86400);
				var l_wan = timeDifference % 86400;
				var hour = Math.floor(l_wan / 3600);
				var l_hour = l_wan % 3600;
				var minute = Math.floor(l_hour / 60);
				var second = l_hour % 60;
				var showPart = document.getElementById('showRemain');

				//เช็คสถานะของระบบ
				if (<?= $status_in; ?> == 1) {
					// เปลี่ยนคลาส
					showPart.classList.remove("btn-danger");
					showPart.classList.add("btn-info");

					// เพิ่มแอตทริบิวต์ disabled
					showPart.disabled = false;

					showPart.innerHTML = "<i class='fa-solid fa-clock'></i> เหลือเวลา " + wan + " วัน " + hour + " ชั่วโมง " +
						minute + " นาที " + second + " วินาที";
					if (wan == 0 && hour == 0 && minute == 0 && second == 0) {
						clearInterval(iCountDown); // ยกเลิกการนับถอยหลังเมื่อครบ
						// เพิ่มฟังก์ชันอื่นๆ ตามต้องการ
						window.location = 'status_log.php?in_id=<?= $in_id ?>'; //เปิดเพจใหม่
					}
				} else if (<?= $status_in; ?> == 2) {
					// เปลี่ยนคลาส
					showPart.classList.remove("btn-info");
					showPart.classList.add("btn-danger");

					// เพิ่มแอตทริบิวต์ disabled
					showPart.disabled = true;
					showPart.innerHTML = "<i class='fa-solid fa-circle-exclamation'></i> ไม่อยู่ในช่วงของการลงทะเบียนชุมนุม";
				}

			}
		}
		// การเรียกใช้
		var iCountDown = setInterval("countDown()", 1000);
	</script>
