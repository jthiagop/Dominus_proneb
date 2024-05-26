@component('mail::message')


Olá, {{$user->name}},

<p>Nós entendemos que isso acontece.</p>

@component('mail::button', ['url' => url('reset/'.$user->remember_token)])
Redefinir sua senha
@endcomponent

<p>Caso você tenha algum problema com sua senha, entre em contato conosco.</p>

Obrigado, <br>
Equipe {{ config('app.name')}}.
@endcomponent
