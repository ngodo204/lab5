@extends('admin.layout')
@section('title') Danh sách phim @endsection
@section('content')
<div>
    <h1 class="text-center">Danh sách phim</h1>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
   <form action="{{ route('admin.movies.index') }}" method="get"  name="form-admin" id="adminForm">
        @csrf
        <div class="d-flex justify-content-between">
            <div class="d-flex ">
                <input class="form-control" type="text" id="filter_search" name="search" placeholder="enter search" value="{{ request()->get('search') }}">
                <span id="search" class="btn btn-secondary ms-2">Search</span>
                <span id="clear" class="btn btn-light ms-2">Clear</span>

    </form>
            </div>
            <a href="{{ route('admin.movies.create') }}" class="btn btn-success">Thêm mới phim</a>
        </div>
        <table class="table table-striped table-bordered text-center mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên phim</th>
                    <th>Hình ảnh</th>
                    <th>Ngày công chiếu</th>
                    <th>Loại phim</th>
                    <td>Status</td>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="">
                @foreach ($movies as $movie)
                <tr >
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->title }}</td>
                    <td><img width="60px" src="{{ asset('/storage/'. $movie->poster) }}" alt="" /></td>
                    <td>{{ $movie->release_date }}</td>
                    <td>{{ $movie->gene->name }}</td>
                   
                    @php
                        $strStatus = ($movie->status == 0) ? "red" : "green";
                        $link = route('admin.movies.changeStatus', ['id'=> $movie->id, 'status' => $movie->status]) 
                    @endphp 
                    <td>
                        <a id="status-{{ $movie->id }}" href="">
                            <span style="display: inline-block;width: 20px; height:20px; border-radius: 50%; background: {{ $strStatus }}"></span>
                        </a>
                    </td>
                    <td class="text-nowrap">
                    <div class="d-flex justify-content-center">
                            <a href="{{ route('admin.movies.show', $movie) }}" class="btn btn-primary">Xem</a>
                            <a href="{{ route('admin.movies.edit', $movie) }}" class="btn btn-warning ms-2">Sửa</a>
                            <form class="ms-2 delete-button" action="{{ route('admin.movies.destroy', $movie) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger delete-button" onclick="return confirm('Bạn có muốn xóa không?')">Xóa</button>
                            </form>
                    </div>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    
    {{ $movies->links() }}
    
</div>

@endsection

@section('script-libs')
<script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>
<script>
    $("#search").click(function () {
    $("#adminForm").submit();
});

// Submit Form Clear
// Submit Form Search
$("#clear").click(function () {
    $("#filter_search").val("");
    $("#adminForm").submit();
});

$("#adminForm").submit(function() {
        // Disable all delete buttons
       
    });

function changeStatus(url) {
    // console.log(url);
    // $.get(
    //     url,
    //     function (data, status) {
    //        console.log(status);
    //        console.log(data);
    //     },
    // );

    $.ajax({
        type: "POST",
        url: url,
        data: "changeStatus",
        // dataType: "json",
        success: function (response) {
            console.log(response);
        }
    });
}
</script>
@endsection