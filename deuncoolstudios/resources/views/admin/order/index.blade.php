@extends('admin.layout.master')
@section('title', 'Category')
@section('body')

                <!-- Main -->
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-ticket icon-gradient bg-mean-fruit"></i>
                                </div>
                                <div>
                                    Order
                                    <div class="page-title-subheading">
                                        View, create, update, delete and manage.
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="main-card mb-3 card">

                                <div class="card-header d-flex" style="justify-content: space-between; align-items: center;">

                                    <form>
                                        <div class="input-group">
                                            <input type="search" name="search" id="search" value="{{request('search')}}"
                                                placeholder="Search everything" class="form-control">
                                            <span class="input-group-append">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-search"></i>&nbsp;
                                                    Search
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                    <div class="d-flex " style="height: 100%;align-items: center;">
                                        <div class="mr-5">
                                            Filter:
                                        </div>
                                        <div class="d-flex gap-5 mr-4" style="height: 70%;">
                                            <div class="m-0 btn-filter-status d-flex p-2 bg-info" style="cursor: pointer;justify-content: space-between; align-items: center; color:#fff; border-radius: 5px;" data-status="*">
                                                All
                                            </div>
                                            <div class="m-0 btn-filter-status d-flex p-2 bg-warning" style="cursor: pointer;justify-content: space-between; align-items: center; color:#fff; border-radius: 5px;" data-status="0">
                                                Pendding
                                            </div>
                                            <div class="m-0 btn-filter-status d-flex p-2 bg-danger" style="cursor: pointer;justify-content: space-between; align-items: center;color:#fff;border-radius: 5px;" data-status="1">
                                                Processing
                                            </div>
                                            <div class="m-0 btn-filter-status d-flex p-2 bg-dark" style="cursor: pointer;justify-content: space-between; align-items: center;color:#fff;border-radius: 5px;" data-status="2">
                                                Finish
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="table-responsive">
                                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                        <thead>
                                            <tr class="header-table">
                                                <th class="text-center">ID</th>
                                                <th>Customer / Products</th>
                                                <th class="text-center">Address</th>
                                                <th class="text-center">Amount</th>
                                                <th class="text-center">Payment type</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td class="text-center text-muted">#{{$order->id}}</td>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <div class="widget-content-left">
                                                                        <img style="height: 60px;"
                                                                            data-toggle="tooltip" title="Image"
                                                                            data-placement="bottom"
                                                                            src="front/img/products/{{$order->orderDetails[0]->product->productImages[0]->path}}" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">{{$order->first_name . " " . $order->last_name}}</div>
                                                                    <div class="widget-subheading opacity-7">
                                                                        {{$order->orderDetails[0]->product->name}}

                                                                        @if (count($order->orderDetails) > 1)
                                                                            (and {{count($order->orderDetails)}} other products)  
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">
                                                        {{$order->street_address . ' ' . $order->town_city}}
                                                    </td>
                                                    <td class="text-center">{{array_sum(array_column($order->orderDetails->toArray(),'total'))}}đ</td>
                                                    <td class="text-center">
                                                        {{ $order->payment_type == 'pay_later' ? 'COD' : 'Online' }}
                                                    </td>
                                                    <td class="text-center">
                                                        <form action="admin/order/{{$order->id}}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="status" id="" value="{{$order->status == 0 ? 1 : 0}}">
                                                            <button type="submit" class="btn border-0 btn-sm">
                                                                @if ($order->status==0)
                                                                    <div class="badge badge-warning">
                                                                        Pending
                                                                    </div>
                                                                @elseif($order->status==1)
                                                                <div class="badge badge-danger">
                                                                        Processing
                                                                    </div>
                                                                @else
                                                                    <div class="badge badge-dark">
                                                                        Finish
                                                                    </div>
                                                                @endif
                                                            </button>
                                                        </form>
                                                    </td>
                                                    <td class="text-center" >   
                                                            <a href="./admin/order/{{$order->id}}"
                                                                class="btn btn-hover-shine btn-outline-primary border-0 btn-sm">
                                                                Details
                                                            </a>
                                                    </td>
                                                </tr>
                                                
                                            @endforeach

                                            
                                        </tbody>
                                    </table>
                                </div>
                                {{$orders->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Main -->
                <script>
                    const btns = document.querySelectorAll('.btn-filter-status');
                    btns.forEach((btn)=>{
                        btn.addEventListener('click', ()=>{
                            let status = btn.dataset.status;
                            if(status == '*') {
                                window.location = 'admin/order';
                                return;
                            }
                            window.location = `admin/order/status/${status}`
                        })
                    })
                </script>

@endsection