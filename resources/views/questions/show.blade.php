@extends('app')

@section('content')

<div class="card mt-5">

  <div class="card-header bg-success text-white d-flex justify-content-between">
    <h4><i class="fa fa-eye"></i> Show Question</h4>
    <a  class="btn btn-primary" href="{{ route('questions.index') }}"> <i class="fa fa-question"></i> All Questions</a>
  </div>

  <div class="card-body">

    <div class="form-group mb-3">
        <strong class="mb-2">Question</strong>
        <p>{{ $questions->question }}</p>
    </div>
@if ($questions->image)
       <div class="form-group mb-3">
        <strong class="mb-2">Image</strong>
        <img src="{{asset($questions->image)}}" alt="" style="width: 150px; height: 150px; object-fit: contain;">
    </div>
@endif



    @php $i=1 @endphp
    @foreach ($questions->options as $option )
        <div class="form-group mb-3">
        <strong class="mb-2">Option: {{ $i++ }}</strong>
        <p>{{ $option }}</p>
    </div>
        
    @endforeach

    <div class="form-group">
      <strong for="">Answer : </strong>
      @if (array_key_exists($questions->answer, $questions->options))

      <span class="badge rounded-pill bg-success">Option {{ $questions->answer+1 }} </span>
      <p>{{ $questions->options[$questions->answer] }}</span>

      @else

      <span>No Answer</span>
        
      @endif
      
    </div>

  </div>
</div>
@endsection