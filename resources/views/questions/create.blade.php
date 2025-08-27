@extends('welcome')

@section('content')

<div class="card mt-5">
  <h4 class="card-header">Add New Question</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('questions.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>

    <form action="{{ route('questions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Question:</strong></label>
            <input
                type="text"
                name="question"
                class="form-control @error('name') is-invalid @enderror"
                id="inputName"
                placeholder="Enter question">
            @error('name')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Option 1:</strong></label>
            <input
                type="text"
                name="options[]"
                class="form-control @error('name') is-invalid @enderror"
                id="Option"
                placeholder="Enter Option 1">
            @error('option')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Option 2:</strong></label>
            <input
                type="text"
                name="options[]"
                class="form-control @error('name') is-invalid @enderror"
                id="Option"
                placeholder="Enter Option 2">
            @error('option')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Option 3:</strong></label>
            <input
                type="text"
                name="options[]"
                class="form-control @error('name') is-invalid @enderror"
                id="Option"
                placeholder="Enter Option 3">
            @error('option')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>


      <div class="mb-3">
            <label for="inputName" class="form-label"><strong>Option 4:</strong></label>
            <input
                type="text"
                name="options[]"
                class="form-control @error('name') is-invalid @enderror"
                id="Option"
                placeholder="Enter Option 4">
            @error('option')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
    </form>

  </div>
</div>
@endsection