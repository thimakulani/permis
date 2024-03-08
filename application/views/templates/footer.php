
</section>
</div>
<!-- Page Main Content [End] -->
<!-- Page Footer Start -->
<div class="flash-msg-container"></div>
<!-- Modal page for displaying ajax page -->
<div id="main-page-modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-body p-0 reset-grids inline-page">
			</div>
			<div style="top: 5px; right:5px; z-index: 999;" class="position-absolute">
				<button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">&times;</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal page for displaying record delete prompt -->
<div class="modal fade" id="delete-record-modal-confirm" tabindex="-1" role="dialog" aria-labelledby="delete-record-modal-confirm" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Delete record</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div id="delete-record-modal-msg" class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<a href="" id="delete-record-modal-btn" class="btn btn-primary">Delete</a>
			</div>
		</div>
	</div>
</div>
<!-- Image Preview Component [Start] -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
	<div class="slides"></div>
	<h3 class="title"></h3>
	<a class="prev">‹</a>
	<a class="next">›</a>
	<a class="close">×</a>
	<a class="play-pause"></a>
	<ol class="indicator"></ol>
</div>
<!-- Image Preview Component [End] -->
<template id="page-loading-indicator">
	<div class="p-2 text-center m-2 text-muted m-auto">
		<div class="ajax-loader"></div>
		<h4 class="p-3 mt-2 font-weight-light">Loading...</h4>
	</div>
</template>
<template id="page-saving-indicator">
	<div class="p-2 text-center m-2 text-muted">
		<div class="lds-dual-ring"></div>
		<h4 class="p-3 mt-2 font-weight-light">Saving...</h4>
	</div>
</template>
<template id="inline-loading-indicator">
	<div class="p-2 text-center d-flex justify-content-center">
		<span class="loader mr-3"></span>
		<span class="font-weight-bold">Loading...</span>
	</div>
</template>
</div>
</div>
<!-- ./wrapper -->

<script src="<?php echo base_url()?>assets/plugin/select2/js/select2.full.min.js"></script>


<script>
	$(function () {
		$('.select2').select2()
	});
</script>
<script>
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}
</script>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script type="text/javascript" src="<?php echo base_url()?>assets/js/popper.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-4.3.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/flatpickr.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-editable.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.smartwizard.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/plugins-init.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/page-scripts.js"></script>
<script>
	$(function () {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Initialize Select2 Elements
		$('.select2bs4').select2({
			theme: 'bootstrap4'
		})

		//Datemask dd/mm/yyyy
		$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
		//Datemask2 mm/dd/yyyy
		$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
		//Money Euro
		$('[data-mask]').inputmask()

		//Date picker
		$('#reservationdate').datetimepicker({
			format: 'L'
		});

		//Date and time picker
		$('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

		//Date range picker
		$('#reservation').daterangepicker()
		//Date range picker with time picker
		$('#reservationtime').daterangepicker({
			timePicker: true,
			timePickerIncrement: 30,
			locale: {
				format: 'MM/DD/YYYY hh:mm A'
			}
		})
		//Date range as a button
		$('#daterange-btn').daterangepicker(
			{
				ranges   : {
					'Today'       : [moment(), moment()],
					'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
					'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					'This Month'  : [moment().startOf('month'), moment().endOf('month')],
					'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				},
				startDate: moment().subtract(29, 'days'),
				endDate  : moment()
			},
			function (start, end) {
				$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
			}
		)

		//Timepicker
		$('#timepicker').datetimepicker({
			format: 'LT'
		})

		//Bootstrap Duallistbox
		$('.duallistbox').bootstrapDualListbox()

		//Colorpicker
		$('.my-colorpicker1').colorpicker()
		//color picker with addon
		$('.my-colorpicker2').colorpicker()

		$('.my-colorpicker2').on('colorpickerChange', function(event) {
			$('.my-colorpicker2 .fa-square').css('color', event.color.toString());
		})

		$("input[data-bootstrap-switch]").each(function(){
			$(this).bootstrapSwitch('state', $(this).prop('checked'));
		})

	})
	// BS-Stepper Init
	document.addEventListener('DOMContentLoaded', function () {
		window.stepper = new Stepper(document.querySelector('.bs-stepper'))
	})

	// DropzoneJS Demo Code Start
	Dropzone.autoDiscover = false

	// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
	var previewNode = document.querySelector("#template")
	previewNode.id = ""
	var previewTemplate = previewNode.parentNode.innerHTML
	previewNode.parentNode.removeChild(previewNode)

	var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
		url: "/target-url", // Set the url
		thumbnailWidth: 80,
		thumbnailHeight: 80,
		parallelUploads: 20,
		previewTemplate: previewTemplate,
		autoQueue: false, // Make sure the files aren't queued until manually added
		previewsContainer: "#previews", // Define the container to display the previews
		clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
	})

	myDropzone.on("addedfile", function(file) {
		// Hookup the start button
		file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
	})

	// Update the total progress bar
	myDropzone.on("totaluploadprogress", function(progress) {
		document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
	})

	myDropzone.on("sending", function(file) {
		// Show the total progress bar when upload starts
		document.querySelector("#total-progress").style.opacity = "1"
		// And disable the start button
		file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
	})

	// Hide the total progress bar when nothing's uploading anymore
	myDropzone.on("queuecomplete", function(progress) {
		document.querySelector("#total-progress").style.opacity = "0"
	})

	// Setup the buttons for all transfers
	// The "add files" button doesn't need to be setup because the config
	// `clickable` has already been specified.
	document.querySelector("#actions .start").onclick = function() {
		myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
	}
	document.querySelector("#actions .cancel").onclick = function() {
		myDropzone.removeAllFiles(true)
	}
	// DropzoneJS Demo Code End
</script>

</body>
</html>
