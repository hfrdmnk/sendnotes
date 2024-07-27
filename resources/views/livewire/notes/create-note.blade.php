<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;

    public function submit()
    {
        $validated = $this->validate([
            'noteTitle' => ['required', 'string', 'min:5'],
            'noteBody' => ['required', 'string', 'min:20'],
            'noteRecipient' => ['required', 'email'],
            'noteSendDate' => ['required', 'date'],
        ]);

        auth()
            ->user()
            ->notes()
            ->create([
                'title' => $validated['noteTitle'],
                'body' => $validated['noteBody'],
                'recipient' => $validated['noteRecipient'],
                'send_date' => $validated['noteSendDate'],
                'is_published' => false,
            ]);

        redirect(route('notes.index'));
    }
}; ?>

<div>
    <form wire:submit='submit' class="space-y-4">
        <x-input wire:model.blur="noteTitle" label="Title" required placeholder="It's been a great day"></x-input>
        <x-textarea wire:model.blur="noteBody" label="Body" required
            placeholder="Share all your thoughts with your friend"></x-textarea>
        <x-input icon="user" wire:model.blur="noteRecipient" label="Recipient" required type="email"
            placeholder="yourfriend@email.com"></x-input>
        <x-input icon="calendar" wire:model.blur="noteSendDate" label="Send date" required type="date"></x-input>
        <div class="pt-4">
            <x-button primary wire:click="submit" spinner right-icon="calendar">Schedule Note</x-button>
        </div>
        <x-errors />
    </form>
</div>
