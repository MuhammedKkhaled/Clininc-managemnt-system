<!-- Modal -->
<div class="modal" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">

    <form action="" method="post" id="updatePatientForm" autocomplete="off">
        @csrf
        <input type="hidden" id="up_id">

        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="updateModalLabel">Basic Modal</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="errMsgContainer mb-3">
                    </div>

                    <div class="form-group">
                        <label for="name" class="form-label">Patient Name</label>
                        <input type="text" name="up_name" id="up_name" class="form-control">
                    </div>

                    <div class="form-group mt-4">
                        <label for="age" class="form-label">Patient Age</label>
                        <input type="text" name="up_age" id="up_age" class="form-control">
                    </div>

                    <div class="form-group mt-4">
                        <label for="phone" class="form-label">Patient Phone</label>
                        <input type="text" name="up_phone" id="up_phone" class="form-control">
                    </div>

                    <div class="form-group mt-4">
                        <label for="phone2" class="form-label">Alternative Phone</label>
                        <input type="text" name="up_phone2" id="up_phone2" class="form-control">
                    </div>

                    <div class="form-group mt-4">
                        <label for="up_gender" class="form-label"> Gender </label>
                        <select id="up_gender" required class="form-control">
                            <option value="1">Female</option>
                            <option value="2">Male</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary update_patient" type="button">Update Patient</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </form>

</div>


