@extends('layouts.dashboard.app', ['datatable' => true, 'modals' => ['hall']])

@section('title')
    @if(request()->type == 1)
        الصالات
    @else 
        الفنادق
    @endif
@endsection

@section('content')
    @component('partials._breadcrumb')
        @if(request()->type == 1)
            @slot('title', ['الصالات'])
        @else 
            @slot('title', ['الفنادق'])
        @endif
        @slot('url', ['#'])
        @slot('icon', ['list'])
    @endcomponent
    <div class="card">
        <div class="card-header">
            @permission('halls-create')
                <button style="display:inline-block; margin-left:1%" class="btn btn-primary btn-sm pull-right hall" data-toggle="modal" data-target="#hallModal">
                    <i class="fa fa-user-plus"> اضافة</i>
                </button>
            @endpermission
        </div>
        <div class="card-body">
            <table id="datatable" class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <th>العنوان</th>
                        <th>الهاتف</th>
                        <th>خيارات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($halls as $hall)
                        <tr>
                            <td>{{ $hall->name }}</td>
                            <td>{{ $hall->address }}</td>
                            <td>{{ $hall->phone }}</td>
                            <td>
                                @permission('halls-read')
                                    <a href="{{ route('halls.show', $hall->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-eye"></i> عرض</a>
                                @endpermission
                                
                                @permission('halls-update')
                                    <button class="btn btn-warning btn-xs hall update " data-toggle="modal" data-target="#hallModal" data-action="{{ route('halls.update', $hall->id) }}" data-name="{{ $hall->name }}" data-phone="{{ $hall->phone }}" data-address="{{ $hall->address }}"><i class="fa fa-edit"></i> تعديل </button>
                                @endpermission
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
