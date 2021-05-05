@extends('layouts.dashboard.app')

@section('title')
    الطلبات | اضافة
@endsection

@push('css')
    <style>
        .card {
            padding-bottom:5%
        }
    </style>
@endpush

@section('content')
    @component('partials._breadcrumb')
        @slot('title', ['الطلبات' , 'اضافة'])
        @slot('url', [route('orders.index'),'#'])
    @endcomponent
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">اضافة طلب</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="order_type">نوع الطلب</label>
                    </div>
                    <select class="custom-select" name="type"  id="order_type">
                        <option id="none" value="">نوع الطلب</option>
                        <option id="none" value="1">طبي</option>
                        <option id="none" value="2">موضة</option>
                        <option id="none" value="3">الكترونيات</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>الاسم </label>
                            <input  type="text" name="name" class="form-control" placeholder="الاسم ">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>الصورة </label>
                            <input  type="file" name="image" class="form-control" placeholder="الصورة ">
                        </div>
                    </div>
                    
                </div>
                <hr>
                <div class="container">
                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-save"></i> اكمال العملية</button>
                </div>

            </form>
        </div>
    </div>
@endsection


