<div class="modal fade" id="modalStudents" tabindex="-1" role="dialog" aria-labelledby="Modal Listado de estudiantes">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalStudentsLabel">Alumnos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive"> 
                    <table class="table table-hover" id="tableStudents">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Alumno</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Teléfono de emergencia</th>
                                <th scope="col">Calificación final</th>
                            <tr>    
                        </thead> 
                        <tbody></tbody>    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modalCloseGroup" tabindex="-1" role="dialog" aria-labelledby="Confirma cierre">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmación</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Desea cerrar el grupo?. No podrá realizar ninguna actualización despues del cierre.</p>
      </div>
      <div class="modal-footer">
        <form action="{{ route('cerrar-grupo', $selectedGroup->id_grupo) }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Cerrar grupo">
            Confirmar
          </button>
          <button type="button" id="modalHide" class="btn btn-secondary" aria-label="Close">
            Cancelar
          </button>
        </form>
      </div>
    </div>
  </div>
</div>