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
                {!! Form::checkbox('req_type', 'type 1', null) !!} {{ 'type 1' }}
                {!! Form::checkbox('req_type', 'type 2', null) !!} {{ 'type 2' }}
            </td>
          </tr>
          <tr>
            <td class="label">Position</td>
            <td>
                {!! Form::checkbox('emp_position', 'type 1', null) !!} {{ 'type 1' }}
                {!! Form::checkbox('emp_position', 'type 2', null) !!} {{ 'type 2' }}
                {!! Form::checkbox('emp_position', 'type 3', null) !!} {{ 'type 3' }}
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
              {!! Form::checkbox('custodian_status', 'type 1', null) !!} {{ 'type 1' }}
              {!! Form::checkbox('custodian_status', 'type 2', null) !!} {{ 'type 2' }}
              {!! Form::checkbox('custodian_status', 'type 3', null) !!} {{ 'type 3' }}
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
              {!! Form::text('custodian_name', null, ['class' => 'table-field', 'data-input-name' => 'custodian_name']) !!}
            </td>
            <td class="label">Location</td>
            <td>
              {!! Form::text('custodian_name', null, ['class' => 'table-field', 'data-input-name' => 'custodian_name']) !!}
            </td>
          </tr>
          <tr>
            <td class="label">Tel / Ext number</td>
            <td>
              {!! Form::text('custodian_name', null, ['class' => 'table-field', 'data-input-name' => 'custodian_name']) !!}
            </td>
            <td class="label">Network login ID</td>
            <td>
              {!! Form::text('custodian_name', null, ['class' => 'table-field', 'data-input-name' => 'custodian_name']) !!}
            </td>
          </tr>
          <tr>
            <td colspan=2 class="label">Cost centre</td>
            <td colspan=2>
              <select data-field="period" name="cost_centre">
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
              {!! Form::text('requester_name', null, ['class' => 'table-field', 'data-input-name' => 'custodian_name']) !!}
            </td>
          </tr>
          <tr>
            <td class="label">Employee ID</td>
            <td>
              {!! Form::text('requester_name', null, ['class' => 'table-field', 'data-input-name' => 'custodian_name']) !!}
            </td>
            <td class="label">Designation</td>
            <td>
              {!! Form::text('requester_name', null, ['class' => 'table-field', 'data-input-name' => 'custodian_name']) !!}
            </td>
          </tr>
          <tr>
            <td class="label">Department &amp; Division</td>
            <td>
              {!! Form::text('requester_name', null, ['class' => 'table-field', 'data-input-name' => 'custodian_name']) !!}
            </td>
            <td class="label">Location</td>
            <td>
              {!! Form::text('requester_name', null, ['class' => 'table-field', 'data-input-name' => 'custodian_name']) !!}
            </td>
          </tr>
          <tr>
            <td class="label">Tel / Ext number</td>
            <td>
              {!! Form::text('requester_name', null, ['class' => 'table-field', 'data-input-name' => 'custodian_name']) !!}
            </td>
            <td class="label">Network login ID</td>
            <td>
              {!! Form::text('requester_name', null, ['class' => 'table-field', 'data-input-name' => 'custodian_name']) !!}
            </td>
          </tr>
          <tr>
            <td colspan=2 class="label">Cost centre</td>
            <td colspan=2>
              <select data-field="period" name="cost_centre">
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
          @foreach($services_type as $service_type)
          {!! Form::checkbox('services', $service_type->description, null) !!} {{ $service_type->description }}
          @endforeach
        </div>
        <div class="notes-section">
          <div class="break"></div>
          <h2>JUSTIFICATION <span data-input-name="po_number">on request</span>.</h2>
          <div data-input-name="notes" data-input-type="contenteditable" class="note-box" contenteditable></div>
        </div>
      </div>
    </div>

    {!! Form::close() !!}
@endsection
