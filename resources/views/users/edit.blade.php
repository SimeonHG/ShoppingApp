<!-- Form to assign roles to a user -->
<form method="POST" action="{{ route('users.update', $user) }}">
    @csrf
    @method('PUT')
    <h2>Assign Roles to {{ $user->name }}</h2>
    <!-- Display available roles as checkboxes -->
    @foreach ($roles as $role)
        <div>
            <input type="checkbox" name="roles[]" value="{{ $role->id }}" id="role_{{ $role->id }}"
                {{ $user->roles->contains($role) ? 'checked' : '' }}>
            <label for="role_{{ $role->id }}">{{ $role->name }}</label>
        </div>
    @endforeach
    <button type="submit">Save</button>
</form>
