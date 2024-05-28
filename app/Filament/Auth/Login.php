<?php

namespace App\Filament\Auth;

use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Pages\Auth\Login as BaseAuth;
use Illuminate\Validation\ValidationException;

class Login extends BaseAuth
{
    /**
     * Get the form for the resource.
     */
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getStudentNumberFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getRememberFormComponent(),
            ])
            ->statePath('data');
    }

    /**
     * Get the email form component.
     */
    protected function getStudentNumberFormComponent(): Component
    {
        return TextInput::make('student_no')
            ->label('Student Number')
            ->required()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }
    
    /**
     * Get the credentials from the form data.
     */
    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'student_no' => $data['student_no'],
            'password' => $data['password'],
        ];
    }
    

    /**
     * Authenticate the user.
     */
    public function authenticate(): ?LoginResponse
    {
        try {
            return parent::authenticate();
        } catch (ValidationException) {
            throw ValidationException::withMessages([
                'data.email' => __('filament-panels::pages/auth/login.messages.failed'),
            ]);
        }
    }
}