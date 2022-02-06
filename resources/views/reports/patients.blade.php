<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Centro Odontológico</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../Atlantis/img/icon.ico" type="image/x-icon"/>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<link async href="{{ asset('css/app.css') }}" rel="stylesheet">
	<script src="/Atlantis/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../Atlantis/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<link rel="stylesheet" href="../../Atlantis/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../Atlantis/css/atlantis.min.css">
	<script defer src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div class="wrapper">
            @include('layouts.partials.header')
			@include('layouts.partials.sidebar')
            <div class="main-panel">
                <div class="content">
                    <div class="page-inner">
                        <div class="page-header">
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h4 class="card-title">Manual de ayuda para el usuario</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <img src="resources\views\reports/login.png" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                    
                </div>
            </div>
    </div>
</body>
<script src="../../Atlantis/js/core/jquery.3.2.1.min.js"></script>
<script src="../../Atlantis/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="../../Atlantis/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
<script src="../../Atlantis/js/core/popper.min.js"></script>
<script src="../../Atlantis/js/core/bootstrap.min.js"></script>
<script src="../../Atlantis/js/plugin/chart.js/chart.min.js"></script>
<script src="/Atlantis/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="../../Atlantis/js/plugin/jqvmap/jquery.vmap.min.js"></script>
<script type="text/javascript" src="../../Atlantis/js/plugin/jqvmap/maps/jquery.vmap.world.js" charset="utf-8"></script>
<script src="../../Atlantis/js/plugin/chart-circle/circles.min.js"></script>
<script src="../../Atlantis/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="../../Atlantis/js/plugin/datatables/datatables.min.js"></script>
<script src="../../Atlantis/js/atlantis.min.js"></script>
<script src="../../Atlantis/js/plugin/select2.full.min.js"></script>


</html>