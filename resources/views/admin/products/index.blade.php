@extends('admin.products.sidebar')

@section('content')
    <div>
        <form action="{{ route('admin.products.create') }}">

            <button type="submit" class="btn btn-success my-3">Aggiungi un nuovo piatto</button>

        </form>
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
                        <th class="text-center">NOME</th>
                        <th class="text-center">IMMAGINE</th>
                        <th class="text-center">AZIONI</th>
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
                                    <img class="img-fluid w-50" src="{{ asset('storage/' . $product->cover_image) }}"
                                        alt="">
                                </td>

                                <td class="text-center m-auto">
                                    <img class="img-fluid w-50" src="{{ $product->cover_image }}" alt="">
                                </td>










                                <td class="text-center m-auto">
                                    <div class="d-flex">

                                        <a class="btn btn-success" href="">
                                            <i class="fa-solid fa-eye text-white"></i>
                                        </a>
                                        <a class="btn btn-warning mx-2" href="">
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
                                                        <h5 class="modal-title" id="modalTitleId">Cancella</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Sei sicuro di cancellare questo piatto?
                                                        {{ $product->name }}?
                                                    </div>
                                                    <div class="modal-footer justify-content-evenly">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Chiudi</button>
                                                        <form action=" " method="post">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit" class="btn btn-danger">Cancella</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </td>
                            </tr>
                        @empty
                            <h1>Non hai ancora prodotti!</h1>
                        @endforelse
                    @endif




                </tbody>

            </table>
        </div>

    </div>

    </div>
@endsection
