@extends('app')

@section('content')

<div class="card mt-5">

  <div class="card-header bg-success text-white d-flex justify-content-between">
    <h4> <i class="fa-solid fa-user-graduate"></i> Result</h4>
    <a  class="btn btn-primary" href="{{ route('exams.index') }}"> <i class="fa fa-plus"></i>All Exams</a>
  </div>

  <div class="card-body">
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">Sl #</th>
                    <th>Question</th>
                    <th>Answer</th>
                </tr>
            </thead>

            <tbody>
                @php $i=0; @endphp
            @forelse ($result as $row)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $row->question }}</td>
                    <td>{!! $row->status == 1 ?'<i class="fa-solid fa-check text-success"></i>':'<i class="fa-solid fa-x text-danger"></i>' !!}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">There are no data.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
  </div>
</div>
@endsection