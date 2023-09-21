@props(['status' => 'pending']) <!-- Default status is 'pending' -->

<label class="inline-flex items-center space-x-2">
    <input type="radio" name="signal" value="new" class="text-green-600 form-radio focus:ring-green-400"
        {{ $status === 'new' ? 'checked' : '' }}>
    <span class="text-green-600 SemiB-font">Approved</span>
</label>

<label class="inline-flex items-center space-x-2">
    <input type="radio" name="signal" value="pending" class="text-orange-500 form-radio focus:ring-orange-400"
        {{ $status === 'pending' ? 'checked' : '' }}>
    <span class="text-orange-500 SemiB-font">Pending</span>
</label>
