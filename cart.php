<?php
session_start();
include 'conn.php';
include ('check_session_user.php');
$user_id = $_SESSION['user'];
$id = $_GET['pid'];
$v_id = $id;
//echo $user_id;
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preview.colorlib.com/theme/cozastore/shoping-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Nov 2023 10:14:40 GMT -->

<head>
	<title>Cart</title>
	<style>
		.table-shopping-cart {
			text-align: center;
		}

		.table-shopping-cart td:hover {
			background-color: yellow;
		}

		/* Ensure the image doesn't exceed its container */
		.how-itemcart1 img {
			max-width: 1000px;
			height: 100%;
		}
	</style>
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

	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

	<script
		nonce="bd6b5d94-2672-41c2-aa47-140f67448a0c">(function (w, d) { !function (bb, bc, bd, be) { bb[bd] = bb[bd] || {}; bb[bd].executed = []; bb.zaraz = { deferred: [], listeners: [] }; bb.zaraz.q = []; bb.zaraz._f = function (bf) { return async function () { var bg = Array.prototype.slice.call(arguments); bb.zaraz.q.push({ m: bf, a: bg }) } }; for (const bh of ["track", "set", "debug"]) bb.zaraz[bh] = bb.zaraz._f(bh); bb.zaraz.init = () => { var bi = bc.getElementsByTagName(be)[0], bj = bc.createElement(be), bk = bc.getElementsByTagName("title")[0]; bk && (bb[bd].t = bc.getElementsByTagName("title")[0].text); bb[bd].x = Math.random(); bb[bd].w = bb.screen.width; bb[bd].h = bb.screen.height; bb[bd].j = bb.innerHeight; bb[bd].e = bb.innerWidth; bb[bd].l = bb.location.href; bb[bd].r = bc.referrer; bb[bd].k = bb.screen.colorDepth; bb[bd].n = bc.characterSet; bb[bd].o = (new Date).getTimezoneOffset(); if (bb.dataLayer) for (const bo of Object.entries(Object.entries(dataLayer).reduce(((bp, bq) => ({ ...bp[1], ...bq[1] })), {}))) zaraz.set(bo[0], bo[1], { scope: "page" }); bb[bd].q = []; for (; bb.zaraz.q.length;) { const br = bb.zaraz.q.shift(); bb[bd].q.push(br) } bj.defer = !0; for (const bs of [localStorage, sessionStorage]) Object.keys(bs || {}).filter((bu => bu.startsWith("_zaraz_"))).forEach((bt => { try { bb[bd]["z_" + bt.slice(7)] = JSON.parse(bs.getItem(bt)) } catch { bb[bd]["z_" + bt.slice(7)] = bs.getItem(bt) } })); bj.referrerPolicy = "origin"; bj.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(bb[bd]))); bi.parentNode.insertBefore(bj, bi) };["complete", "interactive"].includes(bc.readyState) ? zaraz.init() : bb.addEventListener("DOMContentLoaded", zaraz.init) }(w, d, "zarazData", "script"); })(window, document);</script>
</head>

<body class="animsition">


	<header class="header-v3">
		<?php include ('header.php'); ?>
	</header>
	<br><br>
	<hr>

	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index-2.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<span class="stext-109 cl4">
				Book Vehicle
			</span>
		</div>
	</div>

	<form class="bg0 p-t-75 p-b-85" method="POST" accept-charset="UTF-8">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-12 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">

								<thead>
									<tr class="table_head">
										<th class="column-1">Vehicle</th>
										<th class="column-2">Name</th>
										<th class="column-3">From Date</th>
										<th class="column-4">To Date</th>
										<th class="column-5">Address</th>
										<th class="column-5">Total Rent</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql2 = "select * 
								from book_tbl as c
								  join vehicle as p 
								  on p.v_id=c.v_id
								  where user_id=(
									  select user_id 
									  from user
									  where user_mail='$user_id')";
									$result2 = mysqli_query($conn, $sql2);
									while ($row2 = mysqli_fetch_assoc($result2)) {

										$img = $row2['v_img'];
										$name = $row2['v_name'];
										$fromDate = $row2['from_date'];
										$toDate = $row2['to_date'];
										$address = $row2['address'];
										$rent = $row2['total_rent'];

										?>
										<tr class="table_row">
											<td class="column-1">
												<div class="how-itemcart1">
													<input type="hidden" name="order_id" id="order_id">
													<a href="#"><img src="../owner/product image/<?php echo $img; ?>"
															alt="img"></a>
												</div>
											</td>
											<td class="column-2"><?php echo $name; ?></td>
											<td class="column-3"><?php echo $fromDate; ?></td>
											<td class="column-4"><?php echo $toDate; ?></td>
											<td class="column-5"><?php echo $address; ?></td>
											<td class="column-6"><?php echo $rent; ?></td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>
						<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div
								class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
								<button id="btn_submit" name="btn_submit"
									class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
									<a href="pdf.php?v_id=<?php echo $v_id?>"> Generate PDF
										
									</a></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>

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

	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>

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
		data-cf-beacon='{"rayId":"8203d88598154bfe","b":1,"version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
		crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/cozastore/shoping-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 03 Nov 2023 10:14:41 GMT -->

</html>