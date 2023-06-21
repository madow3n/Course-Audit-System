@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row" style="margin:20px;">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>View {{ $user->name }}</h2>
                    </div>
                    <br />
                    @if (!$studyplan)
                        <p> no plan assigned</p>
                    @endif

                    @if ($studyplan)
                        @foreach ($semester as $sem)
                            <h5>Semester {{ $sem }}</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Course Name</th>
                                        <th>Credit</th>
                                        <th>Type(s)</th>
                                        <th>Grades</th>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($courseGroups[$sem] ?? [] as $course)
                                        <tr>
                                            <td style="width: 50px">{{ $course->code_name }}</td>
                                            <td style="width: 140px">{{ $course->name }}</td>
                                            <td style="width: 30px">{{ $course->credit }}</td>
                                            <td style="width: 120px">
                                                @foreach ($course->types as $type)
                                                    {{ $type->name }}
                                                    @if (!$loop->last)
                                                        /
                                                    @endif
                                                @endforeach
                                            </td style="width: 100px">
                                            @php
                                                $userGrade = $user->courses->where('id', $course->id)->first()?->grades;
                                                
                                            @endphp

                                            <td style="width: 100px">{{ $userGrade?->letter_grade }}</td>
                                        </tr>
                                    @endforeach

                            </table>
                            <br />
                        @endforeach
                        @php
                            $reqs = $user->getUserCourseRequirements();
                        @endphp
                        <table class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th></th>
                                    <th>Minimum Requirements</th>
                                    <th>Completed</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reqs as $req)
                                    <tr>
                                        <td>{{ $req->type->name }}</td>
                                        <td>{{ $req->min_course }}</td>
                                        <td>{{ $req->num_of_courses_fulfilled }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td><b>Credits:</b></td>
                                    <td><b>132 </b></td>
                                    <td><b>{{ $user->getUserCredit() }}</b></td>
                                </tr>
                                <tr>
                                    <td><b>CGPA</b></td>
                                    <td><b>2.0</b></td>
                                    <td><b>{{ $user->getCGPA() }}</b></td>
                                </tr>
                        </table>
                </div><br />
                <h6>Note: Core, Math, F-MathSciTech, and F-Core courses will be marked as incomplete and needs to be retaken
                    to complete if the grade is DD or F.</h6><br />
                <h6> Incomplete courses:</h6>
                <table class="table">
                    <thead class="thead-light">
                        <tr>
                            <th>Code</th>
                            <th>Course Name</th>
                            <th>Type(s)</th>
                        </tr>
                    </thead>
                    @foreach ($user->getFailedCourses() as $fail)
                        <tr>
                            <td>{{ $fail->code_name }}</td>
                            <td>{{ $fail->name }}</td>

                            <td>
                                @foreach ($fail->types as $type)
                                    {{ $type->name }}
                                    @if (!$loop->last)
                                        /
                                    @endif
                                @endforeach
                            </td>
                    @endforeach
                    </tr>
                    @endif
            </div>
        </div>
    </div>
    </div>
@endsection
