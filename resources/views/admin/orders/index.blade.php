@extends('admin.sidebar')

@section('content')
    <h1 class="text-center my-3">Ordini ricevuti: </h1>


    <div class="table-responsive mt-5">
        <table class="table table-primary">
            <thead>
                <tr>
                    
                    <th class="text-center" scope="col">№ ORDINE</th>
                    <th class="text-center" scope="col">NOME CUSTOMER</th>
                    <th class="text-center" scope="col">E-MAIL</th>
                    <th class="text-center" scope="col">TELEFONO</th>
                    <th class="text-center" scope="col">INDIRIZZO</th>
                    <th class="text-center" scope="col">DATA ORDINAZIONE</th>
                    <th class="text-center" scope="col">DELIVERY</th>
                    <th class="text-center" scope="col">STATO</th>
                    <th class="text-center" scope="col">TOTALE</th>
                    <th class="text-center" scope="col">AZIONI</th>

                </tr>
            </thead>

            <tbody>

                @forelse ($orders as $order)
                <tr>

                    <td class="text-center" scope="row">{{ $order->order_number }}</td>

                    <td class="text-center">
                        {{$order->costumer}}
                    </td>

                    <td class="text-center">
                        {{$order->email}}
                    </td>
                    <td class="text-center">
                        {{$order->phoneNumber}}
                    </td>
                    <td class="text-center">
                        {{$order->costumerAddress}}
                    </td>
                    <td class="text-center">
                        {{$order->orderDate}}
                    </td>
                    <td class="text-center">
                        {{$order->deliveryDate}}
                    </td>
                    <td class="text-center">
                        {{$order->statusOrder}}
                    </td>
                    <td class="text-center">
                        {{$order->totalPrice}} &euro;
                    </td>
                    <td>
                       <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
                        @csrf
                        @method('DELETE')


                        <button type="submit" class="btn btn-danger"> <i

                        class="fa-solid fa-trash"></i></button>
                    </form> 
                    </td>
                    

                </tr>

            </tbody>

            @empty
                            <h1>Non hai ancora degli ordini!</h1>
                        @endforelse
        </table>
    </div>
    <!--  -->
@endsection