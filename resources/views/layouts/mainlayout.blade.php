<!DOCTYPE html>
<html lang="en">

	@include('layouts.partials.head')

	<body class="kt-page--fixed kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header--minimize-menu kt-subheader--enabled kt-subheader--transparent kt-page--loading">

		@include('layouts.partials.header-mobile')
		
		<div class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper " id="kt_wrapper">

					@include('layouts.partials.header')
					
					@yield('content')

					@include('layouts.partials.footer')
					
				</div>
			</div>
		</div>

		<!-- begin:: Topbar Offcanvas Panels -->
		
		@include('layouts.partials.quick-actions')
		
		@include('layouts.partials.quick-panel')

		<!-- end:: Topbar Offcanvas Panels -->

		

		<!-- begin:: Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="la la-arrow-up"></i>
		</div>
		<!-- end:: Scrolltop -->

		@include('layouts.partials.footer-scripts')

		<!--begin::Page Scripts(used by individual page) -->
		@yield('page-footer-scripts')
		<!--end::Page Scripts -->
	</body>
</html>