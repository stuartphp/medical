<div>
    <div class="card">
        <div class="card-header">
            <div class="row d-flex align-items-center">
                <div class="col-md-6">Users&nbsp;&nbsp;&nbsp;<a href="#" wire:click.prevent="addRecord"><i class="fa fa-plus"></i></a></div>
                <div class="col-md-6">
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6"><input type="text" wire:model.debounce.300ms="searchTerm" class="form-control form-control-sm"/></div>
                </div>
                </div>
            </div>
        </div>
        <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th>{{ __('role') }}</th>
                    <th class="col-1">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ __('global.roles.'.$item->role) }}</td>
                    <td><a href="#"><i data-feather="edit"></i></a> Delete</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        <div class="card-footer">
        {{ $data->links() }}</div>
    </div>

<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">@if($modalShow)
        Edit record
        @else
        Add record
        @endif</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-sm">Save changes</button>
      </div>
    </div>
  </div>
</div>

</div>
