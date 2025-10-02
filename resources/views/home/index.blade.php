@extends('app')
@section('content')
<div class="row">

    <div class="col-md-4">
        <div class="card border-primary mb-3 mt-3" style="max-width: 18rem;">
            <div class="card-header">Total Questions</div>
            <div class="card-body text-primary">
                <h5 class="card-title">{{ $questions?$questions:'-' }}</h5>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-primary mb-3 mt-3" style="max-width: 18rem;">
            <div class="card-header">No. of Exam</div>
            <div class="card-body text-primary">
                <h5 class="card-title">{{ $exams?$exams:'-' }}</h5>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-primary mb-3 mt-3" style="max-width: 18rem;">
            <div class="card-header">Last Exam Taken</div>
            <div class="card-body text-primary">
                <h5 class="card-title">{{ $lastExam ? date("m-d-Y", strtotime($lastExam->date)):'-' }}</h5>
            </div>
        </div>
    </div>

</div>

@endsection