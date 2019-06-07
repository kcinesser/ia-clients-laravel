@extends('layouts.mainlayout')

@section('page-footer-scripts')
<script src="/js/demo4/pages/dashboard.js" type="text/javascript"></script>
@endsection

@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
	<div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

			<!-- begin:: Subheader -->
			<div class="kt-subheader   kt-grid__item" id="kt_subheader">
				<div class="kt-subheader__main">
					<h3 class="kt-subheader__title">Dashboard</h3>
					<span class="kt-subheader__separator kt-hidden"></span>
					<div class="kt-subheader__breadcrumbs">
						<a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
						<span class="kt-subheader__breadcrumbs-separator"></span>
						<a href="" class="kt-subheader__breadcrumbs-link">
							Dashboard </a>
						<span class="kt-subheader__breadcrumbs-separator"></span>
						<a href="" class="kt-subheader__breadcrumbs-link">
							Default Dashboard </a>

						<!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
					</div>
				</div>
				<div class="kt-subheader__toolbar">
					<div class="kt-subheader__wrapper">
						<a href="#" class="btn btn-icon btn btn-label btn-label-brand btn-bold" data-toggle="kt-tooltip" title="Reports" data-placement="top"><i class="flaticon2-writing"></i></a>
						<a href="#" class="btn btn-icon btn btn-label btn-label-brand btn-bold" data-toggle="kt-tooltip" title="Calendar" data-placement="top"><i class="flaticon2-hourglass-1"></i></a>
						<div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions" data-placement="top">
							<a href="#" class="btn btn-icon btn btn-label btn-label-brand btn-bold" data-toggle="dropdown" data-offset="0px,0px" aria-haspopup="true" aria-expanded="false">
								<i class="flaticon2-add-1"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
								<ul class="kt-nav kt-nav--active-bg" role="tablist">
									<li class="kt-nav__item">
										<a href="" class="kt-nav__link">
											<i class="kt-nav__link-icon flaticon2-psd"></i>
											<span class="kt-nav__link-text">Document</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a class="kt-nav__link" role="tab">
											<i class="kt-nav__link-icon flaticon2-supermarket"></i>
											<span class="kt-nav__link-text">Message</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="" class="kt-nav__link">
											<i class="kt-nav__link-icon flaticon2-shopping-cart"></i>
											<span class="kt-nav__link-text">Product</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a class="kt-nav__link" role="tab">
											<i class="kt-nav__link-icon flaticon2-chart2"></i>
											<span class="kt-nav__link-text">Report</span>
											<span class="kt-nav__link-badge">
												<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded">pdf</span>
											</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="" class="kt-nav__link">
											<i class="kt-nav__link-icon flaticon2-sms"></i>
											<span class="kt-nav__link-text">Post</span>
										</a>
									</li>
									<li class="kt-nav__item">
										<a href="" class="kt-nav__link">
											<i class="kt-nav__link-icon flaticon2-avatar"></i>
											<span class="kt-nav__link-text">Customer</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<a href="#" class="btn btn-sm btn-elevate btn-brand btn-elevate" id="kt_dashboard_daterangepicker" data-toggle="kt-tooltip" title="" data-placement="left" data-original-title="Select dashboard daterange">
							<span class="kt-opacity-7" id="kt_dashboard_daterangepicker_title">Today:</span>&nbsp;
							<span class="kt-font-bold" id="kt_dashboard_daterangepicker_date">Jan 11</span>
							<i class="flaticon-calendar-with-a-clock-time-tools kt-padding-l-5 kt-padding-r-0"></i>
						</a>
					</div>
				</div>
			</div>

			<!-- end:: Subheader -->

			<!-- begin:: Content -->
			<div class="kt-content kt-grid__item kt-grid__item--fluid">

				<!--begin::Dashboard 5-->

				<!--begin::Row-->
				<div class="row">
					<div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">

						<!--begin::Portlet-->
						<div class="kt-portlet kt-portlet--height-fluid kt-widget-10">
							<div class="kt-portlet__body">
								<div class="kt-widget-10__wrapper">
									<div class="kt-widget-10__details">
										<div class="kt-widget-10__title">New Customers</div>
										<div class="kt-widget-10__desc">28 Daily Avr</div>
									</div>
									<div class="kt-widget-10__num">
										+958
									</div>
								</div>
							</div>
							<div class="kt-portlet__body kt-portlet__body--fit">
								<div class="kt-widget-10__chart">

									<!--Doc: For the chart initialization refer to "mediumCharts" function in "src\theme\app\scripts\custom\dashboard.js" -->
									<canvas id="kt_widget_mini_chart_1" height="100"></canvas>
								</div>
							</div>
						</div>

						<!--end::Portlet-->
					</div>
					<div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">

						<!--begin::Portlet-->
						<div class="kt-portlet kt-portlet--height-fluid kt-widget-10">
							<div class="kt-portlet__body">
								<div class="kt-widget-10__wrapper">
									<div class="kt-widget-10__details">
										<div class="kt-widget-10__title">Sales Increase</div>
										<div class="kt-widget-10__desc">92 Daily Avr</div>
									</div>
									<div class="kt-widget-10__num">
										75%
									</div>
								</div>
							</div>
							<div class="kt-portlet__body kt-portlet__body--fit">
								<div class="kt-widget-10__chart">

									<!--Doc: For the chart initialization refer to "mediumCharts" function in "src\theme\app\scripts\custom\dashboard.js" -->
									<canvas id="kt_widget_mini_chart_2" height="100"></canvas>
								</div>
							</div>
						</div>

						<!--end::Portlet-->
					</div>
					<div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">

						<!--begin::Portlet-->
						<div class="kt-portlet kt-portlet--height-fluid kt-widget-10">
							<div class="kt-portlet__body">
								<div class="kt-widget-10__wrapper">
									<div class="kt-widget-10__details">
										<div class="kt-widget-10__title">Weekly Orders</div>
										<div class="kt-widget-10__desc">122 Daily Avr</div>
									</div>
									<div class="kt-widget-10__num">
										7,300
									</div>
								</div>
							</div>
							<div class="kt-portlet__body kt-portlet__body--fit">
								<div class="kt-widget-10__chart">

									<!--Doc: For the chart initialization refer to "mediumCharts" function in "src\theme\app\scripts\custom\dashboard.js" -->
									<canvas id="kt_widget_mini_chart_3" height="100"></canvas>
								</div>
							</div>
						</div>

						<!--end::Portlet-->
					</div>
					<div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">

						<!--begin::Portlet-->
						<div class="kt-portlet kt-portlet--height-fluid kt-widget-12">
							<div class="kt-portlet__body">
								<div class="kt-widget-12__body">
									<div class="kt-widget-12__head">
										<div class="kt-widget-12__date kt-widget-12__date--success">
											<span class="kt-widget-12__day">08</span>
											<span class="kt-widget-12__month">Dec</span>
										</div>
										<div class="kt-widget-12__label">
											<h3 class="kt-widget-12__title">AirGreat Presentation</h3>
											<span class="kt-widget-12__desc">Oxfort Street</span>
										</div>
									</div>
									<div class="kt-widget-12__info">
										To start a blog, think of a topic about and first brainstorm ways to write details
									</div>
								</div>
							</div>
							<div class="kt-portlet__foot kt-portlet__foot--md">
								<div class="kt-portlet__foot-wrapper">
									<div class="kt-portlet__foot-info">
										<div class="kt-widget-12__members">
											<a href="#" class="kt-widget-12__member" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="John Myer">
												<img src="/media/users/100_1.jpg" alt="image" />
											</a>
											<a href="#" class="kt-widget-12__member" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="Alison Brandy">
												<img src="/media/users/100_10.jpg" alt="image" />
											</a>
											<a href="#" class="kt-widget-12__member" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="Selina Cranson">
												<img src="/media/users/100_11.jpg" alt="image" />
											</a>
											<a href="#" class="kt-widget-12__member" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="Luke Walls">
												<img src="/media/users/100_2.jpg" alt="image" />
											</a>
											<a href="#" class="kt-widget-12__member" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="Micheal York">
												<img src="/media/users/100_3.jpg" alt="image" />
											</a>
											<a href="#" class="kt-widget-12__member kt-widget-12__member--last">
												+3
											</a>
										</div>
									</div>
									<div class="kt-portlet__foot-toolbar">
										<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Join</a>
									</div>
								</div>
							</div>
						</div>

						<!--end::Portlet-->
					</div>
					<div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">

						<!--begin::Portlet-->
						<div class="kt-portlet kt-portlet--height-fluid kt-widget-12">
							<div class="kt-portlet__body">
								<div class="kt-widget-12__body">
									<div class="kt-widget-12__head">
										<div class="kt-widget-12__date kt-widget-12__date--warning">
											<span class="kt-widget-12__day">23</span>
											<span class="kt-widget-12__month">Dec</span>
										</div>
										<div class="kt-widget-12__label">
											<h3 class="kt-widget-12__title">Christmas Party</h3>
											<span class="kt-widget-12__desc">Bolton House</span>
										</div>
									</div>
									<div class="kt-widget-12__info">
										To start a blog, think of a topic about and first brainstorm party is ways to write details
									</div>
								</div>
							</div>
							<div class="kt-portlet__foot kt-portlet__foot--md">
								<div class="kt-portlet__foot-wrapper">
									<div class="kt-portlet__foot-info">
										<div class="kt-widget-12__members">
											<a href="#" class="kt-widget-12__member" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="John Myer">
												<img src="/media/users/100_1.jpg" alt="image" />
											</a>
											<a href="#" class="kt-widget-12__member" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="Alison Brandy">
												<img src="/media/users/100_10.jpg" alt="image" />
											</a>
											<a href="#" class="kt-widget-12__member" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="Selina Cranson">
												<img src="/media/users/100_11.jpg" alt="image" />
											</a>
											<a href="#" class="kt-widget-12__member" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="Luke Walls">
												<img src="/media/users/100_2.jpg" alt="image" />
											</a>
											<a href="#" class="kt-widget-12__member" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="Micheal York">
												<img src="/media/users/100_3.jpg" alt="image" />
											</a>
											<a href="#" class="kt-widget-12__member kt-widget-12__member--last">
												+10
											</a>
										</div>
									</div>
									<div class="kt-portlet__foot-toolbar">
										<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Join</a>
									</div>
								</div>
							</div>
						</div>

						<!--end::Portlet-->
					</div>
					<div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">

						<!--begin::Portlet-->
						<div class="kt-portlet kt-portlet--height-fluid kt-widget-12">
							<div class="kt-portlet__body">
								<div class="kt-widget-12__body">
									<div class="kt-widget-12__head">
										<div class="kt-widget-12__date kt-widget-12__date--focus">
											<span class="kt-widget-12__day">05</span>
											<span class="kt-widget-12__month">Jan</span>
										</div>
										<div class="kt-widget-12__label">
											<h3 class="kt-widget-12__title">Outdoor Activity Day</h3>
											<span class="kt-widget-12__desc">South Suton</span>
										</div>
									</div>
									<div class="kt-widget-12__info">
										To start a blog, think of a topic about and first brainstorm party is ways to write details
									</div>
								</div>
							</div>
							<div class="kt-portlet__foot kt-portlet__foot--md">
								<div class="kt-portlet__foot-wrapper">
									<div class="kt-portlet__foot-info">
										<div class="kt-widget-12__members">
											<a href="#" class="kt-widget-12__member" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="John Myer">
												<img src="/media/users/100_1.jpg" alt="image" />
											</a>
											<a href="#" class="kt-widget-12__member" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="Alison Brandy">
												<img src="/media/users/100_10.jpg" alt="image" />
											</a>
											<a href="#" class="kt-widget-12__member" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="Selina Cranson">
												<img src="/media/users/100_11.jpg" alt="image" />
											</a>
											<a href="#" class="kt-widget-12__member" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="Luke Walls">
												<img src="/media/users/100_2.jpg" alt="image" />
											</a>
											<a href="#" class="kt-widget-12__member" data-toggle="kt-tooltip" data-skin="brand" data-placement="top" title="Micheal York">
												<img src="/media/users/100_3.jpg" alt="image" />
											</a>
											<a href="#" class="kt-widget-12__member kt-widget-12__member--last">
												+7
											</a>
										</div>
									</div>
									<div class="kt-portlet__foot-toolbar">
										<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Join</a>
									</div>
								</div>
							</div>
						</div>

						<!--end::Portlet-->
					</div>
					<div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">

						<!--begin::Portlet-->
						<div class="kt-portlet kt-portlet--height-fluid">
							<div class="kt-portlet__head">
								<div class="kt-portlet__head-label">
									<h3 class="kt-portlet__head-title">Top Products</h3>
								</div>
								<div class="kt-portlet__head-toolbar">
									<div class="kt-portlet__head-toolbar-wrapper">
										<div class="dropdown dropdown-inline">
											<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="flaticon-more-1"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-right">
												<ul class="kt-nav">
													<li class="kt-nav__section kt-nav__section--first">
														<span class="kt-nav__section-text">Export Tools</span>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon la la-print"></i>
															<span class="kt-nav__link-text">Print</span>
														</a>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon la la-copy"></i>
															<span class="kt-nav__link-text">Copy</span>
														</a>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon la la-file-excel-o"></i>
															<span class="kt-nav__link-text">Excel</span>
														</a>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon la la-file-text-o"></i>
															<span class="kt-nav__link-text">CSV</span>
														</a>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon la la-file-pdf-o"></i>
															<span class="kt-nav__link-text">PDF</span>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="kt-portlet__body">
								<div class="kt-widget-1">
									<ul class="nav nav-pills nav-tabs-btn nav-pills-btn-brand" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#kt_tabs_19_15cb6c1129d8e6" role="tab">
												<span class="nav-link-icon"><i class="flaticon2-graphic"></i></span>
												<span class="nav-link-title">Settings</span>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#kt_tabs_19_25cb6c1129d8e6" role="tab">
												<span class="nav-link-icon"><i class="flaticon2-position"></i></span>
												<span class="nav-link-title">Code</span>
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#kt_tabs_19_35cb6c1129d8e6" role="tab">
												<span class="nav-link-icon"><i class="flaticon2-layers-1"></i></span>
												<span class="nav-link-title">Design</span>
											</a>
										</li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane fade active show" id="kt_tabs_19_15cb6c1129d8e6" role="tabpanel">
											<div class="kt-widget-1__item">
												<div class="kt-widget-1__item-info">
													<a href="#" class="kt-widget-1__item-title">
														HTML 5 Templates
													</a>
													<div class="kt-widget-1__item-desc">Font-end,Admin & Email</div>
												</div>
												<div class="kt-widget-1__item-stats">
													<div class="kt-widget-1__item-value">+79%</div>
													<div class="kt-widget-1__item-progress">
														<div class="progress">
															<div class="progress-bar bg-danger" role="progressbar" style="width: 79%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="kt-widget-1__item">
												<div class="kt-widget-1__item-info">
													<a href="#" class="kt-widget-1__item-title">
														Wordpress Themes
													</a>
													<div class="kt-widget-1__item-desc">eCommerce Website, Plugin</div>
												</div>
												<div class="kt-widget-1__item-stats">
													<div class="kt-widget-1__item-value">+21%</div>
													<div class="kt-widget-1__item-progress">
														<div class="progress">
															<div class="progress-bar bg-brand" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="kt-widget-1__item">
												<div class="kt-widget-1__item-info">
													<a href="#" class="kt-widget-1__item-title">eCommerce Websites</a>
													<div class="kt-widget-1__item-desc">Shops, Fasion wep sites & atc</div>
												</div>
												<div class="kt-widget-1__item-stats">
													<div class="kt-widget-1__item-value">-16%</div>
													<div class="kt-widget-1__item-progress">
														<div class="progress">
															<div class="progress-bar  bg-success" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="kt-widget-1__item">
												<div class="kt-widget-1__item-info">
													<a href="#" class="kt-widget-1__item-title">UI/UX Design</a>
													<div class="kt-widget-1__item-desc">Evrything you ever imagine</div>
												</div>
												<div class="kt-widget-1__item-stats">
													<div class="kt-widget-1__item-value">+4%</div>
													<div class="kt-widget-1__item-progress">
														<div class="progress">
															<div class="progress-bar bg-focus" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="kt-widget-1__item">
												<div class="kt-widget-1__item-info">
													<a href="#" class="kt-widget-1__item-title">Freebie Themes</a>
													<div class="kt-widget-1__item-desc">Font-end & Admin</div>
												</div>
												<div class="kt-widget-1__item-stats">
													<div class="kt-widget-1__item-value">+34</div>
													<div class="kt-widget-1__item-progress">
														<div class="progress">
															<div class="progress-bar bg-warning" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="kt_tabs_19_25cb6c1129d8e6" role="tabpanel">
											<div class="kt-widget-1__item">
												<div class="kt-widget-1__item-info">
													<a href="#" class="kt-widget-1__item-title">UI/UX Design</a>
													<div class="kt-widget-1__item-desc">Evrything you ever imagine</div>
												</div>
												<div class="kt-widget-1__item-stats">
													<div class="kt-widget-1__item-value">+4%</div>
													<div class="kt-widget-1__item-progress">
														<div class="progress">
															<div class="progress-bar bg-focus" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="kt-widget-1__item">
												<div class="kt-widget-1__item-info">
													<a href="#" class="kt-widget-1__item-title">HTML 5 Templates</a>
													<div class="kt-widget-1__item-desc">Font-end,Admin & Email</div>
												</div>
												<div class="kt-widget-1__item-stats">
													<div class="kt-widget-1__item-value">+79%</div>
													<div class="kt-widget-1__item-progress">
														<div class="progress">
															<div class="progress-bar bg-danger" role="progressbar" style="width: 79%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="kt-widget-1__item">
												<div class="kt-widget-1__item-info">
													<a href="#" class="kt-widget-1__item-title">Wordpress Themes</a>
													<div class="kt-widget-1__item-desc">eCommerce Website, Plugin</div>
												</div>
												<div class="kt-widget-1__item-stats">
													<div class="kt-widget-1__item-value">+21%</div>
													<div class="kt-widget-1__item-progress">
														<div class="progress">
															<div class="progress-bar bg-brand" role="progressbar" style="width: 60%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="kt-widget-1__item">
												<div class="kt-widget-1__item-info">
													<a href="#" class="kt-widget-1__item-title">eCommerce Websites</a>
													<div class="kt-widget-1__item-desc">Shops, Fasion wep sites & atc</div>
												</div>
												<div class="kt-widget-1__item-stats">
													<div class="kt-widget-1__item-value">-16%</div>
													<div class="kt-widget-1__item-progress">
														<div class="progress">
															<div class="progress-bar  bg-success" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="kt-widget-1__item">
												<div class="kt-widget-1__item-info">
													<a href="#" class="kt-widget-1__item-title">Freebie Themes</a>
													<div class="kt-widget-1__item-desc">Font-end & Admin</div>
												</div>
												<div class="kt-widget-1__item-stats">
													<div class="kt-widget-1__item-value">+34</div>
													<div class="kt-widget-1__item-progress">
														<div class="progress">
															<div class="progress-bar bg-info" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="tab-pane fade" id="kt_tabs_19_35cb6c1129d8e6" role="tabpanel">
											<div class="kt-widget-1__item">
												<div class="kt-widget-1__item-info">
													<a href="#" class="kt-widget-1__item-title">eCommerce Websites</a>
													<div class="kt-widget-1__item-desc">Shops, Fasion wep sites & atc</div>
												</div>
												<div class="kt-widget-1__item-stats">
													<div class="kt-widget-1__item-value">-16%</div>
													<div class="kt-widget-1__item-progress">
														<div class="progress">
															<div class="progress-bar  bg-success" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="kt-widget-1__item">
												<div class="kt-widget-1__item-info">
													<a href="#" class="kt-widget-1__item-title">UI/UX Design</a>
													<div class="kt-widget-1__item-desc">Evrything you ever imagine</div>
												</div>
												<div class="kt-widget-1__item-stats">
													<div class="kt-widget-1__item-value">+4%</div>
													<div class="kt-widget-1__item-progress">
														<div class="progress">
															<div class="progress-bar bg-focus" role="progressbar" style="width: 90%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="kt-widget-1__item">
												<div class="kt-widget-1__item-info">
													<a href="#" class="kt-widget-1__item-title">Latest Trends</a>
													<div class="kt-widget-1__item-desc">eCommerce Website, Plugin</div>
												</div>
												<div class="kt-widget-1__item-stats">
													<div class="kt-widget-1__item-value">+34%</div>
													<div class="kt-widget-1__item-progress">
														<div class="progress">
															<div class="progress-bar bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="kt-widget-1__item">
												<div class="kt-widget-1__item-info">
													<a href="#" class="kt-widget-1__item-title">HTML 5 Templates</a>
													<div class="kt-widget-1__item-desc">Font-end,Admin & Email</div>
												</div>
												<div class="kt-widget-1__item-stats">
													<div class="kt-widget-1__item-value">+79%</div>
													<div class="kt-widget-1__item-progress">
														<div class="progress">
															<div class="progress-bar bg-danger" role="progressbar" style="width: 79%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
												</div>
											</div>
											<div class="kt-widget-1__item">
												<div class="kt-widget-1__item-info">
													<a href="#" class="kt-widget-1__item-title">Freebie Themes</a>
													<div class="kt-widget-1__item-desc">Font-end & Admin</div>
												</div>
												<div class="kt-widget-1__item-stats">
													<div class="kt-widget-1__item-value">+34</div>
													<div class="kt-widget-1__item-progress">
														<div class="progress">
															<div class="progress-bar bg-info" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!--end::Portlet-->
					</div>
					<div class="col-lg-12 col-xl-8 order-lg-2 order-xl-1">

						<!--begin::Portlet-->
						<div class="kt-portlet kt-portlet--height-fluid">
							<div class="kt-portlet__head">
								<div class="kt-portlet__head-label">
									<h3 class="kt-portlet__head-title">Revenue Growth</h3>
								</div>
								<div class="kt-portlet__head-toolbar">
									<div class="kt-portlet__head-toolbar-wrapper">
										<div class="dropdown dropdown-inline">
											<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="flaticon-more-1"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-right">
												<ul class="kt-nav">
													<li class="kt-nav__section kt-nav__section--first">
														<span class="kt-nav__section-text">Export Tools</span>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon la la-print"></i>
															<span class="kt-nav__link-text">Print</span>
														</a>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon la la-copy"></i>
															<span class="kt-nav__link-text">Copy</span>
														</a>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon la la-file-excel-o"></i>
															<span class="kt-nav__link-text">Excel</span>
														</a>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon la la-file-text-o"></i>
															<span class="kt-nav__link-text">CSV</span>
														</a>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon la la-file-pdf-o"></i>
															<span class="kt-nav__link-text">PDF</span>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="kt-portlet__body kt-portlet__body--fluid">
								<div class="kt-widget-9">
									<div class="kt-widget-9__panel">
										<div class="kt-widget-9__legends">
											<div class="kt-widget-9__legend">
												<div class="kt-widget-9__legend-bullet kt-bg-brand"></div>
												<div class="kt-widget-9__legend-label">Author</div>
											</div>
											<div class="kt-widget-9__legend">
												<div class="kt-widget-9__legend-bullet kt-label-bg-color-1"></div>
												<div class="kt-widget-9__legend-label">Customer</div>
											</div>
										</div>
										<div class="kt-widget-9__toolbar">
											<div class="dropdown dropdown-inline">
												<button type="button" class="btn btn-default dropdown-toggle btn-font-sm btn-bold btn-upper" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
													August
												</button>
												<div class="dropdown-menu dropdown-menu-right">
													<ul class="kt-nav">
														<li class="kt-nav__section kt-nav__section--first">
															<span class="kt-nav__section-text">Export Tools</span>
														</li>
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link">
																<i class="kt-nav__link-icon la la-print"></i>
																<span class="kt-nav__link-text">Print</span>
															</a>
														</li>
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link">
																<i class="kt-nav__link-icon la la-copy"></i>
																<span class="kt-nav__link-text">Copy</span>
															</a>
														</li>
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link">
																<i class="kt-nav__link-icon la la-file-excel-o"></i>
																<span class="kt-nav__link-text">Excel</span>
															</a>
														</li>
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link">
																<i class="kt-nav__link-icon la la-file-text-o"></i>
																<span class="kt-nav__link-text">CSV</span>
															</a>
														</li>
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link">
																<i class="kt-nav__link-icon la la-file-pdf-o"></i>
																<span class="kt-nav__link-text">PDF</span>
															</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									<div class="kt-widget-9__chart">
										<canvas id="kt_chart_revenue_growth" height="300"></canvas>
									</div>
								</div>
							</div>
						</div>

						<!--end::Portlet-->
					</div>
					<div class="col-lg-6 col-xl-4 order-lg-1 order-xl-1">

						<!--begin::Portlet-->
						<div class="kt-portlet kt-portlet--height-fluid">
							<div class="kt-portlet__head">
								<div class="kt-portlet__head-label">
									<h3 class="kt-portlet__head-title">Top Categories</h3>
								</div>
								<div class="kt-portlet__head-toolbar">
									<div class="kt-portlet__head-toolbar-wrapper">
										<div class="dropdown dropdown-inline">
											<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="flaticon-more-1"></i>
											</button>
											<div class="dropdown-menu dropdown-menu-right">
												<ul class="kt-nav">
													<li class="kt-nav__section kt-nav__section--first">
														<span class="kt-nav__section-text">Export Tools</span>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon la la-print"></i>
															<span class="kt-nav__link-text">Print</span>
														</a>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon la la-copy"></i>
															<span class="kt-nav__link-text">Copy</span>
														</a>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon la la-file-excel-o"></i>
															<span class="kt-nav__link-text">Excel</span>
														</a>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon la la-file-text-o"></i>
															<span class="kt-nav__link-text">CSV</span>
														</a>
													</li>
													<li class="kt-nav__item">
														<a href="#" class="kt-nav__link">
															<i class="kt-nav__link-icon la la-file-pdf-o"></i>
															<span class="kt-nav__link-text">PDF</span>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="kt-portlet__body">
								<div class="kt-widget-16">
									<div class="kt-widget-16__item kt-widget-16__item--info">
										<div class="kt-widget-16__labels">
											<a href="">
												<div class="kt-widget-16__title">Templates</div>
											</a>
											<div class="kt-widget-16__desc">Front-end, Admin</div>
										</div>
										<div class="kt-widget-16__data">
											<div class="kt-widget-16__item-chart">

												<!--Doc: For the chart initialization refer to "latestProductsMiniCharts" function in "src\theme\app\scripts\custom\dashboard.js"
                         and "KLib.initMiniChart()" function in "themes/themes/keen/src/theme/app/scripts/bundle/lib.js" -->
												<canvas id="kt_widget_latest_products_chart_1" width="80" height="40"></canvas>
											</div>
											<div class="kt-widget-16__numbers">
												<div class="kt-widget-16__numbers-total">5.7k</div>
												<div class="kt-widget-16__numbers-change">+780</div>
											</div>
										</div>
									</div>
									<div class="kt-widget-16__item kt-widget-16__item--danger">
										<div class="kt-widget-16__labels">
											<a href="">
												<div class="kt-widget-16__title">Wordpress</div>
											</a>
											<div class="kt-widget-16__desc">eCommerce, Website</div>
										</div>
										<div class="kt-widget-16__data">
											<div class="kt-widget-16__item-chart">

												<!--Doc: For the chart initialization refer to "latestProductsMiniCharts" function in "src\theme\app\scripts\custom\dashboard.js"
                         and "KLib.initMiniChart()" function in "themes/themes/keen/src/theme/app/scripts/bundle/lib.js" -->
												<canvas id="kt_widget_latest_products_chart_6" width="80" height="40"></canvas>
											</div>
											<div class="kt-widget-16__numbers">
												<div class="kt-widget-16__numbers-total">2.8k</div>
												<div class="kt-widget-16__numbers-change">+350</div>
											</div>
										</div>
									</div>
									<div class="kt-widget-16__item kt-widget-16__item--warning">
										<div class="kt-widget-16__labels">
											<a href="">
												<div class="kt-widget-16__title">eCommerce</div>
											</a>
											<div class="kt-widget-16__desc">Fashion Websites</div>
										</div>
										<div class="kt-widget-16__data">
											<div class="kt-widget-16__item-chart">

												<!--Doc: For the chart initialization refer to "latestProductsMiniCharts" function in "src\theme\app\scripts\custom\dashboard.js"
                         and "KLib.initMiniChart()" function in "themes/themes/keen/src/theme/app/scripts/bundle/lib.js" -->
												<canvas id="kt_widget_latest_products_chart_3" width="80" height="40"></canvas>
											</div>
											<div class="kt-widget-16__numbers">
												<div class="kt-widget-16__numbers-total">9.3k</div>
												<div class="kt-widget-16__numbers-change">+2.1k</div>
											</div>
										</div>
									</div>
									<div class="kt-widget-16__item kt-widget-16__item--brand">
										<div class="kt-widget-16__labels">
											<a href="">
												<div class="kt-widget-16__title">UI/UX Design</div>
											</a>
											<div class="kt-widget-16__desc">Everything you like</div>
										</div>
										<div class="kt-widget-16__data">
											<div class="kt-widget-16__item-chart">

												<!--Doc: For the chart initialization refer to "latestProductsMiniCharts" function in "src\theme\app\scripts\custom\dashboard.js"
                         and "KLib.initMiniChart()" function in "themes/themes/keen/src/theme/app/scripts/bundle/lib.js" -->
												<canvas id="kt_widget_latest_products_chart_5" width="80" height="40"></canvas>
											</div>
											<div class="kt-widget-16__numbers">
												<div class="kt-widget-16__numbers-total">9.3k</div>
												<div class="kt-widget-16__numbers-change">+1.6k</div>
											</div>
										</div>
									</div>
									<div class="kt-widget-16__item kt-widget-16__item--success">
										<div class="kt-widget-16__labels">
											<a href="">
												<div class="kt-widget-16__title">SAAS Solution</div>
											</a>
											<div class="kt-widget-16__desc">Monthly Subscription</div>
										</div>
										<div class="kt-widget-16__data">
											<div class="kt-widget-16__item-chart">

												<!--Doc: For the chart initialization refer to "latestProductsMiniCharts" function in "src\theme\app\scripts\custom\dashboard.js"
                         and "KLib.initMiniChart()" function in "themes/themes/keen/src/theme/app/scripts/bundle/lib.js" -->
												<canvas id="kt_widget_latest_products_chart_4" width="80" height="40"></canvas>
											</div>
											<div class="kt-widget-16__numbers">
												<div class="kt-widget-16__numbers-total">5.7k</div>
												<div class="kt-widget-16__numbers-change">+598</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!--end::Portlet-->
					</div>
					<div class="col-lg-12 col-xl-8 order-lg-2 order-xl-1">

						<!--begin::Portlet-->
						<div class="kt-portlet kt-portlet--height-fluid-half kt-widget-14">
							<div class="kt-portlet__body">

								<!-- Doc: The bootstrap carousel is a slideshow for cycling through a series of content, see https://getbootstrap.com/docs/4.1/components/carousel/ -->
								<div id="kt-widget-slider-14-1" class="kt-slider carousel slide" data-ride="carousel" data-interval="8000">
									<div class="kt-slider__head">
										<div class="kt-slider__label">New Products</div>
										<div class="kt-slider__nav">
											<a class="kt-slider__nav-prev carousel-control-prev" href="#kt-widget-slider-14-1" role="button" data-slide="prev">
												<i class="fa fa-angle-left"></i>
											</a>
											<a class="kt-slider__nav-next carousel-control-next" href="#kt-widget-slider-14-1" role="button" data-slide="next">
												<i class="fa fa-angle-right"></i>
											</a>
										</div>
									</div>
									<div class="carousel-inner">
										<div class="carousel-item active">
											<div class="kt-widget-14__body">
												<div class="kt-widget-14__product">
													<div class="kt-widget-14__thumb">
														<a href="#"><img src="/media/blog/1.jpg" class="kt-widget-14__image--landscape" alt="" title="" /></a>
													</div>
													<div class="kt-widget-14__content">
														<a href="#">
															<h3 class="kt-widget-14__title">Active Smartwatch</h3>
														</a>
														<div class="kt-widget-14__desc">
															Beautifully designed watch that helps you track your fitness and diet – while keeping you motivated!
														</div>
													</div>
												</div>
												<div class="kt-widget-14__data">
													<div class="kt-widget-14__info">
														<div class="kt-widget-14__info-title kt-font-brand">246</div>
														<div class="kt-widget-14__desc">Purchases</div>
													</div>
													<div class="kt-widget-14__info">
														<div class="kt-widget-14__info-title">37</div>
														<div class="kt-widget-14__desc">Reviews</div>
													</div>
												</div>
											</div>
											<div class="kt-widget-14__foot">
												<div class="kt-widget-14__foot-info">
													<div class="kt-widget-14__foot-label btn btn-sm btn-label-brand btn-bold">
														24 Nov, 2018
													</div>
													<div class="kt-widget-14__foot-desc">Date of Release</div>
												</div>
												<div class="kt-widget-14__foot-toolbar">
													<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Preview</a>
													<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Details</a>
												</div>
											</div>
										</div>
										<div class="carousel-item">
											<div class="kt-widget-14__body">
												<div class="kt-widget-14__product">
													<div class="kt-widget-14__thumb">
														<a href="#"><img src="/media/blog/2.jpg" class="kt-widget-14__image--landscape" alt="" title="" /></a>
													</div>
													<div class="kt-widget-14__content">
														<a href="#">
															<h3 class="kt-widget-14__title">DSLR Lens</h3>
														</a>
														<div class="kt-widget-14__desc">
															Wide-angle, Quick Focus. Emphasis is on modern lenses for 35 mm film SLRs and for DSLRs with sensor sizes less than or equal to 35 mm.
														</div>
													</div>
												</div>
												<div class="kt-widget-14__data">
													<div class="kt-widget-14__info">
														<div class="kt-widget-14__info-title kt-font-brand">142</div>
														<div class="kt-widget-14__desc">Purchases</div>
													</div>
													<div class="kt-widget-14__info">
														<div class="kt-widget-14__info-title">25</div>
														<div class="kt-widget-14__desc">Reviews</div>
													</div>
												</div>
											</div>
											<div class="kt-widget-14__foot">
												<div class="kt-widget-14__foot-info">
													<div class="kt-widget-14__foot-label btn btn-sm btn-label-brand btn-bold">
														24 Nov, 2018
													</div>
													<div class="kt-widget-14__foot-desc">Date of Release</div>
												</div>
												<div class="kt-widget-14__foot-toolbar">
													<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Preview</a>
													<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Details</a>
												</div>
											</div>
										</div>
										<div class="carousel-item">
											<div class="kt-widget-14__body">
												<div class="kt-widget-14__product">
													<div class="kt-widget-14__thumb">
														<a href="#"><img src="/media/blog/4.jpg" class="kt-widget-14__image--landscape" alt="" title="" /></a>
													</div>
													<div class="kt-widget-14__content">
														<a href="#">
															<h3 class="kt-widget-14__title">Polaroid Camera</h3>
														</a>
														<div class="kt-widget-14__desc">
															Instant is back! Make photos fun again with the new range of Polaroid Instant Cameras with Vintage Effects and Built in Flash
														</div>
													</div>
												</div>
												<div class="kt-widget-14__data">
													<div class="kt-widget-14__info">
														<div class="kt-widget-14__info-title kt-font-brand">3578</div>
														<div class="kt-widget-14__desc">Purchases</div>
													</div>
													<div class="kt-widget-14__info">
														<div class="kt-widget-14__info-title">457</div>
														<div class="kt-widget-14__desc">Reviews</div>
													</div>
												</div>
											</div>
											<div class="kt-widget-14__foot">
												<div class="kt-widget-14__foot-info">
													<div class="kt-widget-14__foot-label btn btn-sm btn-label-brand btn-bold">
														24 Nov, 2018
													</div>
													<div class="kt-widget-14__foot-desc">Date of Release</div>
												</div>
												<div class="kt-widget-14__foot-toolbar">
													<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Preview</a>
													<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!--end::Portlet-->

						<!--begin::Portlet-->
						<div class="kt-portlet kt-portlet--height-fluid-half kt-widget-15">
							<div class="kt-portlet__body">

								<!-- Doc: The bootstrap carousel is a slideshow for cycling through a series of content, see https://getbootstrap.com/docs/4.1/components/carousel/ -->
								<div id="kt-widget-slider-14-2" class="kt-slider carousel slide" data-ride="carousel" data-interval="8000">
									<div class="kt-slider__head">
										<div class="kt-slider__label">New Authors</div>
										<div class="kt-slider__nav">
											<a class="kt-slider__nav-prev carousel-control-prev" href="#kt-widget-slider-14-2" role="button" data-slide="prev">
												<i class="fa fa-angle-left"></i>
											</a>
											<a class="kt-slider__nav-next carousel-control-next" href="#kt-widget-slider-14-2" role="button" data-slide="next">
												<i class="fa fa-angle-right"></i>
											</a>
										</div>
									</div>
									<div class="carousel-inner">
										<div class="carousel-item active">
											<div class="kt-widget-15__body">
												<div class="kt-widget-15__author">
													<div class="kt-widget-15__photo">
														<a href="#"><img src="/media/users/100_14.jpg" alt="" title="" /></a>
													</div>
													<div class="kt-widget-15__detail">
														<a href="#" class="kt-widget-15__name">Andy John</a>
														<div class="kt-widget-15__desc">
															AngularJS Expert
														</div>
													</div>
												</div>
												<div class="kt-widget-15__wrapper">
													<div class="kt-widget-15__info">
														<a href="#" class="btn btn-icon btn-sm btn-circle btn-success"><i class="fa fa-envelope"></i></a>
														<a href="#" class="kt-widget-15__info--item">sale@boatline.com</a>
													</div>
													<div class="kt-widget-15__info">
														<a href="#" class="btn btn-icon btn-sm btn-circle btn-brand"><i class="fa fa-phone"></i></a>
														<a href="#" class="kt-widget-15__info--item">(+44) 345 345 4705</a>
													</div>
												</div>
											</div>
											<div class="kt-widget-15__foot">
												<div class="kt-widget-15__foot-info">
													<div class="kt-widget-15__foot-label btn btn-sm btn-label-brand btn-bold">
														01 Sep, 2018
													</div>
													<div class="kt-widget-15__foot-desc">Joined Date</div>
												</div>
												<div class="kt-widget-15__foot-toolbar">
													<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Message</a>
													<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Profile</a>
												</div>
											</div>
										</div>
										<div class="carousel-item">
											<div class="kt-widget-15__body">
												<div class="kt-widget-15__author">
													<div class="kt-widget-15__photo">
														<a href="#"><img src="/media/users/100_3.jpg" alt="" title="" /></a>
													</div>
													<div class="kt-widget-15__detail">
														<a href="#" class="kt-widget-15__name">Patrick Smith</a>
														<div class="kt-widget-15__desc">
															ReactJS Expert
														</div>
													</div>
												</div>
												<div class="kt-widget-15__wrapper">
													<div class="kt-widget-15__info">
														<a href="#" class="btn btn-icon btn-sm btn-circle btn-success"><i class="fa fa-envelope"></i></a>
														<a href="#" class="kt-widget-15__info--item">patrick@boatline.com</a>
													</div>
													<div class="kt-widget-15__info">
														<a href="#" class="btn btn-icon btn-sm btn-circle btn-brand"><i class="fa fa-phone"></i></a>
														<a href="#" class="kt-widget-15__info--item">(+44) 345 345 5574</a>
													</div>
												</div>
											</div>
											<div class="kt-widget-15__foot">
												<div class="kt-widget-15__foot-info">
													<div class="kt-widget-15__foot-label btn btn-sm btn-label-brand btn-bold">
														01 Sep, 2018
													</div>
													<div class="kt-widget-15__foot-desc">Joined Date</div>
												</div>
												<div class="kt-widget-15__foot-toolbar">
													<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Message</a>
													<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Profile</a>
												</div>
											</div>
										</div>
										<div class="carousel-item">
											<div class="kt-widget-15__body">
												<div class="kt-widget-15__author">
													<div class="kt-widget-15__photo">
														<a href="#"><img src="/media/users/100_7.jpg" alt="" title="" /></a>
													</div>
													<div class="kt-widget-15__detail">
														<a href="#" class="kt-widget-15__name">Amanda Collin</a>
														<div class="kt-widget-15__desc">
															Project Manager
														</div>
													</div>
												</div>
												<div class="kt-widget-15__wrapper">
													<div class="kt-widget-15__info">
														<a href="#" class="btn btn-icon btn-sm btn-circle btn-success"><i class="fa fa-envelope"></i></a>
														<a href="#" class="kt-widget-15__info--item">amanda@boatline.com</a>
													</div>
													<div class="kt-widget-15__info">
														<a href="#" class="btn btn-icon btn-sm btn-circle btn-brand"><i class="fa fa-phone"></i></a>
														<a href="#" class="kt-widget-15__info--item">(+44) 345 345 1247</a>
													</div>
												</div>
											</div>
											<div class="kt-widget-15__foot">
												<div class="kt-widget-15__foot-info">
													<div class="kt-widget-15__foot-label btn btn-sm btn-label-brand btn-bold">
														01 Sep, 2018
													</div>
													<div class="kt-widget-15__foot-desc">Joined Date</div>
												</div>
												<div class="kt-widget-15__foot-toolbar">
													<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Message</a>
													<a href="#" class="btn btn-default btn-sm btn-bold btn-upper">Profile</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!--end::Portlet-->
					</div>
					<div class="col-lg-12 col-xl-4 order-lg-2 order-xl-1">

						<!--begin::Portlet-->
						<div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
							<div class="kt-portlet__head">
								<div class="kt-portlet__head-label">
									<h3 class="kt-portlet__head-title">
										Work Progress
									</h3>
								</div>
								<div class="kt-portlet__head-toolbar">
									<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-bold" role="tablist">
										<li class="nav-item">
											<a class="nav-link active show" data-toggle="tab" href="#kt_portlet_tabs_1111_1_content" role="tab" aria-selected="false">
												Emails
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#kt_portlet_tabs_1111_2_content" role="tab" aria-selected="false">
												Tickets
											</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="kt-portlet__body">
								<div class="tab-content">
									<div class="tab-pane fade active show" id="kt_portlet_tabs_1111_1_content" role="tabpanel">
										<div class="kt-widget-11">
											<div class="kt-widget-11__item">
												<div class="kt-widget-11__wrapper">
													<div class="kt-widget-11__title">
														Pendings Tasks
													</div>
													<div class="kt-widget-11__value">
														78%
													</div>
												</div>
												<div class="kt-widget-11__progress">
													<div class="progress">

														<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
														<div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
											</div>
											<div class="kt-widget-11__item">
												<div class="kt-widget-11__wrapper">
													<div class="kt-widget-11__title">
														Completed Tasks
													</div>
													<div class="kt-widget-11__value">
														320&nbsp;/&nbsp;<span class="kt-opacity-5">780</span>
													</div>
												</div>
												<div class="kt-widget-11__progress">
													<div class="progress">

														<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
														<div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
											</div>
											<div class="kt-widget-11__item">
												<div class="kt-widget-11__wrapper">
													<div class="kt-widget-11__title">
														Tasks In Progress
													</div>
													<div class="kt-widget-11__value">
														45%
													</div>
												</div>
												<div class="kt-widget-11__progress">
													<div class="progress">

														<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
														<div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
											</div>
											<div class="kt-widget-11__item">
												<div class="kt-widget-11__wrapper">
													<div class="kt-widget-11__title">
														All Tasks
													</div>
													<div class="kt-widget-11__value">
														1200
													</div>
												</div>
												<div class="kt-widget-11__progress">
													<div class="progress">

														<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
														<div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
											</div>
											<div class="kt-widget-11__item">
												<div class="kt-widget-11__wrapper">
													<div class="kt-widget-11__title">
														Reports
													</div>
													<div class="kt-widget-11__value">
														40
													</div>
												</div>
												<div class="kt-widget-11__progress">
													<div class="progress">

														<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
														<div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="kt-margin-t-30 kt-align-center">
											<a href="#" class="btn btn-brand btn-upper btn-bold kt-align-center">Full Report</a>
										</div>
									</div>
									<div class="tab-pane fade" id="kt_portlet_tabs_1111_2_content" role="tabpanel">
										<div class="kt-widget-11">
											<div class="kt-widget-11__item">
												<div class="kt-widget-11__wrapper">
													<div class="kt-widget-11__title">
														Pendings Tasks
													</div>
													<div class="kt-widget-11__value">
														78%
													</div>
												</div>
												<div class="kt-widget-11__progress">
													<div class="progress">

														<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
														<div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
											</div>
											<div class="kt-widget-11__item">
												<div class="kt-widget-11__wrapper">
													<div class="kt-widget-11__title">
														Completed Tasks
													</div>
													<div class="kt-widget-11__value">
														320&nbsp;/&nbsp;<span class="kt-opacity-5">780</span>
													</div>
												</div>
												<div class="kt-widget-11__progress">
													<div class="progress">

														<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
														<div class="progress-bar bg-danger" role="progressbar" style="width: 58%" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
											</div>
											<div class="kt-widget-11__item">
												<div class="kt-widget-11__wrapper">
													<div class="kt-widget-11__title">
														Tasks In Progress
													</div>
													<div class="kt-widget-11__value">
														45%
													</div>
												</div>
												<div class="kt-widget-11__progress">
													<div class="progress">

														<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
														<div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
											</div>
											<div class="kt-widget-11__item">
												<div class="kt-widget-11__wrapper">
													<div class="kt-widget-11__title">
														All Tasks
													</div>
													<div class="kt-widget-11__value">
														1200
													</div>
												</div>
												<div class="kt-widget-11__progress">
													<div class="progress">

														<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
														<div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
											</div>
											<div class="kt-widget-11__item">
												<div class="kt-widget-11__wrapper">
													<div class="kt-widget-11__title">
														Reports
													</div>
													<div class="kt-widget-11__value">
														40
													</div>
												</div>
												<div class="kt-widget-11__progress">
													<div class="progress">

														<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
														<div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
													</div>
												</div>
											</div>
										</div>
										<div class="kt-margin-t-30 kt-align-center">
											<a href="#" class="btn btn-brand btn-upper btn-bold kt-align-center">Full Report</a>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!--end::Portlet-->
					</div>
					<div class="col-lg-12 col-xl-8 order-lg-2 order-xl-1">

						<!--begin::Portlet-->
						<div class="kt-portlet kt-portlet--height-fluid">
							<div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
								<div class="kt-portlet__head-label">
									<h3 class="kt-portlet__head-title">Recent Orders <small>32500 total</small></h3>
								</div>
								<div class="kt-portlet__head-toolbar">
									<div class="kt-portlet__head-wrapper kt-form">
										<div class="kt-form__group kt-form__group--inline kt-margin-r-10">
											<div class="kt-form__label">Sort By:</div>
											<div class="kt-form__control" style="width: 160px;">
												<select class="form-control bootstrap-select" id="kt_form_status" title="Status">
													<option value="1">Pending</option>
													<option value="2">Delivered</option>
													<option value="3">Canceled</option>
													<option value="4">Success</option>
													<option value="5">Info</option>
													<option value="6">Danger</option>
												</select>
											</div>
										</div>
										<a href="#" class="btn btn-brand btn-upper btn-bold">New Record</a>
									</div>
								</div>
							</div>
							<div class="kt-portlet__body kt-portlet__body--fit">

								<!--Doc: For the datatable initialization refer to "recentOrdersInit" function in "src\theme\app\scripts\custom\dashboard.js" -->
								<div class="kt-datatable" id="kt_recent_orders"></div>
							</div>
						</div>

						<!--end::Portlet-->
					</div>
				</div>

				<!--end::Row-->

				<!--end::Dashboard 5-->
			</div>

			<!-- end:: Content -->
		</div>
	</div>
</div>
@endsection