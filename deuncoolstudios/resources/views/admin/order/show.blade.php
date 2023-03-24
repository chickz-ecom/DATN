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
                                <div class="card-body display_data">

                                    <div class="table-responsive">
                                        <h2 class="text-center">Products list</h2>
                                        <hr>
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th class="text-center">Quantity</th>
                                                    <th class="text-center">Unit Price</th>
                                                    <th class="text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->orderDetails as $orderDetail )
                                                    <tr>
                                                        <td>
                                                            <div class="widget-content p-0">
                                                                <div class="widget-content-wrapper">
                                                                    <div class="widget-content-left mr-3">
                                                                        <div class="widget-content-left">
                                                                            <img style="height: 60px;"
                                                                                data-toggle="tooltip" title="Image"
                                                                                data-placement="bottom"
                                                                                src="front/img/products/{{$orderDetail->product->productImages[0]->path}}" alt="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="widget-content-left flex2">
                                                                        <div class="widget-heading">{{$orderDetail->product->name}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            {{$orderDetail->qty}}
                                                        </td>
                                                        <td class="text-center">{{$orderDetail->amount}}đ</td>
                                                        <td class="text-center">
                                                            {{$orderDetail->total}}đ
                                                        </td>
                                                    </tr>
                                                @endforeach
    
                                            </tbody>
                                        </table>
                                    </div>



                                    <h2 class="text-center mt-5">Order info</h2>
                                        <hr>
                                    <div class="position-relative row form-group">
                                        <label for="name" class="col-md-3 text-md-center col-form-label">
                                            Full name
                                        </label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>
                                                {{$order->first_name . ' ' . $order->last_name}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="email" class="col-md-3 text-md-center col-form-label">Email</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$order->email}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="phone" class="col-md-3 text-md-center col-form-label">Phone</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$order->phone}}</p>
                                        </div>
                                    </div>
                                    <div class="position-relative row form-group">
                                        <label for="street_address" class="col-md-3 text-md-center col-form-label">
                                            Street Address</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$order->street_address}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="town_city" class="col-md-3 text-md-center col-form-label">
                                            Town City</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$order->town_city}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="country"
                                            class="col-md-3 text-md-center col-form-label">Country</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$order->country}}</p>
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="payment_type" class="col-md-3 text-md-center col-form-label">Payment Type</label>
                                        <div class="col-md-9 col-xl-8">
                                            @if ($order->payment_type=='pay_later')
                                                <p>Pay Later</p>
                                            @else
                                                <p>Pay Online</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="status" class="col-md-3 text-md-center col-form-label">Status</label>
                                        <div class="col-md-9 col-xl-8">
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
                                        </div>
                                    </div>

                                    <div class="position-relative row form-group">
                                        <label for="description"
                                            class="col-md-3 text-md-center col-form-label">Description</label>
                                        <div class="col-md-9 col-xl-8">
                                            <p>{{$order->description}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row w-100 justify-content-around">
                                        <button class="btn btn-outline-info border-0 btn-xxl mb-5"
                                            id="btn_print_order"
                                            style="background-color: blue; color: white;"
                                            type="submit" data-toggle="tooltip" title="Print order"
                                            data-placement="bottom"
                                            >
                                            Print order
                                        </button>
                                        <form action="admin/order/{{$order->id}}" method="post" style="display:flex;justify-content: center;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger border-0 btn-xxl mb-5"
                                                style="background-color: red; color: white;"
                                                type="submit" data-toggle="tooltip" title="Delete"
                                                data-placement="bottom"
                                                onclick="return confirm('Do you really want to delete this item?')">
                                                DELETE ORDER
                                            </button>
                                         </form>
                                    </div>
                                </div>
                                <input type="hidden" value="{{$order->id}}" name="order_id_hidden">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <script>
                    const popup = document.querySelector('.popup_print');
                    const id = document.querySelector('input[name="order_id_hidden"]').value;
                    const btn_print_order = document.querySelector('#btn_print_order');
                    btn_print_order.addEventListener('click', ()=>{
                        window.open(`admin/order/print-order/${id}`, '_blank');
                    });
                </script>
                <!-- End Main -->
@endsection