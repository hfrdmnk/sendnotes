<?php

use Livewire\Volt\Component;
use Carbon\Carbon;

new class extends Component {
    public function with()
    {
        return [
            'notes' => Auth::user()->notes()->orderBy('send_date', 'asc')->get(),
        ];
    }
}; ?>

<div>
    <div class="grid grid-cols-2 gap-4 mt-12">
        @foreach ($notes as $note)
            <x-card wire:key='{{ $note->id }}'>
                <div class="flex justify-between">
                    <a href="#"
                        class="text-xl font-bold hover:text-blue-500 hover:underline">{{ $note->title }}</a>
                    <div class="text-gray-500 text-sx">{{ Carbon::parse($note->send_date)->format('d/m/Y') }}</div>
                </div>
                <div class="flex items-end justify-between gap-1 mt-4">
                    <p class="text-sx">Recipient: <span class="font-semibold">{{ $note->recipient }}</span></p>
                    <div>
                        <x-mini-button rounded outline secondary icon="eye"></x-mini-button>
                        <x-mini-button rounded outline secondary icon="trash"></x-mini-button>
                    </div>
                </div>
            </x-card>
        @endforeach
    </div>
</div>
