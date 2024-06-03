<?php
session_start();
include ('conn.php');
include ('check_session_user.php');

// Check if user is logged in
if (isset($_SESSION['user'])) {
	$user_id = $_SESSION['user'];

	// Fetch user information
	$sql2 = "SELECT * FROM user WHERE user_mail = ?";
	$stmt = mysqli_prepare($conn, $sql2);
	mysqli_stmt_bind_param($stmt, "s", $user_id);
	mysqli_stmt_execute($stmt);
	$result3 = mysqli_stmt_get_result($stmt);

	// Check if user exists
	if ($row2 = mysqli_fetch_assoc($result3)) {
		$user_id = $row2['user_id']; // Assign user ID to $user_id
		// Other user information assignments if needed
	}
}

// Fetch vehicle information
if (isset($_GET['pid'])) {
	$id = $_GET['pid'];
	$sql1 = "SELECT * FROM vehicle WHERE v_id = ?";
	$stmt = mysqli_prepare($conn, $sql1);
	mysqli_stmt_bind_param($stmt, "i", $id);
	mysqli_stmt_execute($stmt);
	$result1 = mysqli_stmt_get_result($stmt);
	$row1 = mysqli_fetch_assoc($result1);
}

if (isset($_POST['btn_submit'])) {
	// Assign values from form submission
	$fromDate = $_POST['from_date'];
	$toDate = $_POST['to_date'];
	$address = $_POST['address'];
	$license_no = $_POST['txtlicense'];

	// Calculate total rent
	$startDate = new DateTime($fromDate);
	$endDate = new DateTime($toDate);
	$interval = $startDate->diff($endDate);
	$numberOfDays = $interval->days + 1;
	$rent_price = $row1['v_rentprice'];
	$totalRent = $rent_price * $numberOfDays;

	//echo $fromDate,$toDate,$address,$license_no,$totalRent,$user_id,$id;
	// Insert booking information into the database
	$insert_query = "INSERT INTO `book_tbl`(`order_id`, `user_id`, `v_id`, `from_date`, `to_date`, `address`, `total_rent`, `license_no`)  
                      VALUES (null, ?, ?, ?, ?, ?, ?, ?)";
	$stmt = mysqli_prepare($conn, $insert_query);
	mysqli_stmt_bind_param($stmt, "iisssss", $user_id, $id, $fromDate, $toDate, $address, $totalRent, $license_no);
	$result_qry = mysqli_stmt_execute($stmt);


	 if ($result_qry) {
		$v_id = $row1['v_id']; // Get the v_id value
		echo "<script>";
		echo "window.location='cart.php?pid=$v_id'";
		echo "</script>";
	 } else {
	 	echo "Error: " . mysqli_error($conn);
	 }
}
?>

<!-- ?> -->





<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/cozastore/product-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Nov 2023 10:14:48 GMT -->

<head>
	<title>Vehicle Detail</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.png" />

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">

	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">

	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<script
		nonce="2073c364-6680-4540-a307-2eb72926924d">(function (w, d) { !function (bb, bc, bd, be) { bb[bd] = bb[bd] || {}; bb[bd].executed = []; bb.zaraz = { deferred: [], listeners: [] }; bb.zaraz.q = []; bb.zaraz._f = function (bf) { return async function () { var bg = Array.prototype.slice.call(arguments); bb.zaraz.q.push({ m: bf, a: bg }) } }; for (const bh of ["track", "set", "debug"]) bb.zaraz[bh] = bb.zaraz._f(bh); bb.zaraz.init = () => { var bi = bc.getElementsByTagName(be)[0], bj = bc.createElement(be), bk = bc.getElementsByTagName("title")[0]; bk && (bb[bd].t = bc.getElementsByTagName("title")[0].text); bb[bd].x = Math.random(); bb[bd].w = bb.screen.width; bb[bd].h = bb.screen.height; bb[bd].j = bb.innerHeight; bb[bd].e = bb.innerWidth; bb[bd].l = bb.location.href; bb[bd].r = bc.referrer; bb[bd].k = bb.screen.colorDepth; bb[bd].n = bc.characterSet; bb[bd].o = (new Date).getTimezoneOffset(); if (bb.dataLayer) for (const bo of Object.entries(Object.entries(dataLayer).reduce(((bp, bq) => ({ ...bp[1], ...bq[1] })), {}))) zaraz.set(bo[0], bo[1], { scope: "page" }); bb[bd].q = []; for (; bb.zaraz.q.length;) { const br = bb.zaraz.q.shift(); bb[bd].q.push(br) } bj.defer = !0; for (const bs of [localStorage, sessionStorage]) Object.keys(bs || {}).filter((bu => bu.startsWith("_zaraz_"))).forEach((bt => { try { bb[bd]["z_" + bt.slice(7)] = JSON.parse(bs.getItem(bt)) } catch { bb[bd]["z_" + bt.slice(7)] = bs.getItem(bt) } })); bj.referrerPolicy = "origin"; bj.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(bb[bd]))); bi.parentNode.insertBefore(bj, bi) };["complete", "interactive"].includes(bc.readyState) ? zaraz.init() : bb.addEventListener("DOMContentLoaded", zaraz.init) }(w, d, "zarazData", "script"); })(window, document);</script>
</head>

<body class="animsition">

	<header class="header-v3">
		<div class="container-menu-desktop trans-03">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop p-l-45">

					<a href="index.php" class="logo">
						<img src="images/icons/logo2.png" alt="IMG-LOGO">
					</a>

					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Home</a>
							</li>
							<li>
								<a href="vehicle.php">Vehicle</a>
							</li>
							<li>
								<a href="about.php">About</a>
							</li>
							<li>
								<a href="logout.php">Logout</a>
							</li>
						</ul>
					</div>


				</nav>
			</div>
		</div>
		<br><br>
	</header>
	<br>
	<hr>
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<a href="vehicle.php." class="stext-109 cl8 hov-cl1 trans-04">
				Vehicle
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<span class="stext-109 cl4">

			</span>
		</div>
	</div>

	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>


							<div class="wrap-pic-w pos-relative">
								<img alt="img" src="../owner/product image/<?php echo $row1['v_img']; ?>">
								<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
									href="../owner/product image/<?php echo $row1['v_img'] ?>">
									<i class="fa fa-expand"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $row1['v_name']; ?>
						</h4>
						<span class="mtext-106 cl2">
							<i class="fa fa-inr"></i> <?php echo $row1['v_rentprice']; ?> For 1 Day
						</span>
						<p class="stext-102 cl3 p-t-23">
							Brand:<?php echo $row1['v_brand'] ?> <br />
							Model:<?php echo $row1['v_model'] ?> <br />
							Vehicle Number: <?php echo $row1['v_number'] ?> <br>
							Fuel Type: <?php echo $row1['v_fuel_type'] . "<br>" ?>
							<?php if ($row1['v_seat'] != 0) { ?>
								Seat: <?php echo $row1['v_seat'] ?>
							<?php } ?>

						</p>
						
						<div class="p-t-33">
							<form method="POST"   >

								<div class=" flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									From Date
								</div>
								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<input type="date" id="from_date" name="from_date" min="<?php echo date('Y-m-d'); ?>" required>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
						</div>
						<div class="flex-w flex-r-m p-b-10">
							<div class="size-203 flex-c-m respon6">
								To Date
							</div>
							<div class="size-204 respon6-next">
								<div class="rs1-select2 bor8 bg0">
									<input type="date" id="to_date" name="to_date" required>
									<div class="dropDownSelect2"></div>
								</div>
							</div>
						</div>

						<div class="flex-w flex-r-m p-b-10">
							<div class="size-203 flex-c-m respon6">
								Address
							</div>
							<div class="size-204 respon6-next">
								<div class="rs1-select2 bor8 bg0">
									<textarea name="address" id="address" cols="30" rows="10" required></textarea>
									<div class="dropDownSelect2"></div>
								</div>
							</div>

						</div>
						<div class="flex-w flex-r-m p-b-10">
							<div class="size-203 flex-c-m respon6">
								License No
							</div>
							<div class="size-204 respon6-next">
								<div class="rs1-select2 bor8 bg0">
									<input type="text" name="txtlicense" id="txtlicense" required>
									<div class="dropDownSelect2"></div>
								</div>
							</div>
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">

									<button id="btn_submit" name="btn_submit"
										class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
										Add to cart
									</button>

								</div>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				@personalrentalride
			</span>
			<span class="stext-107 cl6 p-lr-25">
				Categories: Bike, Activa and Car
			</span>
		</div>
	</section>
	<footer class="bg3 p-t-75 p-b-32">
		<?php
		include ('footer.php');
		?>
	</footer>

	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>



	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="vendor/animsition/js/animsition.min.js"></script>

	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function () {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>

	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>

	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>

	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
		$('.parallax100').parallax100();
	</script>

	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function () { // the containers for all your galleries
			$(this).magnificPopup({
				delegate: 'a', // the selector for gallery item
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>

	<script src="vendor/isotope/isotope.pkgd.min.js"></script>

	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function (e) {
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function () {
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function () {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function () {
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function () {
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function () {
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function () {
				swal(nameProduct, "is added to cart !", "success");
			});
		});

	</script>

	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function () {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function () {
				ps.update();
			})
		});
	</script>

	<script src="js/main.js"></script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag() { dataLayer.push(arguments); }
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>
	<script defer
		src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
		integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
		data-cf-beacon='{"rayId":"8203d8b67cf6856b","b":1,"version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
		crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/cozastore/product-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Nov 2023 10:14:49 GMT -->
<script>
	document.querySelector('#from_date').onchange = function () {
		let dtFrom = document.querySelector('#from_date').value;
		let dtTo = new Date(dtFrom);
		dtTo.setDate(dtTo.getDate() + 7);
		let sMonthTo = ((dtTo.getMonth() + 1) < 10 ? '0' + (dtTo.getMonth() + 1) : (dtTo.getMonth() + 1));
		let sDayTo = (dtTo.getDate() < 10 ? '0' + dtTo.getDate() : dtTo.getDate());
		document.querySelector('#to_date').setAttribute('max', dtTo.getFullYear() + '-' + sMonthTo + '-' + sDayTo);
	};
</script>

</html>