@extends('layouts.app')

@section('content')
<div class="container register">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required >
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bank_name" class="col-md-4 col-form-label text-md-end">{{ __('Bank Name') }}</label>

                            <div class="col-md-6">
                                <input id="bank_name" type="text" class="form-control" name="bank_name" value="{{ old('bank_name') }}" required autocomplete="bank_name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bank_account_number" class="col-md-4 col-form-label text-md-end">{{ __('Bank Account Number') }}</label>

                            <div class="col-md-6">
                                <input id="bank_account_number" type="text" class="form-control" name="bank_account_number" value="{{ old('bank_account_number') }}" required autocomplete="bank_account_number">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="offset-md-8">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    function addBankAccount() {
        var container = document.getElementById('bank-accounts-container');

        var bankAccountDiv = document.createElement('div');
        bankAccountDiv.className = 'row mb-3 bank-account';

        var bankNameLabel = document.createElement('div');
        bankNameLabel.className = 'col-md-4 text-md-end';
        bankNameLabel.textContent = 'Bank Name';

        var bankNameInput = document.createElement('input');
        bankNameInput.type = 'text';
        bankNameInput.className = 'form-control';
        bankNameInput.name = 'bank_names[]';
        bankNameInput.required = true;

        var bankAccountNumberLabel = document.createElement('div');
        bankAccountNumberLabel.className = 'col-md-4 text-md-end';
        bankAccountNumberLabel.textContent = 'Bank Account Number';

        var bankAccountNumberInput = document.createElement('input');
        bankAccountNumberInput.type = 'text';
        bankAccountNumberInput.className = 'form-control';
        bankAccountNumberInput.name = 'bank_account_numbers[]';
        bankAccountNumberInput.required = true;

        bankAccountDiv.appendChild(bankNameLabel);
        bankAccountDiv.appendChild(bankNameInput);
        bankAccountDiv.appendChild(bankAccountNumberLabel);
        bankAccountDiv.appendChild(bankAccountNumberInput);

        container.appendChild(bankAccountDiv);
    }
</script>
@endsection
