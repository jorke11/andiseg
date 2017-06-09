{!! Form::open(['id'=>'frm']) !!}
<input type="hidden" id="id" name="id" class="input-courses">
<div class="row">
    <div class="col-lg-3">
        <div class="form-group">
            <label for="email">anotacions</label>
            <input type="text" class="form-control input-courses" id="description" name='description' required="">
        </div>
    </div>
    <div class="col-lg-3">
        <div class="form-group">
            <label for="email">Tecnico</label>
            <input type="text" class="form-control input-courses" id="description" name='description' required="">
        </div>
    </div>
</div>

{!!Form::close()!!}