@extends('admin.layout')
@section('title')
    Chỉnh sửa mới phim
@endsection
@section('content')
    <div class="m-5">
        <!-- Tiêu đề trang -->
        <h1 class="text-center">Chỉnh sửa thông tin phim</h1>
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <!-- Form nhập liệu -->
        <form action="{{ route('admin.movies.update', $movie) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Khu vực name -->
            <div class="mt-3">
                <span class="form-label">Tên phim</span>
                <input type="text" class="form-control"  name="title" value="{{ $movie->title }}"/>
            </div>
            <!-- Khu vực Hình ảnh -->
            <div class="mt-3">
                <span class="form-label">Hình ảnh phim</span>
                <input type="file" class="form-control"  name="poster"/>
                <br>
                <img width="100px" src="{{ asset('/storage/'.$movie->poster) }}" alt="">
            </div>
            <!-- Giá sản phẩm -->
            <div class="mt-3">
                <span class="form-label">Ngày chiếu phim</span>
                <input type="date" class="form-control" name="release_date" value="{{ $movie->release_date }}"/>
            </div>
            <!-- Khu vực Mô tả sản phẩm -->
            <div class="mt-3">
                <span class="form-label">Mô tả phim</span>
                <textarea class="form-control" name="intro" id="" cols="30" rows="10" >{{ $movie->intro }}</textarea>
            </div>
            <!-- Khu vực danh mục -->
            <div class="mt-3">
                <span class="form-label">Thể loại phim</span>
                <select name="gene_id" id="" class="form-select" >
                    @foreach ($genes as $id => $name)
                        <option value="{{ $id }}"
                        @if ($movie->gene_id == $id)
                            selected
                        @endif
                        >{{ $name }}</option>
                    @endforeach
                    
                </select>
            </div>
            <!-- Khu vực button submit -->
            <div class="text-center mt-3">
                <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary">Quay lại</a>
                <button type="submit"  class="btn btn-success">Sửa</button>
            </div>
        </form>
        <!--  -->
    </div>
@endsection