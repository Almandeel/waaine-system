@extends('layouts.dashboard.app', ['datatable' => true, 'modals' => ['dealer']])

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
            @permission('dealers-create')
                <button style="display:inline-block; margin-left:1%" class="btn btn-primary btn-sm pull-right dealer" data-toggle="modal" data-target="#DealerModal">
                    <i class="fa fa-user-plus"> اضافة</i>
                </button>
            @endpermission
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>رقم الهاتف</th>
                        <th>العنوان</th>
                        <th>نوع التجارة</th>
                        <th>خيارات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dealers as $dealer)
                        <tr>
                            <td>{{ $dealer->name }}</td>
                            <td>{{ $dealer->phone }}</td>
                            <td>{{ $dealer->address }}</td>
                            <td>{{$dealer->user ? __('orders.' . \App\Order::STATUS[$dealer->user->trade_type]) : '-'}}</td>
                            <td>
                                @permission('enteries-read')
                                    <a href="{{ route('dealers.show', $dealer->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-list"></i> عرض</a>
                                @endpermission
                                @permission('users-update')
                                    <form style="display:inline-block" action="{{ route('users.update', $dealer->user->id) }}?type=status" method="post">
                                        @csrf 
                                        @method('PUT')
                                        <button class="btn btn-{{ $dealer->user->status ? 'danger' : 'success' }} btn-xs" type="submit"><i class="fa fa-{{ $dealer->user->status ? 'times' : 'check' }}"></i> {{$dealer->user->status ? 'الغاء التفعيل' : 'تفعيل' }} </a>
                                    </form>
                                @endpermission
                                @permission('dealers-update')
                                    <button class="btn btn-warning btn-xs dealer update " data-toggle="modal" data-target="#DealerModal" data-action="{{ route('dealers.update', $dealer->id) }}" data-name="{{ $dealer->name }}" data-longitude="{{ $dealer->longitude }}" data-latitude="{{ $dealer->latitude }}" data-phone="{{ $dealer->phone }}" data-address="{{ $dealer->address }}"><i class="fa fa-edit"></i> تعديل </button>
                                @endpermission
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $dealers->links() }}
        </div>
    </div>
@endsection
