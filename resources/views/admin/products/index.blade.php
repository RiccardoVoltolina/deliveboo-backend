@extends('admin.products.sidebar')

@section('content')
    <div>
        <h4>Add Product
            <button class="btn btn-primary py-1 px-3 ms-5"><a href="" class="text-white"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-plus-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z" />
                    </svg></a></button>
        </h4>
    </div>
    <div class="card-body">


        <div class="table-responsive">
            <table
                class="table table-striped
                            table-hover	
                            table-borderless
                            table-dark
                            align-middle">
                <thead class="table-light">
                    <caption>All Product</caption>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">NAME</th>
                        <th class="text-center">THUMB</th>
                        <th class="text-center">ACTIONS</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @if (isset($message))
                        <h1>{{ $message }}</h1>
                    @else
                        @forelse ($products as $product)
                            <tr class="table-primary">
                                <td class="text-center m-auto" scope="row">{{ $product->id }}</td>
                                <td class="text-center m-auto">{{ $product->name }}</td>
                                <td class="text-center m-auto">
                                    <img class="img-fluid w-50" src="{{ $product->cover_image }}" alt="">
                                </td>

                                <td class="text-center m-auto">

                                    <a class="btn btn-success" href="">
                                        <i class="fa-solid fa-eye text-white"></i>
                                    </a>
                                    <a class="btn btn-warning" href="">
                                        <i class="fa-solid fa-pencil text-white"></i></a>
                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $product->id }}">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modalId-{{ $product->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitleId">Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete {{ $product->name }}?
                                                </div>
                                                <div class="modal-footer justify-content-evenly">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <form action=" " method="post">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- Optional: Place to the bottom of scripts -->
                                    <script>
                                        const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
                                    </script>

                                </td>
                            </tr>
                        @empty
                            <h1>no products here!</h1>
                        @endforelse
                    @endif




                </tbody>

            </table>
        </div>

    </div>

    </div>
@endsection
