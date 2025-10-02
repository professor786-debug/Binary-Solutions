<form method="POST" action="{{ route('admin_store_user') }}" enctype="multipart/form-data">
    @csrf

    <!-- Name -->
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <!-- Confirm Password -->
    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" name="password_confirmation" class="form-control" required>
    </div>

    <!-- Profile Image -->
    <div class="mb-3">
        <label class="form-label">Profile Image</label>
        <input type="file" name="profile_image" class="form-control">
        @error('profile_image') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <!-- Company -->
    <div class="mb-3">
        <label class="form-label">Company</label>
        <input type="text" name="company" class="form-control">
    </div>

    <!-- Job -->
    <div class="mb-3">
        <label class="form-label">Job</label>
        <input type="text" name="job" class="form-control">
    </div>

    <!-- Country -->
    <div class="mb-3">
        <label class="form-label">Country</label>
        <input type="text" name="country" class="form-control">
    </div>

    <!-- Address -->
    <div class="mb-3">
        <label class="form-label">Address</label>
        <input type="text" name="address" class="form-control">
    </div>

    <!-- Phone -->
    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control">
    </div>

    <!-- About -->
    <div class="mb-3">
        <label class="form-label">About</label>
        <textarea name="about" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Create Admin</button>
</form>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
