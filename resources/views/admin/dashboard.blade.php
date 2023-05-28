@extends('layouts.admin')
@section('content')
<!-- Container fluid -->
<div class="bg-primary pt-10 pb-21"></div>
<div class="container-fluid mt-n22 px-6">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <!-- Page header -->
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="mb-2 mb-lg-0">
                        <h3 class="mb-0  text-white">DASHBOARD</h3>
                    </div>
                    <div>
                        <a href="#" class="btn btn-white">Create New Project</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card ">
                <!-- card body -->
                <div class="card-body">
                    <!-- heading -->
                    <div class="d-flex justify-content-between align-items-center
                        mb-3">
                        <div>
                            <h4 class="mb-0">Users</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary
                            rounded-2">
                            <i class="bi bi-briefcase fs-4"></i>
                        </div>
                    </div>
                    <!-- project number -->
                    <div>
                        <h1 class="fw-bold">{{$countRecords['users']}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <div class="card ">
                <!-- card body -->
                <div class="card-body">
                    <!-- heading -->
                    <div class="d-flex justify-content-between align-items-center
                        mb-3">
                        <div>
                            <h4 class="mb-0">Products</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary
                            rounded-2">
                            <i class="bi bi-briefcase fs-4"></i>
                        </div>
                    </div>
                    <!-- project number -->
                    <div>
                        <h1 class="fw-bold">{{$countRecords['products']}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <div class="card ">
                <!-- card body -->
                <div class="card-body">
                    <!-- heading -->
                    <div class="d-flex justify-content-between align-items-center
                        mb-3">
                        <div>
                            <h4 class="mb-0">Categories</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary
                            rounded-2">
                            <i class="bi bi-briefcase fs-4"></i>
                        </div>
                    </div>
                    <!-- project number -->
                    <div>
                        <h1 class="fw-bold">{{$countRecords['categories']}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <div class="card ">
                <!-- card body -->
                <div class="card-body">
                    <!-- heading -->
                    <div class="d-flex justify-content-between align-items-center
                        mb-3">
                        <div>
                            <h4 class="mb-0">Orders</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary
                            rounded-2">
                            <i class="bi bi-briefcase fs-4"></i>
                        </div>
                    </div>
                    <!-- project number -->
                    <div>
                        <h1 class="fw-bold">{{$countRecords['orders']}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card ">
                <!-- card body -->
                <div class="card-body">
                    <!-- heading -->
                    <div class="d-flex justify-content-between align-items-center
                        mb-3">
                        <div>
                            <h4 class="mb-0">Colors</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary
                            rounded-2">
                            <i class="bi bi-briefcase fs-4"></i>
                        </div>
                    </div>
                    <!-- project number -->
                    <div>
                        <h1 class="fw-bold">{{$countRecords['colors']}}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card ">
                <!-- card body -->
                <div class="card-body">
                    <!-- heading -->
                    <div class="d-flex justify-content-between align-items-center
                        mb-3">
                        <div>
                            <h4 class="mb-0">Sizes</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary
                            rounded-2">
                            <i class="bi bi-briefcase fs-4"></i>
                        </div>
                    </div>
                    <!-- project number -->
                    <div>
                        <h1 class="fw-bold">{{$countRecords['sizes']}}</h1>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card ">
                <!-- card body -->
                <div class="card-body">
                    <!-- heading -->
                    <div class="d-flex justify-content-between align-items-center
                        mb-3">
                        <div>
                            <h4 class="mb-0">Active Task</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary
                            rounded-2">
                            <i class="bi bi-list-task fs-4"></i>
                        </div>
                    </div>
                    <!-- project number -->
                    <div>
                        <h1 class="fw-bold">132</h1>
                        <p class="mb-0"><span class="text-dark me-2">28</span>Completed</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card ">
                <!-- card body -->
                <div class="card-body">
                    <!-- heading -->
                    <div class="d-flex justify-content-between align-items-center
                        mb-3">
                        <div>
                            <h4 class="mb-0">Teams</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary
                            rounded-2">
                            <i class="bi bi-people fs-4"></i>
                        </div>
                    </div>
                    <!-- project number -->
                    <div>
                        <h1 class="fw-bold">12</h1>
                        <p class="mb-0"><span class="text-dark me-2">1</span>Completed</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-12 col-12 mt-6">
            <!-- card -->
            <div class="card ">
                <!-- card body -->
                <div class="card-body">
                    <!-- heading -->
                    <div class="d-flex justify-content-between align-items-center
                        mb-3">
                        <div>
                            <h4 class="mb-0">Productivity</h4>
                        </div>
                        <div class="icon-shape icon-md bg-light-primary text-primary
                            rounded-2">
                            <i class="bi bi-bullseye fs-4"></i>
                        </div>
                    </div>
                    <!-- project number -->
                    <div>
                        <h1 class="fw-bold">76%</h1>
                        <p class="mb-0"><span class="text-success me-2">5%</span>Completed</p>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <!-- row  -->
    {{-- <div class="row mt-6">
        <div class="col-md-12 col-12">
            <!-- card  -->

            <div class="card">
                <!-- card header  -->
                <div class="card-header bg-white  py-4">
                    <h4 class="mb-0">Active Projects</h4>
                </div>
                <!-- table  -->
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Project name</th>
                                <th>Hours</th>
                                <th>priority</th>
                                <th>Members</th>
                                <th>Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">
                                    <div class="d-flex
                                        align-items-center">
                                        <div>
                                            <div class="icon-shape icon-md border p-4
                                                rounded-1">
                                                <img src="{{asset('admin_dir/assets/images/brand/dropbox-logo.svg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="ms-3 lh-1">
                                            <h5 class=" mb-1"> <a href="#" class="text-inherit">Dropbox Design
                                                System</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">34</td>
                                <td class="align-middle"><span class="badge
                                    bg-warning">Medium</span></td>
                                <td class="align-middle">
                                    <div class="avatar-group">
                                        <span class="avatar avatar-sm">
                                        <img alt="avatar"
                                            src="{{asset('admin_dir/assets/images/avatar/avatar-1.jpg')}}"
                                            class="rounded-circle">
                                        </span>
                                        <span class="avatar avatar-sm">
                                        <img alt="avatar"
                                            src="{{asset('admin_dir/assets/images/avatar/avatar-2.jpg')}}"
                                            class="rounded-circle">
                                        </span>
                                        <span class="avatar avatar-sm">
                                        <img alt="avatar"
                                            src="{{asset('admin_dir/assets/images/avatar/avatar-3.jpg')}}"
                                            class="rounded-circle">
                                        </span>
                                        <span class="avatar avatar-sm avatar-primary">
                                        <span class="avatar-initials rounded-circle
                                            fs-6">+5</span>
                                        </span>
                                    </div>
                                </td>
                                <td class="align-middle text-dark">
                                    <div class="float-start me-3">15%</div>
                                    <div class="mt-2">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width:15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <div class="d-flex
                                        align-items-center">
                                        <div>
                                            <div class="icon-shape icon-md border p-4
                                                rounded-1">
                                                <img src="{{asset('admin_dir/assets/images/brand/slack-logo.svg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="ms-3 lh-1">
                                            <h5 class=" mb-1"> <a href="#" class="text-inherit">Slack Team UI Design</a></h5>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">47</td>
                                <td class="align-middle"><span class="badge
                                    bg-danger">High</span></td>
                                <td class="align-middle">
                                    <div class="avatar-group">
                                        <span class="avatar avatar-sm">
                                        <img alt="avatar"
                                            src="{{asset('admin_dir/assets/images/avatar/avatar-4.jpg')}}"
                                            class="rounded-circle">
                                        </span>
                                        <span class="avatar avatar-sm">
                                        <img alt="avatar"
                                            src="{{asset('admin_dir/assets/images/avatar/avatar-5.jpg')}}"
                                            class="rounded-circle">
                                        </span>
                                        <span class="avatar avatar-sm">
                                        <img alt="avatar"
                                            src="{{asset('admin_dir/assets/images/avatar/avatar-6.jpg')}}"
                                            class="rounded-circle">
                                        </span>
                                        <span class="avatar avatar-sm avatar-primary">
                                        <span class="avatar-initials rounded-circle
                                            fs-6">+5</span>
                                        </span>
                                    </div>
                                </td>
                                <td class="align-middle text-dark">
                                    <div class="float-start me-3">35%</div>
                                    <div class="mt-2">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width:35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <div class="d-flex
                                        align-items-center">
                                        <div>
                                            <div class="icon-shape icon-md border p-4
                                                rounded-1">
                                                <img src="{{asset('admin_dir/assets/images/brand/github-logo.svg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="ms-3 lh-1">
                                            <h5 class=" mb-1"> <a href="#" class="text-inherit">GitHub Satellite</a></h5>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">120</td>
                                <td class="align-middle"><span class="badge bg-info">Low</span></td>
                                <td class="align-middle">
                                    <div class="avatar-group">
                                        <span class="avatar avatar-sm">
                                        <img alt="avatar"
                                            src="{{asset('admin_dir/assets/images/avatar/avatar-7.jpg')}}"
                                            class="rounded-circle">
                                        </span>
                                        <span class="avatar avatar-sm">
                                        <img alt="avatar"
                                            src="{{asset('admin_dir/assets/images/avatar/avatar-8.jpg')}}"
                                            class="rounded-circle">
                                        </span>
                                        <span class="avatar avatar-sm">
                                        <img alt="avatar"
                                            src="{{asset('admin_dir/assets/images/avatar/avatar-9.jpg')}}"
                                            class="rounded-circle">
                                        </span>
                                        <span class="avatar avatar-sm avatar-primary">
                                        <span class="avatar-initials rounded-circle
                                            fs-6">+1</span>
                                        </span>
                                    </div>
                                </td>
                                <td class="align-middle text-dark">
                                    <div class="float-start me-3">75%</div>
                                    <div class="mt-2">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width:75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <div class="d-flex
                                        align-items-center">
                                        <div>
                                            <div class="icon-shape icon-md border p-4
                                                rounded-1">
                                                <img src="{{asset('admin_dir/assets/images/brand/3dsmax-logo.svg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="ms-3 lh-1">
                                            <h5 class=" mb-1"> <a href="#" class="text-inherit">3D Character Modelling</a></h5>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">89</td>
                                <td class="align-middle"><span class="badge
                                    bg-warning">Medium</span></td>
                                <td class="align-middle">
                                    <div class="avatar-group">
                                        <span class="avatar avatar-sm">
                                        <img alt="avatar"
                                            src="{{asset('admin_dir/assets/images/avatar/avatar-10.jpg')}}"
                                            class="rounded-circle">
                                        </span>
                                        <span class="avatar avatar-sm">
                                        <img alt="avatar"
                                            src="{{asset('admin_dir/assets/images/avatar/avatar-11.jpg')}}"
                                            class="rounded-circle">
                                        </span>
                                        <span class="avatar avatar-sm">
                                        <img alt="avatar"
                                            src="{{asset('admin_dir/assets/images/avatar/avatar-12.jpg')}}"
                                            class="rounded-circle">
                                        </span>
                                        <span class="avatar avatar-sm avatar-primary">
                                        <span class="avatar-initials rounded-circle
                                            fs-6">+5</span>
                                        </span>
                                    </div>
                                </td>
                                <td class="align-middle text-dark">
                                    <div class="float-start me-3">63%</div>
                                    <div class="mt-2">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width:63%" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <div class="d-flex
                                        align-items-center">
                                        <div>
                                            <div class="icon-shape icon-md border p-4 rounded
                                                bg-primary">
                                                <img src="{{asset('admin_dir/assets/images/brand/layers-logo.svg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="ms-3 lh-1">
                                            <h5 class=" mb-1"> <a href="#" class="text-inherit">Webapp Design System</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">108</td>
                                <td class="align-middle"><span class="badge
                                    bg-success">Track</span></td>
                                <td class="align-middle">
                                    <div class="avatar-group">
                                        <span class="avatar avatar-sm">
                                        <img alt="avatar"
                                            src="{{asset('admin_dir/assets/images/avatar/avatar-13.jpg')}}"
                                            class="rounded-circle">
                                        </span>
                                        <span class="avatar avatar-sm">
                                        <img alt="avatar"
                                            src="{{asset('admin_dir/assets/images/avatar/avatar-14.jpg')}}"
                                            class="rounded-circle">
                                        </span>
                                        <span class="avatar avatar-sm">
                                        <img alt="avatar"
                                            src="{{asset('admin_dir/assets/images/avatar/avatar-15.jpg')}}"
                                            class="rounded-circle">
                                        </span>
                                        <span class="avatar avatar-sm avatar-primary">
                                        <span class="avatar-initials rounded-circle
                                            fs-6">+5</span>
                                        </span>
                                    </div>
                                </td>
                                <td class="align-middle text-dark">
                                    <div class="float-start me-3">100%</div>
                                    <div class="mt-2">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width:100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle border-bottom-0">
                                    <div class="d-flex
                                        align-items-center">
                                        <div>
                                            <div class="icon-shape icon-md border p-4 rounded-1">
                                                <img src="{{asset('admin_dir/assets/images/brand/github-logo.svg')}}" alt="">
                                            </div>
                                        </div>
                                        <div class="ms-3 lh-1">
                                            <h5 class=" mb-1"> <a href="#" class="text-inherit">Github Event Design</a>
                                            </h5>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle border-bottom-0">120</td>
                                <td class="align-middle border-bottom-0"><span class="badge bg-info">Low</span></td>
                                <td class="align-middle border-bottom-0">
                                    <div class="avatar-group">
                                        <span class="avatar avatar-sm">
                                        <img alt="avatar"
                                            src="{{asset('admin_dir/assets/images/avatar/avatar-13.jpg')}}"
                                            class="rounded-circle">
                                        </span>
                                        <span class="avatar avatar-sm">
                                        <img alt="avatar"
                                            src="{{asset('admin_dir/assets/images/avatar/avatar-14.jpg')}}"
                                            class="rounded-circle">
                                        </span>
                                        <span class="avatar avatar-sm">
                                        <img alt="avatar"
                                            src="{{asset('admin_dir/assets/images/avatar/avatar-15.jpg')}}"
                                            class="rounded-circle">
                                        </span>
                                        <span class="avatar avatar-sm avatar-primary">
                                        <span class="avatar-initials rounded-circle
                                            fs-6">+1</span>
                                        </span>
                                    </div>
                                </td>
                                <td class="align-middle text-dark border-bottom-0">
                                    <div class="float-start me-3">75%</div>
                                    <div class="mt-2">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar" role="progressbar" style="width:75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- card footer  -->
                <div class="card-footer bg-white text-center">
                    <a href="#" class="link-primary">View All Projects</a>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header  ">
                    <div class="row">
                        <div class=" col-lg-3 col-md-6">
                            <input type="search" class="form-control " placeholder="Search Files...">
                        </div>
                        <div class="col-lg-4 col-md-6 d-flex align-items-center mt-3 mt-md-0">
                            <label class="form-label me-2 mb-0">Status</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected="">Shipped</option>
                                <option value="1">In Progress</option>
                                <option value="2">Delivered</option>
                            </select>
                        </div>
                        <div class="col-lg-5 text-lg-end mt-3 mt-lg-0">
                            <a href="#!" class="btn btn-primary me-2">+ Add New Order</a>
                            <a href="#!" class="btn btn-light ">Export</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table text-nowrap mb-0 table-centered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th class=" pe-0  ">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                            <label class="form-check-label" for="checkAll">
                                            </label>
                                        </div>
                                    </th>
                                    <th class="ps-1">Order ID</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Payment Status</th>
                                    <th>Total</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class=" pe-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="contactCheckbox2">
                                            <label class="form-check-label" for="contactCheckbox2">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="ps-1">
                                        <a href="#!">#DU00017</a>
                                    </td>
                                    <td>Harold Gonzalez </td>
                                    <td>3 Oct, 2023 10:02 PM</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                    <td>$120.00</td>
                                    <td><span class="badge badge-info-soft">Shipped</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-icon btn-sm btn-ghost rounded-circle" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Action</a></li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Another action</a>
                                                </li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                                    here</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" pe-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="contactCheckbox3">
                                            <label class="form-check-label" for="contactCheckbox3">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="ps-1">
                                        <a href="#!">#DU00016</a>
                                    </td>
                                    <td>Anthony Anderson </td>
                                    <td>19 August, 2023 6:22 PM</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                    <td>$220.00</td>
                                    <td><span class="badge badge-warning-soft text-warning">In Progress</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-icon btn-sm btn-ghost rounded-circle" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Action</a></li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Another action</a>
                                                </li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                                    here</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" pe-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="contactCheckbox4">
                                            <label class="form-check-label" for="contactCheckbox4">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="ps-1">
                                        <a href="#!">#DU00015</a>
                                    </td>
                                    <td>Gary Faulkner</td>
                                    <td>8 August, 2023 8:13 AM</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                    <td>$113.42</td>
                                    <td><span class="badge badge-info-soft">In Shipped</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-icon btn-sm btn-ghost rounded-circle" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Action</a></li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Another action</a>
                                                </li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                                    here</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" pe-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="contactCheckbox5">
                                            <label class="form-check-label" for="contactCheckbox5">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="ps-1">
                                        <a href="#!">#DU00014</a>
                                    </td>
                                    <td>Steve Nelson</td>
                                    <td>26 July, 2023 10:19 AM</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                    <td>$425.31</td>
                                    <td><span class="badge badge-success-soft text-success">Delivered</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-icon btn-sm btn-ghost rounded-circle" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Action</a></li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Another action</a>
                                                </li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                                    here</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" pe-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="contactCheckbox6">
                                            <label class="form-check-label" for="contactCheckbox6">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="ps-1">
                                        <a href="#!">#DU00013</a>
                                    </td>
                                    <td>Kimberly Sullivan</td>
                                    <td>18 July, 2023 9:52 PM</td>
                                    <td><span class="badge bg-secondary">Refunded</span></td>
                                    <td>$113.00</td>
                                    <td><span class="badge badge-success-soft text-success">Delivered</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-icon btn-sm btn-ghost rounded-circle" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Action</a></li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Another action</a>
                                                </li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                                    here</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" pe-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="contactCheckbox7">
                                            <label class="form-check-label" for="contactCheckbox7">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="ps-1">
                                        <a href="#!">#DU00012</a>
                                    </td>
                                    <td>Susan Pugh</td>
                                    <td>2 July, 2023 8:00 AM</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                    <td>$831.99</td>
                                    <td><span class="badge badge-success-soft text-success">Delivered</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-icon btn-sm btn-ghost rounded-circle" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Action</a></li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Another action</a>
                                                </li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                                    here</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" pe-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="contactCheckbox8">
                                            <label class="form-check-label" for="contactCheckbox8">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="ps-1">
                                        <a href="#!">#DU00011</a>
                                    </td>
                                    <td>Elliott Potts</td>
                                    <td>23 June, 2023 8:14 PM</td>
                                    <td><span class="badge bg-danger">Cancel</span></td>
                                    <td>$113.00</td>
                                    <td><span class="badge badge-success-soft text-success">Delivered</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-icon btn-sm btn-ghost rounded-circle" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Action</a></li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Another action</a>
                                                </li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                                    here</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" pe-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="contactCheckbox9">
                                            <label class="form-check-label" for="contactCheckbox9">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="ps-1">
                                        <a href="#!">#DU00010</a>
                                    </td>
                                    <td>Richard Beaudry</td>
                                    <td>13 June, 2023 4:12 PM</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                    <td>$582.99</td>
                                    <td><span class="badge badge-success-soft text-success">Delivered</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-icon btn-sm btn-ghost rounded-circle" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Action</a></li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Another action</a>
                                                </li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                                    here</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" pe-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="contactCheckbox10">
                                            <label class="form-check-label" for="contactCheckbox10">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="ps-1">
                                        <a href="#!">#DU00009</a>
                                    </td>
                                    <td>Henry Saxton</td>
                                    <td>5 May, 2023 12:02 PM</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                    <td>$00.00</td>
                                    <td><span class="badge badge-success-soft text-success">Delivered</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-icon btn-sm btn-ghost rounded-circle" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Action</a></li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Another action</a>
                                                </li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                                    here</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class=" pe-0">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="contactCheckbox11">
                                            <label class="form-check-label" for="contactCheckbox11">
                                            </label>
                                        </div>
                                    </td>
                                    <td class="ps-1">
                                        <a href="#!">#DU00008</a>
                                    </td>
                                    <td>Juanita Diener</td>
                                    <td>4 April, 2023 5:02 PM</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                    <td>$25.23</td>
                                    <td><span class="badge badge-success-soft text-success">Delivered</span></td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-icon btn-sm btn-ghost rounded-circle" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical icon-xs">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="12" cy="5" r="1"></circle>
                                                    <circle cx="12" cy="19" r="1"></circle>
                                                </svg>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Action</a></li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Another action</a>
                                                </li>
                                                <li><a class="dropdown-item d-flex align-items-center" href="#!">Something else
                                                    here</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer d-md-flex justify-content-between align-items-center">
                    <span>Showing 1 to 8 of 12 entries</span>
                    <nav class="mt-2 mt-md-0">
                        <ul class="pagination mb-0">
                            <li class="page-item"><a class="page-link" href="#!">Previous</a></li>
                            <li class="page-item"><a class="page-link active" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item"><a class="page-link" href="#!">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- row  -->
    <div class="row my-6">
        <div class="col-xl-4 col-lg-12 col-md-12 col-12 mb-6 mb-xl-0">
            <!-- card  -->
            <div class="card h-100">
                <!-- card body  -->
                <div class="card-body">
                    <div class="d-flex align-items-center
                        justify-content-between">
                        <div>
                            <h4 class="mb-0">Tasks Performance </h4>
                        </div>
                        <!-- dropdown  -->
                        <div class="dropdown dropstart">
                            <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTask" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-xxs" data-feather="more-vertical"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownTask">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div>
                    </div>
                    <!-- chart  -->
                    <div class="mb-8">
                        <div id="perfomanceChart"></div>
                    </div>
                    <!-- icon with content  -->
                    <div class="d-flex align-items-center justify-content-around">
                        <div class="text-center">
                            <i class="icon-sm text-success" data-feather="check-circle"></i>
                            <h1 class="mt-3  mb-1 fw-bold">76%</h1>
                            <p>Completed</p>
                        </div>
                        <div class="text-center">
                            <i class="icon-sm text-warning" data-feather="trending-up"></i>
                            <h1 class="mt-3  mb-1 fw-bold">32%</h1>
                            <p>In-Progress</p>
                        </div>
                        <div class="text-center">
                            <i class="icon-sm text-danger" data-feather="trending-down"></i>
                            <h1 class="mt-3  mb-1 fw-bold">13%</h1>
                            <p>Behind</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- card  -->
        <div class="col-xl-8 col-lg-12 col-md-12 col-12">
            <div class="card h-100">
                <!-- card header  -->
                <div class="card-header bg-white py-4">
                    <h4 class="mb-0">Teams </h4>
                </div>
                <!-- table  -->
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Last Activity</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="{{asset('admin_dir/assets/images/avatar/avatar-2.jpg')}}" alt="" class="avatar-md avatar rounded-circle">
                                        </div>
                                        <div class="ms-3 lh-1">
                                            <h5 class=" mb-1">Anita Parmar</h5>
                                            <p class="mb-0">anita@example.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">Front End Developer</td>
                                <td class="align-middle">3 May, 2023</td>
                                <td class="align-middle">
                                    <div class="dropdown dropstart">
                                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamOne" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-xxs" data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownTeamOne">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else
                                            here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="{{asset('admin_dir/assets/images/avatar/avatar-1.jpg')}}" alt="" class="avatar-md avatar rounded-circle">
                                        </div>
                                        <div class="ms-3 lh-1">
                                            <h5 class=" mb-1">Jitu Chauhan</h5>
                                            <p class="mb-0">jituchauhan@example.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">Project Director </td>
                                <td class="align-middle">Today</td>
                                <td class="align-middle">
                                    <div class="dropdown dropstart">
                                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamTwo" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-xxs" data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownTeamTwo">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else
                                            here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="{{asset('admin_dir/assets/images/avatar/avatar-3.jpg')}}" alt="" class="avatar-md avatar rounded-circle">
                                        </div>
                                        <div class="ms-3 lh-1">
                                            <h5 class=" mb-1">Sandeep Chauhan</h5>
                                            <p class="mb-0">sandeepchauhan@example.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">Full- Stack Developer</td>
                                <td class="align-middle">Yesterday</td>
                                <td class="align-middle">
                                    <div class="dropdown dropstart">
                                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamThree" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-xxs" data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownTeamThree">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else
                                            here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="{{asset('admin_dir/assets/images/avatar/avatar-4.jpg')}}" alt="" class="avatar-md avatar rounded-circle">
                                        </div>
                                        <div class="ms-3 lh-1">
                                            <h5 class=" mb-1">Amanda Darnell</h5>
                                            <p class="mb-0">amandadarnell@example.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">Digital Marketer</td>
                                <td class="align-middle">3 May, 2023</td>
                                <td class="align-middle">
                                    <div class="dropdown dropstart">
                                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamFour" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-xxs" data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownTeamFour">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else
                                            here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="{{asset('admin_dir/assets/images/avatar/avatar-5.jpg')}}" alt="" class="avatar-md avatar rounded-circle">
                                        </div>
                                        <div class="ms-3 lh-1">
                                            <h5 class=" mb-1">Patricia Murrill</h5>
                                            <p class="mb-0">patriciamurrill@example.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">Account Manager</td>
                                <td class="align-middle">3 May, 2023</td>
                                <td class="align-middle">
                                    <div class="dropdown dropstart">
                                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamFive" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-xxs" data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownTeamFive">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else
                                            here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle border-bottom-0">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <img src="{{asset('admin_dir/assets/images/avatar/avatar-6.jpg')}}" alt="" class="avatar-md avatar rounded-circle">
                                        </div>
                                        <div class="ms-3 lh-1">
                                            <h5 class=" mb-1">Darshini Nair</h5>
                                            <p class="mb-0">darshininair@example.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle border-bottom-0">Front End Developer</td>
                                <td class="align-middle border-bottom-0">3 May, 2023</td>
                                <td class="align-middle border-bottom-0">
                                    <div class="dropdown dropstart">
                                        <a class="text-muted text-primary-hover" href="#" role="button" id="dropdownTeamSix" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="icon-xxs" data-feather="more-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownTeamSix">
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <a class="dropdown-item" href="#">Something else
                                            here</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
</div>
</div>
@endsection
