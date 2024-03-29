<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://kit.fontawesome.com/e0d812d232.js" crossorigin="anonymous"></script>
<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <a href="{{ route('add-genre-page') }}" class="btn btn-primary" style="margin-bottom: 20px;"><i class="fa-solid fa-plus" style="color: #ffffff;"></i> &nbsp;Add Genre</a>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Genre</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $genre)
                                <!-- Calculate row number based on pagination -->
                                <tr>
                                    <td class="align-middle">{{ $data->firstItem() + $index }}</td>
                                    <td class="align-middle">{{ $genre->nama_genre }}</td>
                                    <td class="align-middle">
                                        <div style="display: flex; align-items: center; justify-content: center; margin-top: 15px;">
                                            <form action="{{ route('edit-genre', ['id' => $genre->id_genre]) }}" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-primary" style="background-color: #007bff; color: #fff;"><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i></button>
                                            </form>
                                            {{-- <form action="{{ route('delete-genre', ['id' => $genre->id_genre]) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-danger ml-2" style="background-color: #FF0000; color: #fff;"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></button>
                                            </form> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Pagination Links -->
                    <div class="d-flex justify-content-center">
                        {!! $data->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
                document.addEventListener('DOMContentLoaded', function () {
                @if(session('success'))
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                let message = "{{ session('success') }}";
                    if ("{{ session('status') }}" === "added") {
                        message = "Data Added Successfully";
                    } else if ("{{ session('status') }}" === "updated") {
                        message = "Data Updated Successfully";
                    }

                    Toast.fire({
                        icon: "success",
                        title: message
                    });
                @endif
            });
</script>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
