<!-- Modal -->
<div class="modal fade" id="issueCertModal" tabindex="-1" aria-labelledby="issueCertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="issueCertModalLabel">Issuance of Certificate</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::open(['url'=>'/certificates/' . $event->id, 'method'=>'post']) !!}
        <div class="modal-body">

            <div class="form-group">
                {!! Form::label('recipient_name', 'Name of Recipient') !!}
                {!! Form::text('recipient_name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('recipient_designation', 'Designation') !!}
                {!! Form::text('recipient_designation', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('recipient_org', 'Organization') !!}
                {!! Form::text('recipient_org', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('remarks', 'Remarks') !!}
                {!! Form::text('remarks', null, ['class'=>'form-control']) !!}
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">
              <i class="fa fa-check"></i> Issue Certificate
          </button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
</div>
