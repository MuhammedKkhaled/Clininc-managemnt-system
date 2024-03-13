<!-- Modal -->
<div class="modal" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">

    <form action="{{route("appointments.store")}}" method="post" id="addPatientForm" autocomplete="off">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="addModalLabel">Adding Appointments</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="errMsgContainer mb-3">
                    </div>

                    <div class="form-group">
                        <label for="name" class="form-label">Patient Name </label>
                        <select id="name" class="form-control" name="patient_id">
                            <option value="0" selected disabled> -- Chose Name Please -- </option>
                            @foreach($patients as $patient)
                                 <option value="{{ $patient->id }}" > {{ $patient->name  }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-4">
                        <label for="appointment" class="form-label"> Appointment Date </label>
                        <input type="date" name="appointment" id="appointment" value="{{ date('Y-m-d') }}" class="form-control" placeholder="Enter Patient age">
                    </div>

                    <div class="form-group mt-4">
                            <label for="notes">Notes:</label>
                            <textarea name="notes" id="notes" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary add_product" type="submit"> Add Appointment </button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button"> Close </button>
                </div>
            </div>
        </div>
    </form>
</div>


