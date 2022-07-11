<x-app-layout>
    <x-slot name="header">
        @php
        $enc = new App\Classes\Enc;
        @endphp
          @if(session()->get('success'))
          <div class="container bg-green-500 flex items-center text-white text-sm font-bold px-4 py-3 relative" role="alert">
            <svg width="20" height="20" fill="currentColor" class="w-4 h-4 mr-2" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                <path d="M1216 1344v128q0 26-19 45t-45 19h-512q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h64v-384h-64q-26 0-45-19t-19-45v-128q0-26 19-45t45-19h384q26 0 45 19t19 45v576h64q26 0 45 19t19 45zm-128-1152v192q0 26-19 45t-45 19h-256q-26 0-45-19t-19-45v-192q0-26 19-45t45-19h256q26 0 45 19t19 45z">
                </path>
            </svg>
            <p>
            {{ session()->get('success') }}
          </div>
        @endif
   </x-slot>
 <!-- FullCalendar -->
 <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet'>
<link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css' rel='stylesheet'>

<link rel='stylesheet' href="{{ asset('calendario/css/fullcalendar.css')}}"/>
<script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth'
      });
      calendar.render();
    });

  </script>

<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
               <!----------inicio------>
	<!-- Page Content -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-12">
                <div class="col-sm-3">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                          <form class="form-horizontal" method="POST" action="{{ route('mobi_add_agenda')}}">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                  <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="titulo" placeholder="Titulo" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-sm-10">
                                    <input type="text" name="descrition" class="form-control" id="descrition" placeholder="Descrição">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="col-sm-10">
                                    <select name="color" class="form-control" id="cor">
                                    <option value="">Escolher a cor </option>
                                        <option style="color:#0071c5" value="#0071c5">&#9724; Azul Escuro</option>
                                        <option style="color:#40E0D0" value="#40E0D0">&#9724; Turquesa</option>
                                        <option style="color:#FF8C00" value="#FF8C00">&#9724; Laranja</option>
                                        <option style="color:#FF0000" value="#FF0000">&#9724; Vermelho</option>
                                        <option style="color:#000" value="#000">&#9724; Preto</option>
                                      </select>
                                  </div>
                                </div>
                                <div class="form-group">

                                    <div class="col-sm-10">
                                      <input type="date" name="inicio" class="form-control" id="inicio" required >
                                    </div>
                                  </div>
                                  <div class="form-group">

                                    <div class="col-sm-10">
                                      <input type="time" name="hora" class="form-control" id="hora"  required>
                                    </div>
                                  </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Adicionar</button>
                            </div>
                          </form>
                          </div>
                      </div>
                </div>
                <div class="col-sm-9">
                    <div id="calendar" class="col-centered">
                </div>
            </div>
        </div>
    </section>
<!---------------------------------------------------->
<div class="modal fade" id="2ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" action="{{ route('edit_agenda')}}" >
        <div class="modal-body">
            @csrf
            <div class="form-group">
              <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" placeholder="Titulo" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-10">
                <input type="text" name="descrition" class="form-control" id="descrition" placeholder="Descrição">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-10">
                <select name="color" class="form-control" id="color">
                    <option value="">Escolher Cor</option>
                    <option style="color:#0071c5" value="#0071c5">&#9724; Azul Escuro</option>
                    <option style="color:#40E0D0" value="#40E0D0">&#9724; Turquesa</option>
                    <option style="color:#FF8C00" value="#FF8C00">&#9724; Laranja</option>
                    <option style="color:#FF0000" value="#FF0000">&#9724; Vermelho</option>
                    <option style="color:#000" value="#000">&#9724; Preto</option>
                  </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inicio" class="col-sm-2 control-label">Dia</label>
              <div class="col-sm-10">
                <input type="date" name="inicio" class="form-control" id="inicio">
              </div>
            </div>
            <div class="form-group">
              <label for="hora" class="col-sm-2 control-label">Hora</label>
              <div class="col-sm-10">
                <input type="time" name="hora" class="form-control" id="hora">
              </div>
            </div>
              <!-- Deletar Evento -->
              <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                      <label class="text-danger"><input type="checkbox"  name="delete"> Deletar Evento</label>
                    </div>
                  </div>
              </div>
            <input type="hidden" name="id" class="form-control" id="id">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
      </form>
      </div>
    </div>
  </div>
    <!-- jQuery Version 1.11.1 -->
    <script src="{{ asset('calendario/js/jquery.js')}}" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('calendario/js/moment.min.js')}}"></script>
    <script src="{{ asset('calendario/js/fullcalendar.min.js')}}"></script>
    <script src="{{ asset('calendario/locale/pt-br.js')}}"></script>

    <!-- FullCalendar -->
    <script>
        function modalShow() {
            $('#modalShow').modal('show');
        }

        $(document).ready(function() {
            $('#calendar').fullCalendar({

            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listYear'
            },

            defaultDate:'{{ date('Y-m-d'); }}',
            editable: true,
            navLinks: true,
            eventLimit: true,
            selectable: true,
            selectHelper: true,
            select: function(start, end) {
                $('#ModalAdd #inicio').val(moment(start).format('DD-MM-YYYY HH:mm:ss'));
			$('#ModalAdd #termino').val(moment(end).format('DD-MM-YYYY HH:mm:ss'));
                $('#ModalAdd').modal('show');
            },
            eventRender: function(event, element) {
                element.bind('click', function() {

                        $('#ModalEdit #id').val(event.id);
						$('#ModalEdit #title').val(event.title);
						$('#ModalEdit #nome_cliente').val(event.nome_cliente);
						$('#ModalEdit #nome_celular').val(event.nome_celular);
						$('#ModalEdit #hora').val(event.hora);
						$('#ModalEdit #descrition').val(event.descrition);
						$('#ModalEdit').modal('show');
                });
            },
            eventDrop: function(event, delta, revertFunc) {
                edit(event);
            },

            eventResize: function(event,dayDelta,minuteDelta,revertFunc) {
                edit(event);
            },

            events: [

                       @foreach($event as $event)
                        {
                        id: '{{ $event->id }}',
						title: '{{ $event->title }}',
						cliente: '{{ $event->nome_cliente }}',
						celular: '{{ $event->nome_celular }}',
						start: '{{ $event->start }}',
						descrition: '{{$event->descrition }}',
						end: '{{ $event->end }}',
						color: '{{ $event->color }}'

                        },
                        @endforeach

                    ]
                });
                    function edit(event){
                        id =  event.id;

                        $.ajax({
                        url: '{{ route('edit_agenda')}}',
                        type: "POST",
                        data: {Event:Event},
                        success: function(rep) {
                                if(rep == 'OK'){
                                    alert('Modificação Salva!');
                                }else{
                                    alert('Falha ao salvar, tente novamente!');
                                }
                            }
                    });
                }
            });

    </script>
</x-app-layout>
