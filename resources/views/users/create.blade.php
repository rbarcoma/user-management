<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add user | User Management</title>
    <style>
        :root {
            color-scheme: light;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            color: #171717;
            background: #f7f7f7;
            font-synthesis: none;
            text-rendering: optimizeLegibility;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-width: 320px;
            min-height: 100vh;
            margin: 0;
            background: #f7f7f7;
        }

        a {
            color: inherit;
        }

        .page {
            width: min(100% - 40px, 560px);
            margin: 0 auto;
            padding: 56px 0;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 28px;
            color: #737373;
            font-size: 14px;
            text-decoration: none;
        }

        .back-link:hover {
            color: #171717;
        }

        .back-arrow {
            font-size: 17px;
            line-height: 1;
        }

        .eyebrow {
            margin: 0 0 10px;
            color: #737373;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
        }

        h1 {
            margin: 0;
            font-size: clamp(30px, 5vw, 38px);
            font-weight: 650;
            letter-spacing: -0.045em;
            line-height: 1.1;
        }

        .subtitle {
            margin: 10px 0 26px;
            color: #737373;
            font-size: 15px;
            line-height: 1.5;
        }

        .form-card {
            padding: 26px;
            border: 1px solid #e5e5e5;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 1px 2px rgb(0 0 0 / 3%);
        }

        .form-fields {
            display: grid;
            gap: 20px;
        }

        .field {
            display: grid;
            gap: 8px;
        }

        label {
            color: #262626;
            font-size: 13px;
            font-weight: 550;
        }

        input {
            width: 100%;
            min-height: 44px;
            padding: 0 12px;
            border: 1px solid #d4d4d4;
            border-radius: 6px;
            background: #fff;
            color: #171717;
            font: inherit;
            font-size: 14px;
            transition: border-color 150ms ease, box-shadow 150ms ease;
        }

        input::placeholder {
            color: #a3a3a3;
        }

        input:focus {
            border-color: #525252;
            outline: none;
            box-shadow: 0 0 0 3px rgb(23 23 23 / 8%);
        }

        input[aria-invalid="true"] {
            border-color: #737373;
        }

        .field-error {
            margin: 0;
            color: #525252;
            font-size: 13px;
        }

        .form-footer {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 26px;
            padding-top: 20px;
            border-top: 1px solid #f0f0f0;
        }

        .button {
            display: inline-flex;
            min-height: 42px;
            align-items: center;
            justify-content: center;
            padding: 0 16px;
            border: 1px solid #171717;
            border-radius: 7px;
            background: #171717;
            color: #fff;
            font: inherit;
            font-size: 14px;
            font-weight: 550;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 150ms ease, border-color 150ms ease;
        }

        .button:hover {
            border-color: #404040;
            background: #404040;
        }

        .button-secondary {
            border-color: #e5e5e5;
            background: #fff;
            color: #404040;
        }

        .button-secondary:hover {
            border-color: #d4d4d4;
            background: #fafafa;
            color: #171717;
        }

        .button:focus-visible,
        .back-link:focus-visible {
            outline: 3px solid #a3a3a3;
            outline-offset: 3px;
        }

        @media (max-width: 600px) {
            .page {
                width: min(100% - 28px, 560px);
                padding: 36px 0;
            }

            .form-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <main class="page">
        <a href="{{ route('users.index') }}" class="back-link">
            <span class="back-arrow" aria-hidden="true">&larr;</span>
            Back to users
        </a>

        <header>
            <p class="eyebrow">User management</p>
            <h1>Add a user</h1>
            <p class="subtitle">Enter the details below to create a new user account.</p>
        </header>

        <form action="{{ route('users.store') }}" method="POST" class="form-card">
            @csrf

            <div class="form-fields">
                <div class="field">
                    <label for="name">Full name</label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        placeholder="e.g. Alex Morgan"
                        autocomplete="name"
                        @error('name') aria-invalid="true" aria-describedby="name-error" @enderror
                        required
                    >
                    @error('name')
                        <p class="field-error" id="name-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="email">Email address</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        value="{{ old('email') }}"
                        placeholder="name@example.com"
                        autocomplete="email"
                        @error('email') aria-invalid="true" aria-describedby="email-error" @enderror
                        required
                    >
                    @error('email')
                        <p class="field-error" id="email-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="phone_number">Phone number</label>
                    <input
                        type="tel"
                        name="phone_number"
                        id="phone_number"
                        value="{{ old('phone_number') }}"
                        placeholder="Enter phone number"
                        autocomplete="tel"
                        @error('phone_number') aria-invalid="true" aria-describedby="phone-number-error" @enderror
                        required
                    >
                    @error('phone_number')
                        <p class="field-error" id="phone-number-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Create a password"
                        autocomplete="new-password"
                        @error('password') aria-invalid="true" aria-describedby="password-error" @enderror
                        required
                    >
                    @error('password')
                        <p class="field-error" id="password-error">{{ $message }}</p>
                    @enderror
                </div>

                <div class="field">
                    <label for="password_confirmation">Confirm password</label>
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        placeholder="Enter the password again"
                        autocomplete="new-password"
                        required
                    >
                </div>
            </div>

            <div class="form-footer">
                <a href="{{ route('users.index') }}" class="button button-secondary">Cancel</a>
                <button type="submit" class="button">Create user</button>
            </div>
        </form>
    </main>
</body>
</html>
