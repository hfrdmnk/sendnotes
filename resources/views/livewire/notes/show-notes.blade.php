<?php

use Livewire\Volt\Component;
use Carbon\Carbon;

new class extends Component {
    public function delete($id)
    {
        $note = Auth::user()->notes()->find($id);
        $note->delete();
    }

    public function with(): array
    {
        return [
            'notes' => Auth::user()->notes()->orderBy('send_date', 'asc')->get(),
        ];
    }
}; ?>

<div class="flex flex-col gap-4">
    @if ($notes->isEmpty())
        <div class="text-center">
            <p class="text-xl font-bold">No notes yet</p>
            <p class="text-sm">Let's create your first note to send.</p>
            <x-button primary icon-right="plus" class="mt-6" :href="route('notes.create')" wire:navigate>Create note</x-button>
        </div>
    @else
        <div>
            <x-button primary icon-right="plus" class="mt-6" :href="route('notes.create')" wire:navigate>Create note</x-button>
        </div>
        <div class="grid grid-cols-3 gap-4 mt-12">
            @foreach ($notes as $note)
                <x-card wire:key='{{ $note->id }}'>
                    <div class="flex justify-between">
                        <div class="flex flex-col gap-1">
                            <a href="#"
                                class="text-xl font-bold hover:text-blue-500 hover:underline">{{ $note->title }}</a>
                            <p class="text-sm">{{ Str::limit($note->body, 50) }}</p>
                        </div>
                        <div class="text-gray-500 text-sx">{{ Carbon::parse($note->send_date)->format('d/m/Y') }}</div>
                    </div>
                    <div class="flex items-end justify-between gap-1 pt-4 mt-auto">
                        <p class="text-sx">Recipient: <span class="font-semibold">{{ $note->recipient }}</span></p>
                        <div>
                            <x-mini-button rounded outline secondary icon="eye"></x-mini-button>
                            <x-mini-button rounded outline secondary icon="trash"
                                wire:click="delete('{{ $note->id }}')" wire:confirm="Are you sure?"></x-mini-button>
                        </div>
                    </div>
                </x-card>
            @endforeach
        </div>
    @endif
</div>
