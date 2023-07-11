<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html data-bs-theme="dark">
@include('includes.headAdmin')
<body>
    <x-navbarAdmin></x-navbarAdmin>
    <div class="px-4">
        <p class="text-center fw-bold fs-5 my-2">Users</p>
        <div class="my-3">
            <button type="button" class="btn btn-dark bg-primary-subtle" data-bs-toggle="modal" data-bs-target="#tambahUser">
                Tambah
            </button>
            <p class="text-success">{{ Session::pull('success') }}</p>
            <p class="text-danger">{{ Session::pull('error') }}</p>
        </div>
        <div class="my-3">
            <p class="mb-1 fw-bold">Daftar User</p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $user as $users )
                    <tr>
                        <th scope="row">{{ $users->id }}</th>
                        <td id="name{{$users->id}}">{{ $users->name }}</td>
                        <td id="email{{$users->id}}">{{ $users->email }}</td>
                        <td>
                            @if ($users->role == 0)
                                Admin
                            @elseif ($users->role == 1)
                                User
                            @endif
                        </td>
                        <td>
                            <button type="button" id="editBtn" class="btn bg-warning-subtle text-decoration-none py-0" data-bs-toggle="modal" data-bs-target="#editUser"
                            data-user-id="{{$users->id}}">
                                Edit
                            </button>
                        </td>
                        <td>
                            <form action="{{route('admin.user.delete', $users->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn bg-danger-subtle text-decoration-none py-0">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Modal Tambah --}}
        <div class="modal fade" id="tambahUser" tabindex="-1" aria-labelledby="tambahUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="mb-1 fw-bold">Tambah User</p>
                    </div>
                    <form method="POST" action="{{route('admin.user.add')}}">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" name="password" id="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="role0" value="0">
                                    <label class="form-check-label" for="role0">Admin</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="role" id="role1" value="1">
                                    <label class="form-check-label" for="role1">User</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-secondary-subtle" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn bg-primary-subtle">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Modal Edit --}}
        <div class="modal fade" id="editUser" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="mb-1 fw-bold">Edit User</p>
                    </div>
                    <form method="POST" action="{{route('admin.user.update')}}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3 d-none">
                                <label for="edit_id" class="form-label">ID</label>
                                <input type="text" name="edit_id" id="edit_id" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="edit_name" class="form-label">Name</label>
                                <input type="text" name="edit_name" id="edit_name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="edit_email" class="form-label">Email</label>
                                <input type="text" name="edit_email" id="edit_email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="edit_password" class="form-label">Password (optional)</label>
                                <input type="text" name="edit_password" id="edit_password" class="form-control">
                            </div>
                            <p>Role tidak dapat diubah</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-secondary-subtle" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn bg-primary-subtle">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const editBtn = document.querySelectorAll('#editBtn');
        editBtn.forEach(btn => {
            btn.addEventListener('click', () => {
                const id = btn.getAttribute('data-user-id');
                const name = document.getElementById(`name${id}`).innerHTML;
                const email = document.getElementById(`email${id}`).innerHTML;
                document.getElementById('edit_id').value = id;
                document.getElementById('edit_name').value = name;
                document.getElementById('edit_email').value = email;
            })
        })
    </script>
</body>
</html>
