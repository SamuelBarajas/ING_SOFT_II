@extends('dashboard.master')
@section('content')

<a class="btn btn-primary" href="{{route("tag.create")}}"> Crear</a>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Lista de categorias</h4>
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
                            Titulo
                        </th>
                        <th>
                            Creacion
                        </th>
                        <th>
                            Actualizacion
                        </th>
                        <th class="text-right">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>
                                {{$tag->id}}
                            </td>
                            <td>
                                {{$tag->title}}
                            </td>
                            <td>
                                {{$tag->created_at->format('d-m-Y')}}
                            </td>
                            <td>
                                {{$tag->updated_at->format('d-m-Y')}}
                            </td>
                            <td class="text-right">
                                <a href="{{ route('tag.show',$tag->id) }}" class="btn btn-primary">Show</a>
                                <a href="{{ route('tag.edit',$tag->id) }}" class="btn btn-primary">Edit</a>
                                
                                    <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $tag->id }}" class="btn btn-danger">Delete</button>
                            
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{$tags->links()}}

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
            <p>Estas seguro de eliminar el tag seleccionado?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          <form id="formDelete" action="{{ route('tag.destroy',0 )}}" data-action="{{ route('tag.destroy',0 )}}" method="Post">
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
        modal.find('.modal-title').text('Delete tag with id: ' + id)
        });
    };
</script>
@endsection