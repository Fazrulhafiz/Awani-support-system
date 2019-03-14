@extends('layouts.awani')

@section('content')
    {!! Form::open(['route' => 'mcr.new-request.store']) !!}

    <div class="po-form">
      <div id="non-issued-editable">
        <h1>IT Division</h1>
        <div class="break"></div>
        <table class="po-general-table">
          <tr>
            <td class="big-text" colspan=2>REQUEST <span data-input-name="po_number">INFO</span></td>
            <td class="big-text text-right" colspan=2>Rev. No <span data-input-name="revision">0</span></td>
          </tr>
          <tr>
            <td class="label">Type of request</td>
            <td>
              @foreach($request_type as $request)
              {!! Form::checkbox('request_type', $request->id, null) !!} {{ $request->description }}
              @endforeach
            </td>
          </tr>
          <tr>
            <td class="label">Position</td>
            <td>
              @foreach($emp_position as $position)
              {!! Form::checkbox('emp_position', $position->id, null) !!} {{ $position->description }}
              @endforeach
            </td>
          </tr>
        </table>
        <div class="break"></div>
        <table class="po-addresses">
          <tr>
            <td class="big-text" colspan=4>Custodian details</td>
          </tr>
          <tr>
            <td class="label">Custodian status</td>
            <td>
              @foreach($custodian_status as $custodian_status)
              {!! Form::radio('custodian_status', $custodian_status->id, null) !!} {{ $custodian_status->description }}
              @endforeach
            </td>
            <td class="label">Duration</td>
            <td>
                {!! Form::text('custodian_duration', null, ['class' => 'table-field', 'data-input-name' => 'custodian_duration']) !!}
            </td>
          </tr>
          <tr>
            <td class="label">Name</td>
            <td colspan=3>
              {!! Form::text('custodian_name', null, ['class' => 'table-field', 'data-input-name' => 'custodian_name']) !!}
            </td>
          </tr>
          <tr>
            <td class="label">Employee ID</td>
            <td>
              {!! Form::text('custodian_id', null, ['class' => 'table-field', 'data-input-name' => 'custodian_id']) !!}
            </td>
            <td class="label">Designation</td>
            <td>
              {!! Form::text('custodian_designation', null, ['class' => 'table-field', 'data-input-name' => 'custodian_designation']) !!}
            </td>
          </tr>
          <tr>
            <td class="label">Department &amp; Division</td>
            <td>
              {!! Form::text('custodian_dnd', null, ['class' => 'table-field', 'data-input-name' => 'custodian_dnd']) !!}
            </td>
            <td class="label">Location</td>
            <td>
              {!! Form::text('custodian_location', null, ['class' => 'table-field', 'data-input-name' => 'custodian_location']) !!}
            </td>
          </tr>
          <tr>
            <td class="label">Tel / Ext number</td>
            <td>
              {!! Form::text('custodian_number', null, ['class' => 'table-field', 'data-input-name' => 'custodian_number']) !!}
            </td>
            <td class="label">Network login ID</td>
            <td>
              {!! Form::text('custodian_networkid', null, ['class' => 'table-field', 'data-input-name' => 'custodian_networkid']) !!}
            </td>
          </tr>
          <tr>
            <td colspan=2></td>
            <td class="label">Cost centre</td>
            <td>
              <select data-field="period" name="custodian_cost_centre">
                  <option value="select">SELECT ONE</option>
                  @foreach($cost_centre as $cost)
                  <option value="{{$cost->id}}">{{$cost->cost_centre." ".$cost->description}}</option>
                  @endforeach
              </select>
            </td>
          </tr>
        </table>
        <div class="break"></div>
        <table class="po-addresses">
          <tr>
            <td class="big-text" colspan=4>Requester details</td>
          </tr>
          <tr>
            <td class="label">Name</td>
            <td colspan=3>
              {!! Form::text('requester_name', null, ['class' => 'table-field', 'data-input-name' => 'requester_name']) !!}
            </td>
          </tr>
          <tr>
            <td class="label">Employee ID</td>
            <td>
              {!! Form::text('requester_id', null, ['class' => 'table-field', 'data-input-name' => 'requester_id']) !!}
            </td>
            <td class="label">Designation</td>
            <td>
              {!! Form::text('requester_designation', null, ['class' => 'table-field', 'data-input-name' => 'requester_designation']) !!}
            </td>
          </tr>
          <tr>
            <td class="label">Department &amp; Division</td>
            <td>
              {!! Form::text('requester_dnd', null, ['class' => 'table-field', 'data-input-name' => 'requester_dnd']) !!}
            </td>
            <td class="label">Location</td>
            <td>
              {!! Form::text('requester_location', null, ['class' => 'table-field', 'data-input-name' => 'requester_location']) !!}
            </td>
          </tr>
          <tr>
            <td class="label">Tel / Ext number</td>
            <td>
              {!! Form::text('requester_number', null, ['class' => 'table-field', 'data-input-name' => 'requester_number']) !!}
            </td>
            <td class="label">Network login ID</td>
            <td>
              {!! Form::text('requester_networkid', null, ['class' => 'table-field', 'data-input-name' => 'requester_networkid']) !!}
            </td>
          </tr>
          <tr>
            <td colspan=2 class="label">Cost centre</td>
            <td colspan=2>
              <select data-field="period" name="requester_cost_centre">
                  <option value="select">SELECT ONE</option>
                  @foreach($cost_centre as $cost)
                  <option value="{{$cost->id}}">{{$cost->cost_centre." ".$cost->description}}</option>
                  @endforeach
              </select>
            </td>
          </tr>
        </table>
        <div class="break"></div>
        <h2>Standard computing / telecommunication / network services</h2>
        <div class="file-box">
          <table>
            <?php $x = 0; ?>
            <tr>
            @foreach($services_type as $service_type)
            <td>{!! Form::checkbox('services', $service_type->id, null) !!} {{ $service_type->description }}</td>
            <?php $x += 1; if (($x % 3) == 0) { echo "</tr>"; } ?>
            @endforeach
          </table>
        </div>
        <div class="notes-section">
          <div class="break"></div>
          <h2>JUSTIFICATION <span data-input-name="po_number">on request</span>.</h2>
          <div data-input-name="notes" data-input-type="contenteditable" class="note-box" contenteditable></div>
        </div>
        <div class="form-group col-1-3">
          <div class="grid">
            {!! Form::submit('Apply', ['class' => 'col-1-4']) !!}
            <a class="col-2-4" href="{{ url('/mcr') }}">Cancel</a>
          </div>
        </div>
      </div>
    </div>

    {!! Form::close() !!}
@endsection
