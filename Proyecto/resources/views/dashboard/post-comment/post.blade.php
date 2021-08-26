@extends('dashboard.master')
@section('content')

<div class="col-6 mb-3">
    <form action="{{route('post-comment.post',1)}}" id="filterForm">
        <div class="form-row">
            <div class="col-10 input-group no-border">
                <select id="filterPost" class="form-control">
                    @foreach ($posts as $p)
                        <option value="{{$p->id}}"
                            {{$post->id == $p->id ? 'selected' : ''}}>
                            {{Str::limit($p->title,10)}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-2">
                <button class="btn btn-success" type="submit">Enviar</button>
            </div>
        </div>
    </form>
</div>

@if (count($postComments) > 0)

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Lista de comentarios por post</h4>
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
                            Usuario
                        </th>
                        <th>
                            Aprovado
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
                    @foreach($postComments as $postComment)
                        <tr>
                            <td>
                                {{$postComment->id}}
                            </td>
                            <td>
                                {{$postComment->title}}
                            </td>
                            <td>
                                {{$postComment->user->name}}
                            </td>
                            <td>
                                {{$postComment->approved}}
                            </td>
                            <td>
                                {{$postComment->created_at->format('d-m-Y')}}
                            </td>
                            <td>
                                {{$postComment->updated_at->format('d-m-Y')}}
                            </td>
                            <td class="text-right">
                                <a href="{{ route('post-comment.show',$postComment->id) }}" class="btn btn-primary">Show</a>
                                <button data-id="{{ $postComment->id }}" class="approved btn btn-{{$postComment->approved == 1 ? "success" : "danger"}}">{{$postComment->approved == 1 ? "Aprovado" : "Rechazado"}}</button>
                                <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $postComment->id }}" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{$postComments->links()}}

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
            <p>Estas seguro de eliminar el postComment seleccionado?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          <form id="formDelete" action="{{ route('post-comment.destroy',0 )}}" data-action="{{ route('post-comment.destroy',0 )}}" method="post">
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
        modal.find('.modal-title').text('Delete postComment with id: ' + id)
        });
    };
</script>
@else
<h1>No hay comentarios para el post seleccionado</h1>
@endif

<script>
    document.querySelectorAll(".approved").forEach(button => button.addEventListener("click",function(){
        console.log("Click Approved");

        var id = button.getAttribute("data-id");

        $.ajax({
            method: "POST",
            url: "{{URL::to("/")}}/dashboard/post-comment/process/"+id,
            data: { '_token' : '{{ csrf_token() }}'}
        })
        .done(function(aprroved){
            if(aprroved == 1){
                $(button).removeClass('btn-danger');
                $(button).addClass('btn-success');
                $(button).text("Aprovado");
            }else{
                $(button).removeClass('btn-success');
                $(button).addClass('btn-danger');
                $(button).text("Rechazado");
            }
        });
    }));

    window.onload = function(){
        $('#filterForm').submit(function(){
             var action = $(this).attr('action');
             action = action.replace(/[0-9]/g,$("#filterPost").val());
             $(this).attr('action',action);
        });
    }
</script>

@endsection