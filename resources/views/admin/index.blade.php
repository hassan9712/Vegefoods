@extends('layouts.admin')

@section('content')
<div class="container-fluid">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
    <!--Start Dashboard Content-->
    
    <div class="row mt-3">
      <div class="col-12 col-lg-6 col-xl-4">
        <div class="card gradient-ibiza">
          <div class="card-body">
            <div class="media align-items-center">
            <div class="media-body">
               <p class="text-white">Total Sales</p>
              <h4 class="text-white line-height-5">85,297</h4>
            </div>
            <div class=""><span id="dashboard2-chart-1"></span></div>
          </div>
          </div>
          <div class="card-footer border-light-2">
            <p class="mb-0 text-white">
                  <span class="mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                  <span class="text-nowrap">Since last month</span>
                </p>
          </div>
        </div>
      </div>

      <div class="col-12 col-lg-6 col-xl-4">
        <div class="card gradient-branding">
          <div class="card-body">
            <div class="media align-items-center">
            <div class="media-body">
               <p class="text-white">Total Revenue</p>
              <h4 class="text-white line-height-5">$4897</h4>
            </div>
            <div class=""><span id="dashboard2-chart-2"></span></div>
          </div>
          </div>
          <div class="card-footer border-light-2">
            <p class="mb-0 text-white">
                  <span class="mr-2"><i class="fa fa-arrow-up"></i> 5.28%</span>
                  <span class="text-nowrap">Since last month</span>
                </p>
          </div>
        </div>
      </div>

      <div class="col-12 col-lg-12 col-xl-4">
        <div class="card gradient-deepblue">
          <div class="card-body">
            <div class="media align-items-center">
            <div class="media-body">
               <p class="text-white">New Users</p>
              <h4 class="text-white line-height-5">6,500</h4>
            </div>
            <div class=""><span id="dashboard2-chart-3"></span></div>
          </div>
          </div>
          <div class="card-footer border-light-2">
            <p class="mb-0 text-white">
                  <span class="mr-2"><i class="fa fa-arrow-up"></i> 1.48%</span>
                  <span class="text-nowrap">Since last week</span>
                </p>
          </div>
        </div>
      </div>
      
    </div><!--End Row-->

        
    <div class="row">
      <div class="col-12 col-lg-12 col-xl-12">
        <div class="card">
             <div class="card-header">
              <i class="fa fa-line-chart"></i> Sales Report 
                  <div class="card-action">

            <div class="form-group mb-0">
              <select class="form-control form-control-sm">
                <option>Jan 18</option>
                <option>Feb 18</option>
                <option>Mar 18</option>
                <option>Apr 18</option>
                <option>May 18</option>
                <option>Jun 18</option>
                <option>Jul 18</option>
                <option>Aug 18</option>
                <option selected>Sept 18</option>
              </select>
            </div>
                   </div>
                  </div>
               <div class="card-body">
                 <canvas id="dashboard2-chart-4" height="100"></canvas>
               </div>
        </div>
      </div>
      
    </div><!--End Row-->


    <div class="row">
       <div class="col-12 col-lg-6 col-xl-8">
         <div class="card">
           <div class="card-header">
            Worlwide Customers
          <div class="card-action">
           <div class="dropdown">
           <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
            <i class="icon-options"></i>
           </a>
            <div class="dropdown-menu dropdown-menu-right">
              <a class="dropdown-item" href="javascript:void();">Action</a>
              <a class="dropdown-item" href="javascript:void();">Another action</a>
              <a class="dropdown-item" href="javascript:void();">Something else here</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="javascript:void();">Separated link</a>
             </div>
            </div>
           </div>
          </div>
          <div class="card-body">
            <div id="dashboard-map" style="height: 330px"></div>
          </div>
         </div>
       </div>
       <div class="col-12 col-lg-6 col-xl-4">
         <div class="card">
            <div class="card-header">Sales By Countries</div>
            <div class="card-body">
               <div class="media align-items-center">
                 <div><i class="flag-icon flag-icon-us fa-2x rounded"></i></div>
                   <div class="media-body text-left ml-3">
                     <div class="progress-wrapper">
                       <p>USA <span class="float-right">65$</span></p>
                       <div class="progress" style="height: 7px;">
                        <div class="progress-bar gradient-branding" style="width:65%"></div>
                       </div>
                      </div>                   
                  </div>
                </div>
                <hr>
                <div class="media align-items-center">
                 <div><i class="flag-icon flag-icon-ca fa-2x rounded"></i></div>
                   <div class="media-body text-left ml-3">
                     <div class="progress-wrapper">
                       <p>Canada <span class="float-right">50$</span></p>
                       <div class="progress" style="height: 7px;">
                        <div class="progress-bar gradient-ibiza" style="width:50%"></div>
                       </div>
                      </div>                   
                  </div>
                </div>
                <hr>
                <div class="media align-items-center">
                 <div><i class="flag-icon flag-icon-gb fa-2x rounded"></i></div>
                   <div class="media-body text-left ml-3">
                     <div class="progress-wrapper">
                       <p>England <span class="float-right">70$</span></p>
                       <div class="progress" style="height: 7px;">
                        <div class="progress-bar gradient-deepblue" style="width:70%"></div>
                       </div>
                      </div>                   
                  </div>
                </div>
                 <hr>
                <div class="media align-items-center">
                 <div><i class="flag-icon flag-icon-in fa-2x rounded"></i></div>
                   <div class="media-body text-left ml-3">
                     <div class="progress-wrapper">
                       <p>India <span class="float-right">35$</span></p>
                       <div class="progress" style="height: 7px;">
                        <div class="progress-bar gradient-scooter" style="width:35%"></div>
                       </div>
                      </div>                   
                  </div>
                </div>
                <hr>
                <div class="media align-items-center">
                 <div><i class="flag-icon flag-icon-au fa-2x rounded"></i></div>
                   <div class="media-body text-left ml-3">
                     <div class="progress-wrapper">
                       <p>Australia <span class="float-right">15$</span></p>
                       <div class="progress" style="height: 7px;">
                        <div class="progress-bar gradient-shifter" style="width:25%"></div>
                       </div>
                      </div>                   
                  </div>
                </div>
            </div>
          </div>
       </div>
    </div><!--End Row-->


    <div class="card">
      <div class="card-content">
        <div class="row row-group m-0">
          <div class="col-12 col-lg-6 col-xl-3">
            <div class="card-body">
               <div class="media align-items-center">
                <div class="media-body">
                  <p class="text-primary">Total Likes</p>
                  <h4 class="line-height-5">7450</h4>
                </div>
                <div class="w-circle-icon rounded border border-primary shadow-primary">
                  <i class="fa fa-heart text-primary"></i></div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6 col-xl-3">
            <div class="card-body">
               <div class="media align-items-center">
                <div class="media-body">
                  <p class="text-success">Comments</p>
                  <h4 class="line-height-5">4550</h4>
                </div>
                <div class="w-circle-icon rounded border border-success shadow-success">
                  <i class="fa fa-comment text-success"></i></div>
              </div>
            </div>
          </div>
          <div class="col-12 col-lg-6 col-xl-3">
            <div class="card-body">
               <div class="media align-items-center">
                <div class="media-body">
                  <p class="text-secondary">Total Shares</p>
                  <h4 class="line-height-5">8430</h4>
                </div>
                <div class="w-circle-icon rounded border border-secondary shadow-secondary">
                  <i class="fa fa-share text-secondary"></i></div>
              </div>
            </div>
          </div>
           <div class="col-12 col-lg-6 col-xl-3">
            <div class="card-body">
               <div class="media align-items-center">
                <div class="media-body">
                  <p class="text-info">Total Posts</p>
                  <h4 class="line-height-5">6850</h4>
                </div>
                <div class="w-circle-icon rounded border border-info shadow-info">
                  <i class="fa fa-pencil text-info"></i></div>
              </div>
            </div>
          </div>
        </div><!--End Row-->
      </div>
    </div>

    
    <div class="row">
      <div class="col-12 col-lg-6 col-xl-6">
        <div class="card">
         <div class="card-header">
              Top Categories
              <div class="card-action">
               <div class="dropdown">
               <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                <i class="icon-options"></i>
               </a>
                  <div class="dropdown-menu animated fadeIn dropdown-menu-right">
                      <a class="dropdown-item" href="javascript:void();">Action</a>
                      <a class="dropdown-item" href="javascript:void();">Another action</a>
                      <a class="dropdown-item" href="javascript:void();">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="javascript:void();">Separated link</a>
                   </div>
                </div>
               </div>
            </div>
           <div class="card-body">
              <canvas id="dashboard2-chart-5"></canvas>
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-6 col-xl-6">
        <div class="card gradient-deepblue">
         <div class="card-header bg-transparent text-white border-light-2">
              Visitor Status
              <div class="card-action">
               <div class="dropdown">
               <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                <i class="icon-options text-white"></i>
               </a>
                  <div class="dropdown-menu animated fadeIn dropdown-menu-right">
                      <a class="dropdown-item" href="javascript:void();">Action</a>
                      <a class="dropdown-item" href="javascript:void();">Another action</a>
                      <a class="dropdown-item" href="javascript:void();">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="javascript:void();">Separated link</a>
                   </div>
                </div>
               </div>
            </div>
           <div class="card-body">
              <canvas id="dashboard2-chart-6"></canvas>
          </div>
        </div>
      </div>
    </div><!--End Row-->
    

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
        <div class="card-header border-0">
              Recent Orders Table
              <div class="card-action">
               <div class="dropdown">
               <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
                <i class="icon-options"></i>
               </a>
                  <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="javascript:void();">Action</a>
                      <a class="dropdown-item" href="javascript:void();">Another action</a>
                      <a class="dropdown-item" href="javascript:void();">Something else here</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="javascript:void();">Separated link</a>
                   </div>
                </div>
               </div>
              </div>
             <div class="table-responsive">
             
               <table class="table align-items-center table-flush">
                <thead>
                 <tr>
                   <th>Action</th>
                   <th>Product</th>
                   <th>Photo</th>
                   <th>Product ID</th>
                   <th>Status</th>
                   <th>Amount</th>
                   <th>Completion</th>
                 </tr>
                 </thead>
                 <tr>
                  <td>
                     <div class="icheck-material-primary">
                      <input type="checkbox" id="check1"/>
                      <label for="check1"></label>
                    </div>
                  </td>
                  <td>Iphone 5</td>
                  <td><img src="{{asset('images/products/01.png')}}" class="product-img" alt="product img"></td>
                  <td>#9405822</td>
                  <td><span class="btn btn-sm btn-outline-success btn-round btn-block">Paid</span></td>
                  <td>$ 1250.00</td>
                  <td><div class="progress shadow" style="height: 4px;">
                        <div class="progress-bar gradient-ohhappiness" role="progressbar" style="width: 100%"></div>
                     </div></td>
                 </tr>

                 <tr>
                  <td>
                     <div class="icheck-material-primary">
                      <input type="checkbox" id="check2"/>
                      <label for="check2"></label>
                    </div>
                  </td>
                  <td>Earphone GL</td>
                  <td><img src="{{asset('images/products/02.png')}}" class="product-img" alt="product img"></td>
                  <td>#9405820</td>
                  <td><span class="btn btn-sm btn-outline-info btn-round btn-block">Pending</span></td>
                  <td>$ 1500.00</td>
                  <td><div class="progress shadow" style="height: 4px;">
                        <div class="progress-bar gradient-scooter" role="progressbar" style="width: 80%"></div>
                     </div></td>
                 </tr>

                 <tr>
                  <td>
                     <div class="icheck-material-primary">
                      <input type="checkbox" id="check3"/>
                      <label for="check3"></label>
                    </div>
                  </td>
                  <td>HD Hand Camera</td>
                  <td><img src="{{asset('images/products/03.png')}}" class="product-img" alt="product img"></td>
                  <td>#9405830</td>
                  <td><span class="btn btn-sm btn-outline-danger btn-round btn-block">Failed</span></td>
                  <td>$ 1400.00</td>
                  <td><div class="progress shadow" style="height: 4px;">
                        <div class="progress-bar gradient-ibiza" role="progressbar" style="width: 60%"></div>
                     </div></td>
                 </tr>

                 <tr>
                  <td>
                     <div class="icheck-material-primary">
                      <input type="checkbox" id="check4"/>
                      <label for="check4"></label>
                    </div>
                  </td>
                  <td>Clasic Shoes</td>
                  <td><img src="{{asset('images/products/04.png')}}" class="product-img" alt="product img"></td>
                  <td>#9405825</td>
                  <td><span class="btn btn-sm btn-outline-success btn-round btn-block">Paid</span></td>
                  <td>$ 1200.00</td>
                  <td><div class="progress shadow" style="height: 4px;">
                        <div class="progress-bar gradient-ohhappiness" role="progressbar" style="width: 100%"></div>
                     </div></td>
                 </tr>

                 <tr>
                  <td>
                     <div class="icheck-material-primary">
                      <input type="checkbox" id="check5"/>
                      <label for="check5"></label>
                    </div>
                  </td>
                  <td>Hand Watch</td>
                  <td><img src="{{asset('images/products/05.png')}}" class="product-img" alt="product img"></td>
                  <td>#9405840</td>
                  <td><span class="btn btn-sm btn-outline-danger btn-round btn-block">Failed</span></td>
                  <td>$ 1800.00</td>
                  <td><div class="progress shadow" style="height: 4px;">
                        <div class="progress-bar gradient-ibiza" role="progressbar" style="width: 75%"></div>
                     </div></td>
                 </tr>

                  <tr>
                    <td>
                     <div class="icheck-material-primary">
                      <input type="checkbox" id="check6"/>
                      <label for="check6"></label>
                    </div>
                  </td>
                  <td>HD Hand Camera</td>
                  <td><img src="{{asset('images/products/03.png')}}" class="product-img" alt="product img"></td>
                  <td>#9405830</td>
                  <td><span class="btn btn-sm btn-outline-info btn-round btn-block">Pending</span></td>
                  <td>$ 1400.00</td>
                  <td><div class="progress shadow" style="height: 4px;">
                        <div class="progress-bar gradient-scooter" role="progressbar" style="width: 70%"></div>
                     </div></td>
                 </tr>

               </table>
             </div>
        </div>
      </div>
    </div><!--End Row-->


    <!--End Dashboard Content-->

  </div>
  <!-- End container-fluid-->
@endsection