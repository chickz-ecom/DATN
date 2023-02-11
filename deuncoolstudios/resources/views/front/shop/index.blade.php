@extends('front.layout.master')
@section('title', 'Shop')
@section('body')

    <!-- Breadcrumb Section Begin  -->
    
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Breadcrumb Section End -->

    <!-- Product Shop Section Begin  -->
    
    <div class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 product-sidebar-filter">
                    @include('front.shop.components.products-sidebar-filter')
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <form action="">
                                    <div class="select-option">
                                        <select name="sort_by" id="" class="sorting" onChange="this.form.submit();">
                                            <option value="lastest" {{ request('sort_by') == 'lastest' ? 'selected' : '' }}>Sorting: Lastest</option>
                                            <option value="oldest" {{ request('sort_by') == 'lastest' ? 'selected' : '' }}>Sorting: Oldest</option>
                                            <option value="name-ascending" {{ request('sort_by') == 'lastest' ? 'selected' : '' }}>Sorting: Name A-Z</option>
                                            <option value="name-descendeing" {{ request('sort_by') == 'lastest' ? 'selected' : '' }}>Sorting: Name Z-A</option>
                                            <option value="price-ascending" {{ request('sort_by') == 'lastest' ? 'selected' : '' }}>Sorting: Ascending</option>
                                            <option value="price-descending" {{ request('sort_by') == 'lastest' ? 'selected' : '' }}>Sorting: Decrease</option>
                                        </select>
                                        <select name="show" id="" class="p-show" onChange="this.form.submit();">
                                            <option value="3" {{ request('show') == '6' ? 'selected' : '' }}>Show:6</option>
                                            <option value="9" {{ request('show') == '9' ? 'selected' : '' }}>Show:9</option>
                                            <option value="15" {{ request('show') == '15' ? 'selected' : '' }}>Show:15</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    @include('front.components.product-item',['product'=>$product])
                                </div>
                            @endforeach
                        </div>
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
    
    <!-- Product Shop Section End -->

    <!-- Breadcrumb Section Begin  -->
    
    
    
    <!-- Breadcrumb Section End -->

@endsection