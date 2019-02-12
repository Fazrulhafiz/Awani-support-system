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
            <td><select data-input-name="project_id"><option value="">TCP0234</option></select></td>
            <td class="label">Issued By</td>
            <td><input data-input-name="issued_by" type="text" class="table-field" value="Craig Dykstra" disabled /></td>
          </tr>
          <tr>
            <td class="label">Order Date</td>
            <td><input data-input-name="order_date" class="table-field" type="text" /></td>
            <td class="label">Required Date</td>
            <td><input data-input-name="required_date" class="table-field" type="text" /></td>
          </tr>
        </table>
        <div class="break"></div>
        <table class="po-addresses">
          <tr><td class="big-text" colspan=4>Vendor</td><td class="big-text" colspan=4>Ship To</td></tr>
          <tr>
            <td class="label">Name</td>
            <td colspan=3><select data-input-name="vendor_id"></select></td>
            <td class="label">Name</td>
            <td colspan=3><select data-input-name="location_id"></select></td>
          </tr>
          <tr>
            <td class="label">Address</td>
            <td colspan=3><input data-input-name="vendor_address" type="text" class="table-field" /></td>
            <td class="label">Address</td>
            <td colspan=3><input data-input-name="location_address" type="text" class="table-field" /></td>
          </tr>
          <tr>
            <td class="label">City</td><td><input data-input-name="vendor_city" type="text" class="table-field" /></td>
            <td class="label">Province</td>
            <td>
              <select data-input-name="vendor_province">
                <option value=""></option>
                <option value="AB">AB</option>
                <option value="BC">BC</option>
                <option value="MB">MB</option>
                <option value="NB">NB</option>
                <option value="NL">NL</option>
                <option value="NS">NS</option>
                <option value="NT">NT</option>
                <option value="NU">NU</option>
                <option value="ON">ON</option>
                <option value="PE">PE</option>
                <option value="QC">QC</option>
                <option value="SK">SK</option>
                <option value="YT">YT</option>
              </select>
            </td>
            <td class="label">City</td><td><input data-input-name="location_city" type="text" class="table-field" /></td>
            <td class="label">Province</td>
            <td>
              <select data-input-name="location_province">
                <option value=""></option>
                <option value="AB">AB</option>
                <option value="BC">BC</option>
                <option value="MB">MB</option>
                <option value="NB">NB</option>
                <option value="NL">NL</option>
                <option value="NS">NS</option>
                <option value="NT">NT</option>
                <option value="NU">NU</option>
                <option value="ON">ON</option>
                <option value="PE">PE</option>
                <option value="QC">QC</option>
                <option value="SK">SK</option>
                <option value="YT">YT</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="label">Postal Code</td>
            <td colspan=3><input data-input-name="vendor_postal_code" type="text" class="table-field" /></td>
            <td class="label">Postal Code</td>
            <td colspan=3><input data-input-name="location_postal_code" type="text" class="table-field" /></td>
          </tr>
          <tr>
            <td class="label">Phone</td><td><input data-input-name="vendor_phone" type="text" class="table-field" /></td>
            <td class="label">Fax</td><td><input data-input-name="vendor_fax" type="text" class="table-field" /></td>
            <td class="label">Phone</td><td><input data-input-name="location_phone" type="text" class="table-field" /></td>
            <td class="label">Fax</td><td><input data-input-name="location_fax" type="text" class="table-field" /></td>
          </tr>
          <tr>
            <td class="label">Attention</td>
            <td colspan=3><input data-input-name="vendor_attention" type="text" class="table-field" /></td>
            <td class="label">Attention</td>
            <td colspan=3><input data-input-name="location_attention" type="text" class="table-field" /></td>
          </tr>
          <tr>
            <td colspan=4></td>
            <td class="label">Freight Via</td>
            <td colspan=3><input data-input-name="location_freight_via" type="text" class="table-field" /></td>
          </tr>
        </table>
        <div class="consumables-section">
          <div class="break"></div>
          <h2>Consumables</h2>
          <table class="consumables">
            <thead>
              <tr>
                <td>Item</td><td>Qty</td><td>Description</td><td>Unit Price</td><td>Extended</td><td class="delete-td"></td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td data-field="item" class="text-center">1</td>
                <td><input data-field="quantity" type="text" class="table-field" placeholder="Qty" /></td>
                <td><div data-field="description" contenteditable data-ph="Description"></div></td>
                <td><input data-field="unit-price" type="text" class="table-field text-right" placeholder="Unit Price" /></td>
                <td><input data-field="extended" type="text" class="table-field text-right" placeholder="Extended" disabled /></td>
                <td class="delete-td"><div class="delete-row-button"></div></td>
              </tr>
              <tr class="line"><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            </tbody>
          </table>
        </div>
        <div class="equipment-section">
          <div class="break"></div>
          <h2>Equipment</h2>
          <table class="equipment">
            <thead>
              <tr class="first">
                <td rowspan=2>Item</td>
                <td>Description</td>
                <td>Duration</td>
                <td>VIN/Serial #</td>
                <td>Hours</td>
                <td>Make</td>
                <td>Purchase Type</td>
                <td rowspan=2>Repl. Value</td>
                <td rowspan=2>Price</td>
                <td class="delete-td" rowspan=2></td>
              </tr>
              <tr>
                <td>Rates</td>
                <td>Period</td>
                <td>License Plate</td>
                <td>KM</td>
                <td>Model</td>
                <td>Equipment Type</td>
              </tr>
            </thead>
            <tbody>
              <tr class="first">
                <td data-field="item" rowspan=2>1</td>
                <td><div data-field="description" contenteditable data-ph="Description"></div></td>
                <td><input data-field="duration" type="text" class="table-field" placeholder="Duration" /></td>
                <td><input data-field="vin-serial" type="text" class="table-field" placeholder="VIN/Serial #" /></td>
                <td><input data-field="hours" type="text" class="table-field" placeholder="Hours" /></td>
                <td><input data-field="make" type="text" class="table-field" placeholder="Make" /></td>
                <td><select data-field="purchase-type">
                  <option value="rental">Rental</option>
                  <option value="buy_out">Buy Out</option>
                  <option value="purchase">Purchase</option>
                </select></td>
                <td rowspan=2><input data-field="replacement-value" type="text" class="table-field text-right" placeholder="Repl. Value" /></td>
                <td rowspan=2><input data-field="price" type="text" class="table-field text-right" placeholder="Price" /></td>
                <td rowspan=2 class="delete-td"><div class="delete-row-button"></div></td>
              </tr>
              <tr>
                <td class="label text-left">$/d: <input data-field="rate-day" class="rate-input" type="text" placeholder="rate" /> $/w: <input data-field="rate-week" class="rate-input" type="text" placeholder="rate" /> $/m: <input data-field="rate-month" class="rate-input" type="text" placeholder="rate" /></td>
                <td><select data-field="period">
                  <option value="">Period</option>
                  <option value="day">Day</option>
                  <option value="week">Week</option>
                  <option value="month">Month</option>
                </select></td>
                <td><input data-field="license-plate" type="text" class="table-field" placeholder="Li. Plate" /></td>
                <td><input data-field="km" type="text" class="table-field" placeholder="KM" /></td>
                <td><input data-field="model" type="text" class="table-field" placeholder="Model" /></td>
                <td><select data-field="equipment-type" name="" id="">
                  <option value="">EX - Excavator</option>
                </select></td>
              </tr>
              <tr class="line"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
            </tbody>
          </table>
          <div class="equipment">
            <div class="equipment-item">
              <table>
                <tr>
                  <td class="text-bold" colspan=11><span class="unit-number" data-field="unit_number"></span>Item <span data-field="item" data-input-type="contenteditable">1</span></td>
                </tr>
                <tr class="sizing-row"><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
                <tr>
                  <td class="label">Description</td>
                  <td colspan=9><div data-field="description" data-input-type="contenteditable" contenteditable></div></td>
                </tr>
                <tr>
                  <td class="label">Make</td>
                  <td><input data-field="make" type="text" class="table-field" /></td>
                  <td class="label">Model</td>
                  <td colspan=2><input data-field="model" type="text" class="table-field" /></td>
                  <td class="label" colspan=2>VIN/Serial #</td>
                  <td colspan=3><input data-field="vin_serial" type="text" class="table-field" /></td>
                </tr>
                <tr>
                  <td class="label">Equipment Type</td>
                  <td colspan=3><select data-field="equipment_type" name="" id=""><option value="">EX-Excavator</option></select></td>
                  <td class="label">License Plate</td>
                  <td><input data-field="license_plate" type="text" class="table-field" /></td>
                  <td class="label">Hours</td>
                  <td><input data-field="hours" type="text" class="table-field" /></td>
                  <td class="label">KM</td>
                  <td><input data-field="km" type="text" class="table-field" /></td>
                </tr>
                <tr>
                  <td class="label">Period</td>
                  <td>
                    <select data-field="period">
                      <option value="">Period</option>
                      <option value="day">Day(s)</option>
                      <option value="week">Week(s)</option>
                      <option value="month">Month(s)</option>
                    </select>
                  </td>
                  <td class="label">Duration</td>
                  <td><input data-field="duration" type="text" class="table-field" /></td>
                  <td class="label">$/d</td>
                  <td><input data-field="rate_day" type="text" class="table-field" /></td>
                  <td class="label">$/w</td>
                  <td><input data-field="rate_week" type="text" class="table-field" /></td>
                  <td class="label">$/m</td>
                  <td><input data-field="rate_month" type="text" class="table-field" /></td>
                </tr>
                <tr>
                  <td class="label">Purchase Type</td>
                  <td><select data-field="purchase_type"><option value="rental">Rental</option><option value="buy_out">Buy Out</option><option value="purchase">Purchase</option></select></td>
                  <td colspan=3></td>
                  <td class="label" colspan=2>Replacement Value</td>
                  <td colspan=2><input data-field="replacement_value" type="text" class="table-field" /></td>
                  <td class="label">Price</td>
                  <td class="price"><input data-field="price" type="text" class="table-field" /></td>
                </tr>
              </table>
              <div class="delete-row-button"></div>
            </div>
          </div>
        </div>
        <table class="totals">
          <tr>
            <td class="text-bold">Sub-Total</td>
            <td><input data-input-name="sub_total" type="text" class="table-field text-bold" disabled /></td>
          </tr>
          <tbody class="tax-container">
            <tr>
              <td><span data-field="tax-name" class="text-uppercase"></span> @ <span data-field="tax-percentage"></span>%</td>
              <td><input data-field="tax-amount" type="text" class="table-field text-right text-bold" disabled /></td><td class="delete-td"><div class="delete-row-button"></div></td>
            </tr>
          </tbody>
          <tr>
            <td class="text-bold">Total</td>
            <td><input data-input-name="total" type="text" class="table-field text-bold" disabled /></td>
          </tr>
        </table>
        <div class="notes-section">
          <div class="break"></div>
          <h2>Notes</h2>
          <div data-input-name="notes" data-input-type="contenteditable" class="note-box" contenteditable></div>
        </div>
      </div>
      <div class="file-section">
        <div class="break"></div>
        <h2 id="attach-files">Attach Files <i class="icon-attach"></i></h2>
        <input class="file-input" type="file" />
        <div class="file-box"><div class="file">Wallace.png<div class="delete">x</div></div></div>
      </div>
      <div class="internal-notes-container">
        <div class="break"></div>
        <h2>Internal Notes</h2>
        <div data-input-name="internal_notes" data-input-type="contenteditable" class="note-box" contenteditable></div>
        <div class="break"></div>
      </div>
    </div>

    {!! Form::close() !!}
@endsection
