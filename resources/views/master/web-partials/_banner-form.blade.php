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
          <div class="col-md-3 form-group">
            <label for="">
              Orden:
            </label>
            <input type="orden" class="form-control" name="orden" id="titulo_en">
          </div>
          @if(explode("-", Request::url())[1] !== 'centrofinanciero' && explode("-", Request::url())[1] !== 'hotel')
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
          @else
            <div class="col-lg-10 form-group">
              <label for="">
                Descripión:
              </label>
              <textarea name="" id="ckeditor_text" name="descripcion" ></textarea>
              <!--<textarea type="text" class="form-control" name="descripcion" id="descripcion"></textarea>-->
            </div>
            <div class="col-lg-10 form-group">
              <label for="">
                Descripción (en):
              </label>
              <textarea name="" id="ckeditor_text_en" name="descripcion_en" ></textarea>
              <!--<textarea type="text" class="form-control" name="descripcion_en" id="descripcion_en"></textarea>-->
            </div>
          @endif

          {{--<div  class="col-lg-10 form-group">
            <label for="">Activo</label>
            <input type="checkbox" name="estado">
          </div>--}}

          <div class="col-lg-10 form-group">
            <figure id="img" style="width: 200px; height: 175px; background-size: cover;">
              <img src="" id="img" alt="" >
            </figure>
            <label for="">
              Imagen:
            </label>
            <input type="file" name="banner" id="banner">
          </div>
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