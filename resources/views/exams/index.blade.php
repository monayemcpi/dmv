@extends('app')

@section('content')

<div class="card mt-5">

  <div class="card-header bg-success text-white d-flex justify-content-between">
    <h4> <i class="fa fa-question"></i> Questions</h4>
    <a  class="btn btn-primary" href="{{ route('exam.create') }}"> <i class="fa fa-plus"></i> Take a exam</a>
  </div>

  <div class="card-body">
        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">Sl #</th>
                    <th>Exam date</th>
                    <th>Score</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($exams as $exam)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $exam->date }}</td>
                    <td></td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('exam.show',$question->id) }}" class="btn btn-sm btn-success text-white"><i class="fa fa-eye"></i> View Result</a>
                        <form action="{{ route('exam.destroy',$question->id) }}" method="POST">
                             @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                        </form>
                    </td>
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