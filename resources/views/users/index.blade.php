<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users | User Management</title>
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
            width: min(100% - 40px, 1080px);
            margin: 0 auto;
            padding: 56px 0;
        }

        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 28px;
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
            font-size: clamp(30px, 5vw, 40px);
            font-weight: 650;
            letter-spacing: -0.045em;
            line-height: 1.1;
        }

        .subtitle {
            margin: 10px 0 0;
            color: #737373;
            font-size: 15px;
        }

        .button {
            display: inline-flex;
            min-height: 42px;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 0 16px;
            border: 1px solid #171717;
            border-radius: 7px;
            background: #171717;
            color: #fff;
            font: inherit;
            font-size: 14px;
            font-weight: 550;
            text-decoration: none;
            transition: background-color 150ms ease, border-color 150ms ease;
        }

        .button:hover {
            border-color: #404040;
            background: #404040;
        }

        .button:focus-visible,
        .action:focus-visible {
            outline: 3px solid #a3a3a3;
            outline-offset: 3px;
        }

        .button-mark {
            font-size: 19px;
            font-weight: 400;
            line-height: 1;
        }

        .notice {
            margin: 0 0 18px;
            padding: 13px 16px;
            border: 1px solid #d4d4d4;
            border-radius: 8px;
            background: #3ebb2a;
            color: #262626;
            font-size: 14px;
        }

        .user-card {
            overflow: hidden;
            border: 1px solid #e5e5e5;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0 1px 2px rgb(0 0 0 / 3%);
        }

        .card-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 19px 22px;
            border-bottom: 1px solid #eaeaea;
        }

        .card-heading h2 {
            margin: 0;
            font-size: 15px;
            font-weight: 600;
        }

        .user-count {
            color: #737373;
            font-size: 13px;
        }

        .table-wrap {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th,
        td {
            padding: 15px 22px;
            white-space: nowrap;
        }

        th {
            background: #fafafa;
            color: #737373;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        td {
            border-top: 1px solid #f0f0f0;
            color: #404040;
            font-size: 14px;
        }

        td:first-child {
            color: #171717;
            font-weight: 550;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .visually-hidden {
            position: absolute;
            width: 1px;
            height: 1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
            clip-path: inset(50%);
        }

        .action {
            padding: 0;
            border: 0;
            background: transparent;
            color: #404040;
            font: inherit;
            font-size: 13px;
            text-decoration: none;
            cursor: pointer;
        }

        .action:hover {
            color: #000;
            text-decoration: underline;
            text-underline-offset: 3px;
        }

        .action-delete {
            color: #737373;
        }

        .empty-state {
            padding: 54px 24px;
            color: #737373;
            text-align: center;
        }

        .empty-state strong {
            display: block;
            margin-bottom: 6px;
            color: #262626;
            font-size: 14px;
            font-weight: 550;
        }

        @media (max-width: 600px) {
            .page {
                width: min(100% - 28px, 1080px);
                padding: 36px 0;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
                gap: 18px;
            }

            .card-heading,
            th,
            td {
                padding-right: 16px;
                padding-left: 16px;
            }
        }
    </style>
</head>
<body>
    <main class="page">
        <header class="page-header">
            <div>
                <p class="eyebrow">User management</p>
                <h1>Users</h1>
                <p class="subtitle">Manage the people who have access to your workspace.</p>
            </div>
            <a href="{{ route('users.create') }}" class="button">
                <span class="button-mark" aria-hidden="true">+</span>
                Add user
            </a>
        </header>

        @if (session('success'))
            <div class="notice alert alert-success" role="status">{{ session('success') }}</div>
        @endif

        <section class="user-card" aria-labelledby="users-heading">
            <div class="card-heading">
                <h2 id="users-heading">All users</h2>
                <span class="user-count">{{ $users->count() }} {{ \Illuminate\Support\Str::plural('user', $users->count()) }}</span>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone number</th>
                            <th scope="col"><span class="visually-hidden">Actions</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone_number }}</td>
                                <td>
                                    <div class="actions">
                                        <a href="{{ route('users.edit', $user->id) }}" class="action">Edit</a>
                                        <form action="{{ route('users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="action action-delete">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="empty-state">
                                    <strong>No users yet</strong>
                                    Add a user to see them listed here.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</body>
</html>
