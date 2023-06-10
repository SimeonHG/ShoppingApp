<!-- Display the list of users with their roles -->
@foreach ($users as $user)
    <p>
        <strong>{{ $user->name }}</strong> - {{ implode(', ', $user->roles->pluck('name')->toArray()) }}
        <a href="{{ route('users.edit', $user) }}">Edit Roles</a>
    </p>
@endforeach
