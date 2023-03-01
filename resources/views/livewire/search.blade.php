<div class="max-w-6xl mx-auto">
    <input type="text" wire:model="search" id="search" class="border-gray-300 rounded-md" placeholder="ユーザー名で検索" />
    @foreach($users as $user)
    <p>{{ $user->over_name }} {{$user->under_name}} {{$user->birth_day}}</p>
    @endforeach
</div>
