      <div class="modal-header">
        <h5 class="modal-title font-weight-bold" id="ModalLabel">Nome: {{$pokemon['name']}}</h5>
      </div>
      <div class="modal-body">
        <div class="float-left">
            <img src="{{$pokemon['image']}}" height="100">
        </div>

        <div class="float-rigth">
            <label for="">Especie:</label>
            {{$pokemon['species']}}
            <div class="clearbot" />
            
            <label for="">Altura:</label>
            {{$pokemon['heigth']}}
            <div class="clearbot" />

            <label for="">Habilidades:</label>
            {{$pokemon['abilities']}}
        </div>
      </div>
     