		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">



                <div class="row">
					<div class="col-xl-3 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-primary">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
										<IMG SRC="http://doortoken.org/app/images/logo.png">
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1">Door Tokens</p>
										<h3 class="text-white">76</h3>
									</div>
								</div>
							</div>
						</div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-success">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-lock-1"></i>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1">Usage</p>
										<h3 class="text-white">26</h3>
									</div>
								</div>
							</div>
						</div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-info">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-list"></i>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1">Lists</p>
										<h3 class="text-white">2</h3>
									</div>
								</div>
							</div>
						</div>
                    </div>

                    <div class="col-xl-3 col-lg-6 col-sm-6">
						<div class="widget-stat card bg-warning">
							<div class="card-body  p-4">
								<div class="media">
									<span class="mr-3">
										<i class="flaticon-381-home"></i>
									</span>
									<div class="media-body text-white text-right">
										<p class="mb-1">Properties</p>
										<h3 class="text-white">1</h3>
									</div>
								</div>
							</div>
						</div>
                    </div>




				</div>

                <div class="row">

					<div class="col-xl-12 col-xxl-12 col-lg-12">
						<div class="card">
							<div class="card-header d-sm-flex d-block pb-0 border-0">
								<div>
									<h4 class="text-black fs-20">How much your Property Data is being Used</h4>
									<p class="fs-13 mb-0">Everytime an advertiser accesses your data it is tracked and you earn door tokens.</p>
								</div>
								<!--<div class="dropdown mt-sm-0 mt-3">
                                    <button type="button" class="btn rounded-0 text-black bgl-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										2021
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Day</a>
                                    </div>
                                </div>-->
							</div>
							<div class="card-body" id="user-activity">

								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="user" role="tabpanel">
										<canvas id="activityLine" height="350"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>


                   <div class="row">

					<div class="col-xl-12 col-xxl-12 col-lg-12">
						<div class="card">
							<div class="card-header d-sm-flex d-block pb-0 border-0">
								<div>
									<h4 class="text-black fs-20">How much Property Data you have Accessed</h4>
									<p class="fs-13 mb-0">Thw following graph tracks how much property data you are accessing each day.</p>
								</div>
								<!--<div class="dropdown mt-sm-0 mt-3">
                                    <button type="button" class="btn rounded-0 text-black bgl-light dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										2021
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Week</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Last Day</a>
                                    </div>
                                </div>-->
							</div>
							<div class="card-body" id="data-activity">
								   <div id="simple-line-chart" class="ct-chart ct-golden-section chartlist-chart" ></div>
							</div>
						</div>
					</div>

				</div>

                <div class="row">


                      <div class="alert alert-primary alert-dismissible fade show">
                                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                    <strong>INTERNAL NOTES:</strong> This dashboard should have basic summary data for the user.
                                </div>

                    </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
