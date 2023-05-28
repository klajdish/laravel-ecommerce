@extends('layouts.admin')
@section('content')
<div class="container-fluid pt-5">
    <div class="row">
        <div class="col-12">
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            @if(Session::has('fail'))
                <div class="alert alert-danger">
                    {{Session::get('fail')}}
                </div>
            @endif
        </div>
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="row justify-content-between">
                        <div class=" col-lg-4 col-md-6">
                            {{-- <input type="search" class="form-control " placeholder="Search for user"> --}}
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table text-nowrap mb-0 table-centered table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>Clent name</th>
                                    <th>Order Status</th>
                                    <th>Created at</th>
                                    <th>Address</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->user->firstname}}</td>
                                    <td>{{$order->status->code}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>
                                        {{$order->address->state}}.
                                        {{$order->address->city}}.
                                        {{$order->address->street}}.
                                        {{$order->address->zip_code}}
                                    </td>
                                    <td>${{$order->total}}</td>
                                    <td>
                                        <a href="{{route('admin.order.update', $order->id)}}" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="editOne">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit icon-xs">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                            </svg>
                                            <div id="editOne" class="d-none">
                                                <span>Edit</span>
                                            </div>
                                        </a>
                                        <a href="{{route('admin.order.delete', ['order_id' => $order->id])}}" onclick="return confirm('Are you sure you want to delete this item')" class="btn btn-ghost btn-icon btn-sm rounded-circle texttooltip" data-template="trashOne">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-xs">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                            <div id="trashOne" class="d-none">
                                                <span>Delete</span>
                                            </div>
                                        </a> 
                                    </td> 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- <div class="card-footer d-md-flex justify-content-between align-items-center">
                    <span>Showing 1 to 8 of 12 entries</span>
                    <nav class="mt-2 mt-md-0">
                        <ul class="pagination mb-0 ">
                            <li class="page-item "><a class="page-link" href="#!">Previous</a></li>
                            <li class="page-item active"><a class="page-link" href="#!">1</a></li>
                            <li class="page-item"><a class="page-link" href="#!">2</a></li>
                            <li class="page-item"><a class="page-link" href="#!">3</a></li>
                            <li class="page-item"><a class="page-link" href="#!">Next</a></li>
                        </ul>
                    </nav>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
