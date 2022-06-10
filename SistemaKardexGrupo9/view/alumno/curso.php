<h1 class="page-header">Cursos</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=Curso&a=Crud">Nuevo Curso</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
           <th style="width:180px;">Id</th>
            <th style="width:180px;">Nombre</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->id; ?></td>
            <td><?php echo $r->Nombre; ?></td>

            <td>
                <a href="?c=Curso&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Curso&a=Eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
