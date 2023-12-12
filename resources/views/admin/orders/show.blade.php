@extends('admin.sidebar')

@section('content')
    <h1 class="text-center my-3">RIEPILOGO ORDINE:</h1>


    <div class="table-responsive mt-5">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th class="text-center" scope="col">ID</th>
                    <th class="text-center" scope="col">QUANTITA'</th>
                    <th class="text-center" scope="col">NOME</th>
                    <th class="text-center" scope="col">INGREDIENTI</th>
                    <th class="text-center" scope="col">PREZZO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center m-auto" scope="row">
                        <!-- {{ $products->id }} -->
                    </td>
                    <td class="text-center m-auto" scope="row">
                        <!-- {{ $products->quantity }} -->
                    </td>

                    <td class="text-center" scope="row">
                        <!-- {{ $products->name }} -->
                    </td>



                    <td class="text-center">
                        <!-- {{ $product->ingredients }} -->
                    </td>


                    <td class="text-center">
                        <!-- {{ $product->totalPrice }} -->
                    </td>




                </tr>

            </tbody>
        </table>
    </div>
    <a class="nav-link my-2 text-end" href="{{ route('admin.orders.index') }}">
        <button type="button" class="btn btn-primary">TORNA AGLI ORDINI</button>
    </a>
@endsection
