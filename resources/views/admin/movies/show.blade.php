@extends('admin.layout')
@section('title')
    Xem chi tiết phim
@endsection
@section('content')
    <!-- Tiêu đề trang -->
    <h1 class="text-center">Chi tiết phim</h1>
    <!-- Form nhập liệu -->
    
        <!-- Khu vực ID -->
        <div class="mt-3">
            <span class="form-label">ID</span>
            <input disabled type="text" class="form-control" value="{{ $movie->id }}" />
        </div>

        <!-- Khu vực name -->
        <div class="mt-3">
            <span class="form-label">Tên phim</span>
            <input disabled type="text" class="form-control"  value="{{ $movie->title }}"/>
        </div>
        <!-- Khu vực Hình ảnh -->
        <div class="mt-3">
            <span class="form-label">Hình ảnh phim</span>
            <img width="100px" src="{{ asset('/storage/'.$movie->poster) }}" alt="">
        </div>
        <!-- Giá sản phẩm -->
        <div class="mt-3">
            <span class="form-label">Ngày khởi chiếu</span>
            <input disabled type="text" class="form-control" value="{{ $movie->release_date }}" />
        </div>
        <!-- Khu vực Mô tả sản phẩm -->
        <div class="mt-3">
            <span class="form-label">Mô tả phim</span>
            <textarea disabled class="form-control"  id="" cols="30" rows="10" >{{ $movie->intro }}</textarea>
        </div>
        <!-- Khu vực danh mục -->
        <div class="mt-3">
            <span class="form-label">Loại phim</span>
            <input type="text" class="form-control" disabled value="{{ $movie->gene->name }}">
        </div>
        <!-- Khu vực button submit -->
        <div class="text-center mt-3">
            <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">Quay lại</a>
            <!-- <button type="submit" ng-click="onClickSubmit()" class="btn btn-success">Thêm</button> -->
        </div>
   
    <!--  -->

@endsection