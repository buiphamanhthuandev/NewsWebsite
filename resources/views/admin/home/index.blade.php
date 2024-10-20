@extends('admin.layouts.app')

@section('title','Admin Website')

@section('content')
<div class="row">
{{-- post--}}
<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-file-text fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{$countPost}}</div>
                    <div>Post</div>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
{{-- category--}}
<div class="col-lg-3 col-md-6">
    <div class="panel panel-green">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-tags fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{$countCategory}}</div>
                    <div>Category!</div>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
{{-- contact--}}
<div class="col-lg-3 col-md-6">
    <div class="panel panel-yellow">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-envelope fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{$countContact}}</div>
                    <div>Contact!</div>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
{{-- user--}}
<div class="col-lg-3 col-md-6">
    <div class="panel panel-red">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-user fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{$countUser}}</div>
                    <div>Account</div>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
{{-- subscribe--}}
<div class="col-lg-3 col-md-6">
    <div class="panel panel-green">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-bell fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{$countSubscribe}}</div>
                    <div>Subscribe!</div>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
{{-- comment--}}
<div class="col-lg-3 col-md-6">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="row">
                <div class="col-xs-3">
                    <i class="fa fa-comments fa-5x"></i>
                </div>
                <div class="col-xs-9 text-right">
                    <div class="huge">{{$countComment}}</div>
                    <div>Comment!</div>
                </div>
            </div>
        </div>
        <a href="#">
            <div class="panel-footer">
                <span class="pull-left">View Details</span>
                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                <div class="clearfix"></div>
            </div>
        </a>
    </div>
</div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="col-lg-12">
            {{-- biểu đồ cột --}}
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Biểu đồ bài viết
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Bài viết
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#" id="views-asc">Lượt xem tăng dần</a>
                                </li>
                                <li><a href="#" id="views-desc">Lượt xem giảm dần</a>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                Sắp xếp theo ngày
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" role="menu">
                                <li><a href="#" id="by-day">Sắp xếp theo ngày</a>
                                </li>
                                <li><a href="#" id="by-week">Sắp xếp theo tuần</a>
                                </li>
                                <li><a href="#" id="by-month">Sắp xếp theo tháng</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <canvas id="area-chart"></canvas>
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
        <div class="col-lg-12">

        </div>
    </div>
    <div class="col-lg-4">
        {{-- biểu đồ tròn --}}
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Biểu đồ số lượng bài viết theo danh mục
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <canvas id="category-chart"></canvas>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>



{{-- xử lý biểu đồ cột --}}
<script>
    let ctx = document.getElementById('area-chart').getContext('2d');
    let areaChart = new Chart(ctx,{
        type: 'bar',
        data:{
            labels:[],
            datasets:[{
                label:'Số lượng bài viết',
                data:[],
                backgroundColor :'rgba(75, 192, 192, 0.2)',
                borderColor:'rgba(75, 192, 192, 1)',
                borderWidth:1,
                fill: true,
            }]
        },
        options:{
            scales:{
                x:{beginAtZero: true},
                y:{beginAtZero: true}
            }
        }
    });
    function loadData(orderBy = 'views',direction = 'asc',groupBy = 'day'){
        $.ajax({
            url: '/admin/home/ChartPost',
            method:'GET',
            data:{
                order_by:orderBy, direction: direction,group_by : groupBy
            },
            success: function(response){ 
                if(groupBy === 'month'){
                    const months = ['Tháng 1','Tháng 2','Tháng 3','Tháng 4','Tháng 5','Tháng 6','Tháng 7','Tháng 8','Tháng 9','Tháng 10','Tháng 11','Tháng 12'];
                    const labels = response.map(post => months[post.month - 1]);
                    const data = response.map(post => post.total);

                    areaChart.data.labels = labels;
                    areaChart.data.datasets[0].data = data;
                    areaChart.update();

                }else if(groupBy === 'week'){
                    const dayOrWeek = ['Chủ nhật','Thứ hai','Thứ ba','Thứ tu','Thứ năm','Thứ sáu','Thứ bảy'];
                    const labels = response.map(post => dayOrWeek[post.day_of_week - 1]);
                    const data = response.map(post => post.total);
                    areaChart.data.labels = labels;
                    areaChart.data.datasets[0].data = data;
                    areaChart.update();

                }else{
                    const labels = response.map(post => 'Ngày ' + post.period);
                    const data = response.map(post => post.total);

                    areaChart.data.labels = labels;
                    areaChart.data.datasets[0].data = data;
                    areaChart.update();
                }
                
            }
        })
    }
    loadData();

    //dropdown tăng giảm views
    $('#views-asc').click(() => loadData('views','asc'));
    $('#views-desc').click(() => loadData('views','desc'));

    //dropdown theo ngày tuần thàng năm
    $('#by-day').click(() => loadData('views','asc','day'));
    $('#by-week').click(() => loadData('views','asc','week'));
    $('#by-month').click(() => loadData('views','asc','month'));
</script>

{{-- xử lý biều đồ tròn --}}
<script>
    const picChart = document.getElementById('category-chart').getContext('2d');
    let categoryChart = new Chart(picChart,{
        type: 'pie',
        data : {
            labels : [],
            datasets: [{
                label : 'Số lượng bài viết',
                data: [],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                hoverOffset: 4
            }],
        },
        options:{
            responsive: true,
            plugins: {
                legend: {
                    position : 'top',
                },
                title: {
                    display: true,
                    text : 'Số lượng bài viết theo danh mục'
                }
            }
        }
    });
    function loadCategoryData(){
        $.ajax({
            url:'/admin/home/ChartCategory',
            method: 'GET',
            success: function(response){
                const labels = response.map(category => category.name);
                const data = response.map(category => category.posts_count);

                categoryChart.data.labels = labels;
                categoryChart.data.datasets[0].data = data;
                categoryChart.update();
            },
            error: function(xhr, status, error) {
                console.error("Error fetching data: ", error); // Hiển thị lỗi nếu có
            }
        })
    }
    loadCategoryData();
</script>
@endsection