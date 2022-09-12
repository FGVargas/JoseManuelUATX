<!-- Modal Confirm Delete-->
<div class="modal fade" id="modal-delete-{{$empleado->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <form action="{{route('empleado.destroy', $empleado->id)}}" method="post">
            <input name="_method" type="hidden" value="DELETE">
            {{csrf_field()}}
            <div class="modal-content text-center">

                <div class="modal-body bg-danger">
                    ¿ Desea eliminar al Empleado {{$empleado->nombre." ".$empleado->paterno." ".$empleado->materno}} ?

                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>

                    <button type="submit" class="btn btn-danger">Eliminar</button>

                </div>

            </div>
        </form>
    </div>
</div>
<!-- Final Modal-->