@extends('layouts.awani')

@section('content')
    <div class="row">
        <div class="col col-xs-6 col-sm-4 col-md-3 p-2">
            <a href="{{ url('/mcr/new-request') }}" class="btn btn-add"><i class="fas fa-plus"></i> New request</a>
        </div>
    <br><br>
    </div>
    <div class="table-responsive">
      <h2>Requested services</h2>
      <table class="table table-hover" width="100%">
        <thead>
        <tr>
          <th scope="col">@sortablelink('req_type', 'Request type',['page' => $onboarders->currentPage()])</th>
          <th scope="col">@sortablelink('requester_id', 'Requester',['page' => $onboarders->currentPage()])</th>
          <th scope="col">@sortablelink('custodian_id', 'For',['page' => $onboarders->currentPage()])</th>
          <th scope="col">Justification</th>
          <th scope="col">@sortablelink('created_date', 'Date request',['page' => $onboarders->currentPage()])</th>
          <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($onboarders as $boarder)
            <tr>
              <td>{{ $boarder->req_type }}</td>
              <td>{{ $boarder->requester_id }}</td>
              <td>{{ $boarder->custodian_id }}</td>
              <td><?php echo trim(substr($boarder->justification, 0 , 100)).'...'; ?></td>
              <td>
                  {{ \Carbon\Carbon::parse($boarder->created_date)->format('d/m/Y') }}
              </td>
              <td>
                <a href="{{ url('mcr/new-requestr/'.$boarder->id.'/edit') }}"><i class="far fa-edit"></i></a> &nbsp;
                <a href="{{ url('mcr/print-request/'.$boarder->id) }}" target="_blank"><i class="fas fa-print"></i></a> &nbsp;
                {{--@if(!$boarder->hasRole('administrator'))--}}
                  {{--<button class="btn btn-xs btn-danger user_destroy"--}}
                    {{--data-url="{{ route('admin.users.destroy', [$boarder->id]) }}" data-toggle="tooltip" data-placement="top" data-title="{{ __('views.admin.users.index.delete') }}">--}}
                  {{--<i class="fa fa-trash"></i>--}}
                  {{--</button>--}}
                {{--@endif--}}
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>
      {{ $onboarders->links() }}
    </div>

    <div id="page-content" class="page-content">Page <?php print (isset($_GET["page"]) ? $_GET["page"] : '1'); ?></div>
@endsection
