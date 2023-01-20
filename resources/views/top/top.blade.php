<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            LINE
        </h2>
        <h3>ユーザー検索</h3>
        <form action="/search">
            @csrf
            <input type="text" name="search" placeholder="ユーザー名で検索">
        </form>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @livewire('fruit')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
