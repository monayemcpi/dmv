@extends('welcome')

@section('content')

<div class="card mt-5">
  <h4 class="card-header">Questions</h4>
  <div class="card-body">

        @session('success')
            <div class="alert alert-success" role="alert"> {{ $value }} </div>
        @endsession

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="{{ route('questions.create') }}"> <i class="fa fa-plus"></i> Create New Question</a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($questions as $question)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $question->question }}</td>
                    <td>{{ $question->options }}</td>
                    <td></td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">There are no data.</td>
                </tr>
            @endforelse
            </tbody>

        </table>

        {!! $questions->links() !!}

  </div>
</div>
@endsection