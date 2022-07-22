@component('mail::message')
<h1>Parabéns!</h1>

<h4>Você acaba de ganhar a possibiidade de fazer uma pesquisa no Google!</h4>

<p>Clique no botão abaixo e faça sua pesquisa...<p>

@component('mail::button', ['url' => 'https://google.com.br'])
    Garanta sua pesquisa!
@endcomponent

@endcomponent