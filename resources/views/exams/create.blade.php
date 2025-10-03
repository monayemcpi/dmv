@extends('app')

@section('content')

<div class="card mt-5">

  <div class="card-header bg-success text-white d-flex justify-content-between">
    <h4><i class="fa fa-plus"></i> Make Exam</h4>
    <a  class="btn btn-primary" href="{{ route('exams.index') }}"> <i class="fa fa-question"></i> All Exams</a>
  </div>



  <div class="card-body">

        <div class="row">
        <div class="col-md-12">
            @if(isset($answerStatus))

                @if($answerStatus == true)
                    <div class="alert alert-success alert-dismissible fade show">
                        <button type="button" class="btn-close" data-dismiss="alert"
                            aria-hidden="true"></button>
                        <strong>Correct Answer</strong>
                    </div>
                @else
                    <div class="alert alert-danger alert-dismissible fade show">
                        <button type="button" class="btn-close" data-dismiss="alert"
                            aria-hidden="true"></button>
                        <strong>Warning!</strong> Wrong Answer
                    </div>
                @endif

            @endif
        </div>
    </div>

    <form action="{{ route('exams.store') }}" method="POST" id="questionForm">
      <input type="hidden" name="exam_record_id" value="{{ $examRecordId }}" readonly class="form-control">
        @csrf

        <h5 class="mb-2"><strong>Question:</strong></h5>  
        <div class="form-group mb-3">
            <h6>{{ $question->question }}?</h4>
            <input required
                type="hidden"
                name="question_id"
                class="form-control"
                readonly
                value="{{ $question->id }}"
                placeholder="Enter question">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
         @if ($question -> image) 
            <img src="{{ asset($question -> image)  }}" alt="" style =" width: 100px; height: 100px " id = "imgPrev" >
            @endif
            <hr>

       <div class="options mb-3">
        @php $i=0; @endphp
          @foreach ($question->options as $option )
            <div class="form-group mb-4">
            <div class="form-check radioHolder">
              <input class="form-check-input" type="radio" name="answer"  value="{{ $i++ }}">
              <p class="form-check-label">
                {{ $option }}
              </p>
            </div>
          </div>
          @endforeach
        </div>
        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>

    </form>

  </div>
</div>

<style>
    .error{
        color:red;
    }
</style>

@endsection

@section('script')

<script>
//$("#questionForm").validate();

$(function(){


var options = $(".options");

options.html(options.find(".radioHolder").sort(function() {
  return (Math.random() - 0.5);
}));



})

</script>

@endsection