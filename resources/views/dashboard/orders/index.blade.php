@extends('layouts.dashboard.app', ['datatable' => true])

@section('title')
    الطلبات
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['الطلبات'])
        @slot('url', ['#'])
        @slot('icon', ['list'])
    @endcomponent
    <div class="card">
        <div class="card-header">
            <h3 class="card-title float-right">قائمة الطلبات</h3>
            @permission('orders-create')
                <a  href="{{ route('orders.create') }}" style="display:inline-block; margin-left:1%" class="btn btn-primary btn-sm float-left">
                    <i class="fa fa-plus"> اضافة</i>
                </a>
            @endpermission
        </div>
        <div id="app" class="card-body">
                <table style="width:100%" id="datatable" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>رقم الطلب</th>
                        <th>نوع الطلب</th>
                        <th>الاسم</th>
                        <th>رقم الهاتف</th>
                        <th>تاريخ الانشاء</th>
                        <th>خيارات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $index=>$order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $order->id }}</td>
                            <td> @lang('orders.' . \App\Order::STATUS[$order->type]) </td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->user->phone }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                @permission('orders-read')
                                    <a  href="{{ route('orders.show', $order->id) }}" class="btn btn-default btn-sm">
                                        <i class="fa fa-read"> عرض</i>
                                    </a>
                                @endpermission

                                {{-- @permission('orders-update')
                                    <a  href="{{ route('orders.edit', $order->id) }}" class="btn btn-warning btn-sm">
                                        <i class="fa fa-edit"> تعديل</i>
                                    </a>
                                @endpermission --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $orders->appends(request()->all())->links() }}
        </div>
    </div>
@endsection