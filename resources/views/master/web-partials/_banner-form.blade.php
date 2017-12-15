<div class="modal fade" id="banner-modal" role="dialog">
  <form action="" id="banner-form" role="form">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Crear Banner</h4>
        </div>
        <div class="modal-body" style="overflow: hidden">
          <div class="col-lg-10 form-group">
            <label for="">
              Titulo:
            </label>
            <input type="text" class="form-control"  name="titulo" id="titulo">
          </div>
          <div class="col-lg-10 form-group">
            <label for="">
              Titulo (en):
            </label>
            <input type="text" class="form-control" name="titulo_en" id="titulo_en">
          </div>
          <div class="col-lg-10 form-group">
            <label for="">
              Descripión:
            </label>
            <textarea type="text" class="form-control" name="descripcion" id="descripcion"></textarea>
          </div>
          <div class="col-lg-10 form-group">
            <label for="">
              Descripción (en):
            </label>
            <textarea type="text" class="form-control" name="descripcion_en" id="descripcion_en"></textarea>
          </div>
          <div class="col-lg-10 form-group">
            <label for="">
              Imagen:
            </label>
            <input type="file" name="banner" id="banner">
          </div>
          <input type="hidden" name="section_id" value="1">
          <input type="hidden" name="id" id="id" value="1">
          <input type="hidden" name="_method" id="id" value="PUT">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </div>
        <div class="modal-footer" style="text-align: left;">
          <div class="col-lg-12">
            <button type="submit" class="btn btn-primary" id="banner_button">Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>