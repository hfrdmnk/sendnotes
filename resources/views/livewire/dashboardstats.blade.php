<?php

use Livewire\Volt\Component;

new class extends Component {
    public function with()
    {
        return [
            'notesSentCount' => Auth::user()->notes()->where('send_date', '<', now()->toDateString())->where('is_published', true)->count(),
            'notesLovedCount' => Auth::user()->notes()->where('send_date', '<', now()->toDateString())->where('is_published', true)->sum('heart_count'),
        ];
    }
}; ?>

<div>
    <div class="grid grid-cols-2 gap-4">
        <div class="flex flex-col gap-2 p-4 bg-white rounded-lg shadow-lg">
            <p class="text-gray-400">Notes sent</p>
            <p class="text-4xl font-bold">{{ $notesSentCount }}</p>
        </div>
        <div class="flex flex-col gap-2 p-4 bg-white rounded-lg shadow-lg">
            <p class="text-gray-400">Notes loved</p>
            <p class="text-4xl font-bold">{{ $notesLovedCount }}</p>
        </div>
    </div>
</div>
