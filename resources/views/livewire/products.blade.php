<div>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-xl px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="user"></i></div>
                            Products
                        </h1>
                    </div>
                    <div class="col-1 mb-1">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#formModal"><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="col-2 mb-1">
                        <input type="search" wire:model.debounce.300ms="searchTerm"
                            class="form-control form-control-sm" />
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-xl px-2 mt-2">
        <table class="table dataTable-table">
            <thead>
                <tr>
                    <th>{{ __('Nappi Code') }}</th>
                    <th>{{ __('Shedule') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Unit') }}</th>
                    <th>{{ __('Retail Price') }}</th>
                    <th class="col-1">{{ __('Action') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->nappi_code }}</td>
                        <td>{{ $product->schedule }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->unit }}</td>
                        <td class="text-end">{{ number_format($product->retail_price / 100, 2) }}</td>
                        <td class="col-1">Edit Delete</td>
                    </tr>

                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Save Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-sm" id="itemSearch">
                        <button class="btn btn-outline-secondary btn-sm" type="button" onclick="getItem()"><i
                                class="fa fa-search"></i></button>
                    </div>
                    <select class="form-select form-select-sm" id="itemSelected" onchange="getSelected(this.value)">
                        <option value="">{{ __('Please Select') }}</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm">Save changes</button>
                </div>
                <div class="row ms-1 me-1">
                    <div class="col-8">
                        <h3>Detail</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nappi_code" class="form-label">Nappi Code</label>
                                    <input type="text" class="form-control form-control-sm" id="nappi_code">
                                </div>
                                <div class="mb-3">
                                    <label for="schedule" class="form-label">Schedule</label>
                                    <input type="text" class="form-control form-control-sm" id="schedule">
                                </div>
                                <div class="mb-3">
                                    <label for="unit" class="form-label">Unit</label>
                                    <input type="text" class="form-control form-control-sm" id="unit">
                                </div>
                                <div class="mb-3">
                                    <label for="package_size" class="form-label">package_size</label>
                                    <input type="text" class="form-control form-control-sm" id="package_size">
                                </div>
                                <div class="mb-3">
                                    <label for="is_generic" class="form-label">is_generic</label>
                                    <input type="text" class="form-control form-control-sm" id="is_generic">
                                </div>
                                <div class="mb-3">
                                    <label for="dispencing_fee" class="form-label">dispencing_fee</label>
                                    <input type="text" class="form-control form-control-sm" id="dispencing_fee">
                                </div>
                                <div class="mb-3">
                                    <label for="retail_price" class="form-label">retail_price</label>
                                    <input type="text" class="form-control form-control-sm" id="retail_price">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="regno" class="form-label">Reg No.</label>
                                    <input type="text" class="form-control form-control-sm" id="regno">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control form-control-sm" id="name">
                                </div>
                                <div class="mb-3">
                                    <label for="dosage_form" class="form-label">dosage_form</label>
                                    <input type="text" class="form-control form-control-sm" id="dosage_form">
                                </div>
                                <div class="mb-3">
                                    <label for="num_packs" class="form-label">num_packs</label>
                                    <input type="text" class="form-control form-control-sm" id="num_packs">
                                </div>
                                <div class="mb-3">
                                    <label for="min_price" class="form-label">min_price</label>
                                    <input type="text" class="form-control form-control-sm" id="min_price">
                                </div>
                                <div class="mb-3">
                                    <label for="add_fee" class="form-label">add_fee</label>
                                    <input type="text" class="form-control form-control-sm" id="add_fee">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <h3>Ingedients</h3>
                        <div id="ingredients"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@push('scripts')
    <script>
        function getItem() {
            let v = document.getElementById('itemSearch').value;
            $.ajax({
                url: 'https://medicineprices.org.za/api/v2/search-lite?q=' + v,
                dataType: 'JSON',
                method: 'GET',
                success: function(response) {
                    $.each(response, function(i, item) {
                        $('#itemSelected').append($('<option>', {
                            value: item.nappi_code,
                            text: item.name
                        }));
                    });

                }
            })
        }

        function getSelected(val) {
            $.ajax({
                url: 'https://medicineprices.org.za/api/v3/detail?nappi=' + val,
                dataType: 'JSON',
                method: 'GET',
                success: function(response) {
                    let min_price = response.min_price.substring(2,response.min_price.length);
                    let disp = response.dispensing_fee.substring(2,response.dispensing_fee.length);
                    let add = (disp/3).toFixed(2);
                    let retail =parseFloat(min_price) + parseFloat(disp)+parseFloat(add);
                    $('#nappi_code').val(response.nappi_code);
                    $('#regno').val(response.regno);
                    $('#schedule').val(response.schedule);
                    $('#name').val(response.name);
                    $('#unit').val('pkt');
                    $('#dosage_form').val(response.dosage_form);
                    $('#package_size').val(response.package_size);
                    $('#num_packs').val(response.num_packs);
                    $('#is_generic').val(response.is_generic);
                    $('#min_price').val(min_price);
                    $('#dispencing_fee').val(disp);
                    $('#add_fee').val(add);
                    $('#retail_price').val(retail);

                    let ingr = response.ingredients;
                    let html='';
                    for(var i=0; i<ingr.length; i++)
                    {
                        html +='<div class="mb-3"><label for="add_fee" class="form-label">Name</label><input type="text" class="form-control form-control-sm" value="'+ingr[i].name+'"></div><div class="mb-3"><label for="add_fee" class="form-label">Unit</label><input type="text" class="form-control form-control-sm" value="'+ingr[i].unit+'"></div><div class="mb-3"><label for="add_fee" class="form-label">Strength</label><input type="text" class="form-control form-control-sm" value="'+ingr[i].strength+'"></div><hr>';
                    }
                    $('#ingredients').html(html);
                }
            })
        }
    </script>
@endpush
