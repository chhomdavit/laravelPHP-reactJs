@extends('admin.dashboard')

@section('content')
    <h1>Sale Report</h1>

    <div class="row">

        <div class="col-lg-4 col-6">
          <div class="small-box bg-info elevation-3">
            <div class="inner">
              <p>Total Orders</p>
              <h3>{{ $orderCount }} person</h3>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-6">
          <div class="small-box bg-success elevation-3">
            <div class="inner">
              <p>Total Bill</p>
              <h3>{{ $totalBill }}<sup style="font-size: 20px"> $</sup></h3>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

      </div>
@endsection



