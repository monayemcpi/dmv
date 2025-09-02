@extends('app')

@section('content')

<div class="card mt-5">

  <div class="card-header bg-success text-white d-flex justify-content-between">
    <h4><i class="fa fa-edit"></i> Edit Question</h4>
    <a  class="btn btn-primary" href="{{ route('questions.index') }}"> <i class="fa fa-question"></i> All Questions</a>
  </div>

  <div class="card-body">

    <form action="{{ route('questions.update', $questions->id) }}" method="POST">
       @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label class="mb-2"><strong>Question:</strong></label>
            <input
                type="text"
                name="question"
                value="{{ $questions->question }}"
                class="form-control @error('name') is-invalid @enderror"
                id="inputName"
                placeholder="Enter question">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        @php $i=1; $ck=1;@endphp
        @foreach ($questions->options as $option )            
        
        <div class="form-group mb-3">
            <label class="mb-2" ><strong>Option {{ $i }}:</strong></label>
            <input
                type="text"
                name="options[]"
                value="{{ $option }}"
                class="form-control @error('options') is-invalid @enderror"
                id="Option"
                placeholder="Enter Option {{ $i++ }}">
            @error('option')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        @endforeach




    <div class="form-group mb-3">
<label class="mb-2" ><strong>Answer:</strong></label>
    <select class="form-select" name="answer" aria-label="Default select example">
        <option value="">Select Answer</option>
        @for ($i=0;$i<4;$i++)
            <option {{ $questions->answer == $i ? 'selected':''  }} value="{{$i}}">Option {{ $ck++ }}</option>
        @endfor
    </select>
    </div>


        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>

    </form>

  </div>
</div>
@endsection