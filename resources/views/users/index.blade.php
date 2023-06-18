@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Students</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{ url('/admin/users/create') }}" class="btn btn-success btn-sm" title="Add New Student">
                            Add New Students
                        </a> <br /><br />
                        <form action="{{ url('/admin/users/promote') }}" method="POST">
                            @csrf
                            <button class="btn btn-success btn-sm" title="Add New Student">Promote Students</button>
                        </form>
                    </div>
                    <br />
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Year Level</th>
                                    <th>Year</th>
                                    <th>email</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->year_level }}</td>
                                        <td>{{ $item->academicYear->year }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <a href="{{ url('/admin/users/' . $item->id . '/view') }}"
                                                title="View Student"><button type="button"
                                                    class="btn btn-info">View</button></a>
                                            <a href="{{ url('/admin/users/' . $item->id . '/edit') }}"
                                                title="Edit Student"><button type="button"
                                                    class="btn btn-primary">Edit</button></a>
                                            <form method="POST" action="{{ url('/admin/users/' . $item->id) }}"
                                                accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                @csrf
                                                <button type="submit" title="Delete user" onclick="return confirm("Confirm
                                                    delete?") class="btn btn-danger">Delete</button>
                                            </form>
                                            @if ($item->custom_studyplan_id)
                                                <form method="POST"
                                                    action="{{ url('/admin/users/' . $item->id . '/destroyPlan') }}"accept-charset="UTF-8"
                                                    style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary">Remove Custom
                                                        Plan</button></a>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
