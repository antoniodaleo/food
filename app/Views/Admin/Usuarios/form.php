
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="nome">Nome</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo old('nome' , ($usuario->nome)); ?>">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="cpf">CPF</label>
            <div class="col-sm-9">
                <input type="text" class="form-control cpf" id="cpf" name="cpf" value="<?php echo old('cpf' , ($usuario->cpf)); ?>">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="telefone">Telefone</label>
            <div class="col-sm-9">
                <input type="text" class="form-control sp_celphones" id="telefone" name="telefone" value="<?php echo old('telefone' , ($usuario->telefone)); ?>">
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="email">Email</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" id="email" name="email" value="<?php echo old('email' , ($usuario->email)); ?>">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="password">Senha</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="password" name="password" >
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label" for="password_confirmation">Confirmação de Senha</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" >
            </div>
        </div>
    </div>
   

</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Ativo</label>
            <div class="col-sm-9">
                <select class="form-control" name="ativo">
                    <?php if($usuario->id): ?>
                        <option value="1" <?php echo set_select('ativo','1'); ?> <?php echo($usuario->ativo ? 'selected': ''); ?> >Sim</option>
                        <option value="0" <?php echo set_select('ativo','0'); ?> <?php echo(!$usuario->ativo ? 'selected': ''); ?> >Não</option>

                    <?php else: ?>    
                        <option value="1" <?php echo set_select('ativo','1'); ?>>Sim</option>
                        <option value="0" <?php echo set_select('ativo','1'); ?> selected="">Não</option>

                    <?php endif ?>

                </select>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Perfil de Acesso</label>
            <div class="col-sm-9">
                <select class="form-control" name="is_admin">
                    <?php if($usuario->id): ?>
                        <option value="1"  <?php echo set_select('is_admin','1'); ?> <?php echo($usuario->is_admin ? 'selected': ''); ?> >Administrador</option>
                        <option value="0"  <?php echo set_select('is_admin','0'); ?> <?php echo(!$usuario->is_admin ? 'selected': ''); ?>  >Cliente</option>

                    <?php else: ?>    
                        <option value="1" <?php echo set_select('is_admin','1'); ?>>Administrador</option>
                        <option value="0" <?php echo set_select('is_admin','0'); ?>  selected="">Cliente</option>

                    <?php endif ?>

                </select>
            </div>
        </div>
    </div>

</div>



<button type="submit" class="btn btn-primary mr-2" title="Salvar">
    <i class="mdi mdi-checkbox-marked-circle btn-icon-prepend"></i> 
    
</button>





