@component('mail::message')
# Order Reciept

 Dear {{$name}},
 This is a breakdown of your order from {{ config('app.name') }}
 <table>
    <tr><td>Product : </td><td>{{ucwords($product_name)}}</td></tr>
        <tr><td>Quantity :</td><td>{{$quantity}}</td></tr>
            <tr><td>Selling Price : </td><td>&#8358;{{$price}}</td></tr>
                <tr><td>Total Amount </td><td>&#8358;{{$total_price}}</td></tr>
                    <tr><td>Delivery Fee : </td><td>Negotiable</td></tr>

 </table>



Thanks,<br>
{{ config('app.name') }}
@endcomponent
