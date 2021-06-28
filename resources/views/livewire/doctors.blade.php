<div>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-5">
                    <h3>Doctors</h3>
                </div>
                <div class="col-md-7">
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="row">
                            <div class="col-md-2"><a href="#"><i class="fa fa-plus"></i></a></div>
                            <div class="col-md-3"></div>
                            <div class="col-md-7"><input type="text" class="form-control form-control-sm" wire:model.debounce.300ms="searchTerm" /></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ __('Practice Number')}}</th>
                        <th>{{ __('Practice Name')}}</th>
                        <th>{{ __('Province') }}</th>
                        <th>{{ __('Town') }}</th>
                        <th class="col-md-1">{{ __('Action')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->practice_number}}</td>
                        <td>{{ $item->practice_name}}</td>
                        <td>{{ $item->physical_province}}</td>
                        <td>{{ $item->physical_town}}</td>
                        <td>Edit Delete</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">{{ $data->links() }}</div>
    </div>

</div>
