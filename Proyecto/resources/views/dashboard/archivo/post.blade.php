@extends('dashboard.master')
@section('content')

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Carga de archivos</h4>
    </div>
    <div class="card-body">
        <form action="{{ route( "archivo.store")}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                @include('dashboard.archivo._form')
                <div class="col">
                    <input readonly class="form-control" type="text" name="post_id" id="post_id" value="{{ $post->id }}">
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Lista de archivos por post</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead class="text-primary">
                    <tr>
                        <th>
                            Id
                        </th>
                        <th>
                            Nombre del archivo
                        </th>
                        <th class="text-right">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($archivos as $archivo)
                        <tr>
                            <td>
                                {{$archivo->id}}
                            </td>
                            <td>
                                {{$archivo->nombre_original}}
                            </td>
                            <td class="text-right">
                                <a href="{{route('archivo.download',$archivo)}}" class="btn btn-primary">Descargar</a>
                                <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $archivo->id }}" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{$archivos->links()}}
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p>Estas seguro de eliminar el archivo seleccionado?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          <form id="formDelete" action="{{ route('archivo.destroy',0 )}}" data-action="{{ route('archivo.destroy',0 )}}" method="Post">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </div>
      </div>
    </div>
</div>

<script>
    window.onload = function(){
        $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
    
        action = $('#formDelete').attr('data-action').slice(0,-1);
        
        $('#formDelete').attr('action',action + id)
        var modal = $(this)
        modal.find('.modal-title').text('Delete archivo with id: ' + id)
        });
    };
</script>

@endsection