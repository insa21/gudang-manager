<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Filament\Forms;

class EditProfile extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Edit Profile';
    protected static ?string $slug = 'edit-profile';
    protected static ?string $title = 'Edit Profile';

    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\TextInput::make('name')
                ->label('Name')
                ->required()
                ->default($this->user->name),
            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->required()
                ->default($this->user->email),
            Forms\Components\TextInput::make('password')
                ->label('Password')
                ->password()
                ->nullable(),
        ];
    }

    public function save()
    {
        $data = $this->form->getState();
        $this->user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'] ? bcrypt($data['password']) : $this->user->password,
        ]);

        $this->notify('success', 'Profile updated successfully!');
    }

    protected function getActions(): array
    {
        return [
            Forms\Components\Actions\Action::make('save')
                ->label('Save Changes')
                ->action('save')
                ->button(),
        ];
    }
}
