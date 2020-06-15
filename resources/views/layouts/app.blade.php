<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US">
<![endif]-->

<!--[if IE 8]>
<html class="ie ie8" lang="en-US">
<![endif]-->

<!--[if IE 9]>
<html class="ie ie9" lang="en-US">
<![endif]-->

<!--[if !(IE 7) | !(IE 8) | !(IE 9)  ]><!-->
<html lang="id-ID">
<!--<![endif]-->
<head>
    <title>BPBJ Kab.Pasangkayu</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="UTF-8" />
	<link rel="shortcut icon" href="{{asset('template/frontend/images/home5.png')}}" title="Favicon"/>
	<meta name="viewport" content="width=device-width" />
	<meta name="description" content="Portal ULP Biro Pengadaan Barang dan Jasa Kabupaten Pasangkayu, Propinsi Sulawesi Barat">
	<meta name="keywords" content="Biro Pengadaan Barang dan Jasa Kabupaten Pasangkayu, propinsi Sulawesi Barat">
	<meta name="author" content="BPBJ Kabupaten Pasangkayu - Provinsi Sulawesi Barat">

	<link rel='stylesheet' href="{{asset('template/frontend/css/front/style_front.css')}}" type='text/css' media='all' />
	<link rel='stylesheet' href="{{asset('template/frontend/css/front/swipemenu.css')}}" type='text/css' media='all' />
	<link rel='stylesheet' href="{{asset('template/frontend/css/front/bootstrap.css')}}" type='text/css' media='all' />
	<link rel='stylesheet' href="{{asset('template/frontend/css/front/bootstrap-responsive.css')}}" type='text/css' media='all' />
	<link rel='stylesheet' href="{{asset('template/frontend/css/front/jPages.css')}}" type='text/css' media='all' />
	<link rel='stylesheet' href="{{asset('template/frontend/css/front/ie.css')}}" type='text/css' media='all' />
    {{-- <link rel="stylesheet" href="{{asset('template/frontend/css/camera.css')}}" type="text/css" /> --}}
	<link rel="stylesheet" href="{{asset('template/frontend/js/bxslider/jquery.bxslider.css')}}" type="text/css"/>
	<link rel="stylesheet" href="{{asset('template/frontend/js/slick/slick.css')}}" type="text/css"/>
    <link rel="stylesheet" href="{{asset('template/frontend/js/slick/slick-theme.css')}}" type="text/css"/>
	@yield('header')
	<script type='text/javascript' src="{{asset('template/frontend/js/jQuery-2.1.4.min.js')}}"></script>
</head>
<body>
	<div id="top-page">
		<div class="clearfix">
			<div class="home left">
				<a href="{{ url('/') }}"><img src="{{asset('template/frontend/images/logo-paskay.png')}}"></a>
				<a href="{{ url('/') }}" class="text">BPBJ Pasangkayu</a>
			</div>
			<div class="time right" id="time">
				<script type="text/javascript" src="{{asset('template/frontend/js/tanggal.js')}}" ></script>
				| <span id="clock"></span>
			</div>
		</div><!--End .wrap	-->
	</div><!--end #top-page-->
	<!-- main slaide -->
	<div class="main-slide" style="height:200px">
		<div class="row-fluid">
			<div id="header-head">
				<div class="backdrop">
					<div id='camera_wrap_1'>
						<div data-src="{{asset('template/frontend/images/slides/kepala_tema.jpg')}}"></div>
						<div data-src="{{asset('template/frontend/images/slides/kepala_tema1.jpg')}}"></div>
						<div data-src="{{asset('template/frontend/images/slides/kepala_tema2.jpg')}}"></div>
						<div data-src="{{asset('template/frontend/images/slides/kepala_tema3.png')}}"></div>
						<div data-src="{{asset('template/frontend/images/slides/kepala_tema4.png')}}"></div>
						<div data-src="{{asset('template/frontend/images/slides/kepala_tema5.png')}}"></div>
					</div>
				</div>
				<div class="header-logo">
					<img src="{{asset('template/frontend/images/logo-bpbjpaskay.png')}}" style="height:120px;">
				</div>
				<div class="header-logo-mid">
					<img src="{{asset('template/frontend/images/slides/tulisan_kepala.png')}}" style="height:120px;">
				</div>
				<div class="header-logo-right">
					<img src="{{asset('template/frontend/images/home5.png')}}" style="height:120px;">
				</div>
			</div>
		</div>
	</div>
	<!-- menu -->
	<div class="menuheader">
		<header id="header">
			<nav class="navbar navbar-inverse clearfix nobot">
				<a id="responsive-menu-button" href="#swipe-menu">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
				<div class="nav-collapse" id="swipe-menu-responsive" style="width:900px;">
					<ul class="nav">
						<li>
							<span id="close-menu">
								<a href="#" class="close-this-menu">Close</a>
									<script type="text/javascript">
										$('a.sidr-class-close-this-menu').click(function(){
											$('div.sidr').css({
												'right': '-476px'
											});
											$('body').css({
											'left': '0'
											});
										});
									</script>
							</span>
						</li>
						<li><a href="{{ url('/') }}"><span class="fa fa-home"></span> Home</a></li>
						<li><a href='#'>Profil <span style='line-height:15px;vertical-align:top' class='fa fa-sort-down'><span/></a>
							<ul class='sub-menu'>
								<li><a href='{{url('/profil/visimisi')}}'>Visi Misi</a></li>
								<li><a href='{{url('/profil/tugasfungsi')}}'>Tugas & Fungsi</a></li>
								<li><a href='{{url('/profil/struktur')}}'>Struktur Organisasi</a></li>
							</ul>
						</li>
						<li><a href='#'>SDM <span style='line-height:15px;vertical-align:top' class='fa fa-sort-down'><span/></a>
							<ul class='sub-menu'>
								<li><a href='{{url('/SDM/struktur-pegawai')}}'>Struktur kepegawaian</a></li>
								<li><a href='{{url('/SDM/pengembangan-kompetensi')}}'>Pengembangan kompetensi</a></li>
							</ul>
						</li>
						<li><a href='{{url('produk')}}'>Produk </a></li>
						<li><a href='#'>Galeri <span style='line-height:15px;vertical-align:top' class='fa fa-sort-down'><span/></a>
							<ul class='sub-menu'>
								<li><a href='{{url('foto')}}'>Foto</a></li>
								<li><a href='{{url('video')}}'>Video</a></li>
								<li><a href='{{url('tutor')}}'>Tutorial</a></li>
							</ul>
						</li>
						<li><a href='#'>SOP <span style='line-height:15px;vertical-align:top' class='fa fa-sort-down'><span/></a>
							<ul class='sub-menu'>
								<li><a href="{{url('sop/Standar-operasional')}}">SOP</a></li>
								<li><a href="{{url('sop/Standar-dokumen')}}">Standar Dokumen</a></li>
								<li><a href="{{url('sop/standarisasi-lpse')}}">17 Standarisasi LPSE</a></li>
							</ul>
						</li>
						<li><a href="{{url('/regulasi')}}">Regulasi </a></li>
						<li><a href='#'>RUP <span style='line-height:15px;vertical-align:top' class='fa fa-sort-down'><span/></a>
							<ul class='sub-menu'>
								<li><a href='#'>Upload File RUP</a></li>
								<li><a href='#'>Download File RUP</a></li>
							</ul>
						</li>
					</ul>
				</div> <!--/.nav-collapse -->
			</nav><!-- /.navbar -->
		</header><!-- #masthead -->
		<div id="intr">
			<div class="row-fluid">
				<div class="brnews span9">
					<h3>Kilas informasi : </h3>
					<div id="headline-kilas-berita">
						<div class="hot_topic1">
							<div id="prev"></div>
							<div id="next"></div>

							<div class="kilasberita">
								<ul id="newsflash">
									@foreach ($kilasinfos as $item)
										<li>
										<a href='' target='_blank' rel='bookmark'><span class='title'>{{$item->title}}</span></a>
									</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>

			<div class="search span3"><div class="offset1">
				<form action="{{route('berita.cari')}}" method="get" id="searchform" >
					{{ csrf_field() }}
					<p><input type="text" value="Search here..." onFocus="if ( this.value == 'Search here...' ) { this.value = ''; }" onBlur="if ( this.value == '' ) { this.value = 'Search here...'; }" name="cari" id="s" />
					<input type="submit" id="searchsubmit" value="Search" /></p>
				</form>
			</div></div>
			</div>
		</div>
	</div>
	<div id="page">
		<div id="content" class="container">
			<div id="main" class="row-fluid">
				<div id="sidebar" class="span3">
					<div >
						<span><a href="javascript:void(0);"class="up_info">&nbsp;</a></span>
						<span><a href="javascript:void(0);" class="down_info">&nbsp;</a></span>
					</div>

					<div id="slide-right" class="list_with_img">
						<h3>Link Terkait</h3>
						<ul id="itemContainer" class="info_with_img" text-align="center" >
							<li class='no-images'><a href='http://lpse.pasangkayukab.go.id/' target="_blank"><div class='link_title_no_img' style="text-align:center;"><strong>SPSE</strong></div></a></li>
							<li class='no-images'><a href='https://sirup.lkpp.go.id/' target="_blank"><div class='link_title_no_img' style="text-align:center;" ><strong>SIRUP</strong></div></a></li>
							<li class='no-images'><a href='http://pasangkayukab.go.id' target="_blank"><div class="link_title_no_img" style="text-align:center;" ><strong>PEMKAB PASANGKAYU</strong></div></a></li>
						</ul>
						<div class="clear"></div>
					</div>
					<div >
						<span><a href="javascript:void(0);"class="up_pendukung">&nbsp;</a></span>
						<span><a href="javascript:void(0);" class="down_pendukung">&nbsp;</a></span>
					</div>

					<div id="slide-right" class="list_pendukung">
						<h3>Sistem Pendukung</h3>
						<ul id="itemContainer" class="info_pendukung">
							<li class='no-images'>
								<a href='#' rel='bookmark'>
									<div class='link_title_2'> <i class='fa fa-chevron-right'></i>LINK SISTEM 1</div>
								</a>
							</li>
							<li class='no-images'>
								<a href='#' rel='bookmark'>
									<div class='link_title_2'> <i class='fa fa-chevron-right'></i>LINK SISTEM 2</div>
								</a>
							</li>
							<li class='no-images'>
								<a href='#' rel='bookmark'>
									<div class='link_title_2'> <i class='fa fa-chevron-right'></i>LINK SISTEM 3</div>
								</a>
							</li>
							<li class='no-images'>
								<a href='#' rel='bookmark'>
									<div class='link_title_2'> <i class='fa fa-chevron-right'></i>LINK SISTEM 4</div>
								</a>
							</li>
						</ul>
					</div>
					<div id="slide-right" class="list_pendukung">
						<h3>Agenda</h3>
						<ul id="itemContainer" class="info_pendukung">
							@foreach ($agendafront as $item)
								<li class='no-images'><a href='#'><div class='link_title_no_img'>{{$item->Nama_agenda}}</div></a></li>
							@endforeach
						</ul>
					</div>
				</div>
				@yield('content')
			</div>
		</div> <!-- #content -->
	</div><!-- #wrapper -->
	<div class="clearfix"></div>
	<footer id="footer" class="row-fluid">
		<div id="footer-widgets">
			<div class="footer-widget span4 block1">
				<ul class="menu">
					<li>
						<div class='foot-title'><a href='#'>Tentang Kami</a></div>
						<p class="footerabout">
							<img src="{{asset('template/frontend/images/logo-bpbjpaskay.png')}}" style="height:120px;"><br/>
							Sekretariat Daerah Kabupaten Pasangkayu<br />
							Bagian Pengadaan Barang Dan Jasa<br />
							Telp/Fax : <br />
							Hotline/WA : <br/>
							Email : 
						</p>
					</li>
				</ul>
			</div>

			<div class="footer-widget span8 block1" >
				<ul class="menu">
					<li style="padding-right:8px;">
						<div class='foot-title'><a href='#'>Link Terkait</a></div>
						<div class="container-fluid">
							<div class="row-fluid text-center">
								<div class="span12" style="margin-top:40px;">
									<a href="http://pasangkayukab.go.id/" target="_blank"><img class="footerimg" src="https://pasangkayukab.go.id/wp-content/uploads/2019/08/LOGO-PASANGKAYU.png" /></a>
								</div>
							</div>
							<br />
							<div class="row-fluid text-center">
								<div class="span3">
									<a href='#' target="_blank"><img class="footerimg" src="http://lpse.sultraprov.go.id/eproc4/public/images/imgng/lpse-logo.png" /></a>
								</div>
								<div class="span3">
									<a href="#" target="_blank"><img class="footerimg" src="https://i0.wp.com/klatenkab.go.id/wp-content/uploads/2018/04/Sirup-LKPP.png" /></a>
								</div>
								<div class="span3">
									<a href="#" target="_blank"><img class="footerimg" src="https://infolpse.kaltimprov.go.id/wp-content/uploads/2018/08/SIKaP-1.png" /></a>
								</div>
								<div class="span3">
									<a href="#" target="_blank"><img class="footerimg" src="https://pngimage.net/wp-content/uploads/2018/06/logo-lkpp-png-3.png" /></a>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div><!-- footer-widgets -->
	</footer>
	<div class="clearfix" id="site-info" style="clear: both;margin:0;padding:0;" >
		<div id="credit"  >
			<div style="text-align: center;">
				<p>&copy; Copyright 2020, BPBJ Kabupaten Pasangkayu - All Right Reserverd</p>
			</div>
		</div>
	</div><!-- .site-info -->
	</body>
	<script type='text/javascript' src="{{asset('template/frontend/js/html5.js')}}"></script>
	<script type='text/javascript' src="{{asset('template/frontend/js/bootstrap.min.js')}}"></script>
	<script type='text/javascript' src="{{asset('template/frontend/js/jquery.idTabs.min.js')}}"></script>
	<script type='text/javascript' src="{{asset('template/frontend/js/jquery.simplyscroll.js')}}"></script>
	<script type='text/javascript' src="{{asset('template/frontend/js/fluidvids.min.js')}}"></script>
	<script type='text/javascript' src="{{asset('template/frontend/js/jPages.js')}}"></script>
	<script type='text/javascript' src="{{asset('template/frontend/js/jquery.sidr.min.js')}}"></script>
	<script type='text/javascript' src="{{asset('template/frontend/js/jquery.touchSwipe.min.js')}}"></script>
	<script type='text/javascript' src="{{asset('template/frontend/js/jquery.carouFredSel-6.2.1.js')}}"></script>
	<script type='text/javascript' src="{{asset('template/frontend/js/custom.js')}}"></script>
	<script type='text/javascript' src="{{asset('template/frontend/js/camera.js')}}"></script>
	<script type='text/javascript' src="{{asset('template/frontend/js/jquery.easing.1.3.js')}}"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
	<script type='text/javascript' src="{{asset('template/frontend/js/slick/slick.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('template/frontend/js/bxslider/jquery.bxslider.js')}}"></script>
	<script type="text/javascript" src="{{asset('template/frontend/js/apps/home.js')}}"></script>
    <script src="https://kit.fontawesome.com/87aa0beb50.js" crossorigin="anonymous"></script>
	<script> 
		var scrolled=6;
			var $li = $('.info_with_img li');
			var $limit = $li.length-10;
			var $len = parseFloat(($li.length) / 2);
			var $n = $len * 80;
			$(".down_info").on("click" ,function(){
				if(scrolled > $n){
					$(".info_with_img").animate({
						scrollTop:  parseInt($n)
					});
				}else{
					scrolled=scrolled+80;
					$(".info_with_img").animate({
						scrollTop:  scrolled
					});
				}
			//alert(scrolled+'-'+$n);
			});

			$(".up_info").on("click" ,function(){
				if(scrolled < 0){
					$(".info_with_img").animate({
						scrollTop:  5
					});
				}else{
					scrolled=scrolled-80;
					$(".info_with_img").animate({
						scrollTop:  scrolled
					});
				}
			//alert(scrolled);
			});

			var $li2 = $('.info_pendukung li');
			var $len2 = parseFloat(($li2.length) / 4);
			var $n2 = $len2 * 100;
			$(".down_pendukung").on("click" ,function(){
				if(scrolled > $n2){
					$(".info_pendukung").animate({
						scrollTop:  parseInt($n2)
					});
				}else{
					scrolled=scrolled+100;
					$(".info_pendukung").animate({
						scrollTop:  scrolled
					});
				}
			//alert(scrolled);
			});

			$(".up_pendukung").on("click" ,function(){
				if(scrolled < 0){
					$(".info_pendukung").animate({
						scrollTop:  0
					});
				}else{
					scrolled=scrolled-100;
					$(".info_pendukung").animate({
						scrollTop:  scrolled
					});
				}
			//alert(scrolled);
			});
			$(document).ready(function(){
				$('#camera_wrap_1').camera({
					height:'200px',
					thumbnails: false,
					pagination: false,
				});
			});
	</script>
	<script type="text/javascript">
		var waktuindo=new Date();
		var year=waktuindo.getYear();

		if (year < 1000)
				year+=1900;

		var day=waktuindo.getDay();
		var month=waktuindo.getMonth();
		var daym=waktuindo.getDate();

		if (daym<10)
			daym="0"+daym;

		var dayarray=new Array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu")
		var montharray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember")

		//document.getElementById("time").write("<left>"+dayarray[day]+", "+daym+" "+montharray[month]+" "+year+"</left>");
		//document.getElementById("time").innerHTML = "<left>"+dayarray[day]+", "+daym+" "+montharray[month]+" "+year+"</left>";

		function show2(){
		if (!document.all&&!document.getElementById)
			return
			var thelement = document.getElementById ? document.getElementById("clock"): document.all.tick2;
			var Digital=new Date();
			var hours=Digital.getHours();
			var minutes=Digital.getMinutes();
			var seconds=Digital.getSeconds();
			var dn="PM";
			if (hours<12)
				dn="AM";
			if (hours>12)
				hours=hours-12;
			if (hours==0)
				hours=12;
			if (minutes<=9)
				minutes="0"+minutes;
			if (seconds<=9)
				seconds="0"+seconds;
			var ctime= hours + ":" + minutes + ":" + seconds + " " + dn;
			document.getElementById('clock').innerHTML = ctime;
			setTimeout("show2()",1000);
		}

		window.onload=show2;
	</script>
	@yield('footer')
	{{-- <script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p03.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JQuX3gzRncXpF2MFcQMneogj1CgaAoHkekUDwhqxpud0WPMrIe0NHm1OhioCZG2yUtc9QwnT9tFMqeycN48IdXCNDs80omOlStlcMSOStI319kx5foMKaToTOAmJxOrV51cPcxTP3DW97curOolPEyHLb7tISZ0pJfvl%2bIgt3OhDvfuOf9%2bPNMSK4XVQPucuuj6WlSD4UXe73s0TtkrQFoDG%2fvgMRE1EMf82YP9riCTvbN5AxzP6tbAAhJaY43VCmsmqnAOqf9jD7sCPM99XSL3umZdp1biPGZiluI%2fJGrQ9RVQY5%2bfBHma5ECVNCws7vFOVIzW7374rT74SwEVg%2fI9sEvP7PntVa4SG5sjg2MNt5p2fMWn6xf6OEp46phvdbkL1Ei7bTZ4bUduhxY7pQBUaNy%2bz10cIMWlENAy9LSVwx5ZWgZlUwwNJPhpv58pwwmg4EGGn60ubG6hytB2HYAxmR9edcN1e3srfa2Tv6s1K7H4pCV5i3DrF6AUeRS6QpMFbQNxhnPEKCxlhb%2bXprulem8kU3kQzGMVq1JqVcjXfoqTJasNdIS%2bw8C6SqvOk5ihBq96i%2btv" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script> --}}
</html>
