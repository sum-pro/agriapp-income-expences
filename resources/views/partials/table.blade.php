@extends("home")
@section("table")
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Department</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Subhash</td>
            <td>Administration</td>
            <td>88***88***</td>
            <td class="gx-5">
                <div class="row">
                <a class="edit" title="Edit" data-toggle="tooltip"><i class="fas fa-edit"></i></a>
                </div>
                <div class="row">
                <a class="delete text-danger" title="Delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>
            </div>
            </td>
        </tr>      
    </tbody>
</table>
@endsection