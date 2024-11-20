@php use App\Models\Order; @endphp
@extends('layouts.main')
@section('content')
    @if( $order->service_type === Order::SERVICE_TYPE_MARKET )
        @include('order.detail_market')
    @else
        @include('order.detail_clean')
    @endif
@endsection
