@extends('dashboard.master')
@section('content')

<table class="table">
    <thead>
        <tr>
            <td>
                Id
            </td>
            <td>
                Nombre
            </td>
            <td>
                Email
            </td>
            <td>
                Creacion
            </td>
            <td>
                Actualizacion
            </td>
            <td>
                Acciones
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>
                    {{$contact->id}}
                </td>
                <td>
                    {{$contact->name}}
                </td>
                <td>
                    {{$contact->email}}
                </td>
                <td>
                    {{$contact->created_at->format('d-m-Y')}}
                </td>
                <td>
                    {{$contact->updated_at->format('d-m-Y')}}
                </td>
                <td>
                    <a href="{{ route('contact.show',$contact->id) }}" class="btn btn-primary">Show</a>
                    <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $contact->id }}" class="btn btn-danger">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{$contacts->links()}}

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
            <p>Estas seguro de eliminar el contact seleccionado?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          <form id="formDelete" action="{{ route('contact.destroy',0 )}}" data-action="{{ route('contact.destroy',0 )}}" method="post">
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
        modal.find('.modal-title').text('Delete contact with id: ' + id)
        });
    };
</script>
@endsection