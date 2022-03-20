@extends('layouts.app')

@section('content')

<div class="row center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><h3 class="float-start">{{ __('Empolyees') }}</h3> <a class="float-end" href="{{route('employee-form')}}"><button class="btn btn-primary">Add Employee</button></a></div>

            <div class="card-body">
                {{--<div class="row w-100 mb-2">
                    <div class="col-md-2 text-center"> <span>Search by date</span> <input class="datepicker" type="text"></div>
                    <div class="col-md-9"></div>
                </div>--}}
                <table class="table table-striped" style="width:100%" id="employee_info">
                    <thead>
                        <tr>
                            <th>Sr no.</th>
                            <th>Employee name</th>
                            <th>Email address</th>
                            <th>Contact number</th>
                            <th>Gender</th>
                            <th>Joining date</th>
                            <th>DOB</th>
                            <th>Department</th>
                            <th>Education</th>
                            <th>hobby</th>
                            <th>Experience</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $counter = 1;@endphp
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$counter++}}</td>
                                <td>{{$employee->name}}</td>
                                <td>{{$employee->email}}</td>
                                <td>{{$employee->contact_number}}</td>
                                <td>{{$employee->gender}}</td>
                                <td>{{date("d-M-Y", strtotime($employee->joined))}}</td>
                                <td>{{date("d-M-Y", strtotime($employee->dob))}}</td>
                                <td>{{$employee->Deparment->depart_name}}</td>
                                <td>{{$employee->Hobby->hobby_name}}</td>
                                <td>{{$employee->Education->edu_name}}</td>
                                <td>{{$employee->experience}} Years</td>
                                <td><a href="{{ asset('../storage/app/images/'.$employee->photo) }}" target="_blank"><img src="{{ asset('../storage/app/images/'.$employee->photo) }}" style="max-width: 75px; max-height: 75px"></a></td>
                                <td><button class="btn btn-danger" onclick="loadDelete({{$employee->id}});"><i class="fa fa-trash"></i></button></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route("delete-employee")}}" method="post">
                @csrf
                <input name="employee" type="hidden" id="employee_id">
                <div class="modal-body">
                    <p>Confirm deletion of this employee.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push("scriptBottom")
    <script>
        var table = $('table').DataTable({
            "pageLength": 50,
            "columnDefs": [
                { "targets": [5,8,9,10], "searchable": false }
            ]
        });

        $(".datepicker").datepicker({
            format: 'dd-M-yyyy',
            onClose: function(selectedDate) {
                table.fnDraw();
            }
        });

        function loadDelete(id){
            $("#employee_id").val(id);
            $("#delete").modal("show");
        }
    </script>
@endpush
