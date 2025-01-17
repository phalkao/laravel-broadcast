<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                @php
                                    echo env('MAIL_FROM_ADDRESS');
                                @endphp
                                <div class="row">
                                    <div id="presenca" class="col-xl-4">
                                        <h5 style="text-align: center;">Canal de Presença</h5>
                                        <div id="user-presenca" class="alert alert-primary">
                                            <p>Usuários Conectados</p>
                                        </div>
                                    </div>
                                    <div id="privado" class="col-xl-4">
                                        <h5 style="text-align: center;">Canal Privado</h5>
                                    </div>
                                    <div id="publico" class="col-xl-4">
                                        <h5 style="text-align: center;"> Canal Publico</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var publico = document.getElementById("publico");

        Echo.channel('channel-publico')
            .listen('channelPublico', (e) =>{
                publico.innerHTML += "<div class='alert alert-success' >" + e.mensagem + '</div>';        
                console.log(e.mensagem);    
            });
    </script>


</x-app-layout>
