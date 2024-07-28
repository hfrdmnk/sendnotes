<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create a note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl px-4 mx-auto lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="p-6 space-y-6 text-gray-900">
                    <x-button secondary outline icon-left="arrow-left" :href="route('notes.index')" icon="arrow-left"
                        wire:navigate>All
                        Notes</x-button>
                    <livewire:notes.create-note />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
