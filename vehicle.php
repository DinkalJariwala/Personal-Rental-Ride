<?php
session_start();
include ('conn.php');
include ('check_session_user.php');
//$buyer_id=$_SESSION['buyer'];

//echo $status;
// exit();
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/cozastore/product.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Nov 2023 10:14:40 GMT -->

<head>
	<title>Product</title>
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
		nonce="411ad618-6071-4ec2-b24b-7a3b643aecde">(function (w, d) { !function (bb, bc, bd, be) { bb[bd] = bb[bd] || {}; bb[bd].executed = []; bb.zaraz = { deferred: [], listeners: [] }; bb.zaraz.q = []; bb.zaraz._f = function (bf) { return async function () { var bg = Array.prototype.slice.call(arguments); bb.zaraz.q.push({ m: bf, a: bg }) } }; for (const bh of ["track", "set", "debug"]) bb.zaraz[bh] = bb.zaraz._f(bh); bb.zaraz.init = () => { var bi = bc.getElementsByTagName(be)[0], bj = bc.createElement(be), bk = bc.getElementsByTagName("title")[0]; bk && (bb[bd].t = bc.getElementsByTagName("title")[0].text); bb[bd].x = Math.random(); bb[bd].w = bb.screen.width; bb[bd].h = bb.screen.height; bb[bd].j = bb.innerHeight; bb[bd].e = bb.innerWidth; bb[bd].l = bb.location.href; bb[bd].r = bc.referrer; bb[bd].k = bb.screen.colorDepth; bb[bd].n = bc.characterSet; bb[bd].o = (new Date).getTimezoneOffset(); if (bb.dataLayer) for (const bo of Object.entries(Object.entries(dataLayer).reduce(((bp, bq) => ({ ...bp[1], ...bq[1] })), {}))) zaraz.set(bo[0], bo[1], { scope: "page" }); bb[bd].q = []; for (; bb.zaraz.q.length;) { const br = bb.zaraz.q.shift(); bb[bd].q.push(br) } bj.defer = !0; for (const bs of [localStorage, sessionStorage]) Object.keys(bs || {}).filter((bu => bu.startsWith("_zaraz_"))).forEach((bt => { try { bb[bd]["z_" + bt.slice(7)] = JSON.parse(bs.getItem(bt)) } catch { bb[bd]["z_" + bt.slice(7)] = bs.getItem(bt) } })); bj.referrerPolicy = "origin"; bj.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(bb[bd]))); bi.parentNode.insertBefore(bj, bi) };["complete", "interactive"].includes(bc.readyState) ? zaraz.init() : bb.addEventListener("DOMContentLoaded", zaraz.init) }(w, d, "zarazData", "script"); })(window, document);</script>

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
	<div class="bg0 m-t-23 p-b-140">

		<div class="container">
			<div class="row isotope-grid">
				<?php
				// Fetch product data dynamically
				$sql = "SELECT * FROM vehicle ORDER BY v_id DESC";
				$result = mysqli_query($conn, $sql);
				while ($row = mysqli_fetch_assoc($result)) {
					$v_id = $row['v_id'];
					$sql2 = "SELECT * FROM book_tbl WHERE v_id='$v_id'";
					$result1 = mysqli_query($conn, $sql2);

					// Check if there are bookings for this vehicle
					if (mysqli_num_rows($result1) > 0) {
						// If there are bookings, check if any booking overlaps with the current date
						$available = true;
						while ($row2 = mysqli_fetch_assoc($result1)) {
							$from_date = $row2['from_date'];
							$to_date = $row2['to_date'];

							// Assuming current date is stored in $current_date
							$current_date = date('Y-m-d');

							// Check if the current date falls between from_date and to_date
							if ($current_date >= $from_date && $current_date <= $to_date) {
								$available = false; // Vehicle is not available
								break; // No need to check further bookings
							}
						}
					} else {
						// If no bookings exist for the vehicle, it is available
						$available = true;
					}

					// Display vehicle only if it is available
					if ($available) {
						?>
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
							<div class="block2">
								<div class="block2-pic hov-img0">
									<a href="vehicle-detail.php?pid=<?php echo $row['v_id']; ?>">
										<img src="../owner/product image/<?php echo $row['v_img']; ?>" alt="Blank" width="270"
											height="300">
									</a>
								</div>
								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l">
										<a href="vehicle-detail.php?pid=<?php echo $row['v_id']; ?>"
											class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											<?php echo $row['v_name']; ?>
										</a>
										<span class="stext-105 cl3">
											<a href="vehicle-detail.php?pid=<?php echo $row['v_id']; ?>">
												<?php echo $row['v_name']; ?>
											</a>
											<i class="fa fa-inr"></i>
											<?php echo $row['v_rentprice']; ?>
										</span>
									</div>
								</div>
							</div>
						</div>
						<?php
					} // end if ($available)
					else {
						?>
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
							<div class="block2">
								<div class="block2-pic hov-img0">
									<a href="#">
										<img src="../owner/product image/<?php echo $row['v_img']; ?>" alt="Blank" width="270"
											height="300">
									</a>
								</div>
								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l">
										<a href="#"
											class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											<strike><?php echo $row['v_name']; ?></strike>
										</a>
										<span class="stext-105 cl3">
											<a href="#">
											<strike>	<?php echo $row['v_name']; ?></strike>
											</a>
											<i class="fa fa-inr"></i>
											<strike><?php echo $row['v_rentprice']; ?></strike>
										</span>
									</div>
								</div>
							</div>
						</div>
					<?php } // end while
				} // end while
				?>
			</div>
		</div>



		<footer class="bg3 p-t-75 p-b-32">
			<?php
			include ('footer.php');
			?>
		</footer>

		<!-- <div class="btn-back-to-top" id="myBtn">
			<span class="symbol-btn-back-to-top">
				<i class="zmdi zmdi-chevron-up"></i>
			</span>
		</div>

		<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
			<div class="overlay-modal1 js-hide-modal1"></div>
			<div class="container">
				<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
					<button class="how-pos3 hov3 trans-04 js-hide-modal1">
						<img src="images/icons/icon-close.png" alt="CLOSE">
					</button>
					<div class="row">
						<div class="col-md-6 col-lg-7 p-b-30">
							<div class="p-l-25 p-r-30 p-lr-0-lg">
								<div class="wrap-slick3 flex-sb flex-w">
									<div class="wrap-slick3-dots"></div>
									<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
									<div class="slick3 gallery-lb">
										<div class="item-slick3" data-thumb="images/product-detail-01.jpg">
											<div class="wrap-pic-w pos-relative">
												<img src="images/product-detail-01.jpg" alt="IMG-PRODUCT">
												<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
													href="images/product-detail-01.jpg">
													<i class="fa fa-expand"></i>
												</a>
											</div>
										</div>
										<div class="item-slick3" data-thumb="images/product-detail-02.jpg">
											<div class="wrap-pic-w pos-relative">
												<img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">
												<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
													href="images/product-detail-02.jpg">
													<i class="fa fa-expand"></i>
												</a>
											</div>
										</div>
										<div class="item-slick3" data-thumb="images/product-detail-03.jpg">
											<div class="wrap-pic-w pos-relative">
												<img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">
												<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
													href="images/product-detail-03.jpg">
													<i class="fa fa-expand"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-lg-5 p-b-30">
							<div class="p-r-50 p-t-5 p-lr-0-lg">
								<h4 class="mtext-105 cl2 js-name-detail p-b-14">
									Lightweight Jacket
								</h4>
								<span class="mtext-106 cl2">
									$58.79
								</span>
								<p class="stext-102 cl3 p-t-23">
									Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris
									consequat
									ornare feugiat.
								</p>

								<div class="p-t-33">
									<div class="flex-w flex-r-m p-b-10">
										<div class="size-203 flex-c-m respon6">
											Size
										</div>
										<div class="size-204 respon6-next">
											<div class="rs1-select2 bor8 bg0">
												<select class="js-select2" name="time">
													<option>Choose an option</option>
													<option>Size S</option>
													<option>Size M</option>
													<option>Size L</option>
													<option>Size XL</option>
												</select>
												<div class="dropDownSelect2"></div>
											</div>
										</div>
									</div>
									<div class="flex-w flex-r-m p-b-10">
										<div class="size-203 flex-c-m respon6">
											Color
										</div>
										<div class="size-204 respon6-next">
											<div class="rs1-select2 bor8 bg0">
												<select class="js-select2" name="time">
													<option>Choose an option</option>
													<option>Red</option>
													<option>Blue</option>
													<option>White</option>
													<option>Grey</option>
												</select>
												<div class="dropDownSelect2"></div>
											</div>
										</div>
									</div>
									<div class="flex-w flex-r-m p-b-10">
										<div class="size-204 flex-w flex-m respon6-next">
											<div class="wrap-num-product flex-w m-r-20 m-tb-10">
												<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-minus"></i>
												</div>
												<input class="mtext-104 cl3 txt-center num-product" type="number"
													name="num-product" value="1">
												<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-plus"></i>
												</div>
											</div>
											<button
												class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
												Add to cart
											</button>
										</div>
									</div>
								</div>

								<div class="flex-w flex-m p-l-100 p-t-40 respon7">
									<div class="flex-m bor9 p-r-10 m-r-11">
										<a href="#"
											class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100"
											data-tooltip="Add to Wishlist">
											<i class="zmdi zmdi-favorite"></i>
										</a>
									</div>
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
										data-tooltip="Facebook">
										<i class="fa fa-facebook"></i>
									</a>
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
										data-tooltip="Twitter">
										<i class="fa fa-twitter"></i>
									</a>
									<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
										data-tooltip="Google Plus">
										<i class="fa fa-google-plus"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->

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
			data-cf-beacon='{"rayId":"8203d8823c4e856b","b":1,"version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
			crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/cozastore/product.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Nov 2023 10:14:40 GMT -->

</html>