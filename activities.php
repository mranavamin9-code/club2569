<?php
session_start();
include("connection2.php");
require_once("config.in2.php");
if (isset($_SESSION['lognum'])) {
	$avatar = "avatar-online";
	$login_icon = '<img src="images/login_profile.png" alt class="w-px-40 h-auto rounded-circle" />';
} else {
	$avatar = "";
	$login_icon = '<img src="images/nologin_profile.png" alt class="w-px-40 h-auto rounded-circle" />';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?= config_title; ?></title>
	<?php include("style/link_code_style.php"); ?>

</head>

<body>
	<?php
	$sql_o		= "select * FROM tb_on_off";
	$db_query_o = mysqli_query($db, $sql_o);
	$result_o 	= mysqli_fetch_array($db_query_o);

	$o_id		= $result_o['o_id'];
	$post		= $result_o['post'];
	$o_status	= $result_o['o_status'];

	if ($o_status == 1)		//เงื่อนไขตรวจสอบสถานะประกาศปิดระบบ
	{
	?>
		<!-- Menu -->
		<?php include("components_menu.php"); ?>
		<!-- /Menu -->
		<div class="load_toppage">
			<div class="toppage_btn">
				<i class="fas fa-arrow-alt-circle-up"></i>
			</div>
		</div>
		<div class="alert alert-primary ltxt" role="alert"><i class="fa-solid fa-list-ul"></i> รายวิชาที่เปิดสอน</div>

		<div class="card mb-3">
			<div class="card-body">
				<h5>ค้นหารายระดับชั้น</h5>
				<form name="form_search_cus" id="form_search" action="" method="post">
					<div class="row">
						<div class="col-md-6">
							<select name="class_stu" id="class_stu" class="form-select form-select-lg">
								<option value="">- ทั้งหมด -</option>
								<option value="1">ม. 1</option>
								<option value="2">ม. 2</option>
								<option value="3">ม. 3</option>
								<option value="4">ม. 4</option>
								<option value="5">ม. 5</option>
								<option value="6">ม. 6</option>
							</select>
						</div>
						<div class="col-md-6 text-center">
							<button type="submit" class="btn btn-primary"> <i class="fa-solid fa-magnifying-glass"></i> ค้นหาข้อมูล</button>
						</div>
					</div>
				</form>
			</div>


		</div>

		<?php
		$class_stu = "";
		if (isset($_POST['class_stu'])) {
			$class_stu	= $_POST['class_stu'];
		}

		$sql 		= "SELECT * FROM  tb_department where class like '%$class_stu%' and status_dep ='1' order by d_id desc";
		$db_query 	= mysqli_query($db, $sql);	//เปลี่ยนเป็นคำสั่ง
		$num      	= mysqli_num_rows($db_query);
		?>
		<div align="right">
			<?php echo '<font size="3" face="MS Sans Serif, Tahoma, sans-serif">' . "มีข้อมูลกิจกรรมชุมนุมทั้งหมด " . '<b>' . $num . '</b>' . " รายการ" . '</font>'; ?>
		</div>
		<br>
		<?php
		if ($num <> 0) {	//ถ้าค่า num ไม่เท่ากับ o ให้แสดงข้อมูล
		?>
			<div class="card">
				<div class="card-body">
					<div class="table-responsive text-nowrap">
						<table cellspacing="0" cellpadding="0" class="table table-bordered">
							<tr align="center">
								<td width="4%" height="26" bgcolor="#cfc6c6">
									<font size="2">ลำดับ</font>
								</td>
								<td width="49%" bgcolor="#EAEAEA">
									<font size="2">ชื่อกิจกรรมชุมนุม</font>
								</td>
								<td width="12%" bgcolor="#EAEAEA">
									<font size="2">ห้องเรียน/สถานที่</font>
								</td>
								<td width="22%" bgcolor="#EAEAEA">
									<font size="2">ครูผู้สอน</font>
								</td>
								<td width="4%" bgcolor="#EAEAEA">
									<font size="2">รับจำนวน</font>
								</td>
								
								<td width="5%" bgcolor="#EAEAEA">
									<font size="2">สถานะ</font>
								</td>
							</tr>
							<?php
							$i = 0;	//ตัวเช็ควนรอบ
							$a = 1;	//กำหนดตัวแปรมาเพื่อใช่กับลำดับที่
							while ($i < $num) {
								$result = mysqli_fetch_array($db_query);

								$d_id		= $result['d_id'];
								$dep_id		= $result['dep_id'];
								$name_dep	= $result['name_dep'];
								$atd		= $result['atd'];
								$class		= $result['class'];
								$object		= $result['object'];
								$classroom	= $result['classroom'];
								$period		= $result['classroom'];
								$number		= $result['number'];
								$tea_id1	= $result['tea_id1'];
								$tea_id2	= $result['tea_id2'];
								$tea_id3	= $result['tea_id3'];
								$tea_id4	= $result['tea_id4'];
								$tea_id5	= $result['tea_id5'];
								$ty_id		= $result['ty_id'];
								$status_dep	= $result['status_dep'];
							?>
								<?php
								//ส่วนของคำสั่งหาจำนวนผู้สมัครชุมนุม
								$sql2 		= mysqli_query($db, "SELECT COUNT(d_id) FROM tb_select_rally WHERE d_id='" . $result['d_id'] . "' and ty_id='" . $result['ty_id'] . "' ");
								$result2	= mysqli_fetch_assoc($sql2);
								?>
								<tr align="center" id="tr_sel" class="tbl" onClick="window.open('report_show.php?d_id=<?= $d_id ?>')">
									<td width="4%" height="23" align="center">
										<font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $a; ?></font>
									</td>
									<td align="left">&nbsp;&nbsp;<font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $dep_id . '&nbsp;' . $name_dep . '&nbsp;' . "( ม." . $class . ")"; ?></font>
									</td>
									<td width="12%" align="center">
										<font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $period; ?></font>
									</td>
									<td width="22%" align="center">
										<div id="mylayout_c">
											<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
												<tr>
													<td align="center">
														<font size="2" face="MS Sans Serif, Tahoma, sans-serif">
															<?php
															$tea_id1	= $result['tea_id1'];

															$sql5 		= "select * from tb_teacher where t_id = '$tea_id1';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
															$db_query5	= mysqli_query($db, $sql5);	//ถอดข้อความให้เป็นคำสั่ง
															$result5	= mysqli_fetch_array($db_query5);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb

															$pname	= $result5['pname'];
															$fname	= $result5['fname'];
															$lname	= $result5['lname'];
															echo "$pname " . "$fname " . "$lname";
															?>
														</font>
													</td>
												</tr>
												<tr>
													<td align="center">
														<font size="2" face="MS Sans Serif, Tahoma, sans-serif">
															<?php
															$tea_id2	= $result['tea_id2'];
															if ($tea_id2 !== "") {
																$sql4 		= "select * from tb_teacher where t_id = '$tea_id2';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
																$db_query4	= mysqli_query($db, $sql4);	//ถอดข้อความให้เป็นคำสั่ง
																$result4	= mysqli_fetch_array($db_query4);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb

																$pname	= $result4['pname'];
																$fname	= $result4['fname'];
																$lname	= $result4['lname'];

																echo "$pname " . "$fname " . "$lname";
															}
															?>
														</font>
													</td>
												</tr>
												<tr>
													<td align="center">
														<font size="2" face="MS Sans Serif, Tahoma, sans-serif">
															<?php
															$tea_id3	= $result['tea_id3'];
															if ($tea_id3 !== "") {
																$sql6 		= "select * from tb_teacher where t_id = '$tea_id3';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
																$db_query6	= mysqli_query($db, $sql6);	//ถอดข้อความให้เป็นคำสั่ง
																$result6	= mysqli_fetch_array($db_query6);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb

																$pname	= $result6['pname'];
																$fname	= $result6['fname'];
																$lname	= $result6['lname'];

																echo "$pname " . "$fname " . "$lname";
															}
															?>
														</font>
													</td>
												</tr>
												<tr>
													<td align="center">
														<font size="2" face="MS Sans Serif, Tahoma, sans-serif">
															<?php
															$tea_id4		= $result['tea_id4'];
															if ($tea_id4 !== "") {
																$sql7 		= "select * from tb_teacher where t_id = '$tea_id4';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
																$db_query7	= mysqli_query($db, $sql7);	//ถอดข้อความให้เป็นคำสั่ง
																$result7	= mysqli_fetch_array($db_query7);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb

																$pname	= $result7['pname'];
																$fname	= $result7['fname'];
																$lname	= $result7['lname'];

																echo "$pname " . "$fname " . "$lname";
															}
															?>
														</font>
													</td>
												</tr>
												<tr>
													<td align="center">
														<font size="2" face="MS Sans Serif, Tahoma, sans-serif">
															<?php
															$tea_id5	= $result['tea_id5'];
															if ($tea_id5 !== "") {
																$sql8 		= "select * from tb_teacher where t_id = '$tea_id5';"; 	//ถ้าค่าจากที่แสดงตรงกับ db จะแสดง ...
																$db_query8	= mysqli_query($db, $sql8);	//ถอดข้อความให้เป็นคำสั่ง
																$result8	= mysqli_fetch_array($db_query8);	//ดึงข้อมูลจากคอลัม ให้ตรงกับdb

																$pname	= $result8['pname'];
																$fname	= $result8['fname'];
																$lname	= $result8['lname'];

																echo "$pname " . "$fname " . "$lname";
															}
															?>
														</font>
													</td>
												</tr>
											</table>
										</div>
									</td>
									<td width="4%" align="center">
										<font size="2" face="MS Sans Serif, Tahoma, sans-serif"><?php echo $result2['COUNT(d_id)']."/".$number; ?></font>
									</td>
									<td width="5%" align="center">
										<font size="2" face="MS Sans Serif, Tahoma, sans-serif">
											<?php
											if ($result2['COUNT(d_id)'] < $number)	//ถ้าจำนวนที่เบือกน้อยกว่าจำนวนจริง
											{
												echo '<span class="badge bg-label-success" style="font-size: 14px;"><i class="fa-solid fa-circle-check"></i> ว่าง</span>';
											} else if ($result2['COUNT(d_id)'] == $number)	//ถ้าจำนวนที่เลือกเท่ากับจำนวนจริง
											{
												echo '<span class="badge bg-label-danger" style="font-size: 14px;"><i class="fa-solid fa-circle-xmark"></i> เต็ม</span>';
											} else if ($result2['COUNT(d_id)'] > $number)	//ถ้าเกิน
											{
												echo '<span class="badge bg-label-warning" style="font-size: 14px;"><i class="fa-solid fa-circle-exclamation"></i> เกิน</span>';

											}
											?>
										</font>
									</td>
								</tr>
							<?php
								$a++;
								$i++;
							}
							?>
						</table>
					</div>
				</div>
			</div>
			<br>
		<?php
		} else {		//ถ้าค่า num = 0 ให้แสดงข้อความนี้

			echo '<div align="center">' . '<img src="images/alert.png">' . '&nbsp;' . '<font size="5" face="Tahoma">' . "ยังไม่มีการเพิ่มข้อมูลกิจกรรมชุมนุมใหม่ค่ะ" . '</font>' . '</div>';
		}
		?>
		<br>
		<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script> -->
		<br>
	<?php
	}
	?>
	<!-- Footer -->
	<?php include("components_footer.php"); ?>
	<!-- / Footer -->

	<!-- Core JS -->
	<?php include("style/link_code_js.php"); ?>
		<!--เริ่ม top-->
	<script type="text/javascript">
			$('.load_toppage').fadeOut();
			$(window).scroll(function() {
				if ($(this).scrollTop() > 200) {
					$('.load_toppage').fadeIn();
				} else {
					$('.load_toppage').fadeOut();
				}
			});
			$('.load_toppage').click(function() {
				$("html, body").animate({
					scrollTop: 0
				}, 200);
			});
		</script>
			<!--จบ top-->
</body>

</html>