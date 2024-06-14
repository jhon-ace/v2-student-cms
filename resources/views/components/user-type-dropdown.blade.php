<div class="mt-4">
    <x-input-label for="user_type" :value="__('User Type')" />
    <select id="user_type" name="user_type" class="block mt-1 w-full bg-black text-white" required autocomplete="user_type">
        <option value="">Select User Type</option>
        @foreach($options as $key => $option)
            <option value="{{ $key }}" {{ $selected == $key ? 'selected' : '' }}>{{ $option }}</option>
        @endforeach
    </select>
    <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
</div>
