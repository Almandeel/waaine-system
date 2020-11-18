@extends('layouts.dashboard.app', ['datatable' => true, 'modals' => ['tender']])

@section('title')
    الطلبات | عرض
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['الطلبات', 'عرض'])
        @slot('url', [route('orders.index'),'#'])
    @endcomponent
    <div class="card">
        <div class="card-header">
            طلب رقم {{ $order->id }}

            {{-- @permission('orders-print')
                <a href="{{ route('reports.order', $order->id) }}" target="_blank" class="btn btn-secondary btn-sm float-left">طباعة</a>
            @endpermission --}}

        </div>
        <div class="card-body">
            <table style="margin-bottom:3%" class="table table-bordered table-hover text-center bm-4">
                <thead>
                    <tr>
                        <th colspan="4">بيانات الطلب</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>اسم العميل</th>
                        <td>{{ $order->customer->name }}</td>
                        <th>رقم الهاتف</th>
                        <td>{{ $order->customer->phone }}</td>
                    </tr>
                    <tr>
                        <th>نوع الطلب</th>
                        <td>{{ \App\Order::STATUS[$order->type] }}</td>
                        <th>اسم الطلب</th>
                        <td>{{ $order->name }}</td>
                    </tr>
                    <tr>
                        <th>اسم التاجر</th>
                        <td>{{ $order->dealer->name ?? '-' }}</td>
                        <th>رقم الهاتف</th>
                        <td>{{ $order->dealer->phone ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>عنوان التاجر</th>
                        <td>{{ $order->dealer->address ?? '-' }}</td>
                    </tr>
                </tbody>
            </table>

            <div>
                <label for="">صورة الطلب</label>
                <img style="width: 100%" src="{{ asset('images/orders/' . $order->image) }}" alt="">
            </div>

            @role(['superadmin', 'customer', 'services'])
                {{-- <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr><th colspan="5">افضل العروض</th></tr>
                        <tr>
                            <th>#</th>
                            @role(['superadmin', 'services'])
                                <th>اسم الشركة</th>
                            @endrole
                            <th>مدة الشحن</th>
                            <th>السعر</th>
                            <th>خيارات</th>
                        </tr>
                    </thead>
                    @foreach ($order->tenders->where('status', 0) as $index=>$tender)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            @role(['superadmin', 'services'])
                                <td>{{ $tender->company->name }}</td>
                            @endrole
                            <td>{{ $tender->duration }}</td>
                            <td>{{ $tender->price }}</td>
                            <td>
                                <form style="display: inline-block" action="{{ route('orders.update', $order->id) }}?type=received" method="post">
                                    @csrf 
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm">
                                        <i class="fa fa-check"> موافقة </i>
                                        <input type="hidden" name="company_id" value="{{ $tender->company_id }}">
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table> --}}
            @endrole
        </div>
        <div class="card-footer">
            
        </div>
    </div>
@endsection

