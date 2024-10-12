
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Bootstrap Core CSS -->
        <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{asset('admin/css/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="{{asset('admin/css/timeline.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="{{asset('admin/css/startmin.css')}}" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="{{asset('admin/css/morris.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
        
        <!-- DataTables CSS -->
        <link href="{{asset('admin/css/dataTables/dataTables.bootstrap.css')}}" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="{{asset('admin/css/dataTables/dataTables.responsive.css')}}" rel="stylesheet">
 

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <title>@yield('title','Admin Website')</title>
    </head>

    <body>

        <div id="wrapper">
            @include('admin.layouts.nav')

            @include('admin.layouts.aside')


            <div id="page-wrapper" style="margin-top: 30px">
                <div class="container-fluid">
                    <div class="row">
                        @yield('content')
                    </div>            
                </div>
            </div>
        </div>
        <!-- /#wrapper -->
        
        <!-- jQuery -->
        <script src="{{asset('admin/js/jquery.min.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="{{asset('admin/js/metisMenu.min.js')}}"></script>

        <!-- Morris Charts JavaScript -->
        <script src="{{asset('admin/js/raphael.min.js')}}"></script>
        <script src="{{asset('admin/js/morris.min.js')}}"></script>
        <script src="{{asset('admin/js/morris-data.js')}}"></script>

        <!-- Custom Theme JavaScript -->
        <script src="{{asset('admin/js/startmin.js')}}"></script>


        <!-- DataTables JavaScript -->
        <script src="{{asset('admin/js/dataTables/jquery.dataTables.min.js')}}"></script>

        <script src="{{asset('admin/js/dataTables/dataTables.bootstrap.min.js')}}"></script>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function () {
                $('#dataTables-example').DataTable({
                    responsive: true
                });
            });
        </script>


    </body>

</html>