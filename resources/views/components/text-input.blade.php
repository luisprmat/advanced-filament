<label>
    <span>
        {{ $getLabel() }}
    </span>

    <input type="text" maxlength="{{ $getMaxLenght() }}" wire:model.live="{{ $getName() }}">
</label>
