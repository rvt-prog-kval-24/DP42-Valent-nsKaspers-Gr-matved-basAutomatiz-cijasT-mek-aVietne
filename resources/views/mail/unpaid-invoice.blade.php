{{ sprintf(__('Hello, %s.'), $invoice->client_name) }}
<br>
<br>
{{ sprintf(__('You have an unpaid invoice %s.'), $invoice->reference) }}
<br>
<br>
{{ sprintf(__('Payment sum %s EUR.'), $invoice->getTotalPriceWithTax()) }}
<br>
<br>
<a href="{{ route('payment.show-form', $invoice) }}">{{ __('Payment link') }}</a>
<br>
<br>
{{ __('Please, pay as soon as possible!') }}
