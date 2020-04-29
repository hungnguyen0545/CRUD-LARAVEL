<!-- Modal -->
<div class="modal fade" id="ModalCalendar" tabindex="-1" role="dialog" aria-labelledby="ModalCalendar" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id='formEvent'>      
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-8">
              <input type='hidden' name='id' name='id'> 
                <input type="text" class="form-control" name='title' id="title">
            </div> 
        </div>
        <div class="form-group row">
            <label for="start" class="col-sm-2 col-form-label">Start Time</label>
            <div class="col-sm-8">
                <input type="text" class="form-control date-time" name="start" id="start">
            </div> 
        </div>
        <div class="form-group row">
            <label for="end" class="col-sm-2 col-form-label">End Time</label>
            <div class="col-sm-8">
                <input type="text" class="form-control date-time" name="end" id="end">
            </div> 
        </div>
        <div class="form-group row">
            <label for="color" class="col-sm-2 col-form-label">Color </label>
            <div class="col-sm-8">
                <input type="color" class="form-control" name="color" id="color">
            </div> 
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-8">
                <textarea name="description" id="description" cols='40' rows='4'></textarea>
            </div> 
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary " data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger deleteEvent">Delete</button>
        <button type="button" class="btn btn-primary saveEvents">Save changes</button>
      </div>
    </div>
  </div>
</div>