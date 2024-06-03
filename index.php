<?php
session_start();
include('conn.php');
include('check_session_user.php');
//$buyer_id=$_SESSION['buyer'];
//echo $_SESSION['user'];
//echo $status;
// exit();
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/cozastore/home-03.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Nov 2023 10:14:35 GMT -->

<head>
	<title>Personal Rental Ride</title>
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
		nonce="d6040472-704c-42e0-8341-89cb0887a0b2">(function (w, d) { !function (bb, bc, bd, be) { bb[bd] = bb[bd] || {}; bb[bd].executed = []; bb.zaraz = { deferred: [], listeners: [] }; bb.zaraz.q = []; bb.zaraz._f = function (bf) { return async function () { var bg = Array.prototype.slice.call(arguments); bb.zaraz.q.push({ m: bf, a: bg }) } }; for (const bh of ["track", "set", "debug"]) bb.zaraz[bh] = bb.zaraz._f(bh); bb.zaraz.init = () => { var bi = bc.getElementsByTagName(be)[0], bj = bc.createElement(be), bk = bc.getElementsByTagName("title")[0]; bk && (bb[bd].t = bc.getElementsByTagName("title")[0].text); bb[bd].x = Math.random(); bb[bd].w = bb.screen.width; bb[bd].h = bb.screen.height; bb[bd].j = bb.innerHeight; bb[bd].e = bb.innerWidth; bb[bd].l = bb.location.href; bb[bd].r = bc.referrer; bb[bd].k = bb.screen.colorDepth; bb[bd].n = bc.characterSet; bb[bd].o = (new Date).getTimezoneOffset(); if (bb.dataLayer) for (const bo of Object.entries(Object.entries(dataLayer).reduce(((bp, bq) => ({ ...bp[1], ...bq[1] })), {}))) zaraz.set(bo[0], bo[1], { scope: "page" }); bb[bd].q = []; for (; bb.zaraz.q.length;) { const br = bb.zaraz.q.shift(); bb[bd].q.push(br) } bj.defer = !0; for (const bs of [localStorage, sessionStorage]) Object.keys(bs || {}).filter((bu => bu.startsWith("_zaraz_"))).forEach((bt => { try { bb[bd]["z_" + bt.slice(7)] = JSON.parse(bs.getItem(bt)) } catch { bb[bd]["z_" + bt.slice(7)] = bs.getItem(bt) } })); bj.referrerPolicy = "origin"; bj.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(bb[bd]))); bi.parentNode.insertBefore(bj, bi) };["complete", "interactive"].includes(bc.readyState) ? zaraz.init() : bb.addEventListener("DOMContentLoaded", zaraz.init) }(w, d, "zarazData", "script"); })(window, document);</script>
</head>

<body class="animsition">

	<header class="header-v3">
		<?php include ('header.php'); ?>
	</header>

	<aside class="wrap-sidebar js-sidebar">
		<div class="s-full js-hide-sidebar"></div>
		<div class="sidebar flex-col-l p-t-22 p-b-25">
			<div class="flex-r w-full p-b-30 p-r-27">
				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-sidebar">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			<div class="sidebar-content flex-w w-full p-lr-65 js-pscroll">
				<ul class="sidebar-link w-full">
					<li class="p-b-13">
						<a href="index.php" class="stext-102 cl2 hov-cl1 trans-04">
							Home
						</a>
					</li>
					<li class="p-b-13">
						<a href="account.php" class="stext-102 cl2 hov-cl1 trans-04">
							My Account
						</a>
					</li>
					<li class="p-b-13">
						<a href="about.php" class="stext-102 cl2 hov-cl1 trans-04">
							Help & FAQs
						</a>
					</li>
					<li class="p-b-13">
						<a href="logout.php" class="stext-102 cl2 hov-cl1 trans-04">
							Logout
						</a>
					</li>
				</ul>
				<div class="sidebar-gallery w-full p-tb-30">
					<span class="mtext-101 cl5">
						@Personal Rental Ride
					</span>
				</div>
				<div class="sidebar-gallery w-full">
					<span class="mtext-101 cl5">
						<a href="about.php">About Us</a>
					</span>
					<p class="stext-108 cl6 p-t-27">
						about Personal Rental Ride
					</p>
				</div>
			</div>
		</div>
	</aside>
	<section class="section-slide">
		<div class="wrap-slick1 rs2-slick1">
			<div class="slick1">
				<div class="item-slick1 bg-overlay1" style="background-image: url(images/b2.jpg);"
					data-thumb="images/thumb-01.jpg" data-caption="ride">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									Personal Rental Ride 2024
								</span>
							</div>
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									Ready For Rides
								</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="item-slick1 bg-overlay1" style="background-image: url(images/b5.jpg);"
					data-thumb="images/thumb-02.jpg" data-caption="ride">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									Ride With Speed
								</span>
							</div>
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn"
								data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									Independent Ride
								</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="item-slick1 bg-overlay1" style="background-image: url(images/b6.jpg);"
					data-thumb="images/thumb-03.jpg" data-caption="Men’s Wear">
					<div class="container h-full">
						<div class="flex-col-c-m h-full p-t-100 p-b-60 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft"
								data-delay="0">
								<span class="ltext-202 txt-center cl0 respon2">
									New Ride With New View
								</span>
							</div>
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight"
								data-delay="800">
								<h2 class="ltext-104 txt-center cl0 p-t-22 p-b-40 respon1">
									NEW SEASON
								</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="wrap-slick1-dots p-lr-10"></div>
		</div>
	</section>
	<!--Detail-->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Our Story
						</h3>
						<p class="stext-113 cl6 p-b-26">
							Our main aim is to give offordable ride for everyone eithe they are hosttler, traveller
							or employees who travel in other city or state, who study and work in other city or state.
							So they can easily go for ride with offordable price with their choice of vehicles.
						</p>

						<p class="stext-113 cl6 p-b-26">
							Any questions? Let us know in Email personalrentalride@gmail.com
						</p>
					</div>
				</div>
				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="images/story-01.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Rules
						</h3>
						<p class="stext-113 cl6 p-b-26">
							(1) You Age Must Be 18 or 18<sup>+</sup>
							<br><br>
							(2) You Have Your Original Licence
							<br><br>
							(3) During Driving You Must Follow The <b>Driving Rules</b>. And Take Care Of The Vahecile.
							<br><br>
							(4) Cost Is Calculate By Price Decided By The Owner * Days. And Fuel Price Is Not
							Included.
							<br><br>
							(5) You Must Be Submit Of Your <b>Adhar Card & Driving Licence</b> Soft Copy.
							<br><br>
							(6) Also You Should Have DIGITAL LOCKER Account.
						</p>
					</div>
				</div>
				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="images/rules-img.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>
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
								Nulla eget sem vitae eros pharetra viverra. Nam vitae luctus ligula. Mauris consequat
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


						</div>
					</div>
				</div>
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
				$('.js-addwish-b2').on('click', function (e) {
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
				data-cf-beacon='{"rayId":"8203d87fba5a4bfe","b":1,"version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
				crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/cozastore/home-03.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Nov 2023 10:14:39 GMT -->

</html>