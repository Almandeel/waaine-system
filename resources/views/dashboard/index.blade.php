@extends('layouts.dashboard.app')
@section('title')
الرئيسية
@endsection
@section('content')


@role('superadmin')
<div class="">

    <h5 class="mt-4 mb-2"></h5>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-12">
            <a href="{{ route('orders.index') }}?type=deactive">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="fa fa-list"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">الطلبات الجديدة</span>
                        <span class="info-box-number">{{ $order_new }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>

        <div class="col-md-6 col-sm-6 col-12">
            <a href="{{ route('orders.index') }}?type=done">
                <div class="info-box bg-info">
                    <span class="info-box-icon"><i class="far far fa-thumbs-up"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">الطلبات المكتملة</span>
                        <span class="info-box-number">{{ $order_done }}</span>
                        
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </a>
            <!-- /.info-box -->
        </div>

    </div>



</div>
@endrole

@endsection
