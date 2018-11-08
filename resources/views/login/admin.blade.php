@extends('login.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-6">
            <div class="row row-in">
                <!-- /.col -->
                <!--col -->
                <div class="col-lg-6 col-sm-12">
                    <div class="white-box">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                <h5 class="text-muted vb">MYNEW CLIENTS</h5> </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-danger">23</h3> </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <!--col -->
                <div class="col-lg-6 col-sm-12">
                    <div class="white-box">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe01b;"></i>
                                <h5 class="text-muted vb">NEW PROJECTS</h5> </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-megna">169</h3> </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-megna" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <!--col -->
                <div class="col-lg-6 col-sm-12">
                    <div class="white-box">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe00b;"></i>
                                <h5 class="text-muted vb">NEW INVOICES</h5> </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-primary">157</h3> </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
                <!--col -->
                <div class="col-lg-6 col-sm-12">
                    <div class="white-box">
                        <div class="col-in row">
                            <div class="col-md-6 col-sm-6 col-xs-6"> <i class="linea-icon linea-basic" data-icon="&#xe016;"></i>
                                <h5 class="text-muted vb">All PROJECTS</h5> </div>
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <h3 class="counter text-right m-t-15 text-success">431</h3> </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Yearly Sales</h3>
                <ul class="list-inline text-right">
                    <li>
                        <h5><i class="fa fa-circle m-r-5" style="color: #aec9cb;"></i>iPhone</h5> </li>
                    <li>
                        <h5><i class="fa fa-circle m-r-5" style="color: #cbb2ae;"></i>iPad</h5> </li>
                    <li>
                        <h5><i class="fa fa-circle m-r-5" style="color: #85b4d0;"></i>iPod</h5> </li>
                </ul>
                <div id="morris-area-chart" style="height: 240px;"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5 col-lg-3 col-sm-6 col-xs-12">
            <div class="bg-theme-dark m-b-15">
                <div class="row weather p-20">
                    <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 m-t-40 p-t-20">
                        <h3>&nbsp;</h3>
                        <h1>73<sup>°F</sup></h1>
                        <p class="text-white">AHMEDABAD, INDIA</p>
                    </div>
                    <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 text-right"> <i class="wi wi-day-cloudy-high"></i>
                        <br/>
                        <br/> <b class="text-white">SUNNEY DAY</b>
                        <p class="w-title-sub">April 14</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5 col-lg-3 col-sm-6 col-xs-12">
            <div class="bg-theme m-b-15">
                <div id="myCarouse2" class="carousel vcarousel slide p-20">
                    <!-- Carousel items -->
                    <div class="carousel-inner ">
                        <div class="active item">
                            <h3 class="text-white">My Acting blown <span class="font-bold">Your Mind</span> and you also laugh at the moment</h3>
                            <div class="twi-user"><img src="../plugins/images/users/hritik.jpg" alt="user" class="img-circle img-responsive pull-left">
                                <h4 class="text-white m-b-0">Govinda</h4>
                                <p class="text-white">Actor</p>
                            </div>
                        </div>
                        <div class="item">
                            <h3 class="text-white">My Acting blown <span class="font-bold">Your Mind</span> and you also laugh at the moment</h3>
                            <div class="twi-user"><img src="../plugins/images/users/genu.jpg" alt="user" class="img-circle img-responsive pull-left">
                                <h4 class="text-white m-b-0">Govinda</h4>
                                <p class="text-white">Actor</p>
                            </div>
                        </div>
                        <div class="item">
                            <h3 class="text-white">My Acting blown <span class="font-bold">Your Mind</span> and you also laugh at the moment</h3>
                            <div class="twi-user"><img src="../plugins/images/users/ritesh.jpg" alt="user" class="img-circle img-responsive pull-left">
                                <h4 class="text-white m-b-0">Govinda</h4>
                                <p class="text-white">Actor</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box bg-success m-b-15">
                <h3 class="box-title text-white">Sales Difference</h3>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                        <h1 class="text-white">$647</h1>
                        <p class="light_op_text">APRIL 2016</p> <b class="text-white">(150 Sales)</b> </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div id="sparkline2dash" class="text-center"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12">
            <div class="white-box bg-purple m-b-15">
                <h3 class="text-white box-title">VISIT STATASTICS</h3>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                        <h1 class="text-white">$347</h1>
                        <p class="light_op_text">APRIL 2016</p> <b class="text-white">(150 Sales)</b> </div>
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <div id="sales1" class="text-center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--row -->
    <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Recent Comments</h3>
                <div class="comment-center">
                    <div class="comment-body">
                        <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"></div>
                        <div class="mail-contnet">
                            <h5>Pavan kumar</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.</span> <span class="label label-rounded label-info">PENDING</span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2016</span></div>
                    </div>
                    <div class="comment-body">
                        <div class="user-img"> <img src="../plugins/images/users/sonu.jpg" alt="user" class="img-circle"> </div>
                        <div class="mail-contnet">
                            <h5>Sonu Nigam</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.</span><span class="label label-rounded label-success">APPROVED</span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2016</span></div>
                    </div>
                    <div class="comment-body">
                        <div class="user-img"> <img src="../plugins/images/users/arijit.jpg" alt="user" class="img-circle"> </div>
                        <div class="mail-contnet">
                            <h5>Arijit Sinh</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat. </span><span class="label label-rounded label-danger">REJECTED</span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2016</span></div>
                    </div>
                    <div class="comment-body b-none">
                        <div class="user-img"> <img src="../plugins/images/users/pawandeep.jpg" alt="user" class="img-circle"></div>
                        <div class="mail-contnet">
                            <h5>Pavan kumar</h5> <span class="mail-desc">Donec ac condimentum massa. Etiam pellentesque pretium lacus. Phasellus ultricies dictum suscipit. Aenean commodo dui pellentesque molestie feugiat.</span> <span class="label label-rounded label-info">PENDING</span> <a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">April 14, 2016</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Recent sales
                    <div class="col-md-3 col-sm-4 col-xs-6 pull-right">
                        <select class="form-control pull-right row b-none">
                            <option>March 2016</option>
                            <option>April 2016</option>
                            <option>May 2016</option>
                            <option>June 2016</option>
                            <option>July 2016</option>
                        </select>
                    </div>
                </h3>
                <div class="row sales-report">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        <h2>March 2016</h2>
                        <p>SALES REPORT</p>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 ">
                        <h1 class="text-right text-success m-t-20">$3,690</h1> </div>
                </div>
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                        <tr>
                            <th>NAME</th>
                            <th>STATUS</th>
                            <th>DATE</th>
                            <th>PRICE</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="txt-oflo">Pixel admin</td>
                            <td><span class="label label-megna label-rounded">SALE</span> </td>
                            <td class="txt-oflo">April 18</td>
                            <td><span class="text-success">$24</span></td>
                        </tr>
                        <tr>
                            <td class="txt-oflo">Real Homes</td>
                            <td><span class="label label-info label-rounded">EXTENDED</span></td>
                            <td class="txt-oflo">April 19</td>
                            <td><span class="text-info">$1250</span></td>
                        </tr>
                        <tr>
                            <td class="txt-oflo">Medical Pro</td>
                            <td><span class="label label-danger label-rounded">TAX</span></td>
                            <td class="txt-oflo">April 20</td>
                            <td><span class="text-danger">-$24</span></td>
                        </tr>
                        <tr>
                            <td class="txt-oflo">Hosting press</td>
                            <td><span class="label label-megna label-rounded">SALE</span></td>
                            <td class="txt-oflo">April 21</td>
                            <td><span class="text-success">$24</span></td>
                        </tr>
                        <tr>
                            <td class="txt-oflo">Helping Hands</td>
                            <td><span class="label label-success label-rounded">MEMBER</span></td>
                            <td class="txt-oflo">April 22</td>
                            <td><span class="text-success">$24</span></td>
                        </tr>
                        <tr>
                            <td class="txt-oflo">Digital Agency</td>
                            <td><span class="label label-megna label-rounded">SALE</span> </td>
                            <td class="txt-oflo">April 23</td>
                            <td><span class="text-danger">-$14</span></td>
                        </tr>
                        <tr>
                            <td class="txt-oflo">Helping Hands</td>
                            <td><span class="label label-success label-rounded">MEMBER</span></td>
                            <td class="txt-oflo">April 22</td>
                            <td><span class="text-success">$64</span></td>
                        </tr>
                        </tbody>
                    </table> <a href="#">Check all the sales</a> </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

@endsection
