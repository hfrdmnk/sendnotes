<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Note;

new #[Layout('layouts.app')] class extends Component {
    public Note $note;

    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;
    public $noteIsPublished;

    public function mount(Note $note)
    {
        $this->authorize('update', $note);
        $this->fill($note);
        $this->noteTitle = $note->title;
        $this->noteBody = $note->body;
        $this->noteRecipient = $note->recipient;
        $this->noteSendDate = $note->send_date;
        $this->noteIsPublished = $note->is_published;
    }

    public function saveNote()
    {
        $this->authorize('update', $this->note);

        $validated = $this->validate([
            'noteTitle' => ['required', 'string', 'min:5'],
            'noteBody' => ['required', 'string', 'min:20'],
            'noteRecipient' => ['required', 'email'],
            'noteSendDate' => ['required', 'date'],
            'noteIsPublished' => ['boolean'],
        ]);

        $this->note->update([
            'title' => $validated['noteTitle'],
            'body' => $validated['noteBody'],
            'recipient' => $validated['noteRecipient'],
            'send_date' => $validated['noteSendDate'],
            'is_published' => $validated['noteIsPublished'],
        ]);
    }
}; ?>

<x-slot name="header">
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{ __('Edit Note') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-2xl px-4 mx-auto lg:px-8">
        <form wire:submit='saveNote' class="space-y-4">
            <x-input wire:model.blur="noteTitle" label="Title" required placeholder="It's been a great day"></x-input>
            <x-textarea wire:model.blur="noteBody" label="Body" required
                placeholder="Share all your thoughts with your friend"></x-textarea>
            <x-input icon="user" wire:model.blur="noteRecipient" label="Recipient" required type="email"
                placeholder="yourfriend@email.com"></x-input>
            <x-input icon="calendar" wire:model.blur="noteSendDate" label="Send date" required type="date"></x-input>
            <x-checkbox wire:model="noteIsPublished" label="Published"></x-checkbox>
            <div class="flex justify-between pt-4">
                <x-button secondary type="submit" spinner>Save Note</x-button>
                <x-button flat :href="route('notes.index')" wire:navigate>Back</x-button>
            </div>
            <x-errors />
        </form>
    </div>
</div>
