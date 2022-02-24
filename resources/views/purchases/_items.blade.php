<div class="row">
    <table id="myTable table-responsive" class="table order-list" width="100%">
        <thead>
            <tr>
                <th width="30%">Items</th>
                <th width="30%">Quantity</th>
                <th width="20%">Price</th>
                <th width="20%">Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach (old('items', ['']) as $index => $oldItem)
            <tr id="item{{ $index }}">
                <td>
                    <select id="item" name="item_id[]" class="form-control">
                        <option value="">-- choose item --</option>
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}"{{ $oldItem == $item->id ? ' selected' : '' }}>
                                {{ $item->name }} 
                            </option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" id="quantity" name="quantity[]" class="form-control" value="{{ old('quantity.' . $index) ?? '1' }}" />
                </td>
                <td>
                    <input type="number" id="purchase_price" name="purchase_price[]"  class="form-control" value="{{ old('purchase_price.' . $index) ?? '1' }}" readonly/>
                </td>
                <td>
                    <input type="number" id="total" name="amount[]" class="form-control" value="{{ old('amount.' . $index) ?? '1' }}" readonly/>
                </td>
                <td></td>
            </tr>
        @endforeach
        <tr id="item{{ count(old('items', [''])) }}"></tr>
        </tbody>
    </table>
    <div class="col-12">
        <x-adminlte-button id="add_row" class="btn-sm bg-gradient-light" type="button" label="Add an Item" icon="fas fa-plus"/>
        <x-adminlte-button id="delete_row" class="btn-sm bg-gradient-danger float-right" type="button" label="Delete an Item" icon="fas fa-trash"/>
        <div class="row">
            <div class="col-6">
                <p class="lead">Payment Methods:</p>
                <img src="{{ asset('/img/credit/visa.png') }}" alt="Visa">
                <img src="{{ asset('/img/credit/mastercard.png') }}" alt="Mastercard">
                <img src="{{ asset('/img/credit/paypal2.png') }}" alt="Paypal">
                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Other payment methods can be added here
                </p>
            </div>
            <div class="col-6">
                <p class="lead">Amount Due 2/22/2014</p>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td><input type="number" id="subtotal" name="subtotal" class="form-control" value="{{ old('subtotal') }}" readonly/></td>
                        </tr>
                        <tr>
                        <th>Tax (10%)</th>
                        <td><input type="number" id="tax" name="tax" class="form-control" value="{{ old('tax') }}" readonly/></td>
                        </tr>
                        <tr>
                        <th>Discount (%)</th>
                        <td><input type="number" id="discount" min="1" max="90" name="discount" class="form-control" value="{{ old('discount') }}"/></td>
                        </tr>
                        <tr>
                        <th>Total:</th>
                        <td><input type="number" id="grand_total" name="grand_total" class="form-control" value="{{ old('grand_total') }}" readonly/></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>