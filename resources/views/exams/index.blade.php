@extends('app')

@section('content')

<div class="card mt-5">

  <div class="card-header bg-success text-white d-flex justify-content-between">
    <h4> <i class="fa-solid fa-user-graduate"></i> Exams</h4>
    <a  class="btn btn-primary" href="{{ route('exams.create') }}"> <i class="fa fa-plus"></i> Take a exam</a>
  </div>

  <div class="card-body">
        <table class="table table-bordered table-striped mt-4 data-table">
            <thead>
                <tr>
                    <th width="80px">Sl #</th>
                    <th>Exam date</th> 
                    <th>Exam time</th> 
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
                @php $i=0; @endphp
            @forelse ($examRecord as $exam)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ date("m-d-Y", strtotime($exam->date))  }}</td>
                    <td>{{ date('h:i:s a', strtotime($exam->time))  }}</td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('exams.show',$exam->id) }}" class="btn btn-sm btn-success text-white"><i class="fa fa-eye"></i> View Result</a>
                        <form action="{{ route('exams.destroy',$exam->id) }}" method="POST">
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