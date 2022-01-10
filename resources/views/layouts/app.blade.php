<!DOCTYPE html>
<html>
<head>
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
	@yield('script')
</head>
<body data-background-color="bg3">
	
		<div class="wrapper">
			@include('layouts.partials.header')
			@include('layouts.partials.sidebar')
			<div class="main-panel">
				<section role="main" class="content-body" id="main-wrapper">
				@yield('content')
				</section>
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
<script >	
	$(document).ready(function() {
      $('#select2').select2();
    });
	$(document).ready(function() {
		$('#basic-datatables').DataTable({
		});

		$('#multi-filter-select').DataTable( {
			"pageLength": 5,
			initComplete: function () {
				this.api().columns().every( function () {
					var column = this;
					var select = $('<select class="form-control"><option value=""></option></select>')
					.appendTo( $(column.footer()).empty() )
					.on( 'change', function () {
						var val = $.fn.dataTable.util.escapeRegex(
							$(this).val()
							);

						column
						.search( val ? '^'+val+'$' : '', true, false )
						.draw();
					} );

					column.data().unique().sort().each( function ( d, j ) {
						select.append( '<option value="'+d+'">'+d+'</option>' )
					} );
				} );
			}
		});

		// Add Row
		$('#add-row').DataTable({
			"pageLength": 5,
		});

		var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

		$('#addRowButton').click(function() {
			$('#add-row').dataTable().fnAddData([
				$("#addName").val(),
				$("#addPosition").val(),
				$("#addOffice").val(),
				action
				]);
			$('#addRowModal').modal('hide');

		});
	});
	
	
</script>
<script type="text/javascript">
	// Optional
	
	
	// handle links with @href started with '#' only
	$(document).on('click', 'a[href^="#"]', function(e) {
		// target element id
		var id = $(this).attr('href');

		// target element
		var $id = $(id);
		if ($id.length === 0) {
			return;
		}

		// prevent standard hash navigation (avoid blinking in IE)
		e.preventDefault();

		// top position relative to the document
		var pos = $id.offset().top - 80;

		// animated top scrolling
		$('body, html').animate({scrollTop: pos});
	});
	
	
</script>

</html>