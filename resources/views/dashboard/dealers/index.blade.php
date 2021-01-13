@extends('layouts.dashboard.app', ['datatable' => true])

@section('title')
    التجار
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['التجار'])
        @slot('url', ['#'])
        @slot('icon', ['list'])
    @endcomponent
    <div class="card">
        <div class="card-header">
            {{-- @permission('dealers-create')
                <button  href="#" style="display:inline-block; margin-left:1%" class="btn btn-primary btn-sm pull-left dealer" data-toggle="modal" data-target="#dealerModal">
                    <i class="fa fa-user-plus"> اضافة</i>
                </button>
            @endpermission --}}
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>رقم الهاتف</th>
                        <th>العنوان</th>
                        <th>نوع التجارة</th>
                        {{-- <th>خيارات</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dealers as $dealer)
                        <tr>
                            <td>{{ $dealer->name }}</td>
                            <td>{{ $dealer->phone }}</td>
                            <td>{{ $dealer->address }}</td>
                            <td>@lang('orders.' . \App\Order::STATUS[$dealer->user->trade_type])</td>
                            {{-- <td>
                                @permission('enteries-read')
                                    <a href="{{ route('dealers.show', $dealer->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-list"></i> كشف حساب</a>
                                @endpermission
                                @permission('dealers-update')
                                    <button class="btn btn-warning btn-xs dealer update " data-toggle="modal" data-target="#dealerModal" data-action="{{ route('dealers.update', $dealer->id) }}" data-name="{{ $dealer->name }}" data-phone="{{ $dealer->phone }}" data-address="{{ $dealer->address }}"><i class="fa fa-edit"></i> تعديل </button>
                                @endpermission
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
