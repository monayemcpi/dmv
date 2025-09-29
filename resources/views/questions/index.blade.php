@extends('app')

@section('content')

<div class="card mt-5">

  <div class="card-header bg-success text-white d-flex justify-content-between">
    <h4> <i class="fa fa-question"></i> Questions</h4>
    <a  class="btn btn-primary" href="{{ route('questions.create') }}"> <i class="fa fa-plus"></i> Create New Question</a>
  </div>

  <div class="card-body">
        <table class="table table-bordered table-striped mt-4 data-table">
            <thead>
                <tr>
                    <th width="80px">Sl #</th>
                    <th>Question</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
                @php $i=0; @endphp
            @forelse ($questions as $question)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $question->question }}</td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('questions.edit',$question->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                        <a href="{{ route('questions.show',$question->id) }}" class="btn btn-sm btn-success text-white"><i class="fa fa-eye"></i> View</a>
                        <form action="{{ route('questions.destroy',$question->id) }}" method="POST">
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
  </div>
</div>
@endsection


@section('script')

<script>

$(document).ready( function () {
    $('.data-table').DataTable();
} );

</script>

@endsection