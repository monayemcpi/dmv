@extends('app')

@section('content')

<div class="card mt-5">

  <div class="card-header bg-success text-white d-flex justify-content-between">
    <h4><i class="fa fa-plus"></i> Create Question</h4>
    <a  class="btn btn-primary" href="{{ route('questions.index') }}"> <i class="fa fa-question"></i> All Questions</a>
  </div>

  <div class="card-body">

    <form action="{{ route('questions.store') }}" method="POST" id="questionForm" enctype="multipart/form-data">
        @csrf


        <div class="form-group mb-3">
            <label class="mb-2"><strong>Question:</strong></label>
            <input required
                type="text"
                name="question"
                class="form-control @error('name') is-invalid @enderror"
                id="inputName"
                placeholder="Enter question">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        
 <div class="form-group mb-3">
            <label class="mb-2"><strong>Upload Image:</strong></label>
            <img src="" alt="" id = "imgPrev" style =" width: 100px; height: 100px ">
            <input 
                type="file"
                accept="image/*" 
                name="image"
                class="form-control @error('name') is-invalid @enderror"
                id="inputImg"
                placeholder="">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group mb-3">
            <label class="mb-2" ><strong>Option 1:</strong></label>
            <input required
                type="text"
                name="options[]"
                class="form-control @error('options') is-invalid @enderror"
                id="Option"
                placeholder="Enter Option 1">
            @error('option')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label class="mb-2" ><strong>Option 2:</strong></label>
            <input required
                type="text"
                name="options[]"
                class="form-control @error('options') is-invalid @enderror"
                id="Option"
                placeholder="Enter Option 2">
            @error('option')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-group mb-3">
            <label class="mb-2" ><strong>Option 3:</strong></label>
            <input required
                type="text"
                name="options[]"
                class="form-control @error('options') is-invalid @enderror"
                id="Option"
                placeholder="Enter Option 3">
            @error('option')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>


      <div class="form-group mb-3">
            <label class="mb-2" ><strong>Option 4:</strong></label>
            <input required
                type="text"
                name="options[]"
                class="form-control @error('options') is-invalid @enderror"
                id="Option"
                placeholder="Enter Option 4">
            @error('option')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

    <div class="form-group mb-3">
<label class="mb-2" ><strong>Answer:</strong></label>
    <select class="form-control" name="answer" required>
            <option value>Select Answer</option>
            <option value="0">Option 1</option>
            <option value="1">Option 2</option>
            <option value="2">Option 3</option>
            <option value="3">Option 4</option>
        </select>

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
$("#questionForm").validate();
// Image Preview
inputImg.onchange = evt => {
const [file] = inputImg.files
// debugger;
  if (file) {
    imgPrev.src = URL.createObjectURL(file)
  }
}




</script>

@endsection