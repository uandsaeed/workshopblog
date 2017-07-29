 <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

 <!-- jQuery -->
 <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.min.js') }}"></script>
 <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



<!-- Bootstrap Core JavaScript -->
 <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
 <script type="text/javascript" src="{{ URL::asset('assets/js/select2.js') }}"></script>

 <script  type="text/javascript">
     $(document).ready(function() {
         $("#category").select2();
     });
 </script>