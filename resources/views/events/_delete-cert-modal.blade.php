<!-- Modal -->
<div class="modal fade" id="deleteCertModal" tabindex="-1" aria-labelledby="deleteCertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteCertModalLabel">Delete Certificate?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::open(['url'=>'/certificates', 'method'=>'delete']) !!}
        <div class="modal-body">
          Are you sure you want to delete the certificate issued for
          <span id="recipient" style="font-weight: 700"></span>?
          {!! Form::hidden('cert_id', null,['id'=>'cert_id']) !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Delete Certificate</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
</div>
