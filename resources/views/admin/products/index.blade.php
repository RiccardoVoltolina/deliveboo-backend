@extends('admin.products.sidebar')

@section('content')
    <div>
        <form class="my-3" action="{{ route('admin.products.create') }}">

            <button type="submit" class="btn btn-success my-3">Aggiungi un nuovo piatto</button>

        </form>
    </div>
    <div class="card-body">


        <div class="table-responsive ">
            <table
                class="table table-striped
                            table-hover	
                            table-borderless
                            align-middle">
                <thead class="table-light">
                    <caption>All Product</caption>
                    <tr class>
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
                            <tr class="table-primary del_dark">
                                <td class="text-center m-auto" scope="row">{{ $product->id }}</td>
                                <td class="text-center m-auto">{{ $product->name }}</td>
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
                                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Elimina <i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>

                                       
                                        

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

        {{-- <div class="pt-4"> {{ $products->links('pagination::bootstrap-5') }} </div> --}}
    </div>

    </div>
@endsection
