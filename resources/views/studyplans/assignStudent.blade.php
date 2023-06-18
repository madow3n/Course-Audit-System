@extends('layouts.admin')
@section('content')
    <div class="card" style="margin:20px;">
        <div class="card-header">Assign to Students</div>
        <div class="card-body">
            @error('students')
                <small>select student(s) to continue</small>
            @enderror
            <form action="{{ url('/admin/studyplans/' . $studyplan->id . '/assignStudent') }}" method="POST">
                @csrf
                @foreach ($students as $student)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="students[]" value="{{ $student->id }}"
                            id="{{ $student->id }}">
                        <label class="form-check-label" id="{{ $student->id }}">
                            <p>{{ $student->name }}</p>
                        </label>
                    </div>
                @endforeach
                <input type="submit" value="Save" class="btn btn-success"><br />
            </form>

        </div>
    @endsection
