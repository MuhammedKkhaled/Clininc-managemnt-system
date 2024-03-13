<!-- Modal -->
<div class="modal" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">

    <form action="" method="post" id="addPatientForm" autocomplete="off">
        @csrf
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title" id="addModalLabel">Basic Modal</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="errMsgContainer mb-3">
                    </div>

                    <div class="form-group">
                        <label for="name" class="form-label">Patient Name </label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Patient Name">
                    </div>

                    <div class="form-group mt-4">
                        <label for="age" class="form-label">Patient Age</label>
                        <input type="text" name="age" id="age" class="form-control" placeholder="Enter Patient age">
                    </div>

                    <div class="form-group mt-4">
                        <label for="phone" class="form-label">Patient Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter Patient phone">
                    </div>

                    <div class="form-group mt-4">
                        <label for="phone2" class="form-label">Alternative Phone</label>
                        <input type="text" name="phone2" id="phone2" class="form-control" placeholder="Enter Another Phone">
                    </div>

                    <div class="form-group mt-4">
                        <label for="gender" class="form-label"> Gender </label>
                        <select id="gender" required class="form-control">
                            <option value="1">Female</option>
                            <option value="2">Male</option>
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary add_product" type="button">Add Patient</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </form>

</div>


