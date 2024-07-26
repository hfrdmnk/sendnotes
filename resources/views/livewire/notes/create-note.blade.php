<?php

use Livewire\Volt\Component;

new class extends Component {
    #[Validate]
    public $noteTitle;
    public $noteBody;
    public $noteRecipient;
    public $noteSendDate;

    public function rules()
    {
        return [
            'noteTitle' => 'required',
            'noteBody' => 'required',
            'noteRecipient' => 'required|email',
            'noteSendDate' => 'required|date',
        ];
    }

    public function submit()
    {
        $validated = $this->validate();
        dd($this->noteTitle, $this->noteBody, $this->noteRecipient, $this->noteSendDate);
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
    </form>
</div>
