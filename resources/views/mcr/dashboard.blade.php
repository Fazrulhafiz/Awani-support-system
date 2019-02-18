@extends('layouts.awani')

@section('content')
    <div class="row">
        <div class="col col-xs-6 col-sm-4 col-md-3 p-2">
            <a href="{{ url('/mcr/new-request') }}" class="btn btn-add"><i class="fas fa-plus"></i> New request</a>
        </div>
    <br><br>
    </div>
    <div class="po-form">
      <div id="non-issued-editable">
        <div class="consumables-section">
          <div class="break"></div>
          <h2>Requested services</h2>
          <table class="consumables">
            <thead>
              <tr>
                <td>Item</td><td>Request Type</td><td>Reason</td><td>Unit Price</td><td>Status</td><td class="delete-td"></td>
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
        <div class="row">
            {{ $req_id->links() }}
        </div>

        <div id="page-content" class="page-content">Page <?php print (isset($_GET["page"]) ? $_GET["page"] : '1'); ?></div>
      </div>
  </div>
@endsection
