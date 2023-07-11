<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html data-bs-theme="dark">
@include('includes.headAdmin')
<body>
    <x-navbarAdmin></x-navbarAdmin>
    <div class="px-4">
        <p class="text-center fw-bold fs-5 my-2">News</p>
        <div class="my-3">
            <button type="button" class="btn btn-dark bg-primary-subtle" data-bs-toggle="modal" data-bs-target="#tambahNews">
                Tambah
            </button>
            <p class="text-success">{{ Session::pull('success') }}</p>
            <p class="text-danger">{{ Session::pull('error') }}</p>
        </div>
        <div class="my-3">
            <p class="mb-1 fw-bold">Daftar News</p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Image</th>
                        <th scope="col">Content</th>
                        <th scope="col">Date created</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $news as $newsss )
                    <tr>
                        <th scope="row">{{ $newsss->id }}</th>
                        <td id="title{{$newsss->id}}">{{ $newsss->title }}</td>
                        <td>{{ $newsss->author }}</td>
                        <td><img src="{{Storage::url('news/'.$newsss->id.'.jpg')}}" style="width: 128px"></td>
                        <td id="content{{$newsss->id}}">{{ $newsss->content }}</td>
                        <td>{{ $newsss->created_at }}</td>
                        <td>
                            <button type="button" id="editBtn" class="btn bg-warning-subtle text-decoration-none py-0" data-bs-toggle="modal" data-bs-target="#editNews"
                            data-news-id="{{$newsss->id}}">
                                Edit
                            </button>
                        </td>
                        <td>
                            <form action="{{route('admin.news.delete', $newsss->id)}}" method="POST">
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
        <div class="modal fade" id="tambahNews" tabindex="-1" aria-labelledby="tambahNewsLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="mb-1 fw-bold">Tambah Berita</p>
                    </div>
                    <form method="POST" action="{{route('admin.news.add')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" name="author" id="author" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/jpeg,image/png">
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea name="content" id="content" class="form-control"></textarea>
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
        <div class="modal fade" id="editNews" tabindex="-1" aria-labelledby="editNewsLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="mb-1 fw-bold">Edit Berita</p>
                    </div>
                    <form method="POST" action="{{route('admin.news.update')}}">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="edit_id" class="form-label">ID</label>
                                <input type="text" name="edit_id" id="edit_id" class="form-control" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="edit_title" class="form-label">Title</label>
                                <input type="text" name="edit_title" id="edit_title" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="edit_content" class="form-label">Content</label>
                                <textarea name="edit_content" id="edit_content" class="form-control"></textarea>
                            </div>
                            <p>Author dan image tidak dapat diubah</p>
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
                const id = btn.getAttribute('data-news-id');
                const title = document.querySelector(`#title${id}`).innerHTML;
                const content = document.querySelector(`#content${id}`).innerHTML;
                document.querySelector('#edit_id').value = id;
                document.querySelector('#edit_title').value = title;
                document.querySelector('#edit_content').value = content;
            })
        })
    </script>
</body>
</html>
