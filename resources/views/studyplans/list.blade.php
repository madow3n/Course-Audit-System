@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Courses</h2>
                    </div>
                    @error('courses')
                        <small> please select a course</small>
                    @enderror
                    <br />
                    <form action="{{ url('/admin/studyplans/' . $studyplans->id . '/view/list') }}" method="POST">
                        @csrf
                        <p>Add to Semester
                            <select name="semester" required id="semester" aria-label="Default select example">
                                <option value="" selected>Semester</option>
                                @foreach ($semester as $sem)
                                    <option value="{{ $sem }}">{{ $sem }}</option>
                                @endforeach
                            </select>
                        </p>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Select</th>
                                        <th>Name</th>
                                        <th>Code Name</th>
                                        <th>Credit</th>
                                        <th>Types</th>

                                    </tr>
                                </thead>
                                <tbody>


                                    @foreach ($courses as $item)
                                        <tr>
                                            <td>
                                                <input class="form-check-input" style="margin:10px;" type="checkbox"
                                                    name="courses[]" value="{{ $item->id }}"
                                                    id="couses-{{ $item->id }}" />
                                                <label class="form-check-label" id="">
                                                    <p></p>
                                                </label>
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->code_name }}</td>
                                            <td>{{ $item->credit }}</td>
                                            <td>
                                                @foreach ($item->types as $type)
                                                    {{ $type->name }}
                                                @endforeach
                                            </td>

                                        </tr>
                                    @endforeach

                            </table>
                            <input type="submit" value="Save" class="btn btn-success"><br />
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
