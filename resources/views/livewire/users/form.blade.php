@include('common.modalHead')
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label >Nombre de Usuario</label>
            <input type="text" wire:model.lazy="name" class="form-control" placeholder="ej: Juan_Cruz">
            @error('name') <span class="text-danger er">{{$message}}</span>@enderror
        </div>
        <div class="form-group">
            <label >Correo</label>
            <input type="mail" wire:model.lazy="email" class="form-control" placeholder="ej: ejemplo@gmail.com">
            @error('email') <span class="text-danger er">{{$message}}</span>@enderror
        </div>
        <div class="form-group">
            <label >Teléfono</label>
            <input type="text" wire:model.lazy="phone" class="form-control" placeholder="ej: 00000000">
            @error('phone') <span class="text-danger er">{{$message}}</span>@enderror
        </div>
        <div class="form-group">
            <label >Estado</label>
            <select name="" id="" wire:model.lazy="status" class="form-control">
                <option value="Elegir" disabled>Seleccionar un estado</option>
                <option value="ACTIVE">Activo</option>
                <option value="LOCKED">Inactivo</option>
            </select>
            @error('status') <span class="text-danger er">{{$message}}</span>@enderror
        </div>
        <div class="form-group">
            <label >Contraseña</label>
            <input type="password" wire:model.lazy="password" class="form-control">
            @error('password') <span class="text-danger er">{{$message}}</span>@enderror
        </div>
        <div class="form-group">
            <label >Rol</label>
            <select name="" id="" wire:model.lazy="rol" class="form-control">
                <option value="Elegir" disabled>Seleccionar un rol</option>
                <option value="ADMIN">Administrador</option>
                <option value="USER">Usuario</option>
            </select>
        </div>
    </div>
</div>
@include('common.modalFooter')
