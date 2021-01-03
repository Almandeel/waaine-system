@extends('layouts.dashboard.app')

@section('title')
    @if($hall->type == 1) الصالات@else الفنادق@endif
@endsection

@section('content')
    @component('partials._breadcrumb')
        @slot('title', [$hall->type == 1  ?  'الصالات' : 'الفنادق', 'عرض'])
        @slot('url', [route('halls.index') . "?type=" . $hall->type, '#'])
        @slot('icon', ['list', 'eye'])
    @endcomponent
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>الاسم</th>
                        <td>{{ $hall->name }}</td>
                        <th>العنوان</th>
                        <td>{{ $hall->address }}</td>
                    </tr>
                    <tr>
                        <th>رقم الهاتف</th>
                        <td>{{ $hall->phone }}</td>
                        <th>الوصف</th>
                        <td>{{ $hall->description }}</td>
                    </tr>
                    <tr>
                        <th>خط الطول</th>
                        <td>{{ $hall->longitude }}</td>
                        <th>خط العرض</th>
                        <td>{{ $hall->latitude }}</td>
                    </tr>
                    </tr>
                </thead>
            </table>
            <div class="mt-5 text-center">
                <img style="width: 100%" src="{{ asset('images/halls/' . $hall->image) }}" alt="">
            </div>
        </div>
    </div>
@endsection
