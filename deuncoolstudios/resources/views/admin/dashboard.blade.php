
@extends('admin.layout.master')
@section('title', 'Dashboard')
@section('body')
<div class="container">
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Trang chủ</h1>
              <h3 class="mt-2">Doanh thu cửa hàng</h3>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <div class="row pl-5">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner" style="    text-align: center;
            padding: 20px;">
              <h3>{{ $sum }}</h3>
    
              <p>Tổng số lượng đơn hàng</p>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner" style="    text-align: center;
            padding: 20px;">
              <h3>{{ number_format($total) }} VND</h3>
    
              <p>Tổng doanh thu</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner" style="    text-align: center;
            padding: 20px; border-radius: 6px;">
              <h3>{{ $count_user }}</h3>
    
              <p>Tổng số thành viên</p>
            </div>
          </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-12 mt-5">
        <h3>Thống kê doanh thu</h3>
    </div>
    <div class="d-flex mt-3" style="">
        <div class="form-group col-4">
            <label for="date_start">Date Start</label>
            <input class="date-filter" type="date" name="date_start" width="100"/>
        </div>
        <div class="form-group col-4">
            <label for="date_end">Date End</label>
            <input class="date-filter" type="date" name="date_end" width="100"/>
        </div>
    </div>
    <button type="button" class="btn btn-filter-thongke ml-3" style="background-color: #16aaff" >
        Lọc kết quả  
    </button>
    <div class="container notification-filter bg-warning mt-2 ml-3">
        <p class=" m-0"> 
        </p>
    </div>
    <div class="container mt-4">
    <div class="row pl-5">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner" style="    text-align: center;
            padding: 20px; border-radius: 6px;">
              <h3 name='filter_count'>0</h3>
    
              <p>Tổng số lượng đơn hàng</p>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner" style="    text-align: center;
            padding: 20px;">
              <h3 name='filter_total'>0 VND</h3>
    
              <p>Tổng doanh thu</p>
            </div>
          </div>
        </div>
    </div>
</div>
</div>
<script>
    let btn = document.querySelector(".btn-filter-thongke");
    const dateStart = document.querySelector('input[name=date_start]');
    const dateEnd = document.querySelector('input[name=date_end]');
    const count = document.querySelector('h3[name="filter_count"]');
    const total = document.querySelector('h3[name="filter_total"]');
    const noti = document.querySelector('.notification-filter');
    let $dateEnd = new Date();
    let $dateStart = new Date($dateEnd.setDate($dateEnd.getDate() - 7));
    $dateEnd = new Date();
    $dateEnd = new Date($dateEnd.setDate($dateEnd.getDate() + 1));
    $dateEnd = formatDate($dateEnd);
    $dateStart = formatDate($dateStart);
    dateEnd.defaultValue = $dateEnd;
    dateStart.defaultValue = $dateStart;
    function formatDate(date) {
      var d = new Date(date),
          month = '' + (d.getMonth() + 1),
          day = '' + d.getDate(),
          year = d.getFullYear();

      if (month.length < 2) 
          month = '0' + month;
      if (day.length < 2) 
          day = '0' + day;

      return [year, month, day].join('-');
    }
    btn.addEventListener('click', (e)=>{
        $.ajax({
            
            url: 'admin/filter',

            // Type of Request
            type: "GET",
            data: {start: dateStart.value, end:dateEnd.value},
            success: function (data) {
                if(data.count != 0 && data.total){
                  count.innerHTML = data.count;
                  data.total = Intl.NumberFormat().format(data.total) + ' VND';
                  total.innerHTML = data.total;
                  noti.style.maxHeight = '0px';
                  return;
                }else{
                  count.innerHTML = 0;
                  total.innerHTML = 0 + 'VND';
                  noti.innerHTML = "don't have result!!";
                  noti.style.maxHeight = '40px';
                }
                
            },
            error: function (error) {
                console.log(`Error ${error}`);
            }
        });
    });
    document.addEventListener('DOMContentLoaded', ()=>{
      $.ajax({
            
            url: 'admin/filter',

            // Type of Request
            type: "GET",
            data: {start: dateStart.value, end:dateEnd.value},
            success: function (data) {
                if(data.count != 0 && data.total){
                  count.innerHTML = data.count;
                  data.total = Intl.NumberFormat().format(data.total) + ' VND';
                  total.innerHTML = data.total


                  return;
                }else{
                  noti.innerHTML = "don't have result!!";
                  noti.style.maxHeight = '40px';
                }
                
            },
            error: function (error) {
                console.log(`Error ${error}`);
            }
        });
    })
</script>
@endsection