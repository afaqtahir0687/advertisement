@extends('frontend.layouts.master')
@section('content')
    <main class="main">
			<div class="page-header">
				<div class="container d-flex flex-column align-items-center">
					<nav aria-label="breadcrumb" class="breadcrumb-nav">
						<div class="container">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">{{ __('messages.home') }}</a></li>
								<li class="breadcrumb-item"><a href="#">{{ __('messages.shop') }}</a></li>
								<li class="breadcrumb-item active" aria-current="page">
									{{ __('messages.my_account') }}
								</li>
							</ol>
						</div>
					</nav>

					<h1>{{ __('messages.my_account') }}</h1>
				</div>
			</div>

			<div class="container account-container custom-account-container mt-5">
				<div class="row">
					<div class="sidebar widget widget-dashboard mb-lg-0 mb-3 col-lg-3 order-0">
						<h2 class="text-uppercase">{{ __('messages.my_account') }}</h2>
						<ul class="nav nav-tabs list flex-column mb-0" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard"
									role="tab" aria-controls="dashboard" aria-selected="true">{{ __('messages.dashboard') }}</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" id="order-tab" data-toggle="tab" href="#order" role="tab"
									aria-controls="order" aria-selected="true">{{ __('messages.orders') }}</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" id="download-tab" data-toggle="tab" href="#download" role="tab"
									aria-controls="download" aria-selected="false">{{ __('messages.downloads') }}</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab"
									aria-controls="address" aria-selected="false">{{ __('messages.addresses') }}</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab"
									aria-controls="edit" aria-selected="false">{{ __('messages.account_details') }}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="shop-address-tab" data-toggle="tab" href="#shipping" role="tab"
									aria-controls="edit" aria-selected="false">{{ __('messages.shopping_address') }}</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">{{ __('messages.wishlist') }}</a>
							</li>

                            <li class="nav-item">
								<a class="nav-link" href="#">{{ __('messages.logout') }}</a>
							</li>
							{{-- <li class="nav-item">
								<form action="{{ route('logout') }}" method="POST">
									@csrf
									<button type="submit" class="nav-link btn btn-link p-0" style="cursor:pointer;">
										Logout
									</button>
								</form>
							</li> --}}

						</ul>
					</div>
					<div class="col-lg-9 order-lg-last order-1 tab-content">
						<div class="tab-pane fade show active" id="dashboard" role="tabpanel">
							<div class="dashboard-content">
								<p>
									{{ __('messages.hello') }} <strong class="text-dark">Editor</strong> ({{ __('messages.not') }}
									<strong class="text-dark">Editor</strong>?
									<a href="#" class="btn btn-link ">{{ __('messages.logout') }}</a>)
								</p>

								<p>
									{{ __('messages.dashboard_intro') }}
									<a  href="#order">{{ __('messages.recent_orders') }}</a>,
									{{ __('messages.manage_addresses') }}, {{ __('messages.and') }}
									<a href="#edit">{{ __('messages.edit_account') }}</a>
								</p>

								<div class="mb-4"></div>

								<div class="row row-lg">
									<div class="col-6 col-md-4">
										<div class="feature-box text-center pb-4">
											<a href="#order" class="link-to-tab"><i class="fab fa-first-order"></i></a>
											<div class="feature-box-content">
												<h3>{{ __('messages.orders') }}</h3>
											</div>
										</div>
									</div>

									<div class="col-6 col-md-4">
										<div class="feature-box text-center pb-4">
											<a href="#download" class="link-to-tab"><i class="fas fa-cloud-download-alt"></i></a>
											<div class=" feature-box-content">
												<h3>{{ __('messages.downloads') }}</h3>
											</div>
										</div>
									</div>

									<div class="col-6 col-md-4">
										<div class="feature-box text-center pb-4">
											<a href="#address" class="link-to-tab"><i
										class="icon-location"></i></a>
											<div class="feature-box-content">
												<h3>{{ __('messages.addresses') }}</h3>
											</div>
										</div>
									</div>

									<div class="col-6 col-md-4">
										<div class="feature-box text-center pb-4">
											<a href="#edit" class="link-to-tab"><i class="icon-user-2"></i></a>
											<div class="feature-box-content p-0">
												<h3>{{ __('messages.account_details') }}</h3>
											</div>
										</div>
									</div>

									<div class="col-6 col-md-4">
										<div class="feature-box text-center pb-4">
											<a href="#"><i class="far fa-heart"></i></a>
											<div class="feature-box-content">
												<h3>{{ __('messages.wishlist') }}</h3>
											</div>
										</div>
									</div>

									<div class="col-6 col-md-4">
										<div class="feature-box text-center pb-4">
											<a href="#"><i class="fas fa-sign-out-alt"></i></a>
											<div class="feature-box-content">
												<h3>{{ __('messages.logout') }}</h3>
											</div>
										</div>
									</div>
								</div><!-- End .row -->
							</div>
						</div><!-- End .tab-pane -->

						<div class="tab-pane fade" id="order" role="tabpanel">
							<div class="order-content">
								<h3 class="account-sub-title d-none d-md-block"><i
										class="sicon-social-dropbox align-middle mr-3"></i>Orders</h3>
								<div class="order-table-container text-center">
									<table class="table table-order text-left">
										<thead>
											<tr>
												<th class="order-id">{{ __('messages.orders') }}</th>
												<th class="order-date">{{ __('messages.date') }}</th>
												<th class="order-status">{{ __('messages.status') }}</th>
												<th class="order-price">{{ __('messages.total') }}</th>
												<th class="order-action">{{ __('messages.actions') }}</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td class="text-center p-0" colspan="5">
													<p class="mb-5 mt-5">
														{{ __('messages.no_order_msg') }}
													</p>
												</td>
											</tr>
										</tbody>
									</table>
									<hr class="mt-0 mb-3 pb-2" />

									<a href="£" class="btn btn-dark">{{ __('messages.go_shop') }}</a>
								</div>
							</div>
						</div><!-- End .tab-pane -->

						<div class="tab-pane fade" id="download" role="tabpanel">
							<div class="download-content">
								<h3 class="account-sub-title d-none d-md-block"><i
										class="sicon-cloud-download align-middle mr-3"></i>Downloads</h3>
								<div class="download-table-container">
									<p>{{ __('messages.no_downloads_msg') }}</p> <a href="#"
										class="btn btn-primary text-transform-none mb-2">{{ __('messages.go_shop') }}</a>
								</div>
							</div>
						</div><!-- End .tab-pane -->

						<div class="tab-pane fade" id="address" role="tabpanel">
							<h3 class="account-sub-title d-none d-md-block mb-1"><i
									class="sicon-location-pin align-middle mr-3"></i>Addresses</h3>
							<div class="addresses-content">
								<p class="mb-4">
									{{ __('messages.default_checkout_msg') }}
								</p>

								<div class="row">
									<div class="address col-md-6">
										<div class="heading d-flex">
											<h4 class="text-dark mb-0">{{ __('messages.billing_address') }}</h4>
										</div>

										<div class="address-box">
											You have not set up this type of address yet.
										</div>

										<a href="#billing" class="btn btn-default address-action link-to-tab">{{ __('messages.add_address') }}</a>
									</div>

									<div class="address col-md-6 mt-5 mt-md-0">
										<div class="heading d-flex">
											<h4 class="text-dark mb-0">
												{{ __('messages.shipping_address') }}
											</h4>
										</div>

										<div class="address-box">
											You have not set up this type of address yet.
										</div>

										<a href="#shipping" class="btn btn-default address-action link-to-tab">{{ __('messages.add_address') }}</a>
									</div>
								</div>
							</div>
						</div><!-- End .tab-pane -->

						<div class="tab-pane fade" id="edit" role="tabpanel">
							<h3 class="account-sub-title d-none d-md-block mt-0 pt-1 ml-1"><i
									class="icon-user-2 align-middle mr-3 pr-1"></i>Account Details</h3>
							<div class="account-content">
								<form action="#">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="acc-name">{{ __('messages.first_name') }} <span class="required">*</span></label>
												<input type="text" class="form-control" placeholder="Editor"
													id="acc-name" name="acc-name" required />
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label for="acc-lastname">{{ __('messages.last_name') }} <span
														class="required">*</span></label>
												<input type="text" class="form-control" id="acc-lastname"
													name="acc-lastname" required />
											</div>
										</div>
									</div>

									<div class="form-group mb-2">
										<label for="acc-text">{{ __('messages.display_name') }} <span class="required">*</span></label>
										<input type="text" class="form-control" id="acc-text" name="acc-text"
											placeholder="Editor" required />
										<p>{{ __('messages.display_name_hint') }}</p>
									</div>


									<div class="form-group mb-4">
										<label for="acc-email">{{ __('messages.email_address') }} <span class="required">*</span></label>
										<input type="email" class="form-control" id="acc-email" name="acc-email"
											placeholder="editor@gmail.com" required />
									</div>

									<div class="change-password">
										<h3 class="text-uppercase mb-2">{{ __('messages.password_change') }}</h3>

										<div class="form-group">
											<label for="acc-password">{{ __('messages.current_password') }}</label>
											<input type="password" class="form-control" id="acc-password"
												name="acc-password" />
										</div>

										<div class="form-group">
											<label for="acc-password">{{ __('messages.new_password') }}</label>
											<input type="password" class="form-control" id="acc-new-password"
												name="acc-new-password" />
										</div>

										<div class="form-group">
											<label for="acc-password">{{ __('messages.confirm_new_password') }}</label>
											<input type="password" class="form-control" id="acc-confirm-password"
												name="acc-confirm-password" />
										</div>
									</div>

									<div class="form-footer mt-3 mb-0">
										<button type="submit" class="btn btn-dark mr-0">
											Save changes
										</button>
									</div>
								</form>
							</div>
						</div><!-- End .tab-pane -->

						<div class="tab-pane fade" id="billing" role="tabpanel">
							<div class="address account-content mt-0 pt-2">
								<h4 class="title">{{ __('messages.billing_address') }}</h4>

								<form class="mb-2" action="#">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>First name <span class="required">*</span></label>
												<input type="text" class="form-control" required />
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label>Last name <span class="required">*</span></label>
												<input type="text" class="form-control" required />
											</div>
										</div>
									</div>

									<div class="form-group">
										<label>{{ __('messages.company') }} </label>
										<input type="text" class="form-control">
									</div>

									<div class="select-custom">
										<label>{{ __('messages.country_region') }} <span class="required">*</span></label>
										<select name="orderby" class="form-control">
											<option value="" selected="selected">British Indian Ocean Territory
											</option>
											<option value="1">Brunei</option>
											<option value="2">Bulgaria</option>
											<option value="3">Burkina Faso</option>
											<option value="4">Burundi</option>
											<option value="5">Cameroon</option>
										</select>
									</div>

									<div class="form-group">
										<label>{{ __('messages.street_address') }} <span class="required">*</span></label>
										<input type="text" class="form-control"
											placeholder="{{ __('messages.street_address_placeholder') }}" required />
										<input type="text" class="form-control"
											placeholder="{{ __('messages.apartment_suite_placeholder') }}" required />
									</div>

									<div class="form-group">
										<label>{{ __('messages.town_city') }} <span class="required">*</span></label>
										<input type="text" class="form-control" required />
									</div>

									<div class="form-group">
										<label>{{ __('messages.state_country') }} <span class="required">*</span></label>
										<input type="text" class="form-control" required />
									</div>

									<div class="form-group">
										<label>{{ __('messages.postcode_zip') }} <span class="required">*</span></label>
										<input type="text" class="form-control" required />
									</div>

									<div class="form-group mb-3">
										<label>{{ __('messages.phone') }} <span class="required">*</span></label>
										<input type="number" class="form-control" required />
									</div>

									<div class="form-group mb-3">
										<label>{{ __('messages.email_address') }} <span class="required">*</span></label>
										<input type="email" class="form-control" placeholder="{{ __('messages.example_email') }}"
											required />
									</div>

									<div class="form-footer mb-0">
										<div class="form-footer-right">
											<button type="submit" class="btn btn-dark py-4">
												Save Address
											</button>
										</div>
									</div>
								</form>
							</div>
						</div><!-- End .tab-pane -->

						<div class="tab-pane fade" id="shipping" role="tabpanel">
							<div class="address account-content mt-0 pt-2">
								<h4 class="title mb-3">{{ __('messages.shipping_address') }}</h4>

								<form class="mb-2" action="#">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label>First name <span class="required">*</span></label>
												<input type="text" class="form-control" required />
											</div>
										</div>

										<div class="col-md-6">
											<div class="form-group">
												<label>Last name <span class="required">*</span></label>
												<input type="text" class="form-control" required />
											</div>
										</div>
									</div>

									<div class="form-group">
										<label>{{ __('messages.company') }} </label>
										<input type="text" class="form-control">
									</div>

									<div class="select-custom">
										<label>{{ __('messages.country_region') }} <span class="required">*</span></label>
										<select name="orderby" class="form-control">
											<option value="" selected="selected">British Indian Ocean Territory
											</option>
											<option value="1">Brunei</option>
											<option value="2">Bulgaria</option>
											<option value="3">Burkina Faso</option>
											<option value="4">Burundi</option>
											<option value="5">Cameroon</option>
										</select>
									</div>

									<div class="form-group">
										<label>{{ __('messages.street_address') }} <span class="required">*</span></label>
										<input type="text" class="form-control"
											placeholder="{{ __('messages.street_address_placeholder') }}" required />
										<input type="text" class="form-control"
											placeholder="{{ __('messages.apartment_suite_placeholder') }}" required />
									</div>

									<div class="form-group">
										<label>{{ __('messages.town_city') }} <span class="required">*</span></label>
										<input type="text" class="form-control" required />
									</div>

									<div class="form-group">
										<label>{{ __('messages.state_country') }} <span class="required">*</span></label>
										<input type="text" class="form-control" required />
									</div>

									<div class="form-group">
										<label>{{ __('messages.postcode_zip') }} <span class="required">*</span></label>
										<input type="text" class="form-control" required />
									</div>

									<div class="form-footer mb-0">
										<div class="form-footer-right">
											<button type="submit" class="btn btn-dark py-4">
												Save Address
											</button>
										</div>
									</div>
								</form>
							</div>
						</div><!-- End .tab-pane -->
					</div><!-- End .tab-content -->
				</div><!-- End .row -->
			</div><!-- End .container -->

			<div class="mb-5"></div><!-- margin -->
		</main><!-- End .main -->
@endsection
