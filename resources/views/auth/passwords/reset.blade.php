@extends('layouts.app')

@section('hide_navbar', true)
@section('main_class', 'p-0')

@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    body {
        background: linear-gradient(135deg, #f0f4f9 0%, #e5eef7 50%, #dbe7f5 100%);
        min-height: 100vh;
        font-family: 'Nunito', system-ui, -apple-system, sans-serif;
    }

    .auth-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 2.5rem 1rem;
    }

    .auth-container {
        width: 100%;
        max-width: 480px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .auth-card {
        background: #ffffff;
        border-radius: 1.25rem;
        border: 1px solid rgba(226, 232, 240, 0.8);
        box-shadow: 0 20px 45px -12px rgba(15, 45, 90, 0.12), 0 0 0 1px rgba(0, 0, 0, 0.02);
        width: 100%;
        padding: 2.5rem;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .auth-card:hover {
        box-shadow: 0 25px 50px -12px rgba(15, 45, 90, 0.16);
    }

    .auth-logo {
        height: 46px;
        object-fit: contain;
        display: block;
        margin: 0 auto;
        transition: transform 0.2s ease;
    }

    .auth-logo:hover {
        transform: scale(1.03);
    }

    .input-group-modern {
        border: 1.5px solid #e2e8f0;
        border-radius: 0.75rem;
        overflow: hidden;
        transition: all 0.2s ease-in-out;
        background-color: #f8fafc;
    }

    .input-group-modern:focus-within {
        border-color: #3b82f6;
        background-color: #ffffff;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
    }

    .input-group-modern.is-invalid-group {
        border-color: #ef4444;
        box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.15);
    }

    .input-group-modern.is-valid-group {
        border-color: #10b981;
    }

    .input-group-modern .input-group-text {
        background: transparent;
        border: none;
        padding: 0.75rem 0.85rem 0.75rem 1rem;
        color: #94a3b8;
    }

    .input-group-modern .form-control {
        border: none;
        background: transparent;
        padding: 0.75rem 0.75rem 0.75rem 0.25rem;
        font-size: 0.95rem;
        color: #1e293b;
    }

    .input-group-modern .form-control:focus {
        box-shadow: none;
        background: transparent;
    }

    .btn-toggle-pwd {
        background: transparent;
        border: none;
        padding: 0 1rem;
        color: #94a3b8;
        cursor: pointer;
        transition: color 0.2s ease;
    }

    .btn-toggle-pwd:hover {
        color: #3b82f6;
    }

    .btn-action {
        background: linear-gradient(135deg, #1d4ed8 0%, #2563eb 100%);
        border: none;
        border-radius: 0.75rem;
        padding: 0.8rem;
        font-size: 1rem;
        font-weight: 600;
        letter-spacing: 0.3px;
        color: #ffffff;
        transition: all 0.25s ease;
        box-shadow: 0 6px 15px -3px rgba(37, 99, 235, 0.4);
    }

    .btn-action:hover:not(:disabled) {
        background: linear-gradient(135deg, #1e40af 0%, #1d4ed8 100%);
        transform: translateY(-2px);
        box-shadow: 0 10px 20px -3px rgba(37, 99, 235, 0.45);
        color: #ffffff;
    }

    .btn-action:disabled {
        opacity: 0.8;
        cursor: not-allowed;
    }

    @keyframes shakeCard {
        0%, 100% { transform: translateX(0); }
        20%, 60% { transform: translateX(-8px); }
        40%, 80% { transform: translateX(8px); }
    }

    .shake {
        animation: shakeCard 0.45s ease-in-out;
    }
</style>
@endsection

@section('content')
<div class="auth-wrapper">
    <div class="auth-container">
        <!-- Logo di luar card -->
        <div class="text-center mb-4">
            <a href="{{ url('/') }}">
                <img src="{{ asset('images/medify-logo.png') }}" alt="Medify Logo" class="auth-logo">
            </a>
        </div>

        <div class="auth-card" id="resetCard">
            <!-- Header di dalam card -->
            <div class="text-center mb-4">
                <h4 class="fw-bold text-dark mb-1">Setel Ulang Password</h4>
                <p class="text-muted small mb-0">Masukkan password baru untuk akun Anda</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger py-2 px-3 small rounded-3 mb-3 d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-circle-fill me-2 fs-6 flex-shrink-0"></i>
                    <div>
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            <form method="POST" action="{{ route('password.update') }}" id="resetPasswordForm" novalidate>
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <!-- Email Input -->
                <div class="mb-3">
                    <label for="email" class="form-label small fw-semibold text-secondary mb-1">
                        Alamat Email
                    </label>
                    <div class="input-group-modern d-flex align-items-center @error('email') is-invalid-group @enderror" id="emailGroup">
                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <input id="email" type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               name="email" 
                               value="{{ $email ?? old('email') }}" 
                               required 
                               autocomplete="email" 
                               autofocus>
                    </div>
                </div>

                <!-- Password Input -->
                <div class="mb-3">
                    <label for="password" class="form-label small fw-semibold text-secondary mb-1">
                        Password Baru
                    </label>
                    <div class="input-group-modern d-flex align-items-center @error('password') is-invalid-group @enderror" id="passwordGroup">
                        <span class="input-group-text">
                            <i class="bi bi-lock"></i>
                        </span>
                        <input id="password" type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               name="password" 
                               placeholder="••••••••" 
                               required 
                               autocomplete="new-password">
                        <button type="button" class="btn-toggle-pwd" id="togglePasswordBtn" title="Lihat Password" aria-label="Lihat Password">
                            <i class="bi bi-eye" id="togglePasswordIcon"></i>
                        </button>
                    </div>
                </div>

                <!-- Confirm Password Input -->
                <div class="mb-4">
                    <label for="password-confirm" class="form-label small fw-semibold text-secondary mb-1">
                        Konfirmasi Password Baru
                    </label>
                    <div class="input-group-modern d-flex align-items-center" id="passwordConfirmGroup">
                        <span class="input-group-text">
                            <i class="bi bi-shield-lock"></i>
                        </span>
                        <input id="password-confirm" type="password" 
                               class="form-control" 
                               name="password_confirmation" 
                               placeholder="••••••••" 
                               required 
                               autocomplete="new-password">
                        <button type="button" class="btn-toggle-pwd" id="toggleConfirmBtn" title="Lihat Password" aria-label="Lihat Konfirmasi Password">
                            <i class="bi bi-eye" id="toggleConfirmIcon"></i>
                        </button>
                    </div>
                    <div id="passwordMatchAlert" class="small mt-1 d-none align-items-center">
                        <span id="matchIcon" class="me-1"></span>
                        <span id="matchText"></span>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-action w-100 mb-3" id="submitBtn">
                    <span id="btnText">
                        <i class="bi bi-key me-1"></i> Simpan Password Baru
                    </span>
                    <span id="btnSpinner" class="d-none">
                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                        Menyimpan...
                    </span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).ready(function() {
    var $card = $('#resetCard');
    var $password = $('#password');
    var $passwordConfirm = $('#password-confirm');
    var $passwordConfirmGroup = $('#passwordConfirmGroup');
    var $matchAlert = $('#passwordMatchAlert');
    var $matchIcon = $('#matchIcon');
    var $matchText = $('#matchText');
    var $form = $('#resetPasswordForm');
    var $submitBtn = $('#submitBtn');
    var $btnText = $('#btnText');
    var $btnSpinner = $('#btnSpinner');

    @if ($errors->any())
        $card.addClass('shake');
        setTimeout(function() {
            $card.removeClass('shake');
        }, 500);
    @endif

    $('#togglePasswordBtn').on('click', function(e) {
        e.preventDefault();
        var type = $password.attr('type') === 'password' ? 'text' : 'password';
        $password.attr('type', type);
        $('#togglePasswordIcon').toggleClass('bi-eye bi-eye-slash');
        $password.focus();
    });

    $('#toggleConfirmBtn').on('click', function(e) {
        e.preventDefault();
        var type = $passwordConfirm.attr('type') === 'password' ? 'text' : 'password';
        $passwordConfirm.attr('type', type);
        $('#toggleConfirmIcon').toggleClass('bi-eye bi-eye-slash');
        $passwordConfirm.focus();
    });

    function checkPasswordMatch() {
        var pwd = $password.val();
        var cfm = $passwordConfirm.val();

        if (cfm.length === 0) {
            $matchAlert.addClass('d-none').removeClass('d-flex');
            $passwordConfirmGroup.removeClass('is-invalid-group is-valid-group');
            return;
        }

        $matchAlert.removeClass('d-none').addClass('d-flex');
        if (pwd === cfm) {
            $matchAlert.removeClass('text-danger').addClass('text-success');
            $matchIcon.html('<i class="bi bi-check-circle-fill"></i>');
            $matchText.text('Password cocok');
            $passwordConfirmGroup.removeClass('is-invalid-group').addClass('is-valid-group');
        } else {
            $matchAlert.removeClass('text-success').addClass('text-danger');
            $matchIcon.html('<i class="bi bi-x-circle-fill"></i>');
            $matchText.text('Password tidak cocok');
            $passwordConfirmGroup.removeClass('is-valid-group').addClass('is-invalid-group');
        }
    }

    $password.on('input', function() {
        if ($passwordConfirm.val().length > 0) {
            checkPasswordMatch();
        }
    });

    $passwordConfirm.on('input', checkPasswordMatch);

    $form.on('submit', function(e) {
        var pwdVal = $password.val();
        var cfmVal = $passwordConfirm.val();

        if (!pwdVal || !cfmVal || pwdVal !== cfmVal) {
            $card.addClass('shake');
            setTimeout(function() {
                $card.removeClass('shake');
            }, 500);
            return;
        }

        $submitBtn.prop('disabled', true);
        $btnText.addClass('d-none');
        $btnSpinner.removeClass('d-none');
    });
});
</script>
@endsection
