@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Study Plan</h2>
                    </div>
                    <div class="card-body">
                        <a href="{{url('/admin/studyplans/create')}}" class="btn btn-success btn-sm" title="Add New Student">
                            Add New Study Plan
                        </a>
                    </div>
                    <br/>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studyplans as $item)
                                    
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <a href="{{url('/admin/studyplans/'. $item->id. '/assign')}}" ><button type="button" class="btn btn-info">Assign</button></a>
                                        <a href="{{url('/admin/studyplans/'. $item->id. '/edit')}}" title="Edit studyplan"><button type="button" class="btn btn-primary">Edit</button></a>
                                        <a href="{{url('/admin/studyplans/'. $item->id. '/unassign')}}" ><button type="button" class="btn btn-warning">Unassign</button></a>
                                        <a href="{{url('/admin/studyplans/'. $item->id. '/view')}}" ><button type="button" class="btn btn-warning">Edit Plan</button></a>
                                        <a href="{{url('/admin/studyplans/'. $item->id. '/assignStudent')}}" ><button type="button" class="btn btn-info">Assign to Student</button></a>
                                        
                                        <form method="POST" action="{{url('/admin/studyplans/'. $item->id)}}" accept-charset="UTF-8" style="display:inline">
                                            {{method_field('DELETE')}}
                                            @csrf
                                        <button type="submit" title="Delete studyplan" onclick="return confirm("Confirm delete?") class="btn btn-danger">Delete</button>
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