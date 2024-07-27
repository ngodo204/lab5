<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gene;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Danh sách phim
    public function index(Request $request)
    {
        $query = Movie::query();
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%");
        }
        $movies = $query->latest('id')->paginate(10);
        return view('admin.movies.index', compact('movies'));
    }



    public function changStatus(Request $request)
    {
        dd($request->all());
        $id = $request->query('id');
        $status = $request->query('status');
        dd($status);
    }


    // Xem chi tiết phim
    public function show(Movie $movie)
    {

        return view('admin.movies.show', compact('movie'));
    }

    // Hiển thị form thêm mới phim
    public function create()
    {
        $genes = Gene::query()->pluck('name', 'id');

        return view('admin.movies.create', compact('genes'));
    }

    // Lưu trữ & thêm mới phim
    public function store(Request $request)
    {
        $data = $request->except('poster');
        $data['poster'] = '';
        if ($request->hasFile('poster')) {
            $path_poster = $request->file('poster')->store('admin/images/movies');
            $data['poster'] = $path_poster;
        }

        Movie::query()->create($data);
        return redirect()->route('admin.movies.index')->with('message', 'Thêm mới thành công');
    }

    // Hiển thị form edit
    public function edit(Movie $movie)
    {
        $genes = Gene::query()->pluck('name', 'id');
        return view('admin.movies.update', compact('genes', 'movie'));
    }

    // Chỉnh sửa thông tin phim
    public function update(Movie $movie, Request $request)
    {
        $data = $request->except('poster');
        $poster_old = $movie['poster'];
        $data['poster'] = $poster_old;

        if ($request->hasFile('poster')) {
            $path_poster = $request->file('poster')->store('admin/images/movies');
            $data['poster'] = $path_poster;
        }



        $movie->update($data);
        if ($request->hasFile('poster')) {
            if ($poster_old && file_exists('storage/' . $poster_old)) {
                unlink('storage/' . $poster_old);
            }
        }
        return redirect()->back()->with('message', 'Sửa thông tin thành công');
    }

    // Xóa thông tin phim
    public function destroy(Movie $movie)
    {
        $poster = $movie->poster;
        $movie->delete();
        if ($poster && file_exists('storage/' . $poster)) {
            unlink('storage/' . $poster);
        }

        return redirect()->route('admin.movies.index')->with('message', 'Xóa thành công');
    }
}
