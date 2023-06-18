@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Courses</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/admin/courses/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            Add New Course
                        </a>
                    </div>
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Code Name</th>
                                    <th>Credit</th>
                                    <th>Types</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->code_name }}</td>
                                        <td>{{ $item->credit }}</td>
                                        <td>
                                            @foreach ($item->types as $type)
                                                {{ $type->name }}
                                                @if (!$loop->last)
                                                    /
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ url('/admin/courses/' . $item->id . '/edit') }}"
                                                title="Edit Courses"><button type="button"
                                                    class="btn btn-primary">Edit</button></a>
                                            <form method="POST" action="{{ url('/admin/courses/' . $item->id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" title="Delete course"
                                                    onclick="return confirm("Confirm delete?")
                                                    class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
