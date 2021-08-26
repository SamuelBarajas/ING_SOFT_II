@extends('dashboard.master')
@section('content')

<a class="btn btn-primary" href="{{route("post.create")}}"> 
    <i class="fa fa-plus"></i> Crear
</a>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Lista de posts</h4>
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
                            Categoria
                        </th>
                        <th>
                            Posteado
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
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                {{$post->id}}
                            </td>
                            <td>
                                {{$post->title}}
                            </td>
                            <td>
                                {{$post->category->title}}
                            </td>
                            <td>
                                {{$post->posted}}
                            </td>
                            <td>
                                {{$post->created_at->format('d-m-Y')}}
                            </td>
                            <td>
                                {{$post->updated_at->format('d-m-Y')}}
                            </td>
                            <td class="text-right">
                                <a href="{{ route('post.show',$post->id) }}" class="btn btn-primary mb-1">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a href="{{ route('post.edit',$post->id) }}" class="btn btn-primary mb-1">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('post-comment.post',$post->id) }}" class="btn btn-primary mb-1">
                                    <i class="fa fa-comments"></i>
                                </a>
                                <a href="{{ route('archivo.post',$post->id) }}" class="btn btn-primary mb-1">
                                    <i class="fa fa-file"></i> 
                                </a>
                                <button data-toggle="modal" data-target="#deleteModal" data-id="{{ $post->id }}" class="btn btn-danger mb-1">
                                   <i class="fa fa-trash"></i>
                                </button>
                            
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{$posts->links()}}

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
            <p>Estas seguro de eliminar el post seleccionado?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

          <form id="formDelete" action="{{ route('post.destroy',0 )}}" data-action="{{ route('post.destroy',0 )}}" method="post">
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
        modal.find('.modal-title').text('Delete post with id: ' + id)
        });
    };
</script>
@endsection