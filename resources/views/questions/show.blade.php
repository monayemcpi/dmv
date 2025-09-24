@extends('app')

@section('content')

<div class="card mt-5">

  <div class="card-header bg-success text-white d-flex justify-content-between">
    <h4><i class="fa fa-eye"></i> Show Question</h4>
    <a  class="btn btn-primary" href="{{ route('questions.index') }}"> <i class="fa fa-question"></i> All Questions</a>
  </div>

  <div class="card-body">

    <div class="form-group mb-3">
        <label class="mb-2">Question</label>
        <input type="text" class="form-control" value="{{ $questions->question }}" readonly>
    </div>

     <div class="form-group mb-3">
        <label class="mb-2">Image</label>
        <img src="{{asset($questions->image)}}" alt="">
    </div>
    @php $i=1 @endphp
    @foreach ($questions->options as $option )
        <div class="form-group mb-3">
        <label class="mb-2">Option {{ $i++ }}</label>
        <input type="text" class="form-control" value="{{ $option }}" readonly>
    </div>
        
    @endforeach

    <div class="form-group">
      <label for="">Answer : </label>
      @if (array_key_exists($questions->answer, $questions->options))

      <span class="badge rounded-pill bg-success">Option {{ $questions->answer+1 }} </span>
      <span>{{ $questions->options[$questions->answer] }}</span>

      @else

      <span>No Answer</span>
        
      @endif
      
    </div>

  </div>
</div>
@endsection