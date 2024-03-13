<table id="example-delete" class="table table-striped text-md-nowrap">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Age</th>
        <th>Main Phone Number </th>
        <th> Gender </th>
        <th>Start date</th>
        <th> Actions </th>
        <th>Second Phone Number </th>
    </tr>
    </thead>
    <tbody>
    @foreach($patients as $patient)

        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $patient->name }}</td>
            <td>{{ $patient->age }}</td>
            <td>{{ $patient->phone }}</td>
            <td>{{ $patient->gender == 2 ? "Male": "Female" }}</td>
            <td>{{ $patient->created_at->format('Y-m-d h:i:s') }}</td>
            <td>
                <a class="btn btn-outline-primary btn-sm update_patient_form"
                   style="color: white"
                   data-toggle="modal"
                   data-target="#updateModal"
                   data-id="{{ $patient->id }}"
                   data-name="{{ $patient->name }}"
                   data-age="{{ $patient->age }}"
                   data-phone="{{ $patient->phone }}"
                   data-gender="{{ $patient->gender }}"
                   data-phone2="{{ $patient->phone2 }}"
                   href=""
                >
                    <i class="las la-edit"></i>
                </a>

                <a class="btn btn-outline-danger btn-sm delete_patient"
                   style="color: white"
                   data-id="{{ $patient->id }}"
                   href=""
                >
                    <i class="las la-trash"></i>
                </a>

            </td>
            <td>{{ $patient->phone2 ?? " There isn't a Second Number" }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $patients->links() }}
