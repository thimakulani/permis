
<!DOCTYPE html>
<html>
<head>
	<title>Debttype</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="shortcut icon" href="http://localhost/tst/assets/images/favicon.png" />
	<meta name="theme-color" content="#000000" />
	<meta name="author" content="" />
	<meta name="keyword" content="" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="http://localhost/tst/assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="http://localhost/tst/assets/css/animate.css" />
	<link rel="stylesheet" href="http://localhost/tst/assets/css/blueimp-gallery.css" />
	<link rel="stylesheet" href="http://localhost/tst/assets/css/bootstrap-theme-celurean.css" />
	<link rel="stylesheet" href="http://localhost/tst/assets/css/custom-style.css" />
	<link rel="stylesheet" href="http://localhost/tst/assets/css/flatpickr.min.css" />
	<link rel="stylesheet" href="http://localhost/tst/assets/css/bootstrap-editable.css" />
	<link rel="stylesheet" href="http://localhost/tst/assets/css/dropzone.min.css" />
	<link rel="stylesheet" href="http://localhost/tst/assets/css/selectize.css" />
	<script type="text/javascript" src="http://localhost/tst/assets/js/jquery-3.3.1.min.js"></script>
</head>
<body id="main" class="debttype-index">
<div id="page-wrapper">
	<!-- Show progress bar when ajax upload-->
	<div class="progress ajax-progress-bar">
		<div class="progress-bar"></div>
	</div>
	<div id="topbar" class="navbar navbar-expand-md fixed-top navbar-dark bg-dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="http://localhost/tst/Home">
				<img class="img-responsive" src="http://localhost/tst/assets/images/logo.png" /> tst            </a>
			<button type="button" id="sidebarCollapse" class="btn btn-dark">
				<span class="navbar-toggler-icon"></span>
			</button>
			<button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-responsive-collapse">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="navbar-collapse collapse navbar-responsive-collapse">
			</div>
		</div>
	</div>
	<nav id="sidebar" class="navbar-dark bg-dark">
		<ul id="" class="nav navbar-nav w-100 flex-column align-self-start">
			<li class="nav-item">
				<a class="nav-link " href="http://localhost/tst/home">
					<span class="menu-label">Home</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link " href="http://localhost/tst/">
					<span class="menu-label">  Efmigrationshistory</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link " href="http://localhost/tst/attachments">
					<span class="menu-label">Attachments</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link " href="http://localhost/tst/debtagreement">
					<i class="fa fa-check-square-o "></i>									<span class="menu-label">Debtagreement</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link " href="http://localhost/tst/debtordiary">
					<span class="menu-label">Debtordiary</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="http://localhost/tst/debttype">
					<span class="menu-label">Debttype</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link " href="http://localhost/tst/employee">
					<span class="menu-label">Employee</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link " href="http://localhost/tst/employeeroles">
					<span class="menu-label">Employeeroles</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link " href="http://localhost/tst/region">
					<span class="menu-label">Region</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link " href="http://localhost/tst/responsibility">
					<span class="menu-label">Responsibility</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link " href="http://localhost/tst/app_logs">
					<span class="menu-label">App Logs</span>
				</a>
			</li>
		</ul>
	</nav>
	<div id="main-content">
		<!-- Page Main Content Start -->
		<div id="page-content">
			<section class="page" id="list-page-9vzyq2bruxk1" data-page-type="list"  data-display-type="table" data-page-url="http://localhost/tst/debttype">
				<div  class="bg-light p-3 mb-3">
					<div class="container-fluid">
						<div class="row ">
							<div class="col ">
								<h4 class="record-title">Debttype</h4>
							</div>
							<div class="col-sm-3 ">
								<a  class="btn btn btn-primary my-1" href="http://localhost/tst/debttype/add">
									<i class="fa fa-plus"></i>
									Add New Debttype
								</a>
							</div>
							<div class="col-sm-4 ">
								<form  class="search" action="http://localhost/tst/debttype" method="get">
									<div class="input-group">
										<input value="" class="form-control" type="text" name="search"  placeholder="Search" />
										<div class="input-group-append">
											<button class="btn btn-primary"><i class="fa fa-search"></i></button>
										</div>
									</div>
								</form>
							</div>
							<div class="col-md-12 comp-grid">
								<div class="">
									<!-- Page bread crumbs components-->
								</div>
							</div>
						</div>
					</div>
				</div>
				<div  class="">
					<div class="container-fluid">
						<div class="row ">
							<div class="col-md-12 comp-grid">
								<div  class=" animated fadeIn page-content">
									<div id="debttype-list-records">
										<div id="page-report-body" class="table-responsive">
											<table class="table  table-striped table-sm text-left">
												<thead class="table-header bg-light">
												<tr>
													<th class="td-checkbox">
														<label class="custom-control custom-checkbox custom-control-inline">
															<input class="toggle-check-all custom-control-input" type="checkbox" />
															<span class="custom-control-label"></span>
														</label>
													</th>
													<th class="td-sno">#</th>
													<th  class="td-Id"> Id</th>
													<th  class="td-Name"> Name</th>
													<th class="td-btn"></th>
												</tr>
												</thead>
												<tbody class="page-data" id="page-data-list-page-9vzyq2bruxk1">
												<!--record-->
												<tr>
													<th class=" td-checkbox">
														<label class="custom-control custom-checkbox custom-control-inline">
															<input class="optioncheck custom-control-input" name="optioncheck[]" value="6" type="checkbox" />
															<span class="custom-control-label"></span>
														</label>
													</th>
													<th class="td-sno">1</th>
													<td class="td-Id"><a href="http://localhost/tst/debttype/view/6">6</a></td>
													<td class="td-Name">
                                                        <span  data-value="dd"
															   data-pk="6"
															   data-url="http://localhost/tst/debttype/editfield/6"
															   data-name="Name"
															   data-title="Enter Name"
															   data-placement="left"
															   data-toggle="click"
															   data-type="text"
															   data-mode="popover"
															   data-showbuttons="left"
															   class="is-editable" >
                                                            dd 
                                                        </span>
													</td>
													<th class="td-btn">
														<a class="btn btn-sm btn-success has-tooltip" title="View Record" href="http://localhost/tst/debttype/view/6">
															<i class="fa fa-eye"></i> View
														</a>
														<a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="http://localhost/tst/debttype/edit/6">
															<i class="fa fa-edit"></i> Edit
														</a>
														<a class="btn btn-sm btn-danger has-tooltip record-delete-btn" title="Delete this record" href="http://localhost/tst/debttype/delete/6/?csrf_token=039df28e99426430808d33658645bbb6&redirect=debttype" data-prompt-msg="Are you sure you want to delete this record?" data-display-style="modal">
															<i class="fa fa-times"></i>
															Delete
														</a>
													</th>
												</tr>
												<!--endrecord-->
												</tbody>
												<tbody class="search-data" id="search-data-list-page-9vzyq2bruxk1"></tbody>
											</table>
										</div>
										<div class=" border-top mt-2">
											<div class="row justify-content-center">
												<div class="col-md-auto justify-content-center">
													<div class="p-3 d-flex justify-content-between">
														<button data-prompt-msg="Are you sure you want to delete these records?" data-display-style="modal" data-url="http://localhost/tst/debttype/delete/{sel_ids}/?csrf_token=039df28e99426430808d33658645bbb6&redirect=debttype" class="btn btn-sm btn-danger btn-delete-selected d-none">
															<i class="fa fa-times"></i> Delete Selected
														</button>
														<div class="dropup export-btn-holder mx-1">
															<button class="btn btn-sm btn-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																<i class="fa fa-save"></i> Export
															</button>
															<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
																<a class="dropdown-item export-link-btn" data-format="print" href="http://localhost/tst/debttype?format=print" target="_blank">
																	<img src="http://localhost/tst/assets/images/print.png" class="mr-2" /> PRINT
																</a>
																<a class="dropdown-item export-link-btn" data-format="pdf" href="http://localhost/tst/debttype?format=pdf" target="_blank">
																	<img src="http://localhost/tst/assets/images/pdf.png" class="mr-2" /> PDF
																</a>
																<a class="dropdown-item export-link-btn" data-format="word" href="http://localhost/tst/debttype?format=word" target="_blank">
																	<img src="http://localhost/tst/assets/images/doc.png" class="mr-2" /> WORD
																</a>
																<a class="dropdown-item export-link-btn" data-format="csv" href="http://localhost/tst/debttype?format=csv" target="_blank">
																	<img src="http://localhost/tst/assets/images/csv.png" class="mr-2" /> CSV
																</a>
																<a class="dropdown-item export-link-btn" data-format="excel" href="http://localhost/tst/debttype?format=excel" target="_blank">
																	<img src="http://localhost/tst/assets/images/xsl.png" class="mr-2" /> EXCEL
																</a>
															</div>
														</div>
													</div>
												</div>
												<div class="col">

													<form class="mt-3 pagination-form" id="formgre7h4xtcva2" action="http://localhost/tst/debttype" method="get">
														<div class="row justify-content-center">
															<div class="col">
																<small class="text-primary">
																	Records :
																	<span class="record-position font-weight-bold">1</span>
																	of
																	<span class="total-records font-weight-bold">1</span>

																</small>
															</div>

															<hr class="d-none d-block-sm" />
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
		<!-- Page Main Content [End] -->
		<!-- Page Footer Start -->
		<footer class="footer border-top">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-4">
						<div class="copyright">All Rights Reserved | &copy; tst - 2023</div>
					</div>
					<div class="col">
						<div class="footer-links text-right">
							<a href="http://localhost/tst/info/about">About us</a> |
							<a href="http://localhost/tst/info/help">Help and FAQ</a> |
							<a href="http://localhost/tst/info/contact">Contact us</a>  |
							<a href="http://localhost/tst/info/privacy_policy">Privacy Policy</a> |
							<a href="http://localhost/tst/info/terms_and_conditions">Terms and Conditions</a>
						</div>
					</div>

				</div>
			</div>
		</footer>				<!-- Page Footer Ends -->
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
<script>
	var siteAddr = 'http://localhost/tst/';
	var defaultPageLimit = 20;
	var csrfToken = '039df28e99426430808d33658645bbb6';
</script>
<script type="text/javascript" src="http://localhost/tst/assets/js/popper.js"></script>
<script type="text/javascript" src="http://localhost/tst/assets/js/bootstrap-4.3.1.min.js"></script>
<script type="text/javascript" src="http://localhost/tst/assets/js/flatpickr.min.js"></script>
<script type="text/javascript" src="http://localhost/tst/assets/js/selectize.min.js"></script>
<script type="text/javascript" src="http://localhost/tst/assets/js/bootstrap-editable.js"></script>
<script type="text/javascript" src="http://localhost/tst/assets/js/dropzone.min.js"></script>
<script type="text/javascript" src="http://localhost/tst/assets/js/plugins.js"></script>
<script type="text/javascript" src="http://localhost/tst/assets/js/plugins-init.js"></script>
<script type="text/javascript" src="http://localhost/tst/assets/js/page-scripts.js"></script>
</body>
</html>
