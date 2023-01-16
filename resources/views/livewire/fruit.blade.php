<div>
    <form wire:submit.prevent="submit">
        @csrf
            <div>
                <div>
                    <input wire:model="name" type="text">
                    @error('name') <span>{{ $message }}</span>@enderror
                </div>
            <button type="submit">送信する</button>
            @if (session()->has('message'))
            <div class="text-red-800">
                {{ session('message') }}
            </div>
            @endif
            </div>
    </form>
</div>
