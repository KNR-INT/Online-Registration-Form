@include('head')

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">



<div class="alert alert-success alert-dismissible fade" role="alert">
    <strong>Payment Has been Successfully Received</strong>
</div>
<a href="{{route('paytm.purchase')}}">Check the demo again</a>
<a href="{{ url ('dashboard')}}"  class="nav-item nav-link active" ><i class="fa fa-home"></i><span>HOME</span></a>
<!-- <a href="{{ url ('dashboard')}}"><h4>HOME</h4></a> -->



@include('footer')